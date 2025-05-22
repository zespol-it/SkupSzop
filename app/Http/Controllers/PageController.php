<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function user()
    {
        $user = auth()->user();
        Log::info('User page accessed', [
            'user' => $user?->email,
            'roles' => $user?->roles->pluck('name'),
            'has_user_role' => $user?->hasRole(RoleEnum::USER->value),
        ]);

        if (!$user || !$user->hasRole(RoleEnum::USER->value)) {
            abort(403);
        }
        return view('pages.user');
    }

    public function admin()
    {
        $user = auth()->user();
        Log::info('Admin page accessed', [
            'user' => $user?->email,
            'roles' => $user?->roles->pluck('name'),
            'has_admin_role' => $user?->hasRole(RoleEnum::ADMIN->value),
        ]);

        if (!$user || !$user->hasRole(RoleEnum::ADMIN->value)) {
            abort(403);
        }
        return view('pages.admin');
    }
}
