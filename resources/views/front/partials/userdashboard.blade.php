<div class="row gy-4">
                                    <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(102, 102, 191)">
                                            <a href="/deposit-history">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div
                                                            style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                            <i class="fa fa-money-bill text-dark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div>
                                                            <h6 style="font-size: 12px">Deposited Amount</h6>
                                                            <h5> ₹ <?= DB::table('customer_payment')
                                      ->where('customer_id', Auth::user()->id)
                                      ->where('status', 'complete')
                                      ->sum('amount') ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(102, 173, 191)">
                                            
                                            <a href="/investment-history">
                                                <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">PNL</h6>
                                                        <h5>
                                                             ₹ <?php $pnlAmount =  DB::table('custom_interest_rates')->where('status','active')->where('userid', Auth::user()->id)->sum('amount'); echo number_format($pnlAmount, 2); ?>
                                                          </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(102, 173, 191)">
                                            
                                            <a href="javascript:void(0)">
                                                <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">Current Month Profit</h6>
                                                        <h5>
                                                             ₹  <?php
use Carbon\Carbon;

$pnlAmount = DB::table('custom_interest_rates')
    ->where('status', 'active')
    ->where('userid', Auth::user()->id)
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


                                    {{-- <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(102, 173, 191)"> 
                                            <a href="/user-pnl">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div
                                                            style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                            <i class="fa fa-chart-bar text-dark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div>
                                                            <h6 style="font-size: 12px">PNL By Tic</h6>
                                                            <h5>₹ {{ userpnl(Auth::user()->id) }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(151, 191, 102)">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">Growth</h6>
                                                        <h5>
                                                           <?php
$growth = DB::table('custom_interest_rates')->where('userid', Auth::user()->id)->where('status', 'active')->sum('custom_interest_rate');



echo number_format($growth, 2) . "%";
                                                    ?>

                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(151, 191, 102)">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">Withdrawal</h6>
                                                        <h5>₹ <?= DB::table('withdraw')
                                      ->where('userid', Auth::user()->id)
                                      ->where('status', 'complete')
                                      ->sum('amount') ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(102, 108, 191)">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">Profit</h6>
                                                        <h5>₹ {{ usertotalearning(Auth::user()->id) }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(102, 191, 146)">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">Trade Balance</h6>
                                                        <h5> ₹ <?php  
                                                   
                                                                echo getUserInvestmentSummary(Auth::user()->id)['wallet_balance'];

                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card p-4" style="background: rgb(191, 103, 102)">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">Holding Balance</h6>

                                                        <?php
                                             $userdepositedu =    DB::table('customer_payment')
                                      ->where('customer_id', Auth::user()->id)
                                      ->where('status', 'complete')
                                      ->sum('amount')

                                                        ?>

                                                        <h5> ₹ <?php echo number_format(Auth::user()->wallet ?? 0, 2); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                      <div class="col-lg-4">
                                        <a href="/referral-list">
                                        <div class="card p-4" style="background: rgb(102, 191, 146)">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div
                                                        style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50px;
                                background: #fff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                              ">
                                                        <i class="fa fa-chart-bar text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div>
                                                        <h6 style="font-size: 12px">Refer Amount</h6>
                                                     <h5> ₹ <?php echo number_format($withdrawableAmount ?? 0, 2); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>