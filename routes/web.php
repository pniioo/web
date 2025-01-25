<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BonusController;
use App\Http\Controllers\admin\CommonController;
use App\Http\Controllers\admin\FundController;
use App\Http\Controllers\admin\HiruSliderController;
use App\Http\Controllers\admin\IconController;
use App\Http\Controllers\admin\LuckyDrowController;
use App\Http\Controllers\admin\ManageUserController;
use App\Http\Controllers\admin\ManageWithdrawController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\PaymentMethodController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\VipSliderController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\ComingController;
use App\Http\Controllers\user\CronController;
use App\Http\Controllers\user\DrowController;
use App\Http\Controllers\user\GetBonusController;
use App\Http\Controllers\user\ImprovementController;
use App\Http\Controllers\user\IpnController;
use App\Http\Controllers\user\IpnGtrController;
use App\Http\Controllers\user\MiningController;
use App\Http\Controllers\user\OnepayController;
use App\Http\Controllers\user\PurchaseController;
use App\Http\Controllers\user\SpinController;
use App\Http\Controllers\user\TeamController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserFundInvestController;
use App\Http\Controllers\user\WithdrawController;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login_submit'])->name('admin.login-submit');
});

Route::prefix('admin/secured')->middleware('admin')->group(function () {
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //All Table Status
    Route::post('/table/status', [CommonController::class, 'status']);

    //ADMIN PROFILE
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('change/password', [AdminController::class, 'change_password'])->name('admin.changepassword');
    Route::post('check/password', [AdminController::class, 'check_password'])->name('admin.check.password');
    Route::post('change/password', [AdminController::class, 'change_password_submit'])->name('admin.changepasswordsubmit');
    Route::get('profile/update', [AdminController::class, 'profile_update'])->name('admin.profile.update');
    Route::post('profile/update', [AdminController::class, 'profile_update_submit'])->name('admin.profile.update-submit');

    //Notice
    Route::get('salary', [AdminController::class, 'salaryView'])->name('admin.salary');
    Route::get('salary-submit', [AdminController::class, 'salary'])->name('admin.salary.submit');
    Route::get('notice', [NoticeController::class, 'index'])->name('admin.notice.index');
    Route::get('notice/view/{id}', [NoticeController::class, 'view'])->name('admin.notice.view');
    Route::get('notice/create/{id?}', [NoticeController::class, 'create'])->name('admin.notice.create');
    Route::post('notice/insert-update', [NoticeController::class, 'insert_or_update'])->name('admin.notice.insert');
    Route::delete('notice/delete/{id}', [NoticeController::class, 'delete'])->name('admin.notice.delete');

    //Notice
    Route::get('hiruslider', [HiruSliderController::class, 'index'])->name('admin.hiruslider.index');
    Route::get('hiruslider/create/{id?}', [HiruSliderController::class, 'create'])->name('admin.hiruslider.create');
    Route::post('hiruslider/insert-update', [HiruSliderController::class, 'insert_or_update'])->name('admin.hiruslider.insert');
    Route::delete('hiruslider/delete/{id}', [HiruSliderController::class, 'delete'])->name('admin.hiruslider.delete');

    //Manage Customers
    Route::get('customers', [ManageUserController::class, 'customers'])->name('admin.customer.index');
    Route::get('customers/status/{id}', [ManageUserController::class, 'customersStatus'])->name('admin.customer.status');
    Route::get('customers/login/{id}', [ManageUserController::class, 'user_acc_login'])->name('admin.customer.login');
    Route::post('customers/change-password', [ManageUserController::class, 'user_acc_password'])->name('admin.customer.change-password');
    Route::get('search/user', [ManageUserController::class, 'search'])->name('admin.search.user');
    Route::get('search/user/action', [ManageUserController::class, 'searchSubmit'])->name('admin.search.submit');
    Route::post('provide/bonus/code', [ManageUserController::class, 'bonusCode'])->name('admin.customer.bonus');

    //Ban/Unban
    Route::get('/user.unban/{id}',  [ManageUserController::class, 'unban'])->name('admin.user.unban');
    Route::get('/user.ban/{id}',  [ManageUserController::class, 'ban'])->name('admin.user.ban');

    //Purchase Record
    Route::get('purchase/record', [ManageUserController::class, 'purchaseRecord'])->name('admin.purchase.index');

    //VIP
    Route::get('package', [PackageController::class, 'index'])->name('admin.package.index');
    Route::get('set-bonus-vip/{id}', [PackageController::class, 'set_bonus_vip']);
    Route::get('package/create/{id?}', [PackageController::class, 'create'])->name('admin.package.create');
    Route::post('package/insert-update', [PackageController::class, 'insert_or_update'])->name('admin.package.insert');
    Route::delete('package/delete/{id}', [PackageController::class, 'delete'])->name('admin.package.delete');
    Route::get('package/view/{id}', [PackageController::class, 'view'])->name('admin.package.view');

    //VIP
    Route::get('improvement', [ImprovementController::class, 'index'])->name('admin.improvement.index');
    Route::get('improvement/create/{id?}', [ImprovementController::class, 'create'])->name('admin.improvement.create');
    Route::post('improvement/insert-update', [ImprovementController::class, 'insert_or_update'])->name('admin.improvement.insert');
    Route::delete('improvement/delete/{id}', [ImprovementController::class, 'delete'])->name('admin.improvement.delete');

    //Coming
    Route::get('coming', [ComingController::class, 'index'])->name('admin.coming.index');
    Route::get('coming/create/{id?}', [ComingController::class, 'create'])->name('admin.coming.create');
    Route::post('coming/insert-update', [ComingController::class, 'insert_or_update'])->name('admin.coming.insert');
    Route::delete('coming/delete/{id}', [ComingController::class, 'delete'])->name('admin.coming.delete');

    //Fund
    Route::get('fund', [FundController::class, 'index'])->name('admin.fund.index');
    Route::get('fund/create/{id?}', [FundController::class, 'create'])->name('admin.fund.create');
    Route::post('fund/insert-update', [FundController::class, 'insert_or_update'])->name('admin.fund.insert');
    Route::delete('fund/delete/{id}', [FundController::class, 'delete'])->name('admin.fund.delete');
    Route::get('fund/view/{id}', [FundController::class, 'view'])->name('admin.fund.view');

    //bonus
    Route::get('bonus', [BonusController::class, 'index'])->name('admin.bonus.index');
    Route::get('bonus/status/{id}', [BonusController::class, 'status'])->name('admin.bonus.status');
    Route::get('bonus/create/{id?}', [BonusController::class, 'create'])->name('admin.bonus.create');
    Route::post('bonus/insert-update', [BonusController::class, 'insert_or_update'])->name('admin.bonus.insert');
    Route::delete('bonus/delete/{id}', [BonusController::class, 'delete'])->name('admin.bonus.delete');
    Route::get('bonus/uses', [BonusController::class, 'bonuslist'])->name('admin.bonuslist.index');//Customer bonus uses

    //draw
    Route::get('drow', [LuckyDrowController::class, 'index'])->name('admin.drow.index');
    Route::get('drow/status/{id}', [LuckyDrowController::class, 'status'])->name('admin.drow.status');
    Route::get('drow/create/{id?}', [LuckyDrowController::class, 'create'])->name('admin.drow.create');
    Route::post('drow/insert-update', [LuckyDrowController::class, 'insert_or_update'])->name('admin.drow.insert');
    Route::delete('drow/delete/{id}', [LuckyDrowController::class, 'delete'])->name('admin.drow.delete');
    Route::get('drow/uses', [LuckyDrowController::class, 'drowlist'])->name('admin.drowlist.index');//Customer bonus uses


    //VIP slider
    Route::get('vipslider', [VipSliderController::class, 'index'])->name('admin.vipslider.index');
    Route::get('vipslider/create/{id?}', [VipSliderController::class, 'create'])->name('admin.vipslider.create');
    Route::post('vipslider/insert-update', [VipSliderController::class, 'insert_or_update'])->name('admin.vipslider.insert');
    Route::delete('vipslider/delete/{id}', [VipSliderController::class, 'delete'])->name('admin.vipslider.delete');

    //Payment
    Route::get('method', [PaymentMethodController::class, 'index'])->name('admin.method.index');
    Route::get('method/create/{id?}', [PaymentMethodController::class, 'create'])->name('admin.method.create');
    Route::post('method/insert-update', [PaymentMethodController::class, 'insert_or_update'])->name('admin.method.insert');
    Route::delete('method/delete/{id}', [PaymentMethodController::class, 'delete'])->name('admin.method.delete');

    //Handle Customer
    Route::get('developer', [AdminController::class, 'developer'])->name('admin.developer.index');
    Route::get('customer/pending/payment', [ManageUserController::class, 'pendingPayment'])->name('admin.payment.pending');
    Route::get('customer/approved/payment', [ManageUserController::class, 'approvedPayment'])->name('admin.payment.approved');
    Route::get('customer/rejected/payment', [ManageUserController::class, 'rejectedPayment'])->name('admin.payment.rejected');
    Route::post('customer/payment/status/{id}', [ManageUserController::class, 'paymentStatus'])->name('payment.status.change');
    Route::get('purchase_delete/{id}', [ManageUserController::class, 'purchase_delete'])->name('admin.purchase-delete');
        
    Route::get('customer/payment/approved/{id}', [ManageUserController::class, 'paymentStatusApproved'])
        ->name('payment.status.change.approved');

    Route::get('customer/payment/rejected/{id}', [ManageUserController::class, 'paymentStatusRejected'])
        ->name('payment.status.change.rejected');
    Route::get('customer/payment/pending/{id}', [ManageUserController::class, 'paymentStatusPending'])
        ->name('payment.status.change.pending');

    //Handle Customer Withdraw
    Route::get('customer/pending/withdraw', [ManageWithdrawController::class, 'pendingWithdraw'])->name('admin.withdraw.pending');
    Route::get('customer/approved/withdraw', [ManageWithdrawController::class, 'approvedWithdraw'])->name('admin.withdraw.approved');
    Route::get('customer/rejected/withdraw', [ManageWithdrawController::class, 'rejectedWithdraw'])->name('admin.withdraw.rejected');
    Route::post('customer/withdraw/status/{id}', [ManageWithdrawController::class, 'withdrawStatus'])->name('withdraw.status.change');

    //Settings
    Route::get('setting', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::post('setting/insert-update', [SettingController::class, 'insert_or_update'])->name('admin.setting.insert');

    //Icons
    Route::get('icon', [IconController::class, 'index'])->name('admin.icon.index');
    Route::post('icon/insert-update', [IconController::class, 'insert_or_update'])->name('admin.icon.insert');

    //Balance add/minus
    Route::get('balance/add', [ManageUserController::class, 'add_balance'])->name('admin.user.balance.add');
    Route::get('balance/minus', [ManageUserController::class, 'minus_balance'])->name('admin.user.balance.minus');


    //List
    Route::get('mining/with-customer', [ManageUserController::class, 'continue_mining'])->name('admin.mining_purchase.index');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('throttle:customRate')->group(function (){

    Route::get('/', function(){
        return redirect()->route('login');
    });

    Route::get('email-verification-confirm/{e}', [UserController::class, 'emailVerification']);
    Route::get('verified-login/{user_id}/{v_code}', [UserController::class, 'verified_to_login']);
    Route::get('user-verification_time_out/{user_id}', [UserController::class, 'verification_time_out']);

    Route::get('refresh_captcha',[RegisteredUserController::class, 'refreshCaptcha'])->name('refresh_captcha');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function (){
            return redirect()->route('dashboard');
        });

        Route::get('/home', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/vip', [UserController::class, 'vip'])->name('vip');
        Route::get('/package-details/{id}', [UserController::class, 'package_details'])->name('package.details');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('order', [MiningController::class, 'order'])->name('order');
        //Route::get('process', [MiningController::class, 'process'])->name('process');
        Route::get('finished', [MiningController::class, 'finished'])->name('finished');
        Route::get('mine', [UserController::class, 'mine'])->name('mine');
        Route::get('setting', [UserController::class, 'setting'])->name('setting');
        Route::get('service', [UserController::class, 'service'])->name('service');
        Route::get('guide', [UserController::class, 'guide'])->name('guide');
        Route::get('transaction-password', [UserController::class, 'transaction_password'])->name('transaction_password');
        Route::get('login-password', [UserController::class, 'login_password'])->name('login_password');
        Route::get('recharge', [UserController::class, 'recharge'])->name('recharge');
        Route::get('recharge-confirm/{amount}/{paymethod}', [UserController::class, 'recharge_confirm'])->name('recharge.confirm');
        Route::post('recharge-confirm-submit', [UserController::class, 'recharge_confirm_submit'])->name('recharge.confirm.submit');
        Route::get('usdt', [UserController::class, 'usdt'])->name('usdt');
        Route::get('history', [UserController::class, 'history'])->name('history');
        Route::get('reword', [UserController::class, 'reword'])->name('reword');
        Route::post('reword', [UserController::class, 'get_first_time_refer_bonus'])->name('user.get_first_time_refer_bonus');
        Route::get('company', [UserController::class, 'company'])->name('company');
        Route::get('announcement', [UserController::class, 'announcement'])->name('announcement');
        Route::get('rules', [UserController::class, 'rules'])->name('rules');



        Route::get('team', [TeamController::class, 'team'])->name('team');
        Route::get('income', [UserController::class, 'income'])->name('income');
        Route::get('push', [UserController::class, 'push'])->name('push');
        Route::get('progress', [UserController::class, 'progress'])->name('progress');


        Route::get('get-recharge-amount/{step}', [TeamController::class, 'get_recharge_amount'])->name('get_recharge_amount');

        Route::post('usdt-recharge', [UserController::class, 'usdt_recharge'])->name('usdt.recharge');

        Route::post('checkin', [GetBonusController::class, 'checkin'])->name('user.checkin');
        Route::get('checkin-ledger', [GetBonusController::class, 'checkin_ledger'])->name('user.checkin.ledger');
        Route::get('gift', [GetBonusController::class, 'gift'])->name('gift');
        Route::post('submit-bonus', [GetBonusController::class, 'submitBonusCode'])->name('user.submit-bonus');
        Route::get('get-bonus-preview', [GetBonusController::class, 'preview'])->name('user.bonus-preview');


        Route::get('my-balance-history', [UserController::class, 'balanceHistory'])->name('user.balance.ledger');

        Route::get('allrecord', [UserController::class, 'allrecord'])->name('allrecord');
        Route::get('vip-confirm/{vip_id}', [PurchaseController::class, 'vip_confirm'])->name('vip.confirm');

        //Get bonus vip
        Route::post('get-bonus-vip', [GetBonusController::class, 'get_bonus_vip'])->name('user.get_bonus_vip');

        //Setting
        Route::post('update-name', [UserController::class, 'update_name'])->name('setting.update.name');
        Route::post('bkash-bkash-number', [UserController::class, 'setting_acc_number_bkash'])->name('setting.bkash.account');
        Route::post('bkash-nagad-number', [UserController::class, 'setting_acc_number_nagad'])->name('setting.nagad.account');
        Route::post('bkash-usdt-number', [UserController::class, 'setting_acc_number_usdt'])->name('setting.update.usdt');
        Route::post('withdraw-password', [UserController::class, 'setting_withdraw_password'])->name('setting.withdraw.password');
        Route::post('change-password', [UserController::class, 'setting_change_password'])->name('setting.change.password');

        Route::get('/change/password', [ProfileController::class, 'change_password'])->name('user.change.password');
        Route::post('/change/password/confirm', [ProfileController::class, 'change_password_confirm'])->name('user.change.password.confirmation');

        Route::post('user/update/profile', [UserController::class, 'update_profile'])->name('user.update.profile');
        Route::get('my-profile', [UserController::class, 'profile'])->name('my.profile');

        Route::get('my-personal-details' , [UserController::class, 'personal_details'])->name('user.personal-details');
        Route::post('my-personal-details' , [UserController::class, 'personal_details_submit'])
            ->name('user.personal-details-submit');

        //Bank Setup
        Route::get('add-bank', [UserController::class, 'add_bank'])->name('user.bank');
        Route::get('add-bank-setup', [UserController::class, 'add_bank_setup'])->name('user.bank_setup');
        Route::post('add-bank-setup-confirm', [UserController::class, 'add_bank_setup_confirm'])->name('user.bank_setup_confirm');
        Route::get('delete-bank-account', [UserController::class, 'delete_bank_acc'])->name('user.delete.bank');

        //deposit
        Route::get('/deposit', [OnepayController::class, 'index'])->name('user.deposit');

        //USDT Deposit
        Route::post('/usdt-deposit-submit', [OnepayController::class, 'usdt_deposit'])->name('usdt-deposit-submit');

        //Withdraw
        Route::get('withdraw', [WithdrawController::class, 'withdraw'])->name('user.withdraw');
        Route::post('withdraw-request', [WithdrawController::class, 'withdrawRequest'])->name('user.withdraw.request');
        Route::get('withdraw-preview', [WithdrawController::class, 'withdrawPreview'])->name('user.withdraw.preview');


        //Ledger
        Route::get('bonus/ledger', [UserController::class, 'bonus_ledger'])->name('user.bonus.ledger');
        Route::get('payment/ledger', [UserController::class, 'payment_ledger'])->name('user.payment.ledger');
        Route::get('withdraw/ledger', [UserController::class, 'withdraw_ledger'])->name('user.withdraw.ledger');

        //Purchase VIP
        Route::get('purchase/vip/{id}', [PurchaseController::class, 'purchase_vip'])->name('user.purchase.vip');
        Route::get('purchase/confirmation/{id}', [PurchaseController::class, 'purchaseConfirmation'])->name('purchase.confirmation');

        //Route::get('start-mining/{id}', [MiningController::class, 'start_mining'])->name('start_mining');

        Route::get('my-users-details/{step}', [TeamController::class, 'user_details'])->name('users.details');
        //Fund
        Route::get('fund', [UserFundInvestController::class, 'fund'])->name('fund');
        Route::get('my-fund', [UserFundInvestController::class, 'my_fund'])->name('me.fund');
        Route::post('fund-invest-confirm/{id}', [UserFundInvestController::class, 'fund_confirmation'])
            ->name('fund.invest.confirm');

        //invite
        Route::get('/invite', [UserController::class, 'invite'])->name('user.invite');

        //Notice
        Route::get('/notice', [UserController::class, 'notice'])->name('user.notice');
        Route::get('/card', [UserController::class, 'card'])->name('user.card');
        Route::post('/setup/gateway', [UserController::class, 'setupGatewayView'])->name('setup.gateway');

        //Team
        Route::get('my-team', [TeamController::class, 'team'])->name('user.team');
        Route::get('my-team-result/{ids}', [TeamController::class, 'team_result'])->name('user.refer-user-result');
        //Label Details
        Route::get('lvl/details/{ids}/{lvl}', [TeamController::class, 'lvl_details'])->name('lvl.details');

        Route::get('about-us', function(){
            return view('app.main.about');
        })->name('about');

        //Help Center
        Route::get('help-center', [UserController::class, 'help_center'])->name('help.center');

        Route::get('tutorial', [MiningController::class, 'tutorial'])->name('tutorial');

        Route::get('user/lucky-drow', [DrowController::class, 'drow'])->name('user.drow');
        Route::get('user/get-draw-bonus/{draw_id}', [DrowController::class, 'get_bonus'])->name('user.get_draw_bonus');
        Route::get('user/draw-ledger', [DrowController::class, 'draw_ledger'])->name('user.draw.ledger');

        //Football two
        Route::get('my-record/{type?}', [UserController::class, 'record'])->name('record');


        //spin
        Route::get('user/span', [SpinController::class, 'spin'])->name('span');
        Route::post('submit-spin', [SpinController::class, 'submitspin'])->name('user.spin.submit');
        Route::post('submit-spin-amount', [SpinController::class, 'submitspinamount'])->name('user.spin.amount.submit');
        Route::get('spin-result', [SpinController::class, 'spin_result'])->name('spin_result');

        //Investment
        Route::get('user/invest', [UserController::class, 'invest'])->name('invest');

        Route::get('user/my-order', [MiningController::class, 'running_mining'])->name('pgroup');
        //Route::get('received-amount', [MiningController::class, 'received_amount'])->name('user.received.amount');
        Route::get('user/chat', [UserController::class, 'chat'])->name('chat');

    });

    Route::get('download-apk', [UserController::class, 'download_apk'])->name('user.download.apk');

    Route::get('numbers', function () {
        $number1 = PaymentMethod::where('type', 'bkash')->first();
        $number2 = PaymentMethod::where('type', 'nagad')->first();
        $user_id = auth()->user()->id;

        $bkash = '';
        $nagad = '';
        if ($number1) {
            $bkash = $number1->number;
        }
        if ($number1) {
            $nagad = $number2->number;
        }
        return response()->json(['status' => true, 'bkash' => $bkash, 'nagad' => $nagad, 'user_id' => $user_id]);


    });

    Route::get('confirm-submit', [UserController::class, 'confirm_submit']);

    Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

});

Route::get('number/{type}', [UserController::class, 'return_number']); //api

Route::post('ipn/00049', [IpnController::class, 'ipn'])->name('ipn.default');
Route::post('ipn/gtr', [IpnGtrController::class, 'ipn'])->name('ipn.gtr');
Route::get('cron/mbtech', [CronController::class, 'commission'])->name('cron.commission');

require __DIR__.'/auth.php';
