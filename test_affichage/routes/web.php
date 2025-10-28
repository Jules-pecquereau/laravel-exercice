<?php


use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\UniversController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['langue'])->group(function () {
    Route::get("/", [UniversController::class,'index'])->name('/');
    Route::get("/AjouterForm", [UniversController::class,'create'])->name('Ajouter.form');
    Route::post("/AjouterForm",[UniversController::class,'store'])->name('Ajouter.store');
    Route::get("/logout", [UniversController::class , 'destroy'])->name('logout');
    Route::get('/univers/{id}/edit', [UniversController::class, 'edit'])->name('univers.edit');
    Route::put('/univers/{id}', [UniversController::class, 'update'])->name('univers.update');
    Route::delete('/univers/{id}', [UniversController::class, 'supprimer'])->name('univers.supprimer');
});


Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['fr', 'en'])) {
        Session::put('lang', $locale);
    }
    return redirect()->back();
});

Route::get('/test-mail', [UniversController::class, 'envoyerMail']);


require __DIR__.'/auth.php';
