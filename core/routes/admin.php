<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function () {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('/', 'login')->name('login');
        Route::get('logout', 'logout')->middleware('admin')->name('logout');
    });

    // Admin Password Reset
    Route::controller('ForgotPasswordController')->prefix('password')->name('password.')->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('reset');
        Route::post('reset', 'sendResetCodeEmail');
        Route::get('code-verify', 'codeVerify')->name('code.verify');
        Route::post('verify-code', 'verifyCode')->name('verify.code');
    });

    Route::controller('ResetPasswordController')->group(function () {
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'reset')->name('password.change');
    });
});

Route::middleware('admin')->group(function () {
    Route::controller('AdminController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');
        Route::get('password', 'password')->name('password');
        Route::post('password', 'passwordUpdate')->name('password.update');

        //Notification
        Route::get('notifications', 'notifications')->name('notifications');
        Route::get('notification/read/{id}', 'notificationRead')->name('notification.read');
        Route::get('notifications/read-all', 'readAll')->name('notifications.readAll');

        //Report Bugs
        Route::get('request-report', 'requestReport')->name('request.report');
        Route::post('request-report', 'reportSubmit');

        Route::get('download-attachments/{file_hash}', 'downloadAttachment')->name('download.attachment');

    });

    //Reviewer manager
    Route::controller('ManageReviewerController')->name('reviewers.')->prefix('reviewers')->group(function () {
        Route::get('all', 'all')->name('all');
        Route::post('status/{id}', 'updateStatus')->name('status');
        Route::post('save/{id?}', 'save')->name('save');

        Route::get('login/{id}', 'login')->name('login');
    });

    Route::controller('ManageContributorController')->name('contributors.')->prefix('contributors')->group(function () {
        Route::get('all', 'all')->name('all');
        Route::get('pending', 'pending')->name('pending');
        Route::post('status/{id}', 'updateStatus')->name('status');
        Route::post('save/{id?}', 'save')->name('save');

        Route::get('login/{id}', 'login')->name('login');
    });

    // Users Manager
    Route::controller('ManageUsersController')->name('users.')->prefix('users')->group(function () {
        Route::get('/', 'allUsers')->name('all');
        Route::get('active', 'activeUsers')->name('active');
        Route::get('banned', 'bannedUsers')->name('banned');
        Route::get('email-verified', 'emailVerifiedUsers')->name('email.verified');
        Route::get('email-unverified', 'emailUnverifiedUsers')->name('email.unverified');
        Route::get('mobile-unverified', 'mobileUnverifiedUsers')->name('mobile.unverified');
        Route::get('kyc-unverified', 'kycUnverifiedUsers')->name('kyc.unverified');
        Route::get('kyc-pending', 'kycPendingUsers')->name('kyc.pending');
        Route::get('mobile-verified', 'mobileVerifiedUsers')->name('mobile.verified');
        Route::get('with-balance', 'usersWithBalance')->name('with.balance');

        Route::get('detail/{id}', 'detail')->name('detail');
        Route::get('kyc-data/{id}', 'kycDetails')->name('kyc.details');
        Route::post('kyc-approve/{id}', 'kycApprove')->name('kyc.approve');
        Route::post('kyc-reject/{id}', 'kycReject')->name('kyc.reject');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('add-sub-balance/{id}', 'addSubBalance')->name('add.sub.balance');
        Route::get('send-notification/{id}', 'showNotificationSingleForm')->name('notification.single');
        Route::post('send-notification/{id}', 'sendNotificationSingle')->name('notification.single');
        Route::get('login/{id}', 'login')->name('login');
        Route::post('status/{id}', 'status')->name('status');

        //featured status
        Route::post('featured/{id}', 'updateFeaturedStatus')->name('featured');

        Route::get('send-notification', 'showNotificationAllForm')->name('notification.all');
        Route::post('send-notification', 'sendNotificationAll')->name('notification.all.send');
        Route::get('list', 'list')->name('list');
        Route::get('notification-log/{id}', 'notificationLog')->name('notification.log');
        // subscribers
        Route::get('subscriber/all', 'allSubscriber')->name('subscriber.all');
        Route::get('subscriber/{id}', 'subscriberDelete')->name('subscriber.delete');

    });

    
        // donation Manager
        Route::controller('ManageDonationController')->name('donation.')->prefix('donation')->group(function () {
            Route::get('/', 'all')->name('log');
            Route::get('paid', 'paid')->name('paid');
            Route::get('reject', 'reject')->name('reject');
            Route::get('pending', 'pending')->name('pending');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::post('approve/{id}', 'approve')->name('approve');
            //setting
            Route::get('setting', 'setting')->name('setting.index');
            Route::Post('setting', 'updateSetting')->name('setting.update');

            });


    // Users Images
    Route::controller('ManageImageController')->name('images.')->prefix('images')->group(function () {
        Route::get('/', 'all')->name('all');
        Route::get('pending', 'pending')->name('pending');
        Route::get('rejected', 'rejected')->name('rejected');
        Route::get('approved', 'approved')->name('approved');
        Route::get('details/{id}', 'details')->name('details');
        Route::get('download/file/{id}', 'downloadFile')->name('file.download');
        Route::get('{id}/download/log', 'downloadLog')->name('download.log');

        Route::post('feature/update/{id}', 'updateFeature')->name('feature.update');
        Route::post('update/{id}', 'update')->name('update');
    });


    Route::controller('CategoryController')->name('category.')->prefix('category')->group(function () {
        Route::get('all', 'all')->name('all');
        Route::post('store/{id?}', 'store')->name('store');
        Route::post('status/{id}', 'status')->name('status');
    });

    Route::controller('PlanController')->name('plan.')->prefix('plan')->group(function () {
        Route::get('all', 'allPlan')->name('all');
        Route::post('store/{id?}', 'store')->name('store');
        Route::post('status/{id}', 'status')->name('status');
    });

    Route::controller('ColorController')->name('color.')->prefix('color')->group(function () {
        Route::get('all', 'all')->name('all');
        Route::post('store/{id?}', 'store')->name('store');
        Route::post('delete/{id}', 'delete')->name('delete');
    });

    Route::controller('ManageReasonController')->name('manage.')->prefix('reason')->group(function () {
        Route::get('all', 'all')->name('reason.all');
        Route::post('store/{id?}', 'store')->name('reason.store');
    });


    // Deposit Gateway
    Route::name('gateway.')->prefix('gateway')->group(function () {

        // Automatic Gateway
        Route::controller('AutomaticGatewayController')->prefix('automatic')->name('automatic.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('edit/{alias}', 'edit')->name('edit');
            Route::post('update/{code}', 'update')->name('update');
            Route::post('remove/{id}', 'remove')->name('remove');
            Route::post('status/{id}', 'status')->name('status');
        });


        // Manual Methods
        Route::controller('ManualGatewayController')->prefix('manual')->name('manual.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('new', 'create')->name('create');
            Route::post('new', 'store')->name('store');
            Route::get('edit/{alias}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::post('status/{id}', 'status')->name('status');
        });
    });


    // DEPOSIT SYSTEM
    Route::controller('DepositController')->prefix('deposit')->name('deposit.')->group(function () {
        Route::get('/', 'deposit')->name('list');
        Route::get('pending', 'pending')->name('pending');
        Route::get('rejected', 'rejected')->name('rejected');
        Route::get('approved', 'approved')->name('approved');
        Route::get('successful', 'successful')->name('successful');
        Route::get('initiated', 'initiated')->name('initiated');
        Route::get('details/{id}', 'details')->name('details');

        Route::post('reject', 'reject')->name('reject');
        Route::post('approve/{id}', 'approve')->name('approve');
    });







    // WITHDRAW SYSTEM
    Route::prefix('withdraw')->name('withdraw.')->group(function () {

        Route::controller('WithdrawalController')->group(function () {
            Route::get('pending', 'pending')->name('pending');
            Route::get('approved', 'approved')->name('approved');
            Route::get('rejected', 'rejected')->name('rejected');
            Route::get('log', 'log')->name('log');
            Route::get('details/{id}', 'details')->name('details');
            Route::post('approve', 'approve')->name('approve');
            Route::post('reject', 'reject')->name('reject');
        });

        // Withdraw Method
        Route::controller('WithdrawMethodController')->name('method.')->group(function () {
            Route::get('method/', 'methods')->name('index');
            Route::get('method/create', 'create')->name('create');
            Route::post('method/create', 'store')->name('store');
            Route::get('method/edit/{id}', 'edit')->name('edit');
            Route::post('method/edit/{id}', 'update')->name('update');
            Route::post('method/status/{id}', 'updateStatus')->name('status');
        });
    });

    // Report
    Route::controller('ReportController')->prefix('report')->name('report.')->group(function () {
        Route::get('transaction', 'transaction')->name('transaction');
        Route::get('login/history', 'loginHistory')->name('login.history');
        Route::get('download/log', 'downloadLog')->name('download.log');
        Route::get('plan/purchased', 'planPurchased')->name('plan.purchased');
        Route::get('contributor/earning/log', 'contributorEarningLog')->name('contributor.earnings');
        Route::get('user/image-collections', 'userImageCollectionLog')->name('user.image.collections');
        Route::post('user/image-collections/featured/{id}', 'userImageCollectionFeatured')->name('user.image.collections.featured');
        Route::get('login/ipHistory/{ip}', 'loginIpHistory')->name('login.ipHistory');
        Route::get('notification/history', 'notificationHistory')->name('notification.history');
        Route::get('email/detail/{id}', 'emailDetails')->name('email.details');
    });


    // Admin Support
    Route::controller('SupportTicketController')->prefix('ticket')->name('ticket.')->group(function () {
        Route::get('/', 'tickets')->name('index');
        Route::get('pending', 'pendingTicket')->name('pending');
        Route::get('closed', 'closedTicket')->name('closed');
        Route::get('answered', 'answeredTicket')->name('answered');
        Route::get('view/{id}', 'ticketReply')->name('view');
        Route::post('reply/{id}', 'replyTicket')->name('reply');
        Route::post('close/{id}', 'closeTicket')->name('close');
        Route::get('download/{ticket}', 'ticketDownload')->name('download');
        Route::post('delete/{id}', 'ticketDelete')->name('delete');
    });


    // Language Manager
    Route::controller('LanguageController')->prefix('language')->name('language.')->group(function () {
        Route::get('/', 'langManage')->name('manage');
        Route::post('/', 'langStore')->name('manage.store');
        Route::post('delete/{id}', 'langDelete')->name('manage.delete');
        Route::post('update/{id}', 'langUpdate')->name('manage.update');
        Route::get('edit/{id}', 'langEdit')->name('key');
        Route::post('import', 'langImport')->name('import.lang');
        Route::post('store/key/{id}', 'storeLanguageJson')->name('store.key');
        Route::post('delete/key/{id}', 'deleteLanguageJson')->name('delete.key');
        Route::post('update/key/{id}', 'updateLanguageJson')->name('update.key');
        Route::get('get-keys', 'getKeys')->name('get.key');
    });

    // Language Manager
    Route::controller('AdsController')->prefix('ads')->name('ads.')->group(function () {
        Route::get('/', 'index')->name('all');
        Route::post('store/{id?}', 'store')->name('store');
        Route::post('delete/{id}', 'delete')->name('delete');
       
    });

    Route::controller('GeneralSettingController')->group(function () {
        // General Setting
        Route::get('general-setting', 'index')->name('setting.index');
        Route::post('general-setting', 'update')->name('setting.update');

        //Photos Page Setting
        Route::get('photos-setting', 'photosPageSetting')->name('photos.page.setting');
        Route::post('photos-setting-update', 'photosPageSettingUpdate')->name('photos.page.update');

        //configuration
        Route::get('setting/system-configuration', 'systemConfiguration')->name('setting.system.configuration');
        Route::post('setting/system-configuration', 'systemConfigurationSubmit');

        // Logo-Icon
        Route::get('setting/logo-icon', 'logoIcon')->name('setting.logo.icon');
        Route::post('setting/logo-icon', 'logoIconUpdate')->name('setting.logo.icon');

        //ftp
        Route::get('setting/storage', 'ftpSettings')->name('setting.ftp');
        Route::post('setting/storage', 'ftpSettingsUpdate');

        //socialite credentials
        Route::get('setting/social/credentials', 'socialiteCredentials')->name('setting.socialite.credentials');
        Route::post('setting/social/credentials/update/{key}', 'updateSocialiteCredential')->name('setting.socialite.credentials.update');
        Route::post('setting/social/credentials/status/{key}', 'updateSocialiteCredentialStatus')->name('setting.socialite.credentials.status.update');

        //Custom CSS
        Route::get('custom-css', 'customCss')->name('setting.custom.css');
        Route::post('custom-css', 'customCssSubmit');

        //Cookie
        Route::get('cookie', 'cookie')->name('setting.cookie');
        Route::post('cookie', 'cookieSubmit');

        //maintenance_mode
        Route::get('maintenance-mode', 'maintenanceMode')->name('maintenance.mode');
        Route::post('maintenance-mode', 'maintenanceModeSubmit');

        //watermark
        Route::post('watermark', 'updateWaterMark')->name('watermark');
        Route::post('instruction', 'updateInstruction')->name('instruction');

        Route::post('promo-1', 'homePageProme1')->name('promo.one');
        Route::post('promo-2', 'homePageProme2')->name('promo.two');

        Route::post('hero-banner-1', 'updateheroBanner1')->name('hero.banner1');
        Route::post('hero-banner-2', 'updateheroBanner2')->name('hero.banner2');

        //sitemap
        Route::get('sitemap', 'sitemap')->name('sitemap.index');
        Route::post('sitemap', 'uploadSitemap');
    });


    //KYC setting
    Route::controller('KycController')->group(function () {
        Route::get('kyc-setting', 'setting')->name('kyc.setting');
        Route::post('kyc-setting', 'settingUpdate');
    });

    //Notification Setting
    Route::controller('NotificationController')->prefix('notification')->name('setting.notification.')->group(function () {
        //Template Setting
        Route::get('global', 'global')->name('global');
        Route::post('global/update', 'globalUpdate')->name('global.update');
        Route::get('templates', 'templates')->name('templates');
        Route::get('template/edit/{id}', 'templateEdit')->name('template.edit');
        Route::post('template/update/{id}', 'templateUpdate')->name('template.update');

        //Email Setting
        Route::get('email/setting', 'emailSetting')->name('email');
        Route::post('email/setting', 'emailSettingUpdate');
        Route::post('email/test', 'emailTest')->name('email.test');

        //SMS Setting
        Route::get('sms/setting', 'smsSetting')->name('sms');
        Route::post('sms/setting', 'smsSettingUpdate');
        Route::post('sms/test', 'smsTest')->name('sms.test');
    });

    // Plugin
    Route::controller('ExtensionController')->group(function () {
        Route::get('extensions', 'index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'update')->name('extensions.update');
        Route::post('extensions/status/{id}', 'status')->name('extensions.status');
    });


    //System Information
    Route::controller('SystemController')->prefix('system')->name('system.')->group(function () {
        Route::get('info', 'systemInfo')->name('info');
        Route::get('server-info', 'systemServerInfo')->name('server.info');
        Route::get('optimize', 'optimize')->name('optimize');
        Route::get('optimize-clear', 'optimizeClear')->name('optimize.clear');
        Route::get('system-update','systemUpdate')->name('update');
        Route::post('update-upload','updateUpload')->name('update.upload');
    });


    // SEO
    Route::get('seo', 'FrontendController@seoEdit')->name('seo');


    // Frontend
    Route::name('frontend.')->prefix('frontend')->group(function () {

        Route::controller('FrontendController')->group(function () {
            Route::get('templates', 'templates')->name('templates');
            Route::post('templates', 'templatesActive')->name('templates.active');
            Route::get('frontend-sections/{key}', 'frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'frontendElement')->name('sections.element');
            Route::post('remove/{id}', 'remove')->name('remove');
        });

        // Page Builder
        Route::controller('PageBuilderController')->group(function () {
            Route::get('manage-pages', 'managePages')->name('manage.pages');
            Route::post('manage-pages', 'managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete/{id}', 'managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'manageSectionUpdate')->name('manage.section.update');
        });
    });
    // Manage blog
    Route::name('blog.')->prefix('blog')->group(function () {
        Route::controller('BlogsController')->group(function () {
            Route::get('blog_category', 'blogCategory')->name('category');
            Route::post('blog_category/delete/{id}', 'blogCategoryDelete')->name('category.delete');
            Route::post('blog_category_add', 'blogCategoryAdd')->name('category.add');
            Route::post('blog_category_add/{id}', 'blogCategoryUpdate')->name('category.edit');

            Route::get('all-blog', 'allBlog')->name('all.blog');
            Route::get('add_blog', 'blogAdd')->name('new.add');
            Route::post('insert_data', 'blogInsert')->name('new.insert');
            Route::get('delete/{id}', 'blogDelete')->name('data.delete');
            Route::get('update_data/{id}', 'blogUpdate')->name('update.data');
            Route::post('update_data/{id}', 'blogEditData')->name('update.data.new');
        });
    });
});
