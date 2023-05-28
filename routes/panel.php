<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\Dashboard\SupportController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\SearchController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AIChatController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {
    Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {

        Route::get('/', [UserController::class, 'redirect'])->name('index');

        //User Area
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');

            //Openai generator
            Route::prefix('openai')->name('openai.')->group(function () {
                Route::get('/', [UserController::class, 'openAIList'])->name('list');
                Route::get('/favorite-openai', [UserController::class, 'openAIFavoritesList'])->name('list.favorites');
                Route::post('/favorite', [UserController::class, 'openAIFavorite']);
                //Generators
                Route::middleware('hasTokens')->group(function () {
                    Route::get('/generator/{slug}', [UserController::class, 'openAIGenerator'])->name('generator');
                    Route::get('/generator/{slug}/workbook', [UserController::class, 'openAIGeneratorWorkbook'])->name('generator.workbook');
                    Route::post('/generate', [AIController::class, 'buildOutput']);
                    Route::get('/generate', [AIController::class, 'streamedTextOutput']);
                });


                //Documents
                Route::prefix('documents')->name('documents.')->group(function () {
                    Route::get('/all', [UserController::class, 'documentsAll'])->name('all');
                    Route::get('/images', [UserController::class, 'documentsImages'])->name('images');
                    Route::get('/single/{slug}', [UserController::class, 'documentsSingle'])->name('single');
                    Route::get('/delete/{slug}', [UserController::class, 'documentsDelete'])->name('delete');
                    Route::post('/workbook-save', [UserController::class, 'openAIGeneratorWorkbookSave']);
                });


                Route::prefix('chat')->name('chat.')->group(function () {
                    Route::get('/ai-chat-list', [AIChatController::class, 'openAIChatList'])->name('list');
                    Route::get('/ai-chat/{slug}', [AIChatController::class, 'openAIChat'])->name('chat');
                    Route::match(['get', 'post'],'/chat-send', [AIChatController::class, 'chatOutput']);
                    Route::post('/open-chat-area-container', [AIChatController::class, 'openChatAreaContainer']);
                    Route::post('/start-new-chat', [AIChatController::class, 'startNewChat']);
                    Route::post('/delete-chat', [AIChatController::class, 'deleteChat']);
                    Route::post('/rename-chat', [AIChatController::class, 'renameChat']);
                });

            });

            // user profile settings
            Route::prefix('settings')->name('settings.')->group(function () {
                Route::get('/', [UserController::class, 'userSettings'])->name('index');
                Route::post('/save', [UserController::class, 'userSettingsSave']);
            });

            // Subscription and payment
            Route::prefix('payment')->name('payment.')->group(function () {
                Route::get('/', [UserController::class, 'subscriptionPlans'])->name('subscription');
                Route::get('/subscribe/{id}', [UserController::class, 'subscriptionPayment'])->name('subscription.payment');
                Route::post('/subscription/pay', [UserController::class, 'subscriptionPaymentPay'])->name('subscription.payment.pay');
                Route::get('/subscription/cancel', [UserController::class, 'subscriptionCancel'])->name('subscription.payment.cancel');
                Route::get('/prepaid/{id}', [UserController::class, 'prepaidPayment'])->name('prepaid.payment');
                Route::post('prepaid-payment//pay', [UserController::class, 'prepaidPaymentPay'])->name('prepaid.payment.pay');
            });

            //Orders invoice billing
            Route::prefix('orders')->name('orders.')->group(function () {
                Route::get('/', [UserController::class, 'invoiceList'])->name('index');
                Route::get('/order/{order_id}', [UserController::class, 'invoiceSingle'])->name('invoice');
            });

            //Affiliates
            Route::prefix('affiliates')->name('affiliates.')->group(function () {
                Route::get('/', [UserController::class, 'affiliatesList'])->name('index');
                Route::post('/send-request', [UserController::class, 'affiliatesListSendRequest']);
            });




        });


        //Admin Area
        Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');

            //User Management
            Route::prefix('users')->name('users.')->group(function () {
                Route::get('/', [AdminController::class, 'users'])->name('index');
                Route::get('/edit/{id}', [AdminController::class, 'usersEdit'])->name('edit');
                Route::post('/save', [AdminController::class, 'usersSave']);
            });

            //Openai management
            Route::prefix('openai')->name('openai.')->group(function () {
                Route::get('/', [AdminController::class, 'openAIList'])->name('list');
                Route::post('/update-status', [AdminController::class, 'openAIListUpdateStatus']);

                Route::prefix('custom')->name('custom.')->group(function () {
                    Route::get('/', [AdminController::class, 'openAICustomList'])->name('list');

                    Route::get('/add-or-update/{id?}', [AdminController::class, 'openAICustomAddOrUpdate'])->name('addOrUpdate');
                    Route::get('/delete/{id?}', [AdminController::class, 'openAICustomDelete'])->name('delete');
                    Route::post('/save', [AdminController::class, 'openAICustomAddOrUpdateSave']);
                });
            });

            //Finance
            Route::prefix('finance')->name('finance.')->group(function () {
                //Plans
                Route::prefix('plans')->name('plans.')->group(function () {
                    Route::get('/', [AdminController::class, 'paymentPlans'])->name('index');
                    Route::get('/subscription/create-or-update/{id?}', [AdminController::class, 'paymentPlansSubscriptionNewOrEdit'])->name('SubscriptionNewOrEdit');
                    Route::get('/pre-paid/create-or-update/{id?}', [AdminController::class, 'paymentPlansPrepaidNewOrEdit'])->name('PlanNewOrEdit');
                    Route::get('/delete/{id}', [AdminController::class, 'paymentPlansDelete'])->name('delete');
                    Route::post('/save', [AdminController::class, 'paymentPlansSave']);
                });
            });

            //Settings
            Route::prefix('settings')->name('settings.')->group(function () {
                Route::get('/general', [SettingsController::class, 'general'])->name('general');
                Route::post('/general-save', [SettingsController::class, 'generalSave']);

                Route::get('/openai', [SettingsController::class, 'openai'])->name('openai');
                Route::post('/openai-save', [SettingsController::class, 'openaiSave']);

                Route::get('/invoice', [SettingsController::class, 'invoice'])->name('invoice');
                Route::post('/invoice-save', [SettingsController::class, 'invoiceSave']);

                Route::get('/payment', [SettingsController::class, 'payment'])->name('payment');
                Route::post('/payment-save', [SettingsController::class, 'paymentSave']);

                Route::get('/affiliate', [SettingsController::class, 'affiliate'])->name('affiliate');
                Route::post('/affiliate-save', [SettingsController::class, 'affiliateSave']);
            });

            //Affiliates
            Route::prefix('affiliates')->name('affiliates.')->group(function () {
                Route::get('/', [AdminController::class, 'affiliatesList'])->name('index');
                Route::get('/sent/{id}', [AdminController::class, 'affiliatesListSent'])->name('sent');
            });

            //Frontend
            Route::prefix('frontend')->name('frontend.')->group(function () {
                Route::get('/', [AdminController::class, 'frontendSettings'])->name('settings');
                Route::post('/settings-save', [AdminController::class, 'frontendSettingsSave']);
            });
        });

        //Support Area
        Route::prefix('support')->name('support.')->group(function () {
            Route::get('/my-requests', [SupportController::class, 'list'])->name('list');
            Route::get('/new-support-request', [SupportController::class, 'newTicket'])->name('new');
            Route::post('/new-support-request/send', [SupportController::class, 'newTicketSend']);

            Route::get('/requests/{ticket_id}', [SupportController::class, 'viewTicket'])->name('view');
            Route::post('/requests-action/send-message', [SupportController::class, 'viewTicketSendMessage']);

        });

        //Search
        Route::post('/api/search', [SearchController::class, 'search']);


    });
});

