<?php

use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\AwardsCertificate;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DivisionAndSisterConcernController;
use App\Http\Controllers\Admin\OurproductscategoryController;
use App\Http\Controllers\Admin\LatestNewsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// Admin Controller Start
use App\Http\Controllers\Admin\HomesliderController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\CareerBannerController;
use App\Http\Controllers\Admin\CareerCurrentOpportunutiesController;
use App\Http\Controllers\Admin\ClientReviewsController;
use App\Http\Controllers\Admin\CompanyBackgroundAndProductController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ConnectFormController;
use App\Http\Controllers\Admin\FooterController;
// Admin Controller Start
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ContractManufacturerController;
use App\Http\Controllers\Admin\CorporateOfficeTourController;
use App\Http\Controllers\Admin\CorporateOfficeTourImageController;
// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\DirectorController;
// use App\Http\Controllers\Admin\DivisionAndSisterConcernController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventImageController;
use App\Http\Controllers\Admin\EventPageController;
use App\Http\Controllers\Admin\FrechiseOpprtunityController;
use App\Http\Controllers\Admin\LogisticPartnerController;
use App\Http\Controllers\Admin\ManufacturingPlantController;
use App\Http\Controllers\Admin\ManufacturingPlantTourController;
use App\Http\Controllers\Admin\NewLaunchController;
use App\Http\Controllers\Admin\OurProductController;
use App\Http\Controllers\Admin\TrustedManufacturersController;
use App\Http\Controllers\Admin\OurDivisionPageController;
use App\Http\Controllers\Admin\ThirdPartyManufacturingController;
use App\Http\Controllers\Admin\ThirdPartyManufacturingBenefitsController;
use App\Http\Controllers\Admin\DealWithRangeController;
use App\Http\Controllers\Admin\DealWithRangeImageController;
use App\Http\Controllers\Admin\UpcominEventsController;
use App\Http\Controllers\Admin\BlogDetailsFormController;
use App\Http\Controllers\Admin\AchievementTitleDescriptionController;

use App\Http\Controllers\Admin\OurdivisionController;
use App\Http\Controllers\Admin\PcdPharmaAdvantageController;
use App\Http\Controllers\Admin\PcdPharmaFranchiseController;
use App\Http\Controllers\Admin\PCHPLTeamController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProudMembersController;
use App\Http\Controllers\Admin\QualityAssuranceController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\TrustedPartnerController;
use App\Http\Controllers\Admin\ProductionDividedUnitController;
use App\Http\Controllers\Admin\DowloadBrochureController;
use App\Http\Controllers\Admin\ContactUsFormController;
use App\Http\Controllers\Admin\DowloadBrochureCategoryController;
use App\Http\Controllers\Admin\DowloadVisualAdsController;
use App\Http\Controllers\Admin\DowloadBrochureAndVisualadsController;
use App\Http\Controllers\Admin\SubscriptionFormController;
use App\Http\Controllers\Admin\LetsTalkFormControllerList;
use App\Http\Controllers\Admin\InquiryFormController;

// use App\Http\Controllers\Admin\SubscriptionFormController;
// use App\Http\Controllers\Admin\FooterController;

use App\Http\Controllers\Admin\WeBelievePointController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Front\AboutusController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


// Front Controller Start
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontCareerController;
use App\Http\Controllers\Front\FrontNewLaunchController;
use App\Http\Controllers\Front\FrontPCDPharmaFranchiseController;
use App\Http\Controllers\Front\FrontOurDivisionController;
use App\Http\Controllers\Front\FrontAwardsCertificateController;
use App\Http\Controllers\Front\FrontContactUsController;
use App\Http\Controllers\Front\FrontBlogController;
use App\Http\Controllers\Front\FrontTermsAndConditions;
use App\Http\Controllers\Front\FrontPrivacyPolicyController;
use App\Http\Controllers\Front\FrontEventsController;
use App\Http\Controllers\Front\FrontThirdPartyManufacturingController;
use App\Http\Controllers\Front\EmailSubscriptionController;
use App\Http\Controllers\Front\SendInquiryFormController;
use App\Http\Controllers\Front\LetstalkFormController;
use App\Http\Controllers\Front\FrontLatestNewsController;



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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     if (Auth::check()) {
//         return redirect()->route('user');
//     }
//     return redirect()->route('admin.login');
// });

Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin']], function () {
    //Manage User Login
    Route::get('login', [LoginController::class, 'loginAdmin'])->name('admin.login');
    Route::any('loginValidate', [LoginController::class, 'loginAdminValidate'])->name('admin.loginValidate');

    //Manage Admin Forgot Password
    Route::get('forgot-password',[ForgotPasswordController::class, 'forgotPasswordView'])->name('admin.forgot-password');
    Route::post('forgotPassword', [ForgotPasswordController::class, 'forgotPassword'])->name('admin.forgotPasswordMail');

    // //Manage Admin Reset Password
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'adminResetPassword']);
    Route::post('reset-password-save', [ResetPasswordController::class, 'adminPasswordIsReset']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    //Manage dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    //Manage HomeSliders
    Route::any('homeSlider/list', [HomesliderController::class, 'list'])->name('admin.homeSlider.list');
    Route::get('homeSlider/add', [HomesliderController::class, 'add'])->name('admin.homeSlider.add');
    Route::get('homeSlider/edit/{id}', [HomesliderController::class, 'edit'])->name('admin.homeSlider.edit');
    Route::post('homeSlider/status-change/{id}', [HomesliderController::class, 'statusChange'])->name('admin.homeSlider.status-change');
    Route::post('homeSlider/update', [HomesliderController::class, 'update'])->name('admin.homeSlider.update');
    Route::post('homeSlider/store', [HomesliderController::class, 'store'])->name('admin.homeSlider.store');
    Route::get('homeSlider/remove/{id}', [HomesliderController::class, 'remove'])->name('admin.homeSlider.remove');

    //Manage Directors
    Route::any('director/list', [DirectorController::class, 'list'])->name('admin.director.list');
    Route::get('director/add', [DirectorController::class, 'add'])->name('admin.director.add');
    Route::get('director/edit/{id}', [DirectorController::class, 'edit'])->name('admin.director.edit');
    Route::post('director/status-change/{id}', [DirectorController::class, 'statusChange'])->name('admin.director.status-change');
    Route::post('director/update', [DirectorController::class, 'update'])->name('admin.director.update');
    Route::post('director/store', [DirectorController::class, 'store'])->name('admin.director.store');
    Route::get('director/remove/{id}', [DirectorController::class, 'remove'])->name('admin.director.remove');

    // Manage CompanyProfile
    Route::get('companyprofile/edit', [CompanyProfileController::class, 'edit'])->name('admin.companyprofile.edit');
    Route::post('companyprofile/update', [CompanyProfileController::class, 'update'])->name('admin.companyprofile.update');

    //Manage company background and products on homepage

    Route::get('companyBackgroundProducts/edit', [CompanyBackgroundAndProductController::class, 'edit'])->name('admin.company_background_prodcuts.edit');
    Route::post('companyBackgroundProducts/update', [CompanyBackgroundAndProductController::class, 'update'])->name('admin.company_background_prodcuts.update');

    // Manage achivement title and description

    Route::get('achievementTitleDescription/edit', [AchievementTitleDescriptionController::class, 'edit'])->name('admin.achievement_title_description.edit');
    Route::post('achievementTitleDescription/update', [AchievementTitleDescriptionController::class, 'update'])->name('admin.achievement_title_description.update');

    // Manage Our Division

    Route::any('our_division/list', [OurdivisionController::class, 'list'])->name('admin.our_division.list');
    Route::get('our_division/add', [OurdivisionController::class, 'add'])->name('admin.our_division.add');
    Route::get('our_division/edit/{id}', [OurdivisionController::class, 'edit'])->name('admin.our_division.edit');
    Route::post('our_division/status-change/{id}', [OurdivisionController::class, 'statusChange'])->name('admin.our_division.status-change');
    Route::post('our_division/update', [OurdivisionController::class, 'update'])->name('admin.our_division.update');
    Route::post('our_division/store', [OurdivisionController::class, 'store'])->name('admin.our_division.store');
    Route::get('our_division/remove/{id}', [OurdivisionController::class, 'remove'])->name('admin.our_division.remove');

    // Manage Trusted Manufacturers

    Route::any('trustedManufacturers/list', [TrustedManufacturersController::class, 'list'])->name('admin.trustedManufacturers.list');
	Route::get('trustedManufacturers/add', [TrustedManufacturersController::class, 'add'])->name('admin.trustedManufacturers.add');
	Route::get('trustedManufacturers/edit/{id}', [TrustedManufacturersController::class, 'edit'])->name('admin.trustedManufacturers.edit');
	Route::post('trustedManufacturers/status-change/{id}', [TrustedManufacturersController::class, 'statusChange'])->name('admin.trustedManufacturers.status-change');
	Route::post('trustedManufacturers/update', [TrustedManufacturersController::class, 'update'])->name('admin.trustedManufacturers.update');
	Route::post('trustedManufacturers/store', [TrustedManufacturersController::class, 'store'])->name('admin.trustedManufacturers.store');
	Route::get('trustedManufacturers/remove/{id}', [TrustedManufacturersController::class, 'remove'])->name('admin.trustedManufacturers.remove');

    // Manage Client Reviews

    Route::any('client_review/list', [ClientReviewsController::class, 'list'])->name('admin.client_review.list');
    Route::get('client_review/add', [ClientReviewsController::class, 'add'])->name('admin.client_review.add');
    Route::get('client_review/edit/{id}', [ClientReviewsController::class, 'edit'])->name('admin.client_review.edit');
    Route::post('client_review/status-change/{id}', [ClientReviewsController::class, 'statusChange'])->name('admin.client_review.status-change');
    Route::post('client_review/update', [ClientReviewsController::class, 'update'])->name('admin.client_review.update');
    Route::post('client_review/store', [ClientReviewsController::class, 'store'])->name('admin.client_review.store');
    Route::get('client_review/remove/{id}', [ClientReviewsController::class, 'remove'])->name('admin.client_review.remove');

    // Manage Proud Members

    Route::any('proud_member/list', [ProudMembersController::class, 'list'])->name('admin.proud_member.list');
    Route::get('proud_member/add', [ProudMembersController::class, 'add'])->name('admin.proud_member.add');
    Route::get('proud_member/edit/{id}', [ProudMembersController::class, 'edit'])->name('admin.proud_member.edit');
    Route::post('proud_member/status-change/{id}', [ProudMembersController::class, 'statusChange'])->name('admin.proud_member.status-change');
    Route::post('proud_member/update', [ProudMembersController::class, 'update'])->name('admin.proud_member.update');
    Route::post('proud_member/store', [ProudMembersController::class, 'store'])->name('admin.proud_member.store');
    Route::get('proud_member/remove/{id}', [ProudMembersController::class, 'remove'])->name('admin.proud_member.remove');

    // Manage Frenchise opportunities

    Route::get('frenchise_opportunities/edit', [FrechiseOpprtunityController::class, 'edit'])->name('admin.frenchise_opportunities.edit');
    Route::post('frenchise_opportunities/update', [FrechiseOpprtunityController::class, 'update'])->name('admin.frenchise_opportunities.update');
    //Manage ManufacturingPlant
    Route::get('manage-manufacturing-plant/edit', [ManufacturingPlantController::class, 'edit'])->name('admin.manageManufacturing.edit');
    Route::post('manage-manufacturing-plant/update', [ManufacturingPlantController::class, 'AddOrUpdate'])->name('admin.manufacturingplant.update');

    Route::any('manufacturing-plant/list', [ManufacturingPlantController::class, 'ManufacturingPlantList'])->name('admin.manufacturingplant.list');
    Route::get('manufacturing-plant/add/{id?}', [ManufacturingPlantController::class, 'add'])->name('admin.manufacturingplant.add');
    Route::post('manufacturing-plant/updatelist', [ManufacturingPlantController::class, 'updateList'])->name('admin.manufacturingplant.updatelist');
    Route::post('manufacturing-plant/store', [ManufacturingPlantController::class, 'storeManufacturingPlant'])->name('admin.manufacturingplant.store');
    Route::post('manufacturing-plant/status-change/{id}', [ManufacturingPlantController::class, 'statusChange'])->name('admin.manufacturingplant.status-change');
    Route::get('manufacturing-plant/remove/{id}', [ManufacturingPlantController::class, 'remove'])->name('admin.manufacturingplant.remove');

    //Manage Awards & Certificate
    Route::get('manage-awards-certificate-banner/edit', [AwardsCertificate::class, 'editBanner'])->name('admin.manageAwards.edit');
    Route::post('manage-awards-certificate-banner/update', [AwardsCertificate::class, 'update'])->name('admin.manageAwards.update');

    Route::get('manage-awards-certificate-awards/awards-list', [AwardsCertificate::class, 'awardsList'])->name('admin.manageAwards.awardsList');
    Route::get('manage-awards-certificate-awards/add/{id?}', [AwardsCertificate::class, 'addAwards'])->name('admin.manageAwards.addAwards');
    Route::get('manage-awards-certificate-awards/remove/{id}', [AwardsCertificate::class, 'removeAwards'])->name('admin.manageAwards.removeAwards');
    Route::post('manage-awards-certificate-awards/store-awards', [AwardsCertificate::class, 'storeAwards'])->name('admin.manageAwards.storeAwards');
    Route::post('manage-awards-certificate-awards/update-awards', [AwardsCertificate::class, 'updateAwards'])->name('admin.manageAwards.updateAwards');
    Route::post('manage-awards-certificate-awards/awardstatus-change/{id}', [AwardsCertificate::class, 'awardStatusChange'])->name('admin.manageAwards.status-change');

    Route::get('manage-awards-certificate/certificate-list', [AwardsCertificate::class, 'certificateList'])->name('admin.manageCertificate.certificateList');
    Route::get('manage-awards-certificate/add-certificate/{id?}', [AwardsCertificate::class, 'addCertificate'])->name('admin.manageCertificate.addCertificate');
    Route::post('manage-awards-certificate/store-certificate', [AwardsCertificate::class, 'storeCerificate'])->name('admin.manageCertificate.storeCerificate');
    Route::post('manage-awards-certificate/update-certificate', [AwardsCertificate::class, 'updateCerificate'])->name('admin.manageCertificate.updateCerificate');
    Route::get('manage-awards-certificate/remove-certificate/{id}', [AwardsCertificate::class, 'removeCertificate'])->name('admin.manageCertificate.removeCertificate');
    Route::post('manage-awards-certificate/certificatestatus-change/{id}', [AwardsCertificate::class, 'certificateStatusChange'])->name('admin.manageCertificate.status-change');

    //Career
    Route::get('career/edit', [CareerBannerController::class, 'editCareer'])->name('admin.career.edit');
    Route::post('career/update', [CareerBannerController::class, 'update'])->name('admin.career.update');

    Route::get('career-form/list', [CareerCurrentOpportunutiesController::class, 'list'])->name('admin.careerform.list');
    Route::get('career-form/remove/{id}', [CareerCurrentOpportunutiesController::class, 'remove'])->name('admin.careerform.remove');
    Route::get('career-form/view/{id}', [CareerCurrentOpportunutiesController::class, 'view'])->name('admin.careerform.view');

    Route::get('joinUs', [CareerBannerController::class, 'join_us'])->name('admin.career.joinUs');
    Route::get('joinUs/add/{id?}', [CareerBannerController::class, 'addjoinUs'])->name('admin.career.addJoinUs');
    Route::post('joinUs/store-whyUs', [CareerBannerController::class, 'storeWhyUs'])->name('admin.career.storeWhyUs');
    Route::post('joinUs/update-whyUs', [CareerBannerController::class, 'updateWhyUs'])->name('admin.career.updateWhyUs');
    Route::get('joinUs/remove/{id}', [CareerBannerController::class, 'removeWhyUs'])->name('admin.career.removeWhyUs');
    Route::post('joinUs/whyUsStatus-change/{id}', [CareerBannerController::class, 'WhyUsStatus'])->name('admin.career.status-change');

    Route::any('opportunites', [CareerBannerController::class, 'current_Opportunites'])->name('admin.opportunites.currentOpportunites');
    Route::get('opportunites/addOpportunites/{id?}', [CareerBannerController::class, 'addOpportunites'])->name('admin.opportunites.addOpportunites');
    Route::post('opportunites/storeOpportunites', [CareerBannerController::class, 'storeOpportunites'])->name('admin.opportunites.store');
    Route::post('opportunites/updateOpportunites', [CareerBannerController::class, 'updateOpportunites'])->name('admin.opportunites.update');
    Route::post('opportunites/opportunitesstatus-change/{id}', [CareerBannerController::class, 'opportunitesStatusChange'])->name('admin.opportunites.status-change');
    Route::get('opportunites/opportuniteremove/{id}', [CareerBannerController::class, 'removeOpportunite'])->name('admin.opportunites.remove');

    // Manage Manufacturing Plant Tour
    Route::get('manufacturingplant_tour_off/edit', [ManufacturingPlantTourController::class, 'edit'])->name('admin.manufacturingplant_tour_off.edit');
    Route::post('manufacturingplant_tour_off/update', [ManufacturingPlantTourController::class, 'update'])->name('admin.manufacturingplant_tour_off.update');

    Route::any('manufacturingplant_tour/list', [ManufacturingPlantTourController::class, 'list'])->name('admin.manufacturingplant_tour.list');
    Route::get('manufacturingplant_tour/add', [ManufacturingPlantTourController::class, 'add'])->name('admin.manufacturingplant_tour.add');
    Route::get('manufacturingplant_tour/edit_image/{id}', [ManufacturingPlantTourController::class, 'edit_image'])->name('admin.manufacturingplant_tour.edit_image');
    Route::post('manufacturingplant_tour/status-change/{id}', [ManufacturingPlantTourController::class, 'statusChange'])->name('admin.manufacturingplant_tour.status-change');
    Route::post('manufacturingplant_tour/update_image', [ManufacturingPlantTourController::class, 'update_image'])->name('admin.manufacturingplant_tour.update_image');
    Route::post('manufacturingplant_tour/store_image', [ManufacturingPlantTourController::class, 'store_image'])->name('admin.manufacturingplant_tour.store_image');
    Route::get('manufacturingplant_tour/remove/{id}', [ManufacturingPlantTourController::class, 'remove'])->name('admin.manufacturingplant_tour.remove');

    //Manage we_believe_points
    Route::any('we_believe_points/list', [WeBelievePointController::class, 'list'])->name('admin.we_believe_points.list');
    Route::get('we_believe_points/add', [WeBelievePointController::class, 'add'])->name('admin.we_believe_points.add');
    Route::get('we_believe_points/edit/{id}', [WeBelievePointController::class, 'edit'])->name('admin.we_believe_points.edit');
    Route::post('we_believe_points/status-change/{id}', [WeBelievePointController::class, 'statusChange'])->name('admin.we_believe_points.status-change');
    Route::post('we_believe_points/update', [WeBelievePointController::class, 'update'])->name('admin.we_believe_points.update');
    Route::post('we_believe_points/store', [WeBelievePointController::class, 'store'])->name('admin.we_believe_points.store');
    Route::get('we_believe_points/remove/{id}', [WeBelievePointController::class, 'remove'])->name('admin.we_believe_points.remove');

//Manage trustedpartner
    Route::any('trusted_partner/list', [TrustedPartnerController::class, 'list'])->name('admin.trusted_partner.list');
    Route::get('trusted_partner/add', [TrustedPartnerController::class, 'add'])->name('admin.trusted_partner.add');
    Route::get('trusted_partner/edit/{id}', [TrustedPartnerController::class, 'edit'])->name('admin.trusted_partner.edit');
    Route::post('trusted_partner/status-change/{id}', [TrustedPartnerController::class, 'statusChange'])->name('admin.trusted_partner.status-change');
    Route::post('trusted_partner/update', [TrustedPartnerController::class, 'update'])->name('admin.trusted_partner.update');
    Route::post('trusted_partner/store', [TrustedPartnerController::class, 'store'])->name('admin.trusted_partner.store');
    Route::get('trusted_partner/remove/{id}', [TrustedPartnerController::class, 'remove'])->name('admin.trusted_partner.remove');

//Manage division_and_sister_concern
    Route::any('division_and_sister_concern/list', [DivisionAndSisterConcernController::class, 'list'])->name('admin.division_and_sister_concern.list');
    Route::get('division_and_sister_concern/add', [DivisionAndSisterConcernController::class, 'add'])->name('admin.division_and_sister_concern.add');
    Route::get('division_and_sister_concern/edit/{id}', [DivisionAndSisterConcernController::class, 'edit'])->name('admin.division_and_sister_concern.edit');
    Route::post('division_and_sister_concern/status-change/{id}', [DivisionAndSisterConcernController::class, 'statusChange'])->name('admin.division_and_sister_concern.status-change');
    Route::post('division_and_sister_concern/update', [DivisionAndSisterConcernController::class, 'update'])->name('admin.division_and_sister_concern.update');
    Route::post('division_and_sister_concern/store', [DivisionAndSisterConcernController::class, 'store'])->name('admin.division_and_sister_concern.store');
    Route::get('division_and_sister_concern/remove/{id}', [DivisionAndSisterConcernController::class, 'remove'])->name('admin.division_and_sister_concern.remove');

//Manage pchpl_teams
    Route::any('pchpl_teams/list', [PCHPLTeamController::class, 'list'])->name('admin.pchpl_teams.list');
    Route::get('pchpl_teams/add', [PCHPLTeamController::class, 'add'])->name('admin.pchpl_teams.add');
    Route::get('pchpl_teams/edit/{id}', [PCHPLTeamController::class, 'edit'])->name('admin.pchpl_teams.edit');
    Route::post('pchpl_teams/status-change/{id}', [PCHPLTeamController::class, 'statusChange'])->name('admin.pchpl_teams.status-change');
    Route::post('pchpl_teams/update', [PCHPLTeamController::class, 'update'])->name('admin.pchpl_teams.update');
    Route::post('pchpl_teams/store', [PCHPLTeamController::class, 'store'])->name('admin.pchpl_teams.store');
    Route::get('pchpl_teams/remove/{id}', [PCHPLTeamController::class, 'remove'])->name('admin.pchpl_teams.remove');

    // Manage CompanyProfile
    Route::get('corporateofficetour/edit', [CorporateOfficeTourController::class, 'edit'])->name('admin.corporateofficetour.edit');
    Route::post('corporateofficetour/update', [CorporateOfficeTourController::class, 'update'])->name('admin.corporateofficetour.update');

    //Manage trustedpartner
    Route::any('corporateofficetourimage/list', [CorporateOfficeTourImageController::class, 'list'])->name('admin.corporateofficetourimage.list');
    Route::get('corporateofficetourimage/add', [CorporateOfficeTourImageController::class, 'add'])->name('admin.corporateofficetourimage.add');
    Route::get('corporateofficetourimage/edit/{id}', [CorporateOfficeTourImageController::class, 'edit'])->name('admin.corporateofficetourimage.edit');
    Route::post('corporateofficetourimage/status-change/{id}', [CorporateOfficeTourImageController::class, 'statusChange'])->name('admin.corporateofficetourimage.status-change');
    Route::post('corporateofficetourimage/update', [CorporateOfficeTourImageController::class, 'update'])->name('admin.corporateofficetourimage.update');
    Route::post('corporateofficetourimage/store', [CorporateOfficeTourImageController::class, 'store'])->name('admin.corporateofficetourimage.store');
    Route::get('corporateofficetourimage/remove/{id}', [CorporateOfficeTourImageController::class, 'remove'])->name('admin.corporateofficetourimage.remove');

    // Manage blogs
    Route::any('blogs/list', [BlogController::class, 'list'])->name('admin.blogs.list');
    Route::get('blogs/add', [BlogController::class, 'add'])->name('admin.blogs.add');
    Route::get('blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::post('blogs/status-change/{id}', [BlogController::class, 'statusChange'])->name('admin.blogs.status-change');
    Route::post('blogs/news-status-change/{id}', [BlogController::class, 'newsStatusChange'])->name('admin.blogs.news-status-change');
    Route::post('blogs/update', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::post('blogs/store', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('blogs/remove/{id}', [BlogController::class, 'remove'])->name('admin.blogs.remove');
    Route::post('blogs/upload-image', [BlogController::class, 'uploadImage'])->name('admin.blogs.upload.image');

    // Manage blogpage
    Route::get('blogpage/edit', [BlogPageController::class, 'edit'])->name('admin.blogpage.edit');
    Route::post('blogpage/update', [BlogPageController::class, 'update'])->name('admin.blogpage.update');

    // Manage latest news page
    Route::get('latestNewsPage/edit', [LatestNewsController::class, 'edit'])->name('admin.latestNewsPage.edit');
    Route::post('latestNewsPage/update', [LatestNewsController::class, 'update'])->name('admin.latestNewsPage.update');



    // Manage events
    Route::any('events/list', [EventController::class, 'list'])->name('admin.events.list');
    Route::get('events/add', [EventController::class, 'add'])->name('admin.events.add');
    Route::get('events/edit/{id}', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::post('events/status-change/{id}', [EventController::class, 'statusChange'])->name('admin.events.status-change');
    Route::post('events/update', [EventController::class, 'update'])->name('admin.events.update');
    Route::post('events/store', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('events/remove/{id}', [EventController::class, 'remove'])->name('admin.events.remove');
    Route::post('events/upload-image', [EventController::class, 'uploadImage'])->name('admin.events.upload.image');

    // Manage eventpage
    Route::get('eventpage/edit', [EventPageController::class, 'edit'])->name('admin.eventpage.edit');
    Route::post('eventpage/update', [EventPageController::class, 'update'])->name('admin.eventpage.update');

    // Manage Upcomin-eventpage

    Route::any('upcoming-events/list', [UpcominEventsController::class, 'list'])->name('admin.upcoming-events.list');
    Route::get('upcoming-events/add', [UpcominEventsController::class, 'add'])->name('admin.upcoming-events.add');
    Route::get('upcoming-events/edit/{id}', [UpcominEventsController::class, 'edit'])->name('admin.upcoming-events.edit');
    Route::post('upcoming-events/status-change/{id}', [UpcominEventsController::class, 'statusChange'])->name('admin.upcoming-events.status-change');
    Route::post('upcoming-events/update', [UpcominEventsController::class, 'update'])->name('admin.upcoming-events.update');
    Route::post('upcoming-events/store', [UpcominEventsController::class, 'store'])->name('admin.upcoming-events.store');
    Route::get('upcoming-events/remove/{id}', [UpcominEventsController::class, 'remove'])->name('admin.upcoming-events.remove');

    //Manage event images
    Route::any('eventimage/list', [EventImageController::class, 'list'])->name('admin.eventimage.list');
    Route::get('eventimage/add', [EventImageController::class, 'add'])->name('admin.eventimage.add');
    Route::get('eventimage/edit/{id}', [EventImageController::class, 'edit'])->name('admin.eventimage.edit');
    Route::post('eventimage/status-change/{id}', [EventImageController::class, 'statusChange'])->name('admin.eventimage.status-change');
    Route::post('eventimage/update', [EventImageController::class, 'update'])->name('admin.eventimage.update');
    Route::post('eventimage/store', [EventImageController::class, 'store'])->name('admin.eventimage.store');
    Route::get('eventimage/remove/{id}', [EventImageController::class, 'remove'])->name('admin.eventimage.remove');

    // Contact Us
    Route::get('contactus/edit', [ContactUsController::class, 'editContactUs'])->name('admin.contactus.edit');
    Route::post('contactus/update', [ContactUsController::class, 'update'])->name('admin.contactus.update');
    Route::get('contactuspage/edit', [ContactUsController::class, 'editContactUsPage'])->name('admin.contactuspage.edit');
    Route::post('contactuspage/update', [ContactUsController::class, 'updateContactUsPage'])->name('admin.contactuspage.update');

    Route::any('contactusform/list', [ContactUsController::class, 'listContactUsPage'])->name('admin.contactusform.list');
    Route::any('contactusform/remove/{id}', [ContactUsController::class, 'removeContactUsPage'])->name('admin.contactusform.remove');
    Route::any('contactusform/view/{id}', [ContactUsController::class, 'viewform'])->name('admin.contactusform.view');

    // Manage T&C
    Route::get('terms/edit', [TermsAndConditionController::class, 'editTerms'])->name('admin.terms.edit');
    Route::post('terms/update', [TermsAndConditionController::class, 'update'])->name('admin.terms.update');
    Route::get('termspage/edit', [TermsAndConditionController::class, 'editTermsPage'])->name('admin.termspage.edit');
    Route::post('termspage/update', [TermsAndConditionController::class, 'updateTermsPage'])->name('admin.termspage.update');

    // Social Media Links
    Route::get('social/social-media-list', [SocialMediaController::class, 'socialList'])->name('admin.social.list');
    Route::get('social/social-media-add/{id?}', [SocialMediaController::class, 'add'])->name('admin.social.add');
    Route::post('social/store-social', [SocialMediaController::class, 'store'])->name('admin.social.store');
    Route::post('social/update-social', [SocialMediaController::class, 'update'])->name('admin.social.update');
    Route::get('social/remove/{id}', [SocialMediaController::class, 'remove'])->name('admin.social.remove');
    Route::post('social/status-change/{id}', [SocialMediaController::class, 'socialStatusChange'])->name('admin.social.status-change');

    // PrivacyPolicy
    Route::get('privacy-policy/edit', [PrivacyPolicyController::class, 'editPolicy'])->name('admin.privacyPolicy.edit');
    Route::post('privacy-policy/update', [PrivacyPolicyController::class, 'update'])->name('admin.privacyPolicy.update');
    Route::get('privacy-policy-page/editpage', [PrivacyPolicyController::class, 'editPrivacyPolicyPage'])->name('admin.privacyPolicy.editPage');
    Route::post('privacy-policy-page/updatepage', [PrivacyPolicyController::class, 'updatePrivacyPolicyPage'])->name('admin.privacyPolicy.updatePage');

    //New Launch
    Route::get('new-launch/edit', [NewLaunchController::class, 'editNewLaunchBanner'])->name('admin.newLaunch.editbanner');
    Route::post('new-launch/update', [NewLaunchController::class, 'updateNewLaunchBanner'])->name('admin.newLaunch.updatebanner');

    Route::get('new-launch-slider/slider-list', [NewLaunchController::class, 'newLaunchSliderList'])->name('admin.newLaunch.sliderList');
    Route::get('new-launch-slider/slider-add/{id?}', [NewLaunchController::class, 'addSlider'])->name('admin.newLaunch.sliderAdd');
    Route::post('new-launch-slider/slider-store', [NewLaunchController::class, 'storSlider'])->name('admin.newLaunch.storeSlider');
    Route::post('new-launch-slider/slider-update', [NewLaunchController::class, 'updateSlider'])->name('admin.newLaunch.updateSlider');
    Route::get('new-launch-slider/remove/{id}', [NewLaunchController::class, 'removeSliderImage'])->name('admin.newLaunch.removeSlider');
    Route::post('new-launch-slider/sliderStatus-change/{id}', [NewLaunchController::class, 'sliderStatusChange'])->name('admin.newLaunch.slider-status-change');

    Route::get('new-launch-product/product-list', [NewLaunchController::class, 'newProductList'])->name('admin.newLaunch.productList');
    Route::get('new-launch-product/add-product/{id?}', [NewLaunchController::class, 'addProduct'])->name('admin.newLaunch.addProduct');
    Route::post('new-launch-product/store-product', [NewLaunchController::class, 'storProduct'])->name('admin.newLaunch.storeProduct');
    Route::post('new-launch-product/update-product', [NewLaunchController::class, 'updateProduct'])->name('admin.newLaunch.updateProduct');
    Route::get('new-launch-product/remove-product/{id}', [NewLaunchController::class, 'removeProduct'])->name('admin.newLaunch.removeProduct');
    Route::post('new-launch-product/product-status-change/{id}', [NewLaunchController::class, 'productStatusChange'])->name('admin.newLaunch.product-status-change');

// Manage achievements
    Route::any('achievements/list', [AchievementController::class, 'list'])->name('admin.achievements.list');
    Route::get('achievements/add', [AchievementController::class, 'add'])->name('admin.achievements.add');
    Route::get('achievements/edit/{id}', [AchievementController::class, 'edit'])->name('admin.achievements.edit');
    Route::post('achievements/status-change/{id}', [AchievementController::class, 'statusChange'])->name('admin.achievements.status-change');
    Route::post('achievements/update', [AchievementController::class, 'update'])->name('admin.achievements.update');
    Route::post('achievements/store', [AchievementController::class, 'store'])->name('admin.achievements.store');
    Route::get('achievements/remove/{id}', [AchievementController::class, 'remove'])->name('admin.achievements.remove');


// Manage Our product category

Route::any('our_products_category/list', [OurproductscategoryController::class, 'list'])->name('admin.ourproductscategory.list');
Route::get('our_products_category/add', [OurproductscategoryController::class, 'add'])->name('admin.ourproductscategory.add');
Route::get('our_products_category/edit/{id}', [OurproductscategoryController::class, 'edit'])->name('admin.ourproductscategory.edit');
Route::post('our_products_category/status-change/{id}', [OurproductscategoryController::class, 'statusChange'])->name('admin.ourproductscategory.status-change');
Route::post('our_products_category/update', [OurproductscategoryController::class, 'update'])->name('admin.ourproductscategory.update');
Route::post('our_products_category/store', [OurproductscategoryController::class, 'store'])->name('admin.ourproductscategory.store');
Route::get('our_products_category/remove/{id}', [OurproductscategoryController::class, 'remove'])->name('admin.ourproductscategory.remove');

Route::get('our_product/upload-products-images', [OurProductController::class,'uploadImages'])->name('admin.products.uploadImages');
Route::post('upload-products-images-submit', [OurProductController::class,'uploadImagesSubmit'])->name('admin.products.uploadImages.submit');
Route::post('upload-product-image', [OurProductController::class,'uploadProductImage'])->name('admin.upload.product.image');
Route::post('delete-product-image', [OurProductController::class,'deleteProductImage'])->name('admin.delete.product.image');
Route::post('product-import', [OurProductController::class,'productImport'])->name('admin.products.import');

// Manage product
Route::get('our_product_banner/edit', [OurProductController::class, 'edit'])->name('admin.our_product_banner.edit');
Route::post('our_product_banner/update', [OurProductController::class, 'update'])->name('admin.our_product_banner.update');

Route::any('our_product/list', [OurProductController::class, 'list'])->name('admin.our_product.list');
Route::get('our_product/add', [OurProductController::class, 'add'])->name('admin.our_product.add');
Route::get('our_product/edit_product/{id}', [OurProductController::class, 'edit_product'])->name('admin.our_product.edit_product');
Route::post('our_product/status-change/{id}', [OurProductController::class, 'statusChange'])->name('admin.our_product.status-change');
Route::post('our_product/update_product', [OurProductController::class, 'update_product'])->name('admin.our_product.update_product');
Route::post('our_product/store_product', [OurProductController::class, 'store_product'])->name('admin.our_product.store_product');
Route::get('our_product/remove/{id}', [OurProductController::class, 'remove'])->name('admin.our_product.remove');
Route::any('our_product/category', [OurProductController::class, 'categoryid'])->name('admin.our_product.categoryid');

// Manage contractmanufacturer
    Route::any('contractmanufacturer/list', [ContractManufacturerController::class, 'list'])->name('admin.contractmanufacturer.list');
    Route::get('contractmanufacturer/add', [ContractManufacturerController::class, 'add'])->name('admin.contractmanufacturer.add');
    Route::get('contractmanufacturer/edit/{id}', [ContractManufacturerController::class, 'edit'])->name('admin.contractmanufacturer.edit');
    Route::post('contractmanufacturer/status-change/{id}', [ContractManufacturerController::class, 'statusChange'])->name('admin.contractmanufacturer.status-change');
    Route::post('contractmanufacturer/update', [ContractManufacturerController::class, 'update'])->name('admin.contractmanufacturer.update');
    Route::post('contractmanufacturer/store', [ContractManufacturerController::class, 'store'])->name('admin.contractmanufacturer.store');
    Route::get('contractmanufacturer/remove/{id}', [ContractManufacturerController::class, 'remove'])->name('admin.contractmanufacturer.remove');

// Manage Our Division Page

    // Banner
    Route::get('ourDivision_page_banner/edit', [OurDivisionPageController::class, 'edit'])->name('admin.ourDivision_page_banner.edit');
    Route::post('ourDivision_page_banner/update', [OurDivisionPageController::class, 'update'])->name('admin.ourDivision_page_banner.update');

    // Products
    Route::any('ourDivision_page_product/list', [OurDivisionPageController::class, 'list_product'])->name('admin.ourDivision_page_product.list_product');
	Route::get('ourDivision_page_product/add', [OurDivisionPageController::class, 'add_product'])->name('admin.ourDivision_page_product.add_product');
	Route::get('ourDivision_page_product/edit/{id}', [OurDivisionPageController::class, 'edit_product'])->name('admin.ourDivision_page_product.edit_product');
	Route::post('ourDivision_page_product/status-change/{id}', [OurDivisionPageController::class, 'statusChange'])->name('admin.ourDivision_page_product.status-change');
	Route::post('ourDivision_page_product/update', [OurDivisionPageController::class, 'update_product'])->name('admin.ourDivision_page_product.update_product');
	Route::post('ourDivision_page_product/store', [OurDivisionPageController::class, 'store_product'])->name('admin.ourDivision_page_product.store_product');
	Route::get('ourDivision_page_product/remove/{id}', [OurDivisionPageController::class, 'remove'])->name('admin.ourDivision_page_product.remove');

     // Manage pcdpharmafranchise
     Route::get('pcdpharmafranchise/edit', [PcdPharmaFranchiseController::class, 'edit'])->name('admin.pcdpharmafranchise.edit');
     Route::post('pcdpharmafranchise/update', [PcdPharmaFranchiseController::class, 'update'])->name('admin.pcdpharmafranchise.update');

     // Manage pcdpharmaadvantage
    Route::any('pcdpharmaadvantage/list', [PcdPharmaAdvantageController::class, 'list'])->name('admin.pcdpharmaadvantage.list');
    Route::get('pcdpharmaadvantage/add', [PcdPharmaAdvantageController::class, 'add'])->name('admin.pcdpharmaadvantage.add');
    Route::get('pcdpharmaadvantage/edit/{id}', [PcdPharmaAdvantageController::class, 'edit'])->name('admin.pcdpharmaadvantage.edit');
    Route::post('pcdpharmaadvantage/status-change/{id}', [PcdPharmaAdvantageController::class, 'statusChange'])->name('admin.pcdpharmaadvantage.status-change');
    Route::post('pcdpharmaadvantage/update', [PcdPharmaAdvantageController::class, 'update'])->name('admin.pcdpharmaadvantage.update');
    Route::post('pcdpharmaadvantage/store', [PcdPharmaAdvantageController::class, 'store'])->name('admin.pcdpharmaadvantage.store');
    Route::get('pcdpharmaadvantage/remove/{id}', [PcdPharmaAdvantageController::class, 'remove'])->name('admin.pcdpharmaadvantage.remove');


     // Manage qualityassurance
     Route::any('qualityassurance/list', [QualityAssuranceController::class, 'list'])->name('admin.qualityassurance.list');
     Route::get('qualityassurance/add', [QualityAssuranceController::class, 'add'])->name('admin.qualityassurance.add');
     Route::get('qualityassurance/edit/{id}', [QualityAssuranceController::class, 'edit'])->name('admin.qualityassurance.edit');
     Route::post('qualityassurance/status-change/{id}', [QualityAssuranceController::class, 'statusChange'])->name('admin.qualityassurance.status-change');
     Route::post('qualityassurance/update', [QualityAssuranceController::class, 'update'])->name('admin.qualityassurance.update');
     Route::post('qualityassurance/store', [QualityAssuranceController::class, 'store'])->name('admin.qualityassurance.store');
     Route::get('qualityassurance/remove/{id}', [QualityAssuranceController::class, 'remove'])->name('admin.qualityassurance.remove');

     // Manage logisticpartner
     Route::any('logisticpartner/list', [LogisticPartnerController::class, 'list'])->name('admin.logisticpartner.list');
     Route::get('logisticpartner/add', [LogisticPartnerController::class, 'add'])->name('admin.logisticpartner.add');
     Route::get('logisticpartner/edit/{id}', [LogisticPartnerController::class, 'edit'])->name('admin.logisticpartner.edit');
     Route::post('logisticpartner/status-change/{id}', [LogisticPartnerController::class, 'statusChange'])->name('admin.logisticpartner.status-change');
     Route::post('logisticpartner/update', [LogisticPartnerController::class, 'update'])->name('admin.logisticpartner.update');
     Route::post('logisticpartner/store', [LogisticPartnerController::class, 'store'])->name('admin.logisticpartner.store');
     Route::get('logisticpartner/remove/{id}', [LogisticPartnerController::class, 'remove'])->name('admin.logisticpartner.remove');


 // Manage Third Party Manufacturing Page

    // Banner
    Route::get('third_party_manufacturing_banner/edit', [ThirdPartyManufacturingController::class, 'edit'])->name('admin.third_party_manufacturing_banner.edit');
    Route::post('third_party_manufacturing_banner/update', [ThirdPartyManufacturingController::class, 'update'])->name('admin.third_party_manufacturing_banner.update');

 // Manage Third Party Manufacturing Benefits Page

     Route::any('third_party_manufacturing_benefits/list', [ThirdPartyManufacturingBenefitsController::class, 'list'])->name('admin.third_party_manufacturing_benefits.list');
     Route::get('third_party_manufacturing_benefits/add', [ThirdPartyManufacturingBenefitsController::class, 'add'])->name('admin.third_party_manufacturing_benefits.add');
     Route::get('third_party_manufacturing_benefits/edit/{id}', [ThirdPartyManufacturingBenefitsController::class, 'edit'])->name('admin.third_party_manufacturing_benefits.edit');
     Route::post('third_party_manufacturing_benefits/status-change/{id}', [ThirdPartyManufacturingBenefitsController::class, 'statusChange'])->name('admin.third_party_manufacturing_benefits.status-change');
     Route::post('third_party_manufacturing_benefits/update', [ThirdPartyManufacturingBenefitsController::class, 'update'])->name('admin.third_party_manufacturing_benefits.update');
     Route::post('third_party_manufacturing_benefits/store', [ThirdPartyManufacturingBenefitsController::class, 'store'])->name('admin.third_party_manufacturing_benefits.store');
     Route::get('third_party_manufacturing_benefits/remove/{id}', [ThirdPartyManufacturingBenefitsController::class, 'remove'])->name('admin.third_party_manufacturing_benefits.remove');



    // Manage production Divided Unit Page

    Route::any('production_divided_unit/list', [ProductionDividedUnitController::class, 'list'])->name('admin.production_divided_unit.list');
    Route::get('production_divided_unit/add', [ProductionDividedUnitController::class, 'add'])->name('admin.production_divided_unit.add');
    Route::get('production_divided_unit/edit/{id}', [ProductionDividedUnitController::class, 'edit'])->name('admin.production_divided_unit.edit');
    Route::post('production_divided_unit/status-change/{id}', [ProductionDividedUnitController::class, 'statusChange'])->name('admin.production_divided_unit.status-change');
    Route::post('production_divided_unit/update', [ProductionDividedUnitController::class, 'update'])->name('admin.production_divided_unit.update');
    Route::post('production_divided_unit/store', [ProductionDividedUnitController::class, 'store'])->name('admin.production_divided_unit.store');
    Route::get('production_divided_unit/remove/{id}', [ProductionDividedUnitController::class, 'remove'])->name('admin.production_divided_unit.remove');

    // Deal With Range

     // Banner
     Route::get('deal_with_range/edit', [DealWithRangeController::class, 'edit'])->name('admin.deal_with_range.edit');
     Route::post('deal_with_range/update', [DealWithRangeController::class, 'update'])->name('admin.deal_with_range.update');

    //  Deal With Range Image

    Route::any('deal_with_range_image/list', [DealWithRangeImageController::class, 'list'])->name('admin.deal_with_range_image.list');
    Route::get('deal_with_range_image/add', [DealWithRangeImageController::class, 'add'])->name('admin.deal_with_range_image.add');
    Route::get('deal_with_range_image/edit/{id}', [DealWithRangeImageController::class, 'edit'])->name('admin.deal_with_range_image.edit');
    Route::post('deal_with_range_image/status-change/{id}', [DealWithRangeImageController::class, 'statusChange'])->name('admin.deal_with_range_image.status-change');
    Route::post('deal_with_range_image/update', [DealWithRangeImageController::class, 'update'])->name('admin.deal_with_range_image.update');
    Route::post('deal_with_range_image/store', [DealWithRangeImageController::class, 'store'])->name('admin.deal_with_range_image.store');
    Route::get('deal_with_range_image/remove/{id}', [DealWithRangeImageController::class, 'remove'])->name('admin.deal_with_range_image.remove');


    //  dowload Brochure page

    Route::any('dowload_brochure/list', [DowloadBrochureController::class, 'list'])->name('admin.dowload_brochure.list');
    Route::get('dowload_brochure/add', [DowloadBrochureController::class, 'add'])->name('admin.dowload_brochure.add');
    Route::get('dowload_brochure/edit/{id}', [DowloadBrochureController::class, 'edit'])->name('admin.dowload_brochure.edit');
    Route::post('dowload_brochure/status-change/{id}', [DowloadBrochureController::class, 'statusChange'])->name('admin.dowload_brochure.status-change');
    Route::post('dowload_brochure/update', [DowloadBrochureController::class, 'update'])->name('admin.dowload_brochure.update');
    Route::post('dowload_brochure/store', [DowloadBrochureController::class, 'store'])->name('admin.dowload_brochure.store');
    Route::get('dowload_brochure/remove/{id}', [DowloadBrochureController::class, 'remove'])->name('admin.dowload_brochure.remove');

    // Dowload Brochure Category
    Route::get('brochure_category/list', [DowloadBrochureCategoryController::class, 'list'])->name('admin.brochurecategory.list');
    Route::get('brochure_category/add', [DowloadBrochureCategoryController::class, 'add'])->name('admin.brochurecategory.add');
    Route::get('brochure_category/edit/{id}', [DowloadBrochureCategoryController::class, 'edit'])->name('admin.brochurecategory.edit');
    Route::post('brochure_category/status-change/{id}', [DowloadBrochureCategoryController::class, 'statusChange'])->name('admin.brochurecategory.status-change');
    Route::post('brochure_category/update', [DowloadBrochureCategoryController::class, 'update'])->name('admin.brochurecategory.update');
    Route::post('brochure_category/store', [DowloadBrochureCategoryController::class, 'store'])->name('admin.brochurecategory.store');
    Route::get('brochure_category/remove/{id}', [DowloadBrochureCategoryController::class, 'remove'])->name('admin.brochurecategory.remove');

    // Download Brochure Form
    Route::get('brochure_form/list', [DowloadBrochureAndVisualadsController::class, 'brochurelist'])->name('admin.brochure_form.list');
    Route::get('brochure_form/remove/{id}', [DowloadBrochureAndVisualadsController::class, 'removebrochure'])->name('admin.brochure_form.remove');

    // Download Visual ads Form
    Route::get('visual_ads_form/list', [DowloadBrochureAndVisualadsController::class, 'visualeadslist'])->name('admin.visual_ads_form.list');
    Route::get('visual_ads_form/remove/{id}', [DowloadBrochureAndVisualadsController::class, 'visualeadsremove'])->name('admin.visual_ads_form.remove');

    // Dowload Visual Ads Category
    Route::get('visual_ads_category/list', [DowloadVisualAdsController::class, 'list'])->name('admin.visualadscategory.list');
    Route::get('visual_ads_category/add', [DowloadVisualAdsController::class, 'add'])->name('admin.visualadscategory.add');
    Route::get('visual_ads_category/edit/{id}', [DowloadVisualAdsController::class, 'edit'])->name('admin.visualadscategory.edit');
    Route::post('visual_ads_category/status-change/{id}', [DowloadVisualAdsController::class, 'statusChange'])->name('admin.visualadscategory.status-change');
    Route::post('visual_ads_category/update', [DowloadVisualAdsController::class, 'update'])->name('admin.visualadscategory.update');
    Route::post('visual_ads_category/store', [DowloadVisualAdsController::class, 'store'])->name('admin.visualadscategory.store');
    Route::get('visual_ads_category/remove/{id}', [DowloadVisualAdsController::class, 'remove'])->name('admin.visualadscategory.remove');

    Route::get('connect-form/list', [ConnectFormController::class, 'list'])->name('admin.connect-form.list');
    Route::get('connect-form/remove/{id}', [ConnectFormController::class, 'removeConnectForm'])->name('admin.connect-form.remove');

    Route::get('level-up-form/list', [ConnectFormController::class, 'levelUplist'])->name('admin.level-up-form.list');
    Route::get('level-up-form/remove/{id}', [ConnectFormController::class, 'removeLevelUpForm'])->name('admin.level-up-form.remove');



    Route::get('subscription-form/list', [SubscriptionFormController::class, 'list'])->name('admin.subscription-form.list');
    Route::get('subscription-form/remove/{id}', [SubscriptionFormController::class, 'remove'])->name('admin.subscription-form.remove');


    Route::get('letstalk-form/list', [LetsTalkFormControllerList::class, 'list'])->name('admin.letstalk-form.list');
    Route::get('letstalk-form/remove/{id}', [LetsTalkFormControllerList::class, 'remove'])->name('admin.letstalk-form.remove');


    Route::get('inquiry-form/list', [InquiryFormController::class, 'list'])->name('admin.inquiry-form.list');
    Route::get('inquiry-form/remove/{id}', [InquiryFormController::class, 'remove'])->name('admin.inquiry-form.remove');




    Route::get('footer/edit', [FooterController::class, 'edit'])->name('admin.footer.edit');
    Route::post('footer/update', [FooterController::class, 'update'])->name('admin.footer.update');
});

// Front Routes

    //Home
    Route::get('/', [FrontHomeController::class, 'index'])->name('front.home');
    Route::get('/company-profile', [AboutusController::class, 'companyProfile'])->name('front.company-profile');
    Route::get('/director-desk', [AboutusController::class, 'directorDesk'])->name('front.director-desk');
    Route::get('/corporate-office-tour', [AboutusController::class, 'corporateOfficeTour'])->name('front.corporate-office-tour');
    Route::get('/career', [FrontCareerController::class, 'index'])->name('front.career');
    Route::get('/award-and-certificate', [FrontAwardsCertificateController::class, 'index'])->name('front.award-and-certificate');
    Route::get('/contact-us', [FrontContactUsController::class, 'index'])->name('front.contact-us');
    Route::get('/products/{divisionID?}/{categoryId?}', [AboutusController::class, 'ourProducts'])->name('front.our-products');
    Route::get('/product-details/{id}', [AboutusController::class, 'productsDetails'])->name('front.product-details');
    Route::post('/fetch-categories', [AboutusController::class, 'fetchCategories'])->name('front.fetch-categories');
    Route::post('/fetch-new-products', [AboutusController::class, 'fetchNewProducts'])->name('front.fetch-new-products');

    Route::get('/new-launch', [FrontNewLaunchController::class, 'index'])->name('front.new-launch');
    Route::get('/new-launch-details/{id}', [FrontNewLaunchController::class, 'newLaunchDetails'])->name('front.new-launch-details');
    Route::get('/our-division', [FrontOurDivisionController::class, 'index'])->name('front.our-division');
    // Route::get('/our-division', [FrontOurDivisionController::class, 'getCategoryId'])->name('front.our-division.getCategoryId');
    Route::get('/our-division/{divisionID?}/{categoryId?}', [FrontOurDivisionController::class, 'showDivision'])->name('front.our-division.category');
    // Route::get('/our-division/{divId}/{divCategory}', [FrontOurDivisionController::class, 'ourDivision'])->name('front.our-division.ourDivision');
    // Route::get('/our-division/{divId}', [FrontOurDivisionController::class, 'getCategory'])->name('front.our-division.getCategory');
    Route::get('/filter-product', [FrontOurDivisionController::class, 'filterProducts'])->name('front.filterProducts');
    Route::post('/download_pdf', [FrontOurDivisionController::class, 'downloadPdf'])->name('front.our-division.downloadPdf');

    // Contact US Form
    Route::get('/contact-us-form', [ContactUsFormController::class, 'store'])->name('front.contact-us-form');
    Route::post('/connect-form', [ConnectFormController::class, 'store'])->name('front.connect-form');
    Route::get('/blogs', [FrontBlogController::class, 'index'])->name('front.blog');
    Route::get('/latestNews', [FrontLatestNewsController::class, 'index'])->name('front.latestNews');
    Route::get('/blogs-details/{id}', [FrontBlogController::class, 'details'])->name('front.blog-details');
    Route::get('/terms-and-conditions', [FrontTermsAndConditions::class, 'index'])->name('front.terms-and-conditions');
    Route::get('/download-pdf/{filename}', [FrontTermsAndConditions::class, 'downloadUserPDF'])->name('front.download.pdf');
    Route::get('/privacy-policy', [FrontPrivacyPolicyController::class, 'index'])->name('front.privacypolicy');
    Route::get('/events', [FrontEventsController::class, 'index'])->name('front.events');
    Route::get('/blog_details_form', [BlogDetailsFormController::class, 'index'])->name('front.blog_details_form');
    Route::get('/third-party-manufacturing', [FrontThirdPartyManufacturingController::class, 'store'])->name('front.third-party-manufacturing');

    Route::any('career-form/add', [CareerCurrentOpportunutiesController::class, 'add'])->name('admin.careerform.add');

    Route::any('brochure-dowload/add', [DowloadBrochureAndVisualadsController::class, 'addbrochure'])->name('front.addbrochure.add');
    Route::any('visual-ads-dowload/add', [DowloadBrochureAndVisualadsController::class, 'addvisualads'])->name('front.addvisualads.add');



    Route::get('/pcd-pharma-franchise', [FrontPCDPharmaFranchiseController::class, 'index'])->name('front.pcd-pharma-franchise');

    Route::get('/pcd-pharma-new-product', [FrontPCDPharmaFranchiseController::class, 'redirectNewLaunchPage'])->name('product.click');
    Route::post('/subscribe', [EmailSubscriptionController::class, 'store'])->name('subscribe');

    Route::post('/submit-inquiry', [SendInquiryFormController::class, 'store'])->name('submit.inquiry');

    Route::post('/submit-letstalk', [LetstalkFormController::class, 'store'])->name('submit.letstalk');



    //Footer




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
