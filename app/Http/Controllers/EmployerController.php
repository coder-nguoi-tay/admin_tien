<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer = Employer::query()->get();
        return view('employer.index', [
            'title' => 'Danh sách nhà tuyển dụng',
            'employer' => $employer,
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
        $employer = Employer::query()->find($id);
        return view('employer.edit', [
            'title' => 'Sửa thông tin nhà tuyển dụng ' . $employer->name,
            'employer' => $employer
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
            $employer = Employer::query()->find($id);
            $employer->fill($request->all());
            if (!$employer->save()) {
                return back();
            }
            $user = User::query()->find($employer->user_id);
            $user->email = $request->email;
            if (!$user->save()) {
                return back();
            }
            return redirect()->route('employer.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back();
        }
    }
}
