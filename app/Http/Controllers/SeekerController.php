<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seeker = User::query()->select('id', 'name', 'images', 'email')->where('role_id', 1)->get();
        return view('seeker.index', [
            'seeker' => $seeker,
            'title' => 'Quản lý ứng viên',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::query()->find($id);
        return view('seeker.edit', [
            'title' => 'Sửa thông tin ứng viên ' . $user->name,
            'user' => $user,
        ]);
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
        try {
            $user = User::query()->find($id);
            $user->fill($request->all());
            $user->save();
            return redirect()->route('seeker.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back();
        }
    }
}
