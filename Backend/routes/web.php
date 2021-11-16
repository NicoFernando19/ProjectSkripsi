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
    $router->post('/password/reset/{token}', 'ResetPasswordController@postReset');

    //EMPLOYEE AUTHENTICATION
    $router->post('employee/login', ['uses' => 'Employee\EmployeeAuthController@login']);
    $router->get('employee/stats', ['uses' => 'Employee\EmployeeAuthController@me']);

    //API STATS
    $router->get('stats', ['uses' => 'AuthController@me']);
    
    //COMPANY
    $router->post('company/list', ['uses' => 'CompanyController@listCompany']);

    //COMPANY TYPE
    $router->get('company-type/list', ['uses' => 'CompanyTypeController@listCompanyType']);

    //ROLE
    $router->post('role/list', ['uses' => 'RoleController@listRole']);
});