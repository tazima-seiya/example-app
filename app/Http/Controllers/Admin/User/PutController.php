<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        //dd($request->method());
        if (!Gate::allows('admin', Auth::user()))
        {
            throw new AccessDeniedHttpException();
        }
        $userId = (int)$request->route('userId');
        $user = User::where('id', $userId)->firstOrFail();
        $user->name = $request->name() ?? $user->name;
        $user->email = $request->email() ?? $user->email;
        $user->save();
        return redirect()
            ->route('user.update.index', ['userId' => $user->id])
            ->with('feedback.success', "ユーザー情報を編集しました");
    }
}
