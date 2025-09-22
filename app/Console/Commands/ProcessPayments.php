<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Invest;
use App\Models\User;
use Carbon\Carbon;

class ProcessPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

     protected $signature = 'payments:process'; // Command name

     


     
    /**
     * The console command description.
     *
     * @var string
     */

     protected $description = 'Automatically refer & earn process pending customer payments';

     
    /**
     * Execute the console command.
     */

public function handle()
{
        // Fetch all active investments
        $investments = Invest::where('status', 'Y')->get();

        foreach ($investments as $investment) {
            $user = $investment->user;

            $usermain = User::find($user->refer_by); 

            if (!$usermain) {
                continue;
            }

            // Calculate elapsed time in seconds since investment start
            $elapsedSeconds = Carbon::now()->diffInSeconds($investment->start_time);

            // Calculate total earnings
            $totalEarnings = $investment->earnings_per_second;

            // Update wallet balance
            $usermain->wallet += $totalEarnings;
            $usermain->save();

            // Update investment record
            $investment->earned_amount = $totalEarnings;
            $investment->save();
        }

        $this->info("Investment earnings processed successfully.");
    }

}