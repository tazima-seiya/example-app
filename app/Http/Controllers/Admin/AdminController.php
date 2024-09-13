<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;
use App\Services\UserService;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, UserService $userService)
    {
        $users = $userService->getUsers(); // ユーザーの一覧を取得
        //dd(($users));
        return view('admin.index')
            ->with('users', $users);
    }
}
