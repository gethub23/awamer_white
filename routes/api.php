<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix'                  => 'v1'  , 'namespace' => 'Api\V1']  , function () {

    Route::group(['middleware'          => ['localization']]                 , function (){
        // public routes 
            // auth controller
            Route::post('sign-up'                           ,'AuthController@signUp')                         ;
            Route::post('sign-in'                           ,'AuthController@signIn')                         ;
            // forget password send code
            Route::post('forget-password'                   ,'AuthController@forgetPassword')                 ;
        // public routes 

        // optional auth routes 
            Route::group(['middleware'           => ['jwtOptional']], function (){
            
            });
        // optional auth routes 
        
        // auth routes 
        Route::group(['middleware'               => ['jwt']]             , function (){
                //  activate user account
                Route::post('activate'                      ,'AuthController@activate'                      );
                //  resend activation code          
                Route::post('resend-code'                   ,'AuthController@resendCode'                    );
                //  reset password          
                Route::post('reset-password'                ,'AuthController@resetPassword'                 );
                // logout           
                Route::post('logout'                        , 'AuthController@Logout'                       );
                //  profile         
                Route::get('profile'                        ,'UserController@profile'                       );
                //  update Phone Request            
                Route::post('update-phone-request'          ,'UserController@updatePhoneRequest'            );
                //  check Update Phone Code            
                Route::post('check-update-phone-code'       ,'UserController@checkUpdatePhoneCode'          );
                //  Edit Password            
                Route::post('Edit-password'                 ,'UserController@EditPassword'                  );
                //  notifications            
                Route::get('notifications'                  ,'UserController@notifications'                 );
                //  countNotifications            
                Route::get('count-notifications'            ,'UserController@countNotifications'            );
                //  delete Notifications            
                Route::post('delete-notifications'          ,'UserController@deleteNotifications'           );
                //  update-profile           
                Route::post('update-profile'                ,'UserController@updateProfile'                 );
                //  change Notify Statue 
                Route::get('change-notify-statue'           ,'UserController@changeNotifyStatue'            );
                //  StoreComplaint 
                Route::post('add-complaint'                 ,'ComplaintController@StoreComplaint'           );
        });
        // auth routes 
    });

 });
