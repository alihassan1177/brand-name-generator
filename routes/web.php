<?php

use App\Http\Controllers\ChatGPTController;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::view('/', 'index', [
    'number_of_chars' => Config::where(['key' => 'number_of_chars'])->first(),
    'number_of_results' => Config::where(['key' => 'number_of_results'])->first(),
    'brand' => Config::where(['key' => 'brand'])->first(),
    'product' => Config::where(['key' => 'product'])->first(),
    'front_logo' => Config::where(['key' => 'front_logo'])->first(),
]);

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
    'brand' => Config::where(['key' => 'brand'])->first(),
    'product' => Config::where(['key' => 'product'])->first(),
    'front_logo' => Config::where(['key' => 'front_logo'])->first(),
])->middleware("auth");

Route::post('/config/update', function (Request $request) {
    $configurations = $request->only('number_of_chars', 'number_of_results', 'brand', 'product', 'front_logo');
    foreach ($configurations as $key => $value) {
        if ($key == "front_logo" && $request->file($key) != null) {
            $path = $request->file('front_logo')->move('uploads', time() . "-" . $request->file("front_logo")->getClientOriginalName());
            Config::updateOrCreate(
                ['key' => $key],
                ['value' => $path]
            );
        } else {
            Config::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
    return back()->with('success', 'Configurations saved successfully');
})->name('config.update');
