@section('title', 'Dashboard - Stock-Markect')
@extends('layout.admin')
@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="row g-3">
                            
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-pill me-2">
                                                    <div class="bg-primary rounded-circle widget-size text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24">
                                                            <path fill="#ffffff"
                                                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Toatal Users</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3">
                                                     <?= DB::table('users')->where('role','user')->count(); ?>
                                                </h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-pill me-2">
                                                    <div class="bg-primary rounded-circle widget-size text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24">
                                                            <path fill="#ffffff"
                                                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Deposited Amount</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3">

                                                    ₹ <?php $amountDeposit = DB::table('customer_payment')->where('status','complete')->sum('amount'); echo number_format($amountDeposit, 3); ?>
                                                </h3>
                                                {{-- <div class="text-center">
                                                    <span class="text-primary fs-14"><i
                                                            class="mdi mdi-trending-up fs-14"></i> 12.5%</span>
                                                    <p class="text-dark fs-13 mb-0">Last 7 days</p>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-pill me-2">
                                                    <div class="bg-primary rounded-circle widget-size text-center">
                                                        <svg width="20" class="text-white" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16.5717 8.02749C16.8469 7.4078 16.9998 6.72176 16.9998 6C16.9998 3.23858 14.7612 1 11.9998 1C9.23839 1 6.99981 3.23858 6.99981 6C6.99981 8.58261 8.95785 10.7079 11.4704 10.9723C12.6858 9.24029 14.576 8.20785 16.5717 8.02749ZM13.1542 17.9462C13.996 16.1276 14.047 13.9741 13.1547 12.0554C14.6399 10.0118 17.4591 9.37883 19.6956 10.6701L19.6957 10.67C22.0871 12.0508 22.9064 15.1086 21.5257 17.5C20.145 19.8915 17.087 20.7109 14.6956 19.3302C14.0707 18.9694 13.5532 18.4942 13.1542 17.9462ZM6.27311 10.0269C7.42726 11.6652 9.26672 12.786 11.3746 12.9726C12.4016 15.2807 11.5401 18.0388 9.30357 19.3301C6.91211 20.7108 3.85415 19.8914 2.47344 17.5C1.09273 15.1085 1.91211 12.0505 4.30357 10.6698C4.92851 10.309 5.59897 10.0984 6.27311 10.0269Z"></path></svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">PnL</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3">
                                                    {{-- ₹ <?= totalearning() ?> --}}
                                                    ₹ <?php $pnlAmount =  DB::table('custom_interest_rates')->where('status','active')->sum('amount'); echo number_format($pnlAmount, 3); ?>
                                                </h3>
                                                {{-- <div class="text-center">
                                                    <span class="text-primary fs-14"><i
                                                            class="mdi mdi-trending-up fs-14"></i> 12.5%</span>
                                                    <p class="text-dark fs-13 mb-0">Last 7 days</p>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                             <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                   <a href="/admin/pnl-history">
                                     <div class="card-body">
                                        <div class="widget-first">
                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-pill me-2">
                                                    <div class="bg-primary rounded-circle widget-size text-center">
                                                        <svg width="20" class="text-white" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16.5717 8.02749C16.8469 7.4078 16.9998 6.72176 16.9998 6C16.9998 3.23858 14.7612 1 11.9998 1C9.23839 1 6.99981 3.23858 6.99981 6C6.99981 8.58261 8.95785 10.7079 11.4704 10.9723C12.6858 9.24029 14.576 8.20785 16.5717 8.02749ZM13.1542 17.9462C13.996 16.1276 14.047 13.9741 13.1547 12.0554C14.6399 10.0118 17.4591 9.37883 19.6956 10.6701L19.6957 10.67C22.0871 12.0508 22.9064 15.1086 21.5257 17.5C20.145 19.8915 17.087 20.7109 14.6956 19.3302C14.0707 18.9694 13.5532 18.4942 13.1542 17.9462ZM6.27311 10.0269C7.42726 11.6652 9.26672 12.786 11.3746 12.9726C12.4016 15.2807 11.5401 18.0388 9.30357 19.3301C6.91211 20.7108 3.85415 19.8914 2.47344 17.5C1.09273 15.1085 1.91211 12.0505 4.30357 10.6698C4.92851 10.309 5.59897 10.0984 6.27311 10.0269Z"></path></svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Profit</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3">
                                                    ₹ <?php $pnlAmount =  DB::table('custom_interest_rates')->where('status','active')->sum('amount'); echo number_format($pnlAmount, 3); ?>
                                                </h3>
                                            </div>

                                        </div>
                                   </a>
                                    </div>
                                </div>
                            </div>




                            
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-pill me-2">
                                                    <div class="bg-primary rounded-circle widget-size text-center">
                                                       <svg width="20"
                                                            height="20" class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M9.82986 8.78986L7.99998 9.45588V13H5.99998V8.05H6.015L11.2834 6.13247C11.5274 6.03855 11.7922 5.99162 12.0648 6.0008C13.1762 6.02813 14.1522 6.75668 14.4917 7.82036C14.678 8.40431 14.848 8.79836 15.0015 9.0025C15.9138 10.2155 17.3653 11 19 11V13C16.8253 13 14.8823 12.0083 13.5984 10.4526L12.9008 14.4085L15 16.17V23H13V17.1025L10.7307 15.1984L10.003 19.3253L3.10938 18.1098L3.45667 16.1401L8.38071 17.0084L9.82986 8.78986ZM13.5 5.5C12.3954 5.5 11.5 4.60457 11.5 3.5C11.5 2.39543 12.3954 1.5 13.5 1.5C14.6046 1.5 15.5 2.39543 15.5 3.5C15.5 4.60457 14.6046 5.5 13.5 5.5Z"></path></svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Growth</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3">
                                                    <?php
                                                    $invest = DB::table('invested')->where('completestatus', 'pending')->sum('amount');
$earned = DB::table('custom_interest_rates')->where('status', 'active')->sum('amount');

$growth = 0;
if ($invest > 0) {
    $growth = ($earned / $invest) * 100;
}

echo number_format($growth, 3) . "%";
                                                    ?>
                                                </h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                      <a href="/admin/withdraw">
                                          <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-secondary border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                    <div class="bg-secondary rounded-circle widget-size text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 640 512">
                                                            <path fill="#ffffff"
                                                                d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Total Completed Withdraw</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3"> ₹ <?= DB::table('withdraw')->where('status','complete')->sum('amount'); ?></h3>
                                             
                                            </div>

                                        </div>
                                      </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-secondary border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                    <div class="bg-danger rounded-circle widget-size text-center">
                                                        <svg  width="20" class="text-white"
                                                            height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM13.5003 8C13.8278 8.43606 14.0625 8.94584 14.175 9.5H16V11H14.175C13.8275 12.7117 12.3142 14 10.5 14H10.3107L14.0303 17.7197L12.9697 18.7803L8 13.8107V12.5H10.5C11.4797 12.5 12.3131 11.8739 12.622 11H8V9.5H12.622C12.3131 8.62611 11.4797 8 10.5 8H8V6.5H16V8H13.5003Z"></path></svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Trade Balance</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3"> ₹ <?php  
                                                    
                                                    $allTradeBalance = getUserInvestmentSummaryaAll()['wallet_balance'] ?? 0;
                                                    
                                                    echo number_format($allTradeBalance, 3);

                                                    ?>
                                                    
                                                
                                                </h3>
                                             
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-warning border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                    <div class="bg-warning rounded-circle widget-size text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 640 512">
                                                        <path fill="#ffffff"
                                                            d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4" />
                                                    </svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Users Balance</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="mb-0 fs-22 text-black me-3"> ₹ <?php 
                                                $usersBalance = 
                                                DB::table('users')->sum('wallet'); 
                                                
                                                 echo number_format($usersBalance, 3);
                                                
                                                ?></h3>
                                             
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-warning border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                    <div class="bg-warning rounded-circle widget-size text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 640 512">
                                                        <path fill="#ffffff"
                                                            d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4" />
                                                    </svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Total Invested Amount</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                              <h3 class="mb-0 fs-22 text-black me-3">
    ₹ <?php
        $InvestedBalance = DB::table('invested')->sum('amount');
        $totalWithdraw   = DB::table('withdraw')
                              ->where('status','complete')
                              ->sum('amount');

        // पहले calculation numeric values पर
        $calculatedInvestedBalance = $InvestedBalance - $totalWithdraw;

        // अब final value को format करो
        echo number_format($calculatedInvestedBalance, 3);
    ?>
</h3>

                                             
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div
                                                    class="p-2 border border-warning border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                    <div class="bg-warning rounded-circle widget-size text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 640 512">
                                                        <path fill="#ffffff"
                                                            d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4" />
                                                    </svg>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-dark fs-15">Custom Investment History</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                             <a href="/admin/custom-interest-history">View</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="card p-3">
                                <h5>REGISTRATION</h5>
                                <p>Client must be an Indian resident over 18 years of age and must possess valid KYC documents to register with us. Client must complete KYC once registration is done to activate the account. Client may register with our partner's reference code/link.</p>
                                <hr>
                                
                                <h5>KYC GUIDELINES</h5>
                                <p>Client must submit valid and clear KYC documents copies - Govt IDs - PAN Card and Aadhar Card Passport sized photograph (other images will lead to KYC rejection) Bank documents - Cancelled Cheque ("Cancelled cheque" must be written) Passbook first page indicating all account details</p>
                                
                                 <hr>
                                
                                <h5>DEPOSIT</h5>
                                <p>Client must deposit funds only once KYC Approval is done. Any deposits made before KYC approval will not be included in the investment cycle.<br>
Minimum Deposit amount is Rs.50,000/-<br>
Client must only make deposits from the bank account which has been used for the completion of KYC. Deposits made from any other account/s is strictly prohibited and will not get approved.
<br>
Cash Deposit requests will not be accepted.
<br>
Once the funds are deposited, the client needs to raise an 'Add Deposit' request under 'Deposit Requests' with the Proof of transaction and its details. This needs to be done on priority once payment is done to avoid any delays in the investment cycle.<br>
Once deposit is approved by the company, the deposit amount will reflect in the holding balance of the client's account and will take up to 2 days to process post which the deposit amount will start reflecting in the Trading balance.
</p>
    <hr>
                                <h5>PROFIT WITHDRAWAL</h5>
                                <p>PnL (Profit and Loss) will be updated in the client's account as and when trades are closed (This figure is not updated on any fixed intervals and depends on the closure of trading position.<br>
PnL amount reflected in the client's account is the net PnL after deduction of company's advisory fees (50% of the overall generated profit). 100% of the displayed profit can be withdrawn.
Profit withdrawal amount may take up to 10 trading days to be credited to the client's bank account once a withdrawal request has been approved.<br>
The profit withdrawal request is permitted after 30 days from the date of deposit confirmation and the previous profit withdrawal request date.

</p>
    <hr>
    <hr>
                                <h5>DEPOSITED AMOUNT (PRINCIPAL) WITHDRAWAL</h5>
                                <p>Deposited amount (Principal amount) redemption request is permitted only after 30+ 5 trading days from the Deposit confirmation date. Also, the deposited amount will credit to a bank account after 35+10 trading days from the date of the principal amount redemption request (These days cannot fall on holidays and weekends).
Deposited amount withdrawal will be processed via CRM based on the Deposited amount withdrawal request.
All deposit withdrawal requests should be made via the CRM. No withdrawals shall be processed an offline/verbal requests.
Note: Stock market investing is subject to market risk. Please read all the T&C before investing. We do not offer any fixed or guaranteed returns on client investments.
</p>
    <hr>
                                
                            </div>    
                            
                            
                            
                           </div>
                    </div>
                </div>
                <!-- end start -->




            </div> <!-- container-fluid -->
        </div> <!-- content -->


        <!-- end Footer -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->


@endsection
