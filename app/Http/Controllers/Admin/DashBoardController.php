<?php

namespace App\Http\Controllers\Admin;

use App\Tenant\TenantScope;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function index()
    {
        $listUser = User::withoutGlobalScope(TenantScope::class)->paginate(5);
        return view('admin.index', \compact('listUser'));
    }
}
