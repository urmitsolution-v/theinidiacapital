
<div class="row gy-4 bbbbbbr">
                                    <div class="col-lg-4">
                                        <div class="card p-2" style="background: rgb(102, 102, 191)">
                                            <a href="/deposit-history">
                                                <div class="row">
                                                  
                                                    <div class="col-12">
                                                        <div>
                                                            <h6 style="font-size: 12px" class="text-white">Deposited Amount</h6>
                                                            <h5 class="text-white"> ₹ <?= DB::table('customer_payment')
                                      ->where('customer_id', $row->id)
                                      ->where('status', 'complete')
                                      ->sum('amount') ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-2" style="background: rgb(102, 173, 191)">
                                            
                                            <a href="/investment-history">
                                                <div class="row">
                                               
                                                <div class="col-12">
                                                    <div>
                                                        <h6 style="font-size: 12px" class="text-white">PNL</h6>
                                                        <h5 class="text-white">
                                                             ₹ <?php $pnlAmount =  DB::table('custom_interest_rates')->where('status','active')->where('userid', $row->id)->sum('amount'); echo number_format($pnlAmount, 2); ?>
                                                          </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="col-lg-4">
                                        <div class="card p-2" style="background: rgb(99, 172, 191091)">
                                            
                                            <a href="/investment-history">
                                                <div class="row">
                                               
                                                <div class="col-12">
                                                    <div>
                                                        <h6 style="font-size: 12px" class="text-white">Current Month Profit</h6>
                                                        <h5 class="text-white">
                                                             ₹
                                                             <?php
use Carbon\Carbon;

$pnlAmount = DB::table('custom_interest_rates')
    ->where('status', 'active')
    ->where('userid', $row->id)
    ->whereMonth('created_at', Carbon::now()->month)   // current month
    ->whereYear('created_at', Carbon::now()->year)     // current year (safe for Jan/Dec issue)
    ->sum('amount');

echo number_format($pnlAmount, 2);
?>
                                                          </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-2" style="background: rgb(151, 191, 102)">
                                            <div class="row">
                                             
                                                <div class="col-12">
                                                    <div>
                                                        <h6 style="font-size: 12px" class="text-white">Growth</h6>
                                                        <h5 class="text-white">
                                                           <?php
$growth = DB::table('custom_interest_rates')->where('userid', $row->id)->where('status', 'active')->sum('custom_interest_rate');

echo number_format($growth, 2) . "%";
                                                    ?>

                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-2" style="background: rgb(151, 191, 102)">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div>
                                                        <h6 class="text-white" style="font-size: 12px">Withdrawal</h6>
                                                        <h5 class="text-white">₹ <?= DB::table('withdraw')
                                      ->where('userid', $row->id)
                                      ->wherein('status', ['complete','pending'])
                                      ->sum('amount') ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-2" style="background: rgb(102, 191, 146)">
                                            <div class="row">
                                              
                                                <div class="col-12">
                                                    <div>
                                                        <h6 class="text-white" style="font-size: 12px">Trade Balance</h6>
                                                        <h5 class="text-white"> ₹ <?php  
                                                    
                                                            echo getUserInvestmentSummary($row->id)['wallet_balance'];

                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-2" style="background: rgb(191, 103, 102)">
                                            <div class="row">
                                               
                                                <div class="col-12">
                                                    <div>
                                                        <h6 class="text-white" style="font-size: 12px">Holding Balance</h6>

                                                        <?php
                                             $userdepositedu =    DB::table('customer_payment')
                                      ->where('customer_id', $row->id)
                                      ->where('status', 'complete')
                                      ->sum('amount')
                                                        ?>

                                                        <h5 class="text-white"> ₹ <?php echo number_format($row->wallet ?? 0, 2); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                      <div class="col-lg-4">
                                        <a href="/referral-list">
                                        <div class="card p-2" style="background: rgb(102, 191, 146)">
                                            <div class="row">
                                         
                                                <div class="col-12">
                                                    <div>
                                                        <h6 class="text-white" style="font-size: 12px">Refer Amount</h6>
                                                     <h5 class="text-white"> ₹ <?php echo number_format($withdrawableAmount ?? 0, 2); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>