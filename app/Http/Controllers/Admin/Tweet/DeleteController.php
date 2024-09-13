<?php

namespace App\Http\Controllers\Admin\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tweetId = (int) $request->route('tweetId');
        if (!Gate::allows('admin', Auth::user()))
        {
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        $tweet->delete();
        return redirect()
            ->route('admin.tweet.index')
            ->with('feedback.success', "つぶやきを削除しました");
    }
}
