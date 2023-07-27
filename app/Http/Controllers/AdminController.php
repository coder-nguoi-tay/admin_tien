<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::query()->get();
        return view('admin.index', [
            'title' => 'Quản trị viên hệ thống',
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', [
            'title' => 'Thêm quản trị viên hệ thống'
        ]);
    }
    public function store(Request $request)
    {
        try {
            $request['password'] = Hash::make($request->password);
            $admin = new Admin();
            $admin->fill($request->all());
            $admin->save();
            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::query()->find($id);
        return view('admin.edit', [
            'title' => 'Sửa thông tin quan trị viên ' . $admin->name,
            'admin' => $admin,
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
            $request['password'] = Hash::make($request->password);
            $admin = Admin::query()->find($id);
            $admin->fill($request->all());
            $admin->save();
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return back();
    }
}
