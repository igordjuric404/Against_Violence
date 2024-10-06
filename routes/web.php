<?php

use App\Http\Controllers\AnonymousPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EvidenceFileController;
use App\Http\Controllers\IpAddressControler;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SafeSpotsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('homepage',[
        'title'=>'Sigurni kutak'
    ]);
})->name('homepage');

Route::get('/sigurna-mesta', function () {
    return view('safe-spots',[
        'title'=>'Sigurna mesta'
    ]);
})->name('safe-spots');

Route::get('/verifikacija-whatsapp-poruka', function () {
    return view('extension',[
        'title'=>'Verifikacija WhatsApp poruka'
    ]);
})->name('extension');

Route::get('/policija', function () {
    return view('policija',[
        'title'=>'Policija'
    ]);
})->name('policija');

Route::get('/centar-za-socijalni-rad', function () {
    return view('socijalni-rad',[
        'title'=>'Centar za socijalni rad'
    ]);
})->name('socijalni-rad');

Route::get('/zdravstvena-ustanova', function () {
    return view('zdravstvena-ustanova',[
        'title'=>'Zdravstvena ustanova'
    ]);
})->name('zdravstvena-ustanova');

Route::get('/tuzioc', function () {
    return view('tuzioc',[
        'title'=>'Tuzioc'
    ]);
})->name('tuzioc');


Route::get('/nasilje', function () {
    return view('nasilje',[
        'title'=>'Sta je nasilje'
    ]);
})->name('nasilje');

Route::get('/prepoznati', function () {
    return view('prepoznati',[
        'title'=>'Kako prepoznati nasilje'
    ]);
})->name('prepoznati');

Route::get('/zasto-trpi', function () {
    return view('zasto-trpi',[
        'title'=>'Zasto trpi nasilje'
    ]);
})->name('zasto-trpi');

Route::get('/kontakt-sigurnih-mesta', [SafeSpotsController::class, 'index'])->name('safe-spots-contact');


Route::get('/verifikacija-drugih-dokaza', function () {
    return view('icanprove',[
        'title'=>'Verifikacija drugih dokaza'
    ]);
})->name('icanprove');


Route::get('/dashboard', function () {
    return redirect()->route('homepage');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::name('user.')->group(function () {
            Route::middleware('role:admin')->group(function () {
                Route::get('/list', 'list')->name('list');
                Route::get('/destroy{id}', 'destroy')->name('destroy');
            });
            Route::middleware('role:user|admin')->group(function () {
                Route::get('/set-encryption-key','showEncryptionKeyForm')->name('showEncryptionKeyForm');
                Route::post('/set-encryption-key', 'setEncryptionKey')->name('setEncryptionKey');
            });
        });
    });
});
Route::prefix('/post')->group(function () {
    Route::controller(AnonymousPostController::class)->group(function () {
        Route::name('post.')->group(function () {
            Route::middleware('role:admin')->group(function () {
                Route::get('/list', 'list')->name('list');
                Route::get('/publish/{id}', 'publish')->name('publish');
                Route::get('/unpublish/{id}', 'unpublish')->name('unpublish');
                Route::get('/ban-ip/{id}', 'banIp')->name('ban-ip');
                Route::get('/delete/{id}', 'destroy')->name('destroy');
            });

            Route::middleware('role:user|admin')->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');

                Route::get('/like/{id}', 'like')->name('like');
                Route::get('/dislike/{id}', 'dislike')->name('dislike');
            });
            
            Route::get('/posts', 'most_liked')->name('most-liked');
            Route::get('/newest', 'newest')->name('newest');
            Route::get('/show/{id}', 'show')->name('show');
        });
    });
});

Route::prefix('/comment')->group(function () {
    Route::controller(CommentController::class)->group(function () {
        Route::name('comment.')->group(function () {
            Route::middleware('role:admin')->group(function () {
                Route::get('/list', 'list')->name('list');
                Route::get('/ban-ip/{id}', 'banIp')->name('ban-ip');
                Route::get('/delete/{id}', 'destroy')->name('destroy');
            });
            Route::middleware('role:user|admin')->group(function () {
                Route::post('/comment/{id}', 'comment')->name('comment');
                Route::post('/reply/{id}', 'reply')->name('reply');
                Route::get('/like/{id}', 'like')->name('like');
                Route::get('/dislike/{id}', 'dislike')->name('dislike');
            });
        });
    });
});

Route::prefix('/ip')->group(function () {
    Route::controller(IpAddressControler::class)->group(function () {
        Route::name('ip.')->group(function () {
            Route::middleware('role:admin')->group(function () {
                Route::get('/list', 'list')->name('list');
                Route::get('/unban-ip/{id}', 'unban')->name('unban');
            });
        });
    });
});

Route::prefix('/evidence-file')->group(function () {
    Route::controller(EvidenceFileController::class)->group(function () {
        Route::name('evidence-file.')->group(function () {
            Route::middleware('role:user|admin')->group(function () {
                Route::get('/moj-kutak', 'index')->name('index');
                Route::post('/moj-kutak/upload', 'upload')->name('upload');
                Route::post('/moj-kutak/download/{id}', 'download')->name('download');
            });
        });
    });
});

require __DIR__.'/auth.php';
