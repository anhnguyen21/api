<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\HeartController;
use App\Http\Controllers\Api\NonficationController;
use App\Http\Controllers\Api\ChatContronller;
use App\Http\Controllers\Api\ProgressController;
use App\Http\Controllers\Api\PromotionContronller;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ProfileControler;
use App\Http\Controllers\Api\recommentController;
use App\Http\Controllers\Api\ShopController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Accounts
Route::get('account',[LoginController::class, 'getAccount']);
Route::post('account',[LoginController::class, 'registerGoogle']);
Route::post('register',[LoginController::class, 'register']);
Route::PUT('uploadImageUser/{id}',[LoginController::class, 'uploadImageUser']);
Route::get('account/{id}',[LoginController::class, 'showAccount']);
Route::delete('account/{id}',[LoginController::class, 'destroyAccount']);


//Login
Route::post('login',[LoginController::class,'loginUser']);
Route::post('loginAdmin',[LoginController::class,'loginAdmin']);
Route::post('loginShop',[LoginController::class,'loginShop']);
// Route::post('register',[LoginController::class,'register']);


//Profile
Route::put('profile/{id}',[ProfileControler::class,'update']);
Route::get('profileAdmin/{id}',[ProfileControler::class,'getProfile']);
Route::patch('updateProfile/{id}',[ProfileControler::class,'updateEditAdmin']);
Route::post('uploadImg',[ProfileControler::class,'uploadImage']);
Route::get('uploadImg',[ProfileControler::class,'uploadImage']);
Route::get('profileAd',[ProfileControler::class,'profileAdmin']);

//Products
Route::get('Allproducts/{id_user}',[ProductController::class,'getALlProduct']);
Route::get('products',[ProductController::class,'getProduct']);
Route::get('product/{id}',[ProductController::class,'show']);
Route::post('products',[ProductController::class,'store']);
Route::delete('products/{id}',[ProductController::class,'destroy']);
Route::put('products/{id}',[ProductController::class,'update']);

/// Statistic 
Route::get('product_chart',[ProductController::class,'getLineProductChart']);
Route::get('user_chart',[ProductController::class,'getLineUserChart']);
Route::get('order_barchart',[ProductController::class,'getBarOrderChart']);
Route::get('order_pieChart',[ProductController::class,'catePieChart']);

Route::get('get_count_product',[ProductController::class,'getCountProduct']);
Route::get('get_count_review',[ProductController::class,'getCountReview']);
Route::get('get_count_heart',[ProductController::class,'getCountHeart']);
Route::get('get_count_user',[ProductController::class,'getCountUser']);

Route::get('weekChart',[ProductController::class,'weekChart']);
Route::get('lastWeekChart',[ProductController::class,'LastweekChart']);
Route::get('getWeek/{counter}',[ProductController::class,'getDayofYear']);

Route::get('getNumber',[ProductController::class,'getNumberWeek']);
 /// SHop
 Route::get('shop',[ShopController::class,'getShop']);
 //Route::get('shopChart',[ShopController::class,'getShopChart']);
 Route::delete('shop/{id}',[ShopController::class,'destroy']);
 


//Order
Route::get('Allorder/{id_user}',[OrderController::class,'getAllOrder']);
Route::get('orderadmin',[ProgressController::class,'getPaymentAdmin']);
Route::get('order',[OrderController::class,'getOrder']);
Route::get('order/{id}',[OrderController::class,'getOrderDetails']);
Route::post('addproducttoorder',[OrderController::class,'getAddProduct']);
Route::put('order/{id}',[OrderController::class,'update']);
Route::put('orderUpdate/{id}',[OrderController::class,'updateAdmin']);
Route::get('order_show/{id}',[OrderController::class,'show']);
Route::get('detail_order/{id}',[OrderController::class,'getOrderDetailsAdmin']);
Route::post('addpro',[OrderController::class,'getAddPro']);
Route::delete('orders/{id}',[OrderController::class, 'deleteOrder']);
Route::post('deleteproducttoorder',[OrderController::class,'deleteProductInOrder']);
Route::delete('order/{id}',[OrderController::class, 'destroy']);
Route::get('updateorder',[OrderController::class,'show']);

//Review
Route::get('review',[ReviewController::class,'index']);
Route::get('review/{id}',[ReviewController::class,'getReviewDetails']);
Route::post('review',[ReviewController::class,'addProductReview']);

//Heart
Route::get('heart',[HeartController::class,'index']);
Route::get('heart/{id}',[HeartController::class,'getHeartDetails']);
Route::post('heart',[HeartController::class,'addProductHeart']);

//Nonfication
Route::get('nofication',[NonficationController::class,'index']);
Route::get('nofication/deliver',[NonficationController::class,'getNotificationOfDeliver']);
Route::get('nofication/{id}',[NonficationController::class,'getNotification']);
Route::get('noficationShop/{id}',[NonficationController::class,'getNotificationShop']);
Route::post('notification',[NonficationController::class,'store']);
Route::delete('nontification/{id}',[NonficationController::class, 'destroy']);



//Chat
Route::get('chat',[ChatContronller::class,'index']);
Route::get('chat/{id}',[ChatContronller::class,'index']);
Route::post('getChat',[ChatContronller::class,'getMessageUserToShop']);
Route::post('getInsertChat',[ChatContronller::class,'getInsertMessageUserToShop']);

//Chat Admin
// Route::get('chat',[ChatContronller::class,'index']);
Route::post('PostChatAdmin',[ChatContronller::class,'postMessageUserToShopAdmin']);
Route::post('PostInsertChatAdmin',[ChatContronller::class,'postInsertMessageUserToShopAdmin']);

//Chat shop
Route::get('chatadmin',[ChatContronller::class,'getchatadmin']);
Route::get('chatcustomer',[ChatContronller::class,'getchatCustomeradmin']);
Route::post('chatcus',[ChatContronller::class,'addMessageShop']);
//Search list chat
Route::post('searchchat',[ChatContronller::class,'search']);


//Progress
Route::get('progress/{id}',[ProgressController::class,'getProgress']);
Route::get('progress/waiting/{id}',[ProgressController::class,'getProgressWaiting']);
Route::get('progress/suscess/{id}',[ProgressController::class,'getProgressSucess']);
Route::put('progress/{id}',[ProgressController::class,'update']);
Route::get('progress',[ProgressController::class,'getOrderForDelivery']);

//PromotionContronller
Route::get('promotion',[PromotionContronller::class,'index']);

//Search
Route::get('search',[SearchController::class,'index']);
Route::get('search/{id}',[SearchController::class,'show']);
Route::post('search',[SearchController::class,'store']);

//recomment
Route::get('recomment',[recommentController::class,'index']);
Route::post('recomment',[recommentController::class,'store']);