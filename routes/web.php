<?php

use App\Http\Controllers\Admin\Blogs;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\Coursecontroller;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\Pagecontroller;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\AdminpanelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\Commoncontroller;
use App\Http\Controllers\Front\Investcontroller;
use App\Http\Controllers\Front\WithdrawController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\WorkshopController;
use App\Http\Middleware\Superadmin;
use App\Http\Middleware\Team;
use Illuminate\Support\Facades\Route;

//  -website routes -

Route::middleware([Team::class])->group(function () {
Route::match(['get','post'],'/dashboard', [Commoncontroller::class, 'dashboard'])->name('dashboard');
Route::match(['get','post'],'/profile-update', [Commoncontroller::class, 'profileupdate'])->name('profile.update');
Route::post('/update-bank', [Commoncontroller::class, 'updatebank'])->name('update.bank');
Route::post('/withdraw', [Investcontroller::class, 'withdrawrequest'])->name('withdrawrequest');
Route::post('/wallet-store', [Commoncontroller::class, 'walletstore'])->name('wallet.store');
Route::post('/buy-normel-package', [Investcontroller::class, 'buynormelpackage'])->name('buy.normel.package');
Route::post('/buy-business-package', [Investcontroller::class, 'buybusinesspackage'])->name('buy.business.package');
Route::get('/investnow/{investtype}/{id}', [Investcontroller::class, 'investnow'])->name('investnow');

Route::get('/investment-history', [Investcontroller::class, 'investmentHistory'])->name('investment.history');

Route::get('/deposit-history', [Investcontroller::class, 'deposithistory'])->name('deposithistory');
Route::get('/referral-list', [Investcontroller::class, 'referrallist'])->name('referrallist');
Route::get('/user-pnl', [Investcontroller::class, 'userpnl'])->name('userpnl');

Route::post('/refer/withdraw/send-otp', [WithdrawController::class, 'sendOtp'])->name('refer.withdraw.sendOtp');
Route::post('/refer/withdraw/verify-otp', [WithdrawController::class, 'verifyOtp'])->name('refer.withdraw.verifyOtp');
Route::post('/refer/withdraw/submit', [WithdrawController::class, 'submit'])->name('refer.withdraw.submit');


});

Route::get('/', [Commoncontroller::class, 'index'])->name('index');
Route::get('/about-us', [Commoncontroller::class, 'aboutus'])->name('aboutus');
Route::get('/services', [Commoncontroller::class, 'services'])->name('services');
Route::get('/services-details/{slug}', [Commoncontroller::class, 'servicesdetails'])->name('servicesdetails');
Route::get('/blog', [Commoncontroller::class, 'blog'])->name('blog');
Route::get('/blog-single/{slug}', [Commoncontroller::class, 'blogsingle'])->name('blogsingle');
Route::match(['get', 'post'], '/contact', [Commoncontroller::class, 'contact'])->name('contact');
// Route::get('/image-gallery', [Commoncontroller::class, 'imagegallery'])->name('imagegallery');
// Route::get('/video-gallery', [Commoncontroller::class, 'videogallery'])->name('videogallery');
// Route::get('/team', [Commoncontroller::class, 'team'])->name('team');
Route::get('/faq', [Commoncontroller::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [Commoncontroller::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/terms-and-conditions', [Commoncontroller::class, 'termsandconditions'])->name('termsandconditions');
Route::get('/clients', [Commoncontroller::class, 'clients'])->name('clients');
Route::get('/forgot-pass', [Commoncontroller::class, 'forgot_pass'])->name('forgot_pass');
Route::get('/pricing', [Commoncontroller::class, 'pricing'])->name('pricing');
Route::get('/roadmap', [Commoncontroller::class, 'roadmap'])->name('roadmap');
Route::get('/sign-in', [Commoncontroller::class, 'signin'])->name('signin');
Route::get('/sign-up', [Commoncontroller::class, 'signup'])->name('signup');
Route::get('/userlogout',[Commoncontroller::class, 'userlogout'])->name('userlogout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::middleware([Superadmin::class])->prefix('admin')->group(function () {
    Route::match(['get', 'post'], '/dashboard', [AdminpanelController::class, 'dashboard'])->name('dashboard');
    Route::match(['get', 'post'], '/custom-interest-history', [AdminpanelController::class, 'customInterestHistory'])->name('custom-interest-history');
    Route::match(['get', 'post'], '/profile', [AdminpanelController::class, 'profile'])->name('profile');
    Route::match(['get', 'post'], '/transactions', [AdminpanelController::class, 'transactions'])->name('transactions');
    Route::match(['get', 'post'], '/withdraw', [AdminpanelController::class, 'withdraw'])->name('sdflhksgd');
    Route::match(['get', 'post'], '/pnl-history', [AdminpanelController::class, 'pnlhistory'])->name('pnlhistory');
    Route::match(['get', 'post'], '/new-pnl', [AdminpanelController::class, 'newpnl'])->name('newpnl');
    Route::match(['get', 'post'], '/getpurchaedpackages', [AdminpanelController::class, 'getpurchaedpackages'])->name('getpurchaedpackages');
    Route::match(['get', 'post'], '/kyc', [AdminpanelController::class, 'kycrequests'])->name('kycadmin');
    Route::match(['get', 'post'], '/viewkyc/{id}', [AdminpanelController::class, 'viewkyc'])->name('viewkyc');
    Route::match(['get', 'post'], '/withdrawadmin', [AdminpanelController::class, 'withdrawadmin'])->name('withdrawadmin');
    Route::match(['get', 'post'], '/getwithdraw/{id}', [AdminpanelController::class, 'getwithdraw'])->name('getwithdraw');
    Route::match(['post'], '/updatewithdraw', [AdminpanelController::class, 'updatewithdraw'])->name('updatewithdraw');
    Route::match(['get', 'post'], '/gettransaction/{id}', [AdminpanelController::class, 'gettransaction'])->name('gettransaction');
    Route::match(['post'], '/updatetransaction', [AdminpanelController::class, 'updatetransaction'])->name('updatetransaction');
    Route::post('/change-password', [AdminpanelController::class, 'change_password'])->name('change_password');
    Route::post('updateprofileadmin', [AdminpanelController::class, 'updateprofileadmin'])->name('updateprofileadmin');
    Route::get('/changestatus/{table}/{id}/{colom}/{value}', [AdminpanelController::class, 'changestatus'])->name('changestatus');
    Route::get('/deleterow/{table}/{id}', [AdminpanelController::class, 'deleterow'])->name('deleterow');
    // webpages
    Route::match(['get', 'post'], '/counter-add', [Pagecontroller::class, 'counteradd'])->name('counteradd');
    // pagesettings
    Route::match(['get', 'post'], '/page-setting', [Pagecontroller::class, 'newpage'])->name('newpage');
    Route::match(['get', 'post'], '/seo-management', [Pagecontroller::class, 'seomanagement'])->name('seomanagement');
    Route::match(['get', 'post'], '/editpage/{id}', [Pagecontroller::class, 'editpage'])->name('editpage');

    Route::match(['get', 'post'], '/deletepage/{id}', [Pagecontroller::class, 'deletepage'])->name('deletepage');
    Route::match(['get', 'post'], '/new-access', [Pagecontroller::class, 'newaccess'])->name('newaccess');
    Route::match(['get', 'post'], '/access-management', [Pagecontroller::class, 'accessmanagement'])->name('accessmanagement');
    Route::match(['get', 'post'], '/edit-accessm-anagement/{id}', [Pagecontroller::class, 'editaccessmanagement'])->name('editaccessmanagement');
   // user--register--data
   Route::get('/users', [AuthController::class, 'usersindex'])->name('admin.users.index');
   Route::get('/users-delete/{id}', [AuthController::class, 'usersdelete'])->name('users.delete');
   Route::get('/viewuser/{id}', [AuthController::class, 'viewuser'])->name('viewuser');
   Route::put('/admin/users/{id}/status', [AuthController::class, 'updateStatus'])->name('updateStatus');

// custom interest 

Route::match(['get', 'post'], '/custom-interest-rates', [AdminpanelController::class, 'customInterestRates'])->name('custom.interest.rates');
Route::match(['get', 'post'], '/new-custom-interest-rate', [AdminpanelController::class, 'newCustomInterestRate'])->name('new.custom.interest.rate');
Route::get('/get-investment-details', [AdminpanelController::class, 'getInvestmentDetails'])->name('get.investment.details');
Route::post('/cancel-custom-interest-rate/{id}', [AdminpanelController::class, 'cancelCustomInterestRate'])->name('cancel.custom.interest.rate');


Route::get('/get-custom-rate/{id}', [AdminpanelController::class, 'getCustomRate'])->name('get.custom.rate');
Route::post('/update-custom-interest-rate', [AdminpanelController::class, 'updateCustomInterestRate'])->name('update.custom.interest.rate');


    // skillsadd
    Route::match(['get', 'post'], '/homeadd', [Pagecontroller::class, 'homeadd'])->name('homeadd');

    // aboutus
    Route::match(['get', 'post'], '/about-us', [Pagecontroller::class, 'aboutus'])->name('aboutus');

    // bannners
    Route::get('/home-banners', [Pagecontroller::class, 'home_banners'])->name('home_banners');
    Route::match(['get', 'post'], '/create-banner', [Pagecontroller::class, 'createbanner'])->name('createbanner');
    Route::match(['get', 'post'], '/banners-edit/{id}', [Pagecontroller::class, 'bannersedit'])->name('bannersedit');
    // team

    Route::match(['get', 'post'], '/edit-team/{id}', [TeamsController::class, 'editteam'])->name('editteam');
    Route::match(['get', 'post'], '/delete-team/{id}', [TeamsController::class, 'deleteteam'])->name('deleteteam');
    Route::match(['get', 'post'], '/team', [TeamsController::class, 'team'])->name('team');
    Route::match(['get', 'post'], '/create-team', [TeamsController::class, 'create'])->name('createteam');

      // Gallery
      Route::match(['get', 'post'], '/edit-gallery/{id}', [TeamsController::class, 'editgallery'])->name('editgallery');
      Route::match(['get', 'post'], '/delete-gallery/{id}', [TeamsController::class, 'deletegallery'])->name('deletegallery');
      Route::match(['get', 'post'], '/gallery', [TeamsController::class, 'gallery'])->name('gallery');
      Route::match(['get', 'post'], '/create-partners', [TeamsController::class, 'creategallery'])->name('creategallery');
          Route::match(['get', 'post'], '/edit-clients/{id}', [TeamsController::class, 'editclients'])->name('editclients');
          Route::match(['get', 'post'], '/delete-clients/{id}', [TeamsController::class, 'deleteclients'])->name('deleteclients');
          Route::match(['get', 'post'], '/clients', [TeamsController::class, 'clients'])->name('clients');
          Route::match(['get', 'post'], '/create-clients', [TeamsController::class, 'createclients'])->name('createclients');


          Route::match(['get', 'post'], '/edit-process/{id}', [TeamsController::class, 'editprocess'])->name('editprocess');
    Route::match(['get', 'post'], '/delete-process/{id}', [TeamsController::class, 'deleteprocess'])->name('deleteprocess');
    Route::match(['get', 'post'], '/process', [TeamsController::class, 'process'])->name('process');
    Route::match(['get', 'post'], '/create-process', [TeamsController::class, 'create_process'])->name('create_process');

      //our best services
      Route::match(['get', 'post'], '/edit-best-service/{id}', [TeamsController::class, 'edit_best_service'])->name('edit_best_service');
      Route::match(['get', 'post'], '/delete-best-service/{id}', [TeamsController::class, 'delete_best_service'])->name('deletebestservice');
      Route::match(['get', 'post'], '/best-services', [TeamsController::class, 'best_services'])->name('best_services');
      Route::match(['get', 'post'], '/create-best-service', [TeamsController::class, 'create_best_service'])->name('create_best_service');
    
    // works
    Route::match(['get', 'post'], '/edit-work/{id}', [WorkController::class, 'edit'])->name('editwork');
    Route::match(['get', 'post'], '/delete-work/{id}', [WorkController::class, 'delete'])->name('deletework');
    Route::match(['get', 'post'], '/work', [WorkController::class, 'work'])->name('work');
    Route::match(['get', 'post'], '/create-work', [WorkController::class, 'create'])->name('create-work');
    // contact
    Route::match(['get', 'post'], '/contact-list', [ContactController::class, 'contactdata'])->name('contact-list');
    Route::match(['get', 'post'], '/contact-delete/{id}', [ContactController::class, 'delete'])->name('contact-delete');

    // Faq

    Route::match(['get', 'post'], '/faq', [FaqController::class, 'faq'])->name('faq');
    Route::match(['get', 'post'], '/create-faq', [FaqController::class, 'createfaq'])->name('createfaq');
    Route::match(['get', 'post'], '/edit-faq/{id}', [FaqController::class, 'editfaq'])->name('editfaq');
    Route::match(['get', 'post'], '/faq-delete/{id}', [FaqController::class, 'delete'])->name('faq-delete');

    Route::match(['get', 'post'], '/genral-setting', [Pagecontroller::class, 'genralsetting'])->name('genralsetting');
    Route::match(['get', 'post'], '/terms-condition', [Pagecontroller::class, 'terms'])->name('terms');
    Route::match(['get', 'post'], '/privacy-policy', [Pagecontroller::class, 'privacypolicy'])->name('privacypolicy');

    Route::match(['get', 'post'], '/testimonials', [Pagecontroller::class, 'testimonials'])->name('testimonials');
    Route::match(['get', 'post'], '/create-testimonials', [Pagecontroller::class, 'createtestimonials'])->name('createtestimonials');
    // projects

    Route::match(['get', 'post'], '/seo-management', [Pagecontroller::class, 'seomanagement'])->name('seomanagement');
    Route::match(['get', 'post'], '/new-page', [Pagecontroller::class, 'newpage'])->name('newpage');
    Route::match(['get', 'post'], '/edit-page/{id}', [Pagecontroller::class, 'editpage'])->name('editpage');
    Route::match(['get', 'post'], '/about', [Pagecontroller::class, 'about'])->name('about');
    Route::match(['get', 'post'], '/roadmaps', [Pagecontroller::class, 'roadmaps'])->name('roadmaps');
    Route::match(['get', 'post'], '/platform', [Pagecontroller::class, 'platform'])->name('platform');
    Route::match(['get', 'post'], '/people-trust', [Pagecontroller::class, 'people_trust'])->name('people_trust');
    Route::match(['get', 'post'], '/home-banner', [Pagecontroller::class, 'home_banner'])->name('home_banner');
    Route::match(['get', 'post'], '/partners', [Pagecontroller::class, 'partners'])->name('partners');
    Route::match(['get', 'post'], '/new-partner', [Pagecontroller::class, 'new_partner'])->name('new_partner');
    Route::match(['get', 'post'], '/edit-partners/{id}', [Pagecontroller::class, 'editpartners'])->name('editpartners');

    Route::match(['get', 'post'], '/edit-testimonials/{id}', [Pagecontroller::class, 'edittestimonials'])->name('edittestimonials');
    Route::match(['get', 'post'], '/delete-testimonials/{id}', [Pagecontroller::class, 'deletetestimonials'])->name('deletetestimonials');
    Route::match(['get', 'post'], '/events', [Blogs::class, 'events'])->name('events');
    Route::match(['get', 'post'], '/new-event', [Blogs::class, 'new_event'])->name('new_event');
    Route::match(['get', 'post'], '/edit-events/{id}', [Blogs::class, 'edit_events'])->name('edit_events');
    Route::match(['get', 'post'], '/blogs', [Blogs::class, 'blogs'])->name('blogs');
    Route::match(['get', 'post'], '/create-blog', [Blogs::class, 'newblog'])->name('newblog');
    Route::match(['get', 'post'], '/blogs-edit/{id}', [Blogs::class, 'editblogs'])->name('editblogs');
    Route::match(['get', 'post'], '/contact-enquires', [Blogs::class, 'contactenquires'])->name('contactenquires');
    Route::match(['get', 'post'], '/view-enquiry/{id}', [Blogs::class, 'viewenquiry'])->name('viewenquiry');
    Route::match(['get', 'post'], '/categories', [Coursecontroller::class, 'categories'])->name('categories');
    Route::match(['get', 'post'], '/new-categories', [Coursecontroller::class, 'newcategories'])->name('newcategories');
    Route::match(['get', 'post'], '/edit-category/{id}', [Coursecontroller::class, 'editategories'])->name('editategories');

    Route::match(['get', 'post'], '/delete/{table}/{id}/{image}', [Pagecontroller::class, 'deleterow'])->name('deleterownew');
    // services
    Route::match(['get', 'post'], '/add-services', [ServiceController::class, 'create'])->name('add-services');
    Route::match(['get', 'post'], '/services-list', [ServiceController::class, 'index'])->name('services-list');
    Route::match(['get', 'post'], '/services-update/{id}', [ServiceController::class, 'update'])->name('services-update');
    Route::match(['get', 'post'], '/services-delete/{id}', [ServiceController::class, 'delete'])->name('services-delete');

    // pakeges
    Route::match(['get', 'post'], '/add-pricing', [ServiceController::class, 'create_pricing'])->name('add-pricing');
    Route::match(['get', 'post'], '/pricing-list', [ServiceController::class, 'pricing_list'])->name('pricing-list');
    Route::match(['get', 'post'], '/pricing-update/{id}', [ServiceController::class, 'pricingupdate'])->name('pricing-update');
    Route::match(['get', 'post'], '/services-delete/{id}', [ServiceController::class, 'delete'])->name('services-delete');
});

// AUTH---WORK----

Route::match(['get', 'post'], '/admin-login', [AuthController::class, 'login'])->name('adminlogin');
Route::match(['post'], '/loginUser', [AuthController::class, 'loginUser'])->name('loginUser');
Route::match(['post'], '/send-otp', [AuthController::class, 'sendotp'])->name('send.otp');
Route::match(['post'], '/verify-otp', [AuthController::class, 'verifyotp'])->name('verify.otp');
Route::match(['get', 'post'], '/forgot-password', [AuthController::class, 'fotgotpassword'])->name('fotgotpassword');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], 'reset-password/{token}', [AuthController::class, 'ResetPassword'])->name('reset-password');