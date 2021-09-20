<?php

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('teste', function () {
    $client = Client::first();

    $token = $client->createToken('token-teste');

    dd($token->plainTextToken);
});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        /**
         * Role x User
         */
        Route::get('users/{id}/roles/{idRole}/detach', 'ACL\RoleUserController@detachRolesUser')->name('users.roles.detach');
        Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
        Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
        Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
        Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');

        /**
         * Permission x Role
         */
        Route::get('roles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionsRole')->name('roles.permissions.detach');
        Route::post('roles/{id}/permissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
        Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
        Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
        Route::get('permissions/{id}/role', 'ACL\PermissionRoleController@roles')->name('permissions.roles');

        /**
         * Route Roles
         */
        Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
        Route::resource('roles', 'ACL\RoleController');

        /**
         * Route Tenants
         */
        Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
        Route::resource('tenants', 'TenantController');

        /**
         * Route Tables
         */
        Route::any('tables/search', 'TableController@search')->name('tables.search');
        Route::resource('tables', 'TableController');

        /**
         * Product x Category
         */
        Route::get('products/{id}/categories/{idCategory}/detach', 'CategoryProductController@detachCategoriesProduct')->name('products.categories.detach');
        Route::post('products/{id}/categories', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
        Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
        Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
        Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');

        /**
         * Route Products
         */
        Route::any('products/search', 'ProductController@search')->name('products.search');
        Route::resource('products', 'ProductController');

        /**
         * Route Categories
         */
        Route::any('categories/search', 'CategoryController@search')->name('categories.search');
        Route::resource('categories', 'CategoryController');

        /**
         * Route Users
         */
        Route::any('users/search', 'UserController@search')->name('users.search');
        Route::resource('users', 'UserController');

        /**
         * Plan x Profile
         */
        Route::get('plans/{id}/profiles/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilesPlan')->name('plans.profiles.detach');
        Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

        /**
         * Permission x Profile
         */
        Route::get('profiles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
        Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Route Permissions
         */
        Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
        Route::resource('permissions', 'ACL\PermissionController');

        /**
         * Route Profiles
         */
        Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
        Route::resource('profiles', 'ACL\ProfileController');

        /**
         * Routes Details Plan
         */
        Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
        Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
        Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
        Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

        /**
         * Routes Plans
         */
        Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::post('plans/', 'PlanController@store')->name('plans.store');
        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::get('plans', 'PlanController@index')->name('plans.index');

        /**
         * Home Dashboard
         */
        Route::get('/', 'PlanController@index')->name('admin.index');
    });

/**
 * Site
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

/**
 * Auth Routes
 */
Auth::routes();
