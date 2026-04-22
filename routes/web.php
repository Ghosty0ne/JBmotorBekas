<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\Chat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('listing.index');
});

Route::get('/listing/create', [ListingController::class, 'create'])->name('listing.create');
Route::get('/listing', [ListingController::class, 'index'])->name('listing.index');
Route::get('/listing/{listing}', [ListingController::class, 'show'])->name('listing.show');
Route::get('/listing/{id}/comments', [ListingController::class, 'getComments'])->name('listing.comments');

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'inbox'])->name('chat.inbox');
    Route::get('/chat/{user_id}/{listing_id}', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/messages/{user_id}/{listing_id}', [ChatController::class, 'messages'])->name('chat.messages');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
    Route::get('/chat/unread-count', function () {
        return response()->json(['count' => Chat::where('receiver_id', auth()->id())->whereNull('read_at')->count()]);
    })->name('chat.unread');
    Route::post('/listing', [ListingController::class, 'store'])->name('listing.store');
    Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->name('listing.edit');
    Route::put('/listing/{listing}', [ListingController::class, 'update'])->name('listing.update');
    Route::delete('/listing/{listing}', [ListingController::class, 'destroy'])->name('listing.destroy');
    Route::post('/listing/{id}/like', [ListingController::class, 'like'])->name('listing.like');
    Route::post('/listing/{id}/comment', [ListingController::class, 'comment'])->name('listing.comment');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/my-listing', [ProfileController::class, 'myListing'])->name('my.listing');
    Route::get('/favorites', [ProfileController::class, 'myFavorite'])->name('favorites');

    Route::get('/report/{user_id}', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::get('/report-history/{report}', [ReportController::class, 'show'])->name('report.show');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/report/{report}', [AdminController::class, 'viewReport'])->name('view-report');
    Route::post('/report/{report}/review', [AdminController::class, 'reviewReport'])->name('review-report');
    Route::get('/blocked-users', [AdminController::class, 'blockedUsers'])->name('blocked-users');
    Route::post('/user/{user}/unblock', [AdminController::class, 'unblockUser'])->name('unblock-user');
    Route::delete('/user/{user}/delete', [AdminController::class, 'deleteUser'])->name('delete-user');
    Route::delete('/listing/{listing}/delete', [AdminController::class, 'deleteListing'])->name('delete-listing');
});
});

require __DIR__.'/auth.php';
