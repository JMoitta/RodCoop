<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\AdministrativeRegion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $allAdministrativeRegion = AdministrativeRegion::all();
        $listAdministrativeRegion = array();
        foreach ($allAdministrativeRegion as $administrativeRegion) {
            $listAdministrativeRegion[$administrativeRegion->id] = $administrativeRegion->description;
        }
        return view('admin.users.edit', \compact('user', 'listAdministrativeRegion'));
    }
}
