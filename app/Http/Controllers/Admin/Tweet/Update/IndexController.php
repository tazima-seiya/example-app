<?php

namespace App\Http\Controllers\Admin\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TweetService;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tweetId = (int) $request->route('tweetId');
        if (!Gate::allows('admin', Auth::user())) {
            throw new AccessDeniedHttpException();
        }

        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        return view('admin.tweet.update')->with('tweet', $tweet);
    }
}
