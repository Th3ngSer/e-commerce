<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    /** @var \App\Models\User $user */
    $user = $request->user();

    return response()->json([
        'token' => $user->createToken('mobile')->plainTextToken,
    ]);
});

Route::get('/me', function (Request $request) {
    return $request->user()->load('roles');
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategory');
    Route::get('/{categoryId}', 'getCategory');
    Route::put('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory');
});

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'getProducts');
    Route::post('/', 'createProduct')->middleware('auth:sanctum');
    Route::get('/{productId}', 'getProduct');
    Route::put('/{productId}', 'updateProduct')->middleware('auth:sanctum');
    Route::delete('/{productId}', 'deleteProduct')->middleware('auth:sanctum');
});

Route::controller(StudentController::class)->prefix('students')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'index')->middleware('can:students.view');
    Route::post('/', 'store')->middleware('can:students.create');
    Route::get('/{studentId}', 'show')->middleware('can:students.view');
    Route::put('/{studentId}', 'update')->middleware('can:students.update');
    Route::delete('/{studentId}', 'destroy')->middleware('can:students.delete');
});


