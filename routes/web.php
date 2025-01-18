<?php

use App\Http\Controllers\EntityController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/test', \App\Http\Controllers\TestController::class); */

/* Route::get('/users', [\App\Http\Controllers\UserController::class, 'showUsers']); */
/* Route::get('/users', \App\Http\Controllers\UserController::class); */

Route::get('/test', [\App\Http\Controllers\SimpleController::class, 'test']);

Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('/user', [\App\Http\Controllers\UserController::class, 'store'])->name('store-user');


Route::get('/books', [\App\Http\Controllers\EntityController::class, 'index'])->name('books');
Route::post('/books', [\App\Http\Controllers\EntityController::class, 'store'])->name('save_book');
Route::get('/remove_book/{id}', [\App\Http\Controllers\EntityController::class, 'delete'])->where(['id' => '[A-za-z0-9]+'])->name('remove_book');

Route::get('/upload', [\App\Http\Controllers\FileUploadController::class, 'index']);
Route::post('/upload', [\App\Http\Controllers\FileUploadController::class, 'upload'])->name('upload-file');

Route::get('/library_user/{id}', [\App\Http\Controllers\LibraryUserController::class, 'show'])->where(['id' => '[0-1]+']);

Route::get('/my_user', [\App\Http\Controllers\MyUserController::class, 'showUser']);


Route::get('/redirect_test', \App\Http\Controllers\TestRedirectController::class);

Route::get('/send_file', \App\Http\Controllers\SendFileController::class);

Route::get('/form', [\App\Http\Controllers\FormProcessor::class, 'index']);
Route::post('/form', [\App\Http\Controllers\FormProcessor::class, 'store']);


Route::get('/test_database', function () {
    $employee = new Employee();
    $employee->first_name = 'Peter';
    $employee->age = 21;
    $employee->save();
});


Route::get('/main', function () {
    return view('mainpage');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/users_list', function () {

    $users = ['Ivan', 'Petr', 'Nikolai', 'Vasily', 'Oleg'];

    return view('users_2', ['users' => $users]);
});

Route::get('/uppercase', function () {
    return view('testdir');
});

Route::get('/', function () {
    return view('home', [
        'name' => 'Max',
        'age' => 25,
        'position' => 'developer',
        'address' => 'Moscow',
    ]);
});

Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'Moscow',
        'post_code' => '000000',
        'email' => 'email@mail.com',
        'phone' => '89555555555',
    ]);
});



Route::get('/test_parameters', [\App\Http\Controllers\RequestTestController::class, 'testRequest']);

Route::get('/test_header', [\App\Http\Controllers\TestHeaderController::class, 'getHeader']);

Route::get('/test_cookie', [\App\Http\Controllers\TestCookieController::class, 'TestCookie']);

Route::get('/upload_file', [\App\Http\Controllers\FileUploadController_2::class, 'showForm'])->name('showForm');

Route::post('/upload_file', [\App\Http\Controllers\FileUploadController_2::class, 'fileUpload'])->name('uploadFile');


Route::post('/json_parse', [\App\Http\Controllers\JsonParseController::class, 'parseJson']);



Route::get('/worker_form', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('index');

Route::post('/worker_form', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('store');

Route::put('/worker_form/{id}', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('update');

Route::get('/form', [\App\Http\Controllers\TestFormController::class, 'displayForm'])->name('show_form');

Route::post('/form', [\App\Http\Controllers\TestFormController::class, 'postForm'])->name('post_form');


Route::post('/employee_2', [\App\Http\Controllers\EmployeeController_2::class, 'store'])->name('store_employee');

Route::get('/employee_2{id?}', [\App\Http\Controllers\EmployeeController_2::class, 'show'])->name('show_employee');




Route::get('security_test', [\App\Http\Controllers\TestSecurityController::class, 'show'])->name('show_security_form');

Route::post('security_test', [\App\Http\Controllers\TestSecurityController::class, 'post'])->name('show_security_form');


Route::get('test_validation', [\App\Http\Controllers\TestValidationController::class, 'show'])->name('show_validation_form');

Route::post('test_validation', [\App\Http\Controllers\TestValidationController::class, 'post'])->name('post_validation_form');



Route::get('book_form', [\App\Http\Controllers\BookController::class, 'show'])->name('show_book_form');

Route::post('book_form', [\App\Http\Controllers\BookController::class, 'store'])->name('post_book_form');



Route::get('test_url', function () {
    /* return "Test"; */

    /* $response = new Response('My content', 200);
    return $response; */

    /* return response('New test URL', 200)->header('X-HEADER-1', 'test')->header('Content-type', 'application/json'); */

    return redirect('/');
});


Route::get('/test_cookie', function () {
    return response('My first cookie')
        /* ->cookie('my_test_cookie_', 'test content', 5) */
        ->cookie('my_test_cookie_', 'test content', -1)
        ->withHeaders([
            'X-HEADER-TEST1' => 'IT WORKS!',
            'X-HEADER-TEST2' => 'IT WORKS!',
            'X-HEADER-TEST3' => 'IT WORKS!'
        ])
        ->withoutCookie('my_test_cookie2')

        /* ->header('Set-Cookie', "my_test_cookie2=10")
        ->header('X-HEADER-TEST1', 'IT WORKS!')
        ->header('X-HEADER-TEST2', 'IT WORKS!')
        ->header('X-HEADER-TEST3', 'IT WORKS!') */;
});




Route::get('/counter', function () {
    $counterValue = session('counter', 0);
    $counterValue++;
    session(['counter' => $counterValue,]);
    return 'ok';
});

Route::get('/result_counter', function () {
    /* return session('counter', 0); */
    if (session()->has('counter')) {
        session()->forget('counter');
    }


    var_dump(session()->all());
});

Route::get('/list_of_books', function () {
    $listOfBooks = session()->get('list_of_books', '');

    return response()->json(['status' => 'received', 'list_of_books' => $listOfBooks ? unserialize($listOfBooks) : 'The list is empty']);
});


Route::post('/list_of_books', function (Request $request) {
    $listOfBooks = session()->get('list_of_books', '');

    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];
    $listOfBooks[] = ['author' => $request->get('author'), 'title' => $request->get('title')];

    session()->put('list_of_books', serialize($listOfBooks));

    return response()->json(['status' => 'saved', 'list_of_books' => $listOfBooks]);
});



Route::get('/file_download', function () {
    /* return response()->download(base_path() . '/test.txt', 'my_test'); */
    return response()->streamDownload(function () {
        echo file_get_contents('https://google.com');
    }, 'google.html');
});

Route::get('/file_show', function () {
    return response()->file(base_path() . '/test.txt');
});




Route::get('/user_2', [\App\Http\Controllers\User2Controller::class, 'index']);

Route::get('/user_2/{id}', [\App\Http\Controllers\User2Controller::class, 'get']);

Route::post('/store-user_2', [\App\Http\Controllers\User2Controller::class, 'store'])->name('store-user_2');

Route::get('/resume', [\App\Http\Controllers\PdfGeneratorController::class, 'index']);
