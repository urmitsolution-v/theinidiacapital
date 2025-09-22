<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Invest;
use App\Models\Withdraw;
use App\Models\CommissionHistory;
use Carbon\Carbon;

class GenerateMonthlyReferralCommission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   protected $signature = 'commission:monthly-referral';
    protected $description = 'Generate monthly referral commission based on active investments';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
     public function handle()
    {
        // Optional for testing with fixed date:
        // Carbon::setTestNow(Carbon::parse('2025-07-01'));

        $percent = 1;
        $month = now()->format('Y-m');
        $daysInMonth = now()->daysInMonth;
        $remainingDays = $daysInMonth - now()->day + 1;

        $referrers = User::whereHas('referrals')->get();

        foreach ($referrers as $referrer) {
            $referrals = User::where('refer_by', $referrer->id)->get();
            $totalCommission = 0;

            foreach ($referrals as $referral) {
                $investments = Invest::where('userid', $referral->id)->get();

                foreach ($investments as $investment) {
                    $withdrawn = Withdraw::where('invest_id', $investment->id)
                        ->where('status', 'complete')
                        ->sum('amount');

                    $netInvest = $investment->amount - $withdrawn;
                    if ($netInvest <= 0) continue;

                    $fullCommission = ($netInvest * $percent) / 100;
                    $dailyCommission = $fullCommission / $daysInMonth;
                    $proratedCommission = $dailyCommission * $remainingDays;
                    $finalCommission = round($proratedCommission, 2);

                    // Check if commission already exists
                    $existing = CommissionHistory::where([
                        'referrer_id' => $referrer->id,
                        'user_id' => $referral->id,
                        'invest_id' => $investment->id,
                        'month' => $month,
                    ])->first();

                    if ($existing) {
                        $diff = $finalCommission - $existing->amount;

                        // Update only if there is a change
                        if ($diff != 0) {
                            $existing->amount = $finalCommission;
                            $existing->save();

                            $referrer->wallet += $diff;
                            $referrer->refer_wallet += $diff;
                            $totalCommission += $diff;
                        }
                    } else {
                        CommissionHistory::create([
                            'referrer_id' => $referrer->id,
                            'user_id' => $referral->id,
                            'invest_id' => $investment->id,
                            'month' => $month,
                            'amount' => $finalCommission,
                        ]);

                        $referrer->wallet += $finalCommission;
                        $referrer->refer_wallet += $finalCommission;
                        $totalCommission += $finalCommission;
                    }
                }
            }

            if ($totalCommission > 0) {
                $referrer->save();
                $this->info("Commission ₹{$totalCommission} credited to user ID {$referrer->id}");
            }
        }

        return Command::SUCCESS;
    }
}