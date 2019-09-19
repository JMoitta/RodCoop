<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\AdministrativeRegion;

use App\Tenant\TenantScope;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withoutGlobalScope(TenantScope::class)->find($id);
        $allAdministrativeRegion = AdministrativeRegion::all();
        $listAdministrativeRegion = array();
        $listAdministrativeRegion[0] = " ";                                                                     
        foreach ($allAdministrativeRegion as $administrativeRegion) {
            $listAdministrativeRegion[$administrativeRegion->id] = $administrativeRegion->description;
        }
        return view('admin.users.edit', \compact('user', 'listAdministrativeRegion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::withoutGlobalScope(TenantScope::class)->find($id);
        $administrative_region_id = $request->input('administrative_region_id');
        if($administrative_region_id == 0) {
            $user->administrative_region_id = null;
        } else {
            $user->administrative_region_id = $administrative_region_id;
        }
        $user->save();
        return redirect()->route('admin.index');
    }
}
