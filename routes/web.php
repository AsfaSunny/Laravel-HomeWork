<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{RoleController, HomeController, CategoryController};

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



//all the path check
Route::get('/', function () {
    return view('welcome');
});

Route::get('/loc', function () {
    return 'game begins';
});
//path check random ends here



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




//role controller starts
Route::get('/userrole', [RoleController::class, 'addform']); //just create kora controller er under e function create kore seta ekhane call kora holo
Route::post('role/add', [RoleController::class, 'store_role']); //for sending data and action ta post method e ache tai....
//role controller ends here





//category controllers starts:

Route::get('/category_create', [CategoryController::class, 'create']);
Route::post('/category/store', [CategoryController::class, 'store']);

// Route::get('/category/category_list', [CategoryController::class, 'index'])->name('category.list'); //ccategory list
//route name use korar advantage holo, route url joto lengthy hok na keno name ta use korar madhomme seta kichui mone hobe na, ete kore site link ke secure kora jay


Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete'); //soft delete or move to recycle bin
Route::get('category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed.list'); //trash bin show
Route::get('category/perdelete/{id}', [CategoryController::class, 'PermanentDelete'])->name('category.delete.permanent'); //permanent delete
Route::get('category/restore/{id}', [CategoryController::class, 'CategoryRestore'])->name('category.restore'); //restore
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit'); //edit
Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');






//group of route:
Route::group(['prefix'=>'category', /*'as'=>'account.'*/], function(){
    Route::get('category_list', [CategoryController::class, 'index'])->name('category.list'); //category list
}); //i don't like it btw.....

//category controllers ends here
