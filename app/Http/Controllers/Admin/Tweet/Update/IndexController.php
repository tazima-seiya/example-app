<?php

namespace App\Http\Controllers\Admin\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TweetService;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tweetId = (int) $request->route('tweetId');
        if ($request->user()->role !== 10) {
            throw new AccessDeniedHttpException();
        }

        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        return view('tweet.update')->with('tweet', $tweet);
    }
}
