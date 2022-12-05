<?php

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

Route::get('/','HomeController@index');

Route::resource('admin','AdminController');

Route::resource('user','UserController')->middleware('checkAuth');

Route::resource('accounts_head','AccountsHeadController')->middleware('checkAuth');

Route::resource('employee','EmployeeController')->middleware('checkAuth');

Route::resource('transactions','TransactionController')->middleware('checkAuth');

Route::post('accountTypeByAjax','TransactionController@accountTypeByAjax')->middleware('checkAuth');

Route::post('lastPaymentByAjax','TransactionController@lastPaymentByAjax')->middleware('checkAuth');

Route::get('/employees_payment_history','EmployeeController@employees_payment_history')->middleware('checkAuth');

Route::get('animalList','AdminController@animal_list')->middleware('checkAuth');

Route::get('viewAnimalProfile/{id}','AdminController@view_animal_profile')->middleware('checkAuth');

Route::get('createAnimal','AdminController@create_animal')->middleware('checkAuth');

Route::post('storeAnimal','AdminController@store_animal')->middleware('checkAuth');

Route::get('editAnimal/{id}','AdminController@edit_animal')->middleware('checkAuth');

Route::get('inventory','AdminController@animal_inventory_list')->middleware('checkAuth');
Route::post('editAnimalStatus','AdminController@edit_animal_status_form')->middleware('checkAuth');
Route::post('updateAnimalStatus','AdminController@update_animal_status_form')->middleware('checkAuth');
Route::get('animalBreedList','AdminController@animal_breed_list')->middleware('checkAuth');
Route::get('createAnimalBreed','AdminController@create_animal_breed')->middleware('checkAuth');
Route::post('animalBreedStore','AdminController@store_animal_breed')->middleware('checkAuth');
Route::get('physicianList','AdminController@physician_list')->middleware('checkAuth');
Route::get('createPhysician','AdminController@create_physician')->middleware('checkAuth');
Route::post('physicianStore','AdminController@store_physician')->middleware('checkAuth');
Route::get('insemination','AdminController@insemination_list')->middleware('checkAuth');
Route::get('createInsemination','AdminController@create_insemination')->middleware('checkAuth');
Route::post('inseminationStore','AdminController@store_insemination')->middleware('checkAuth');
Route::get('inseminationCompanyList','AdminController@insemination_company_list')->middleware('checkAuth');
Route::get('createInseminationCompany','AdminController@create_insemination_company')->middleware('checkAuth');
Route::post('inseminationCompanyStore','AdminController@store_insemination_company')->middleware('checkAuth');
Route::get('bullList','AdminController@bull_list')->middleware('checkAuth');
Route::get('createBull','AdminController@create_bull')->middleware('checkAuth');
Route::post('bullStore','AdminController@store_bull')->middleware('checkAuth');
Route::get('animalHealth','AdminController@animal_health')->middleware('checkAuth');
Route::get('createHealth','AdminController@create_animal_health')->middleware('checkAuth');
Route::post('healthStore','AdminController@store_animal_health')->middleware('checkAuth');
Route::get('healthCondition','AdminController@animal_health_condition_list')->middleware('checkAuth');
Route::get('createHealthCondition','AdminController@create_animal_health_condition')->middleware('checkAuth');
Route::post('healthConditionStore','AdminController@store_animal_health_condition')->middleware('checkAuth');
Route::get('editHealthCondition/{id}','AdminController@edit_animal_health_condition')->middleware('checkAuth');
Route::get('medicine','AdminController@medicine_list')->middleware('checkAuth');
Route::get('createMedicine','AdminController@create_medicine')->middleware('checkAuth');
Route::post('medicineStore','AdminController@store_medicine')->middleware('checkAuth');
Route::get('foodInventory','AdminController@food_inventory_list')->middleware('checkAuth');
Route::get('createFoodInventory','AdminController@food_inventory_create')->middleware('checkAuth');
Route::post('storeFoodInventory','AdminController@food_inventory_store')->middleware('checkAuth');
Route::get('foodSupplier','AdminController@food_supplier_list')->middleware('checkAuth');
Route::get('yield','AdminController@yield_list')->middleware('checkAuth');
Route::post('rentalYieldList','AdminController@rental_yield_list')->middleware('checkAuth');
Route::post('ownYieldList','AdminController@own_yield_list')->middleware('checkAuth');
Route::get('animalFeeding','AdminController@animal_feeding_list')->middleware('checkAuth');
Route::get('createAnimalFeeding','AdminController@animal_feeding_create')->middleware('checkAuth');
Route::post('animalFeedingStore','AdminController@animal_feeding_store')->middleware('checkAuth');

Route::get('ledgerBalance','ReportsController@ledgerBalance')->middleware('checkAuth');

Route::get('ledgerAjaxResult','ReportsController@ledgerAjaxResult')->middleware('checkAuth');

Route::post('ledgerResultPdf','ReportsController@ledgerResultPdf')->middleware('checkAuth');

Route::get('profitLossStatement','ReportsController@profit_loss_statement')->middleware('checkAuth');

Route::get('profitLossAjaxResult','ReportsController@profit_loss_ajax_result')->middleware('checkAuth');

Route::get('trialBalance','ReportsController@trial_balance')->middleware('checkAuth');

Route::get('trialBalanceAjaxResult','ReportsController@trial_balance_ajax_result')->middleware('checkAuth');

Route::get('/dashboard','AdminController@dashboard')->middleware('checkAuth');

Route::get('/logout','AdminController@logout');
