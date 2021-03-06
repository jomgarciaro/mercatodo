<?php

namespace App\Actions\Users;

use App\Contracts\AddInputUserLogs as Action;
use App\Models\User;
use App\Models\UserLog;

class AddInputUserLogs extends Action
{
    public static function execute(User $user, string $type): void
    {
        $userLog = new UserLog();
        $userLog->user_id = $user->id;
        $userLog->type = $type;
        $userLog->save();
    }
}
