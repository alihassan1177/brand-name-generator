<?php

use App\Http\Controllers\ChatGPTController;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::view('/', 'index');
Route::post('/suggestions', [ChatGPTController::class, 'index'])->name('suggestions');

Route::view('/login', 'login')->middleware("guest")->name('login');
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    throw ValidationException::withMessages([
        'message' => "Incorrect Credentials",
    ]);
})->middleware("guest")->name('login.post');

Route::view('/admin', 'admin', [
    'number_of_chars' => Config::where(['key' => 'number_of_chars'])->first(),
    'number_of_results' => Config::where(['key' => 'number_of_results'])->first(),
])->middleware("auth");
Route::post('/config/update', function (Request $request) {
    $configurations = $request->only('number_of_chars', 'number_of_results');
    foreach ($configurations as $key => $value) {
        Config::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
    return back()->with('success', 'Configurations saved successfully');
})->name('config.update');
