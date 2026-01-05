<?php  
 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Billing\BillingAccountController;
use App\Http\Controllers\Api\ImageController;

// Route::middleware('auth:sanctum')->group(function () {

    Route::get('/billing-accounts', [BillingAccountController::class, 'index']);
    Route::post('/billing-accounts', [BillingAccountController::class, 'store']);
    Route::put('/billing-accounts/{id}', [BillingAccountController::class, 'update']);
    Route::delete('/billing-accounts/{id}', [BillingAccountController::class, 'destroy']);

// });

Route::post('/upload-image', [ImageController::class, 'upload']);



?>