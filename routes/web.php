<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserRegistration;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\CookieControllerForm;
use App\Http\Controllers\CookieController2;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\ProdController;
use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;

Route::get('/', function () {
    return view('welcome');
});

//Redirection using redirect
Route::get('redirect1',function(){
    return "This is redirected page";
});
Route::redirect('testredirect1','redirect1');

Route::get('redirect2/{name?}',function($name="LPU"){
    return $name;
})->name('r1');
Route::get('testredirect2',function(){
    return redirect()->route('r1');
});

Route::get('redirect3/{name?}',function($name="LPU"){
    return $name;
})->name('r3');
Route::get('testredirect3',function(){
    return redirect()->route('r3',["name"=>"Ashish"]);
});

Route::get('redirect4/{name?}/{profession?}',function($name="Ashu",$profession="Trainer"){
    return view('test1',["name"=>$name,"profession"=>$profession]);
});
Route::redirect('testredirect4','redirect4');


//headers
Route::get('/home1',function(){
    return response("Hey there!!!")
            ->header('X-Custom-Header-1','Value1')
            ->header('X-Custom-Header-2','Value2')
            ->header('X-Custom-Header-3','Value3');
});

//json headers
Route::get('jsonheaders',function(){
    return response()->json(['message'=>'This is a JSON response.'])
            ->header('X-Custom-Header-1','Value1');
});

Route::get('/first',[TestController::class,'index']);
Route::get('/item',[ItemController::class,'displayItem']);
Route::get('/item1/{itemname?}',[ItemController::class,'displayItem1']);
Route::get('/item2/{itemname?}',[ItemController::class,'displayItem2'])->name('controllerAction');
Route::get('/redirectToController',function(){
    return redirect()->route('controllerAction',['itemname'=>'Shoes']);
});
Route::get('/welcome1',function(){
    return view('welcome1',['name'=>'Samantha']);
});
Route::get('/allItems',[ItemController::class,'displayAllItems']);
Route::get('/single',SingleActionController::class);

//Redirection to external website
Route::get('/external',function(){
    return redirect()->away('https://ums.lpu.in/lpuums/');
});

// Sharing data globally with multiple views
// Route::get('/data1',function(){
//     return view('test1');
// });
// Route::get('/data2',function(){
//     return view('test2');
// });


Route::get('/switch/{i}',function($i){
    return view('switchCase',compact('i'));
});
Route::get('/isSet',[ItemController::class,'isSetFunction']);
Route::get('/empty',[ItemController::class,'emptyFunction']);

//blade template inheritance
Route::get('/home',function(){
    return view('home');
});
//Route::get('/products',[ItemController::class,'products']);
Route::get('/products',function(){
    $products=[["type"=>"Shirt","brand"=>"Gucci","price"=>1000],
                ["type"=>"Shoes","brand"=>"Woodlands","price"=>2400],
                ["type"=>"Trousers","brand"=>"ANC","price"=>3000]];
    return view('products',compact('products'));            
});

Route::get('/about',function(){
    return view('about');
});
Route::get('/contact',function(){
    return view('contact');
});
Route::get('student/{name}/{regno}',function($name,$regno){
    return "Welcome $name!!! Your reg no is $regno";
})->where('name','[aA-zZ]+')->where('regno','[0-9]+');

//Route named prefix
Route::name('admin.')->group(function(){
    Route::get('/use',function(){
        return "Hey User";
    })->name('users');
});
Route::get('adminredirect',function(){
    return redirect()->route('admin.users');
});

//middlewares
Route::get('/testmiddle',function(){
    return "Hello!I am testing middleware";
})->middleware([Test1::class,Test2::class]);

Route::middleware(Test1::class)->group(function(){
    Route::get('abc',function(){
        return "Hello abc!<br>";
    });
    Route::get('def',function(){
        return "Hello def!<br>";
    });
    Route::get('ghi',function(){
        return "Hello ghi!<br>";
    });
    Route::get('jkl',function(){
        return "Hello jkl!<br>";
    });
    Route::get('mno',function(){
        return "Hello mno!<br>";
    });
});

Route::get('/register',function(){
    return view('register');
});
Route::post('/postRegister',[UserRegistration::class,'postRegister']);

Route::get('/add',function(){
    return view('add');
});
Route::post('/postAdd',[UserRegistration::class,'postAdd']);

//cookies
Route::get('/setCookie',[CookieController::class,'setCookie']);
Route::get('/getCookie',[CookieController::class,'getCookie']);
Route::get('/deleteCookie',[CookieController::class,'deleteCookie']);

//form+cookie
Route::get('/setCookieForm',function(){
    return view('cookie');
});
Route::post('/postCookie',[CookieControllerForm::class,'setCookie']);
Route::get('/getCookieForm',[CookieControllerForm::class,'getCookie']);

//CookieController2
Route::get('/setCookie2',[CookieController2::class,'setCookie']);
Route::get('/getCookie2',[CookieController2::class,'getCookie']);
Route::get('/deleteCookie2',[CookieController2::class,'deleteCookie']);

//Sessions
Route::get('/session/get',[SessionController::class,'getSessionData'])->name('session.get');
Route::get('/session/set',[SessionController::class,'storeSessionData'])->name('session.set');
Route::get('/session/remove',[SessionController::class,'deleteSessionData'])->name('session.delete');
Route::get('validation',function(){
    return view('validation');
});
Route::post('/validate',[ValidationController::class,'index']);

//ORM->Object Relational Mapping
//QueryBuilder(DB Facade)

//you need to set DB_DATABASE= database_name in .env file in Laravel folder and then run "php artisan migrate" in the terminal. Your database will be created. After this you need to create table by running the command "php artisan make:migration create_products_table". Then check migrations folder in database directory. You will see a file called "...._create_products_table". In that include new fields. Then use "php artisan migrate". Then run you Xampp MySQL and then go to "http://localhost:8080/phpmyadmin" to see the table columns. Then make a model with "php artisan make:model Product". Then create resource controller using "php artisan make:controller ProdController --resource"
/*
Resource Controllers
GET /products (index) -- display all the records
GET /products/create (create) -- display the form to enter the data from the user
GET /products/1 (show) -- display a particular prod
POST /products (store) -- store the data into table
GET /products/1/edit (edit) -- open the form to update the data
PATCH /products/1 (update) -- update the record with ID 1
DELETE /products/1 (destroy) -- to delete specific product
*/
Route::resource('products', ProdController::class);

/*----------------------------------Ouery builder----------------------------------*/
//you need to set DB_DATABASE= database_name in .env file in Laravel folder and then run "php artisan migrate" in the terminal. Your database will be created. After this you need to create table by running the command "php artisan make:migration create_posts_table". Then check migrations folder in database directory. You will see a file called "...._create_posts_table". In that include new fields. Then use "php artisan migrate". Then run you Xampp MySQL and then go to "http://localhost:8080/phpmyadmin" to see the table columns. Also add "use Illuminate\Support\Facades\DB;" in PostController
Route::get('/posts',[PostController::class,'getAllPost'])->name('post.getallpost');
Route::get('/add-post',[PostController::class,'addPost'])->name('post.add');
Route::post('/add-post',[PostController::class,'addPostSubmit'])->name('post.addsubmit');
Route::get('/posts/{id}',[PostController::class,'getPostById'])->name('post.getById');
Route::get('/delete-post/{id}',[PostController::class,'deletePost'])->name('post.delete');
Route::get('/edit-post/{id}',[PostController::class,'editPost'])->name('post.edit');
Route::post('/update-post',[PostController::class,'updatePost'])->name('post.update');