<?php

use Illuminate\Support\Facades\Broadcast;

use App\Models\Chat;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat.{chatId}', function (User $user, $chatId) {
    $ids = [];
    foreach(Chat::find($chatId)->members as $member){
        array_push($ids, $member->user_id);
    }
    return in_array($user->id, $ids);
});
