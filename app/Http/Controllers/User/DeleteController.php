<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (!Gate::allows('admin', Auth::user()))
        {
            throw new AccessDeniedHttpException();
        }
        $userId = (int)$request->route('userId');
        $user = User::where('id', $userId)->firstOrFail();
        $user->delete();
        return redirect()
            ->route('tweet.admin.index')
            ->with('feedback.success', "ユーザーを削除しました");
    }
}
