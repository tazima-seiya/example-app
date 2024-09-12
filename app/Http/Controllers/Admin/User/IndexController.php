<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
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

        return view('admin.update')
            ->with('user', $user);
    }
}
