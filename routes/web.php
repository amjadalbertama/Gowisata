<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    FaqController,
    LoginController,
    SettingsController,
    HakAksesController,
    OrdersController,
    UserController,
    TesController,
    RoleController,
};

use App\Http\Controllers\Menu\{
    CompaniesController,
    HotelController,
    PesawatController
};

use App\Http\Controllers\General\{
    HomeController,
    DashboardController,
};

use App\Http\Controllers\Finance\{
    AccountController,
    BukuBesarController,
    RekapController,
    JurnalController
};

use App\Http\Controllers\Menu\Kereta\{
    KaiIstimewaController,
    KaiWisataController,
    KaiLuarbiasaController,
    KeretaRegularController
};


// use App\Http\Controllers\Kereta\KeretaRegularController;
// use App\Models\Finance\Account;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login_submit');
    Route::get('/', 'index')->name('login');
    Route::get('/admin', 'loginAdmin')->name('loginAdmin');
    Route::get('/formregister', 'registerform')->name('formregister');
    Route::post('/registerpost', 'register')->name('registerpost');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/form/change/password', 'indexChangePassword')->name('form_change_password');
    Route::post('/forget/password', 'forgetPassword')->name('forget_password');

    Route::controller(OrdersController::class)->group(function ($app){
        $app->get("/listorder/get/api/", "getApi")->name("getApiorder");
        $app->get("/listorder", "index")->name("listorder");
        $app->get("/listorder/admin", "adminListOrder")->name("adminListOrder");
        $app->get("/listorder/kai_regular/admin", "adminkaiRegularOrder")->name("adminkaiRegularOrder");
        $app->get("/listorder/kai_wisata/admin", "adminkaiWisataOrder")->name("adminkaiWisataOrder");
        $app->get("/listorder/kai_luarbiasa/admin", "adminkaiLuarbiasaOrder")->name("adminkaiLuarbiasaOrder");
        $app->get("/listorder/istimewa/admin", "adminkaiIstimewaOrder")->name("adminkaiIstimewaOrder");
        $app->get("/listorder/flight/admin", "adminFlightOrder")->name("adminFLightOrder");
        $app->get("/listorder/mice/admin", "adminMiceOrder")->name("adminMiceOrder");
        $app->get("/payment_method", "payment")->name("paymentMethod");
        $app->get("/payment_page", "payment_page")->name("paymentPage");
        $app->get("/detailsorder/btc/train", "detailTrainsaksiTrainBtc")->name("detailsOrderBtcTrain");
        $app->get("/detailsorder/btc/flight", "detailTrainsaksiFlightBtc")->name("detailsOrderBtcFlight");
        $app->get("/detailsorder/btc/hotel", "detailTrainsaksiHotelBtc")->name("detailsOrderBtcHotel");
        $app->post("/order/mice", "orderMice")->name("order_mice");
    });

    Route::controller(HomeController::class)->group(function ($app) {
        $app->get("home", "index")->name("home");
    });
    Route::controller(FaqController::class)->group(function ($app) {
        $app->get("faq", "index")->name("faq");
        $app->get("faq/admin", "indexAdmin")->name("faq_admin");
    });
    
    Route::controller(HotelController::class)->group(function ($app) {
        $app->get("/hotel", "details")->name("hotel");
        $app->get("/hotel/rooms", "detailsRooms")->name("rooms");
        $app->post("/order/hotel", "orderHotel")->name("order_hotel");
    });

    Route::controller(HomeController::class)->group(function ($app) {
        $app->get("pesawat/details/odr", "index")->name("pesawatDetOdr");
    });

    Route::controller(CompaniesController::class)->group(function ($app) {
        $app->get('/companies', 'index')->name('companies');
        $app->get('/companies/form/add', 'formAdd')->name('formAddCompanies');
        $app->post('/companies/add/save', 'saveAddNew')->name('saveAddNewCompanies');
        $app->post('/save/add/admins', 'addAdminb2b')->name('saveAddNewAdmins');
        $app->post('/save/add/office', 'addSaveOffice')->name('saveAddNewOfficers');
    });
    
    Route::controller(KeretaRegularController::class)->group(function ($app) {
        $app->get("/kairegular", "index")->name("kaiRegular");
        $app->get("/setSeatkrlreg", "getSitTrainReg")->name("setSeatkrlreg");
        $app->get("/kai/reg/return", "getScaduleReturn")->name("getKaiRegReturn");
        $app->get("/kai/seat/test", "seatkaites")->name("seatkaites");
        $app->get("/setSeatkrlregDepart", "getSitTrainRegDepart")->name("setSeatkrlregReturn");
        $app->get("/setSeatkrlregReturn", "getSitTrainRegReturn")->name("setSeatkrlregReturn");
        $app->get("/order/kaiRegular", "orderRegular")->name("order_kaiRegular");
    });

    Route::controller(PesawatController::class)->group(function ($app) {
        $app->get("/pesawat", "index")->name("pesawat_detail");
        $app->get("/pesawat/addPax", "listPax")->name("pesawat_detail_pax");
        $app->get("/pesawat/return", "return")->name("pesawat_detail_return");
        $app->post("/transaksi/date", "rekapTransaksi")->name("transaksi");
        $app->post("/order/pesawat", "orderPesawat")->name("order_flight");
    });

    Route::controller(KaiWisataController::class)->group(function ($app) {
        $app->get("/kaiwisata/return", "returndex")->name("indexreturnKaiWis");
        $app->get("/kaiwisata/list/wagon", "chooseWagon")->name("wagon_kaiwisata_list");
        $app->get("/kaiwisata/list/contact", "chooseContact")->name("contact_list");
        $app->post("/kaiwisata/add/contact", "saveContact")->name("post_contact");
        $app->post("/order/kaiWisata", "orderWisata")->name("order_wisata");
    });
    
    Route::controller(KaiLuarbiasaController::class)->group(function ($app) {
        $app->get("/kaiklb/list/wagon", "chooseWagon")->name("wagon_kaiklb_list");
        $app->get("/kaiklb/list/contact", "chooseContact")->name("contact_klb_list");
        $app->post("/kaiklb/add/contact", "saveContact")->name("post_klb_contact");
        $app->post("/order/kaiLuarbiasa", "orderLuarbiasa")->name("order_luarbiasa");
      
    });
    
    Route::controller(KaiIstimewaController::class)->group(function ($app) {
        $app->get("/kaiist/list/wagon", "chooseWagon")->name("wagon_kaiist_list");
        $app->get("/kaiist/list/contact", "chooseContact")->name("contact_ist_list");
        $app->post("/kaiist/add/contact", "saveContact")->name("post_ist_contact");
        $app->post("/order/kaiIstimewa", "orderIstimewa")->name("order_istimewa");
    });

    Route::controller(UserController::class)->group(function () {
        Route::post('/adduser', 'store')->name('adduser');
        Route::post('/edituser/{id}', 'update')->name('edituser');
      
        Route::get('/users', 'indexUsers')->name('users');
        Route::get('/officers', 'indexOfficers')->name('officers');
        Route::get('/admins', 'indexAdmins')->name('admins');
        Route::post('/users', 'indexUsers')->name('users_search');
        Route::get('/users/{id}', 'delete')->name('deluser');
        Route::get('/form/add/officers', 'createOfficers')->name('add_officers');
        Route::get('/form/add/admins', 'createAdmins')->name('add_admins');
        // Route::post('/save/add/admins', 'addAdminb2b')->name('saveAddNewAdmins');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('roles', 'index')->name('role_all');
    });

    Route::controller(DashboardController::class)->group(function ($app) {
        $app->get('dashboard', 'index_dashboard')->name('dashboard_index');
    });

    Route::controller(SettingsController::class)->group(function () {
        Route::get('settings', 'index')->name('settings');
    });

    Route::resource('hakakses', HakAksesController::class);
    Route::resource('user', UserController::class);

    # LOGOUT
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::controller(TesController::class)->group(function ($app) {

    $app->get("/tes", "index")->name("tes");
    
});

// if()
   

  
