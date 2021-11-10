<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PGPController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Chat\ConversationController;
use App\Http\Controllers\Chat\MakeFriendController;
use App\Http\Controllers\Chat\NotificationsController;
use App\Http\Controllers\Chat\SearchFriendController;
use App\Http\Controllers\Chat\UploadUserImgController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Home Routes
Route::prefix('home')->group(function () {
    Route::post('/login', [LoginController::class, 'userValidation'])->name('home.login');
    Route::post('/register', [RegisterController::class, 'register'])->name('home.register');
    Route::get('/get-test-message', [PGPController::class, 'getTestRegisterMessage'])
        ->name('home.test.register');
});

// Routes require auth
Route::middleware('auth')->group(function () {
    // Setting Routes
    Route::prefix('settings')->group(function () {
        Route::get('/log-out', [LoginController::class, 'logOut'])->name('settings.logOut');
    });

    Route::prefix('make-friend')->group(function () {
        Route::get('/search-friend', [SearchFriendController::class, 'search'])->name('search.friend');
        Route::post('/send-request', [MakeFriendController::class, 'sendRequest'])->name('friend.send.request');
    });

    Route::prefix('notifications')->group(function () {
        Route::post('/accept-friend-request', [NotificationsController::class, 'acceptFriendRequest'])
            ->name('accept.friend.request');
        Route::post('/remove-friend-request', [NotificationsController::class, 'removeFriendRequest'])
            ->name('remove.friend.request');
        Route::get('/reload-content', [NotificationsController::class, 'reloadContent'])
            ->name('notifications.reload');
    });

    Route::prefix('profile')->group(function () {
        Route::post('/upload-image', [UploadUserImgController::class, 'upload'])
            ->name('upload.user.image');
    });

    Route::prefix('conversation')->group(function () {
        Route::post('/open', [ConversationController::class, 'openConversation'])
            ->name('open.conversation');
        Route::post('/send-message', [ConversationController::class, 'sendMessage'])
            ->name('send.message');
        Route::post('/receive-message', [ConversationController::class, 'receiveMessage'])
            ->name('receive.message');
    });

    Route::prefix('chat')->group(function () {
        Route::get('/update-chat-list', [ChatController::class, 'updateChatList'])
            ->name('chat.list.user');
    });

    Route::prefix('pgp')->group(function () {
        Route::post('/save-private-keys', [PGPController::class, 'savePrivateKeys'])
            ->name('save.private.keys');
    });
});
