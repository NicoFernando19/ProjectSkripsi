<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) 
{
    //AUTHENTICATION
    $router->post('login', ['uses' => 'AuthController@login']);
    $router->post('register', ['uses' => 'AuthController@Register']);

    //RESET PASSWORD
    $router->post('/password/email', 'ResetPasswordController@postEmail');
    $router->post('/password/reset', 'ResetPasswordController@postReset');

    //EMPLOYEE AUTHENTICATION
    $router->post('employee/login', ['uses' => 'Employee\EmployeeAuthController@login']);
    $router->get('employee/stats', ['uses' => 'Employee\EmployeeAuthController@me']);

    //API STATS
    $router->get('stats', ['uses' => 'AuthController@me']);
    
    //COMPANY
    $router->get('company/list', ['uses' => 'CompanyController@listCompany']);
    $router->post('company/create', ['uses' => 'CompanyController@create']);
    $router->get('company/getData/{id}', ['uses' => 'CompanyController@showById']);
    $router->put('company/update/{id}', ['uses' => 'CompanyController@update']);
    $router->delete('company/delete/{id}', ['uses' => 'CompanyController@destroy']);

    //COMPANY TYPE
    $router->get('company-type/list', ['uses' => 'CompanyTypeController@listCompanyType']);
    $router->post('company-type/create', ['uses' => 'CompanyTypeController@create']);
    $router->get('company-type/getData/{id}', ['uses' => 'CompanyTypeController@showById']);
    $router->put('company-type/update/{id}', ['uses' => 'CompanyTypeController@update']);
    $router->delete('company-type/delete/{id}', ['uses' => 'CompanyTypeController@destroy']);

    //VACANCY
    $router->get('vacancy/list', ['uses' => 'VacancyController@listVacancy']);
    $router->post('vacancy/create', ['uses' => 'VacancyController@create']);
    $router->get('vacancy/getData/{id}', ['uses' => 'VacancyController@showById']);
    $router->put('vacancy/update/{id}', ['uses' => 'VacancyController@update']);
    $router->put('vacancy/update-status/{id}', ['uses' => 'VacancyController@updateVacancyStatus']);
    $router->delete('vacancy/delete/{id}', ['uses' => 'VacancyController@destroy']);

    //TRANSACTION
    $router->get('transaction/list', ['uses' => 'JoinedCompanyController@listlistJoinedCompany']);
    $router->post('transaction/create', ['uses' => 'JoinedCompanyController@create']);
    $router->get('transaction/getData/{id}', ['uses' => 'JoinedCompanyController@showById']);
    $router->put('transaction/update/{id}', ['uses' => 'JoinedCompanyController@update']);
    $router->delete('transaction/delete/{id}', ['uses' => 'JoinedCompanyController@destroy']);

    //ROLE
    $router->get('role/list', ['uses' => 'RoleController@listRole']);
    $router->post('role/create', ['uses' => 'RoleController@create']);
    $router->get('role/getData/{id}', ['uses' => 'RoleController@showById']);
    $router->put('role/update/{id}', ['uses' => 'RoleController@update']);
    $router->delete('role/delete/{id}', ['uses' => 'RoleController@destroy']);

    //CONTRACT
    $router->post('contract/create', ['uses' => 'ContractController@create']);
    $router->get('contract/index', ['uses' => 'ContractController@index']);
    $router->get('contract/detail/{id}', ['uses' => 'ContractController@showById']);
    $router->put('contract/update/{id}', ['uses' => 'ContractController@update']);
    $router->delete('contract/delete/{id}', ['uses' => 'ContractController@destroy']);

    // WORK HISTORY
    $router->get('work-history/list', ['uses' => 'WorkHistoryController@listWorks']);
    $router->post('work-history/create', ['uses' => 'WorkHistoryController@create']);
    $router->get('work-history/getData/{id}', ['uses' => 'WorkHistoryController@showById']);
    $router->put('work-history/update/{id}', ['uses' => 'WorkHistoryController@update']);
    $router->delete('work-history/delete/{id}', ['uses' => 'WorkHistoryController@destroy']);

    //NOTIFICATION
    $router->get('notification/list', ['uses' => 'Notifications\NotificationsController@listNotif']);


    // JOIN VACANCY
    $router->post('join/vacancy/{vacancyid}', ['uses' => 'ApplyVacancyController@joined']);

    //UPLOAD FILE
    $router->post('upload/company-interest/file', ['uses' => 'DocumentUpload\DocumentController@uploadFile']);
});