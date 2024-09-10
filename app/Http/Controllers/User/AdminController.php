<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweets = $tweetService->getTweets(); // つぶやきの一覧を取得
        return view('admin.index')
            ->with('tweets', $tweets);
    }
}
