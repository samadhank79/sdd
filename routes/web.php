<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SenderController;
use App\Http\Controllers\RecipienstController;
use App\Http\Controllers\NatureInfoController;
use App\Http\Controllers\UpsiController;
use App\Http\Controllers\MemberRegController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//Landing Controller
use Illuminate\Support\Facades\Hash;
use App\Models\DbUser;



Route::get('/',function(){

	$user = DbUser::all();
	foreach($user as $u){
		if($u->email == 'admin@gmail.com'){
			return redirect('/login');
		}
	}

	DbUser::updateOrCreate([
		'email' => 'admin@gmail.com'
	],[
		'name' => 'Admin',
		'email' => 'admin@gmail.com',
		'password' => Hash::make('admin@123'),
		'role'=>'Admin',
		'designation' => 'Admin',
		'status' => 'active',
	]);
});

Route::get('/activation ', [LandingController::class, 'Activation'])->name('activation');
Route::post('/activation ', [LandingController::class, 'Activation'])->name('activation');

Route::get('/login',[LandingController::class,'Login'])->name('login');

Route::post('/login',[LandingController::class,'Login'])->name('login');
Route::get('/register',[LandingController::class,'Register'])->name('register');
Route::get('DataflowReportAdmin/{name}',[LandingController::class,'DataFlow'])->name('dataflow');
Route::get('viewdataflow/{id}',[LandingController::class,'ViewDataFlow'])->name('viewdataflow');
Route::get('AudittrailReportAdmin/{name}',[LandingController::class,'Audit'])->name('audit');


Route::get('/logout',[LandingController::class,'Logout'])->name('logout');
Route::get('/changepassword',[LandingController::class,'ChangePassword'])->name('changepassword');
Route::post('/changepassword',[LandingController::class,'ChangePassword'])->name('changepassword');




//Senders



Route::get('/dashboard', [LandingController::class, 'Home'])->name('dashboard');
Route::get('/senders', [SenderController::class, 'Home'])->name('senders');
Route::get('/senders/add', [SenderController::class, 'Add'])->name('addsender');
Route::post('/senders/add', [SenderController::class, 'Add'])->name('addsender');
Route::get('/senders/list', [SenderController::class, 'List'])->name('listsender');
Route::get('/senders/edit/{id}', [SenderController::class, 'Edit'])->name('editsender');
Route::post('/senders/edit/{id}', [SenderController::class, 'Edit'])->name('editsender');
Route::get('/senders/delete/{id}', [SenderController::class, 'Delete'])->name('deletesender');

//Reciepnist

Route::get('/recipienst', [RecipienstController::class, 'Home'])->name('recipienst');
Route::get('/recipienst/list', [RecipienstController::class, 'List'])->name('listrecipienst');
Route::get('/recipienst/add', [RecipienstController::class, 'Add'])->name('addrecipienst');
Route::post('/recipienst/add', [RecipienstController::class, 'Add'])->name('addrecipienst');
Route::get('/recipienst/edit/{id}', [RecipienstController::class, 'Edit'])->name('editrecipienst');
Route::post('/recipienst/edit/{id}', [RecipienstController::class, 'Edit'])->name('editrecipienst');
Route::get('/recipienst/delete/{id}', [RecipienstController::class, 'Delete'])->name('deleterecipienst');

//natureinfo

Route::get('/natureinfo', [NatureInfoController::class, 'Home'])->name('natureinfo');
Route::get('/natureinfo/list', [NatureInfoController::class, 'List'])->name('listnatureinfo');
Route::get('/natureinfo/add', [NatureInfoController::class, 'Add'])->name('addnatureinfo');
Route::post('/natureinfo/add', [NatureInfoController::class, 'Add'])->name('addnatureinfo');
Route::get('/natureinfo/edit/{id}', [NatureInfoController::class, 'Edit'])->name('editnatureinfo');
Route::post('/natureinfo/edit/{id}', [NatureInfoController::class, 'Edit'])->name('editnatureinfo');
Route::get('/natureinfo/delete/{id}', [NatureInfoController::class, 'Delete'])->name('deletenatureinfo');


//Member Registration

Route::get('/member', [MemberRegController::class, 'Home'])->name('member');
Route::get('/member/list', [MemberRegController::class, 'List'])->name('listmember');
Route::get('/member/add', [MemberRegController::class, 'Add'])->name('addmember');
Route::post('/member/add', [MemberRegController::class, 'Add'])->name('addmember');
Route::get('/member/edit/{id}', [MemberRegController::class, 'Edit'])->name('editmember');
Route::post('/member/edit/{id}', [MemberRegController::class, 'Edit'])->name('editmember');
Route::get('/member/delete/{id}', [MemberRegController::class, 'Delete'])->name('deletemember');

//Upsi

Route::get('/upsi', [UpsiController::class, 'Home'])->name('upsi');
Route::get('/upsi/list', [UpsiController::class, 'List'])->name('listupsi');
Route::get('/upsi/add', [UpsiController::class, 'Add'])->name('addupsi');
Route::post('/upsi/add', [UpsiController::class, 'Add'])->name('addupsi');
Route::get('/upsi/edit/{id}', [UpsiController::class, 'Edit'])->name('editupsi');
Route::post('/upsi/edit/{id}', [UpsiController::class, 'Edit'])->name('editupsi');
Route::get('/upsi/delete/{id}', [UpsiController::class, 'Delete'])->name('deleteupsi');
Route::get('/upsi/view/{id}', [UpsiController::class, 'View'])->name('viewupsi');


Route::get('/upsi/preupsiadd', [UpsiController::class, 'PreUpsiAdd'])->name('preupsiadd');
Route::post('/upsi/preupsiadd', [UpsiController::class, 'PreUpsiAdd'])->name('preupsiadd');



// Route::get('upsi/upsistep2', [UpsiController::class, 'UpsiStep2'])->name('upsiStep2');
// Route::post('upsi/upsistep2', [UpsiController::class, 'UpsiStep2'])->name('upsiStep2');


// Route::get('upsi/upsistep3', [UpsiController::class, 'UpsiStep3'])->name('upsiStep3');
// Route::post('upsi/upsistep3', [UpsiController::class, 'UpsiStep3'])->name('upsiStep3');


// Route::get('upsi/upsistep4', [UpsiController::class, 'UpsiStep4'])->name('upsiStep4');
// Route::post('upsi/upsistep4', [UpsiController::class, 'UpsiStep4'])->name('upsiStep4');

// Route::get('upsi/upsistep5', [UpsiController::class, 'UpsiStep5'])->name('upsiStep5');




