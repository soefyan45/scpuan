<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/wa', function () {
    # code...
    $data = ['parjo', 'sawal', 'padi', 'warni', 'febri', 'saddam', 'saham', 'kode', 'pekanbaru'];
    return $data;
})->name('index.wa');
Route::get('/', 'Market\MarketController@Index')->name('index');
Route::get('/search', 'Market\MarketController@Search')->name('search');
Route::get('/category/{categoryslug}', 'Market\MarketController@itemCategory')->name('item.category');
Route::get('detail/{namatoko}/{namabarang}', 'Market\MarketController@detailBarang')->name('detail.barang');
Route::get('/contact', 'Market\MarketController@contact')->name('contact');
Route::get('/about', 'Market\MarketController@about')->name('about');
Route::get('/userlogin', 'Market\MarketController@userLogin')->name('user.login');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', 'Admin\AdminController@index')->name('admin');
        Route::get('/admin/profile', 'Admin\AdminController@profile')->name('admin.profile');
        Route::post('/admin/profile', 'Admin\AdminController@postProfile')->name('admin.post.profile');
        // Category Item
        Route::get('/admin/category', 'Admin\AdminController@Category')->name('admin.category');
        Route::post('/admin/category', 'Admin\AdminController@storeCategory')->name('admin.category.store'); // action add
        Route::post('/admin/category/edit/{categoryitem:id}', 'Admin\AdminController@editCategory')->name('admin.category.edit'); //action edit
        Route::post('/admin/category/dell/{categoryitem:id}', 'Admin\AdminController@dellCategory')->name('admin.category.dell'); //action delete
        // Type Item
        Route::get('/admin/itemtypes', 'Admin\AdminController@Itemtypes')->name('admin.itemtypes');
        Route::post('/admin/itemtypes', 'Admin\AdminController@storeItemtypes')->name('admin.itemtypes.store'); // action add
        Route::post('/admin/itemtypes/edit/{itemtype:id}', 'Admin\AdminController@editItemtypes')->name('admin.itemtypes.edit'); // action edit
        Route::post('/admin/itemtypes/dell/{itemtype:id}', 'Admin\AdminController@dellItemtypes')->name('admin.itemtypes.dell'); // action dell
        // Color Item
        Route::get('/admin/coloritem', 'Admin\AdminController@colorItem')->name('admin.coloritem');
        Route::post('/admin/coloritem', 'Admin\AdminController@storeColorItem')->name('admin.coloritem.store'); // action add
        Route::post('/admin/coloritem/edit/{itemcolor:id}', 'Admin\AdminController@editColorItem')->name('admin.coloritem.edit'); // action edit
        Route::post('/admin/coloritem/dell/{itemcolor:id}', 'Admin\AdminController@dellColorItem')->name('admin.coloritem.dell'); // action edit
        // SellerShop
        Route::get('/admin/sellershop', 'Admin\AdminController@listSellerShop')->name('admin.sellershop');
        Route::post('/admin/sellershop/verified', 'Admin\AdminController@listSellerShopVerified')->name('admin.sellershop.verified');
        Route::get('/admin/sellershop/result/{slug}', 'Admin\AdminController@listSellerShopResult')->name('admin.sellershop.result');
        // Item
        Route::get('/admin/item', 'Admin\AdminController@Item')->name('admin.Item');
        // Payment
        Route::get('/admin/payment/confirm', 'Admin\AdminController@paymentConfirm')->name('admin.payment.Confirm');
        Route::post('/admin/payment/confirm', 'Admin\AdminController@ProsesPaymentConfirm')->name('admin.proses.payment.Confirm');
        // Widraw
        Route::get('/admin/withdraw/confirm', 'Admin\AdminController@ProsesWithdrawConfirm')->name('admin.proses.withdraw.confirm');
        Route::post('/admin/withdraw/confirm', 'Admin\AdminController@PostWithdrawConfirm')->name('admin.proses.withdraw.post');
    });
    Route::middleware('role:admin|seller')->group(function () {
        // Seller
        Route::get('/seller', 'Seller\SellerController@Index')->name('seller');
        Route::get('/seller/item', 'Seller\SellerController@ItemSell')->name('seller.Item');
        Route::get('/seller/item/add', 'Seller\SellerController@AddItemSell')->name('seller.Item.add');
        Route::post('/seller/item/add', 'Seller\SellerController@StoreItemSell')->name('seller.Item.store');
        Route::get('/seller/item/edit/{item:id}', 'Seller\SellerController@EditItemSell')->name('seller.Item.edit');
        Route::post('/seller/item/edit/{item:id}', 'Seller\SellerController@UpdateItemSell')->name('seller.Item.update');
        Route::post('/seller/item/dell/', 'Seller\SellerController@dellItemSell')->name('seller.Item.dell');
        Route::get('/seller/shop', 'Seller\SellerController@shopSeller')->name('seller.shop');
        Route::post('/seller/shop', 'Seller\SellerController@settupShop')->name('seller.shop.store');
        Route::get('/seller/list/order', 'Seller\SellerController@listOrder')->name('seller.list.order');
        Route::get('/seller/list/order/{id}', 'Seller\SellerController@SelectlistOrder')->name('seller.select.list.order');
        Route::post('/seller/confirm/order', 'Seller\SellerController@SelectPostConfirmOrder')->name('seller.select.post.order');
        Route::post('/seller/claim/balance', 'Seller\SellerController@sellerClaimBalance')->name('seller.claim.balance');
        Route::get('/seller/balance', 'Seller\SellerController@sellerBalance')->name('seller.balance');
        Route::get('/seller/balance/wd', 'Seller\SellerController@sellerBalanceWD')->name('seller.balance.wd');
        Route::post('/seller/balance/wd', 'Seller\SellerController@sellerBalanceReqWD')->name('seller.balance.req.wd');
        Route::get('/seller/balance/log', 'Seller\SellerController@sellerBalanceLog')->name('seller.balance.log');
        //Route::post('/seller/shop', 'Seller\SellerController@settupShop')->name('seller.shop.store');
    });
    // nanti ganti jadi untuk member
    // User/Members
    Route::get('/user/add/chart', 'Market\MarketController@addChartMembers')->name('user.add.chart');
    Route::get('/shopping-cart', 'Market\MarketController@shopingCart')->name('shoping.cart');
    Route::get('/shopping-cart/{id}', 'Market\MarketController@shopingCartDell')->name('shoping.cart.del');
    Route::get('/checkout', 'Market\MarketController@checkOut')->name('check.out');
    Route::post('/checkout/proses', 'Market\MarketController@checkOutProses')->name('checkout.proses');
    Route::post('/shipping-add', 'Market\MarketController@addShippingList')->name('shipping.add');
    Route::get('/invoice/list', 'Market\MarketController@invoiceList')->name('invoice.list');
    Route::get('/order/list', 'Market\MarketController@orderList')->name('order.list');
    Route::get('/order/list/{id}', 'Market\MarketController@orderSelectList')->name('order.select.list');
    Route::post('/order/accept/itemorder', 'Market\MarketController@orderConfirmAccept')->name('order.select.accept.item');
    Route::get('/invoice/pay/{trxlog:id}', 'Market\MarketController@invoiceSelect')->name('invoice.select');
    Route::get('/checkout/payout', 'Market\MarketController@checkoutPayout')->name('checkout.payout');
    // account info .
    Route::get('/account/info', 'Market\MarketController@accountInfo')->name('account.info');
    Route::post('/account/info', 'Market\MarketController@postAccountInfo')->name('post.account.info');
    Route::post('/account/become/seller', 'Market\MarketController@accountBecomeSeller')->name('account.become.seller');
    Route::post('/account/changepassword', 'Market\MarketController@changePassword')->name('account.change.password');
    //Post Login
    Route::get('/postlogin', 'PostLogin@index')->name('postlogin');
});
