<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
        $routes->get('/', 'Home::index');
        // about
        $routes->get('about', 'Home::about');
        // contact
        $routes->get('contact', 'Contactus::index');
        $routes->post('contact', 'Contactus::contact_form');
         $routes->post('subscribe', 'Contactus::newsletter');
        
        
        // Recruiter register data
        $routes->get('Recruiter', 'RecruiterPost::Recruiter');  
        $routes->match(['get', 'post'], '/Recruiter', 'RecruiterPost::recruiterpost'); 
        //Recruiter update profile
        $routes->post('updateprofile', 'RecruiterProfile::updateprofile',  ['filter' => 'auth']);
        // Recruiter change password  
        $routes->post('changepassword', 'RecruiterProfile::changepassword',  ['filter' => 'auth']);
        // Recruiter edit profile
        $routes->get('profile', 'RecruiterProfile::index', ['filter' => 'auth']); 
        //Recruiter LOGIN PAGE
        $routes->match(['get', 'post'],'RecruiterLogin', 'RecruiterPost::RecruiterLogin');
        //Recruiter LOGOUT PAGE
        $routes->get('logout', 'RecruiterPost::logout');
       
        
        //logout
        // Recruiter Homepage 
        $routes->get('serviceinformation', 'RecruiterHome::index', ['filter' => 'auth']);  
        // recruiter job posting
        $routes->get('jobposting', 'RecruiterHome::RecruiterPost', ['filter' => 'auth']);
        // edit
        $routes->get('delete/(:num)', 'RecruiterHome::DelRecruiter/$1');
        //Equipment form
        $routes->get('Equipment', 'RecruiterEquipment::index', ['filter' => 'auth']);
        //Equipment form post
        $routes->post('equipmentform', 'RecruiterEquipment::EquipmentForm');
        //Space Equipment form
        $routes->get('Space', 'SpaceForm::index', ['filter' => 'auth']);
        //Space Equipment form post
        $routes->post('spaceform', 'SpaceForm::Spaceform');
        //manage posting jobs
        $routes->get('managejob', 'ManagePosting::index', ['filter' => 'auth']);
        //edit
        $routes->get('edit/(:num)', 'ManagePosting::EditPosting/$1');
        //manage equipment data
        $routes->get('managequipment', 'ManageEquipments::index', ['filter' => 'auth']);
        // manage space data
        $routes->get('Managespace', 'ManageSpace::index', ['filter' => 'auth']);
        // manage search  data
        $routes->get('simplesearch', 'SimpleSearch::index', ['filter' => 'auth']);
        // manage get simple search data
        $routes->post('SimpleSearching', 'SimpleSearch::SimpleSearching');
        // advance search
        $routes->get('AdvanceSearch', 'SimpleSearch::advancesearch', ['filter' => 'auth']);
        // saved serach
        $routes->get('SaveSearch', 'SimpleSearch::savesearch', ['filter' => 'auth']);
            // forget password
            $routes->match(['get', 'post'], 'updatepassword/(:any)', 'AjexCallback::updatepassword/$1');
            //city
            $routes->match(['get', 'post'], 'cities', 'AjexCallback::getcities');
            //forgot password
            $routes->match(['get', 'post'], 'forgetpassword/(:any)', 'AjexCallback::forgetpassword/$1');
            //applied jobs
            $routes->get('Applied', 'AjexCallback::appliedjobs');
            
        // Infrastructure register
        $routes->group('Infrastructure', static function ($routes) {
        $routes->get('Buy', 'InfrastructureBuy::index');
        $routes->get('Sell', 'InfrastructureSell::index');
        });
         $routes->post('Infrastructure/Sell', 'InfrastructureSell::SellSpace');
        
        $routes->get('Spacedetail/(:num)', 'InfrastructureBuy::Spaceseeker/$i');
        // equippment buy view description
        $routes->get('Spacedetails/(:num)', 'InfrastructureBuy::Spacerequiter/$i');
        
          $routes->get('spacedetails/(:num)', 'InfrastructureBuy::Spacesell/$i');
        
     
     
        // DASHBOARD
        
        $routes->get('RecruiterDashboard', 'RecruiterDashboard::index', ['filter' => 'auth']);
        // home page
        
        //sub users dashboard
        $routes->get('Dashboard', 'SubusresDashboard::index', ['filter' => 'auth']);
        
        $routes->get('RecruiterHomepage', 'RecruiterDashboard::recruiterhomepage',['filter' => 'auth']);
        //package
        $routes->get('packages', 'RecruiterPayment::index', ['filter' => 'auth']);
        
        // Job Seeking starting register page
        $routes->get('Jobseeker', 'JobseekerRegister::index');
        // job seeking profile
        $routes->get('JobProfile', 'JobseekerProfile::index',  ['filter' => 'auth']);
        // post job seeking profile
        $routes->post('seekerprofile', 'JobseekerProfile::updateprofile');
        
        // job seeking register
        $routes->post('RegisterJob', 'JobseekerRegister::Registerjobseeker');
        // job seeking login page
       
        
         $routes->match(['get', 'post'], 'jobseekinglogin', 'JobseekerRegister::JobSeekingLogin'); 
        
        
        // job seeker serach recruiter
        $routes->get('SearchRecruiter', 'RecruiterSearch::index',['filter' => 'auth']);
        // job searching
        
        $routes->get('JobSearching', 'JobSeekerSearch::index',['filter' => 'auth']);
        
        // job seeker jobdescription 
        $routes->match(['get', 'post'], 'jobdescription/(:any)', 'JobSeekerSearch::jobdescription/$1');
        // change the password 
        $routes->match(['get', 'post'],'Changepassword', 'JobSeekerPassword::index');
        
        $routes->post('changethepassword', 'JobSeekerPassword::changethepassword');
        // forget pasword
      
        
        // register job post data
        $routes->post('JobseekerRegister', 'JobseekerRegister::Registerjobseeker');
        // Job seeker Equipment
        $routes->get('JobSeekerEquipment', 'JobseekerEquipment::index', ['filter' => 'auth']);
        // save job seeker equipment data
        $routes->post('EquipmentjobForm', 'JobseekerEquipment::EquipmentForm');
        // job seeker space
        $routes->get('JobseekerSpace', 'JobseekerSpace::index', ['filter' => 'auth']); 
        // job seeker space post
        $routes->post('jobspaceform', 'JobseekerSpace::JobSpaceform'); 
        // job manage equipment
        $routes->get('ManageEquipment', 'JobManageEquipments::index', ['filter' => 'auth']);
        // manage space data
        $routes->get('ManageSpace', 'JobManageSpace::index', ['filter' => 'auth']);
        // search city state data
        $routes->get('searching', 'RecruiterSearch::getcities');
        // job seeker payment method
        
         $routes->get('JobseekerPayment', 'JobseekerPayment::index',['filter' => 'auth']);
         //home page recent jobs
          $routes->get('RecentJob', 'RecentJobs::index');
          
        $routes->get('RecentJob/(:any)-(:any)', 'RecentJobs::index/$1/$2');

         $routes->get('FeaturedJob', 'FeaturedJob::index');
         $routes->get('FeaturedJob/(:any)-(:any)', 'FeaturedJob::index/$1/$2');
         //equipment buy & sell
        // $routes->get('EquipmentBuy', 'EquipmentsProduct::index');
            $routes->get('Productdetail/(:num)', 'EquipmentsProduct::Productseeker/$i');
            
            $routes->get('Productdetails/(:num)', 'EquipmentsProduct::Productrequiter/$i'); 
            
            $routes->get('Productsdetail/(:num)', 'EquipmentsProduct::Productsell/$i'); 
        // equipment sell
        
        // job seeker lising home page
        $routes->get('CategoryListing', 'JobseekerList::index', ['filter' => 'auth']);
       

        
         // Equipment Sell Product
        
        // group function
        $routes->group('Equipment', static function ($routes) {
        $routes->Add('Sell', 'EquipmentSellProduct::index');
        $routes->Add('Buy', 'EquipmentsProduct::index');
        });
        
        
        $routes->post('Equipments/sell', 'EquipmentSellProduct::SellProduct');
        
        //signup pages
        $routes->Add('Register', 'Signup::index');
        $routes->post('Register', 'Signup::register');
         $routes->post('login', 'Signup::login');
        
        
    // recruiter all searching data
     //recruiter search form
        $routes->get('Search', 'RecruiterSimpleSearch::index', ['filter' => 'auth']);
        $routes->group('Search', ["filter" => "auth"], function ($routes) {
            $routes->get('Simple', 'RecruiterSimpleSearch::index');
            $routes->Add('Advance', 'RecruiterSimpleSearch::advancesearch');
            $routes->Add('Save', 'RecruiterSimpleSearch::savesearch');
        });
    //    send mail data

        $routes->get('Mail', 'RecruiterSimpleSearch::sendemail');

        $routes->get('Simplesearching', 'RecruiterSimpleSearch::SimpleSearching');
        $routes->get('Simplesearching/(:num)', 'RecruiterSimpleSearch::SimpleSearching/$i');
        $routes->get('Save/(:any)', 'RecruiterSimpleSearch::savesearch/$i');
        $routes->get('/candidate/profile/(:num)', 'RecruiterSimpleSearch::candidateprofile/$i');
        $routes->get('Savesearching/(:any)', 'RecruiterSimpleSearch::savesearchform/$i');

        // save searching monthly
        $routes->get('SaveMonthly(:any)', 'RecruiterSimpleSearch::savesearching/$i');
        // advance searching monthly
        $routes->get('advance', 'RecruiterSimpleSearch::advance');
        // recruiter home page
        $routes->get('RecruiterHomepage', 'RecruiterDashboard::recruiterhomepage',['filter' => 'auth']);
       
        $routes->get('header', 'Subuserheader::index', ['filter' => 'auth']);
        $routes->get('/', 'Subuserheader::header');
        
        $routes->get('categories(:any)', 'Home::categorylist/$i');
        
        $routes->get('findjobs', 'Findjobs::index', ['filter' => 'auth']);
        
         $routes->get('findsjob', 'Home::jobseekersearch');




        /*
        * Admin Routes
        */

        // Job Seeking starting register page
        $routes->post('Jobseeker', 'JobseekerRegister::addVisitorList');


        $routes->match(['get', 'post'], 'admin/login', 'Admin/HomeController::index'); 
        $routes->match(['get', 'post'], 'admin/dashboard', 'Admin/HomeController::dashboard',['filter' => 'authadmin']); 
        $routes->match(['get', 'post'], 'admin/logout', 'Admin/HomeController::logout'); 


        // Job seeker routes

        $routes->match(['get'], 'admin/jobseeker/list', 'Admin\JobseekerController::index',['filter' => 'authadmin']);
        $routes->match(['get'], 'admin/jobseeker/export', 'Admin\JobseekerController::export_pdf',['filter' => 'authadmin']);
        $routes->match(['get', 'post'], 'admin/jobseeker/add', 'Admin\JobseekerController::add',['filter' => 'authadmin']);
        $routes->match(['get', 'post'],'admin/jobseeker/detail/(:num)', 'Admin\JobseekerController::detail/$1',['filter' => 'authadmin']);
        $routes->match(['post'],'admin/jobseeker/getdata', 'Admin\JobseekerController::getdata',['filter' => 'authadmin']);
        $routes->match(['get'],'admin/jobseeker/delete/(:num)', 'Admin\JobseekerController::delete/$1',['filter' => 'authadmin']);
        $routes->match(['post'],'admin/jobseeker/importcsv', 'Admin\JobseekerController::importcsv',['filter' => 'authadmin']);
        $routes->match(['get'],'admin/visitor', 'Admin\JobseekerController::visitor_list',['filter' => 'authadmin']);
        $routes->match(['get','post'],'admin/jobseeker/bulk_email', 'Admin\JobseekerController::bulk_email',['filter' => 'authadmin']);

        // Recuiter routes

        $routes->match(['get'], 'admin/recruiter/list', 'Admin\RecruiterController::index',['filter' => 'authadmin']);
        $routes->match(['get', 'post'], 'admin/recruiter/add', 'Admin\RecruiterController::add',['filter' => 'authadmin']);
        $routes->match(['get', 'post'],'admin/recruiter/detail/(:num)', 'Admin\RecruiterController::detail/$1',['filter' => 'authadmin']);
        $routes->match(['get', 'post'],'admin/recruiter/update_password/(:num)', 'Admin\RecruiterController::update_password/$1',['filter' => 'authadmin']);
        $routes->match(['get', 'post'],'admin/recruiter/add_sub_user/(:num)', 'Admin\RecruiterController::add_sub_user/$1',['filter' => 'authadmin']);
        $routes->match(['get','post'],'admin/recruiter/delete/(:num)', 'Admin\RecruiterController::delete/$1',['filter' => 'authadmin']);
        $routes->match(['get','post'],'admin/recruiter/bulk_email', 'Admin\RecruiterController::bulk_email',['filter' => 'authadmin']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
