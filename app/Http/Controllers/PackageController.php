<?php

namespace App\Http\Controllers;

use App\Models\jobAttractive;
use App\Models\LeverPackage;
use App\Models\Packageoffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = jobAttractive::query()->with('timeofer')->get();
        return view('package.index', [
            'package' => $package,
            'title' => 'Quản lý gói cước',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lever = LeverPackage::query()->select('id', 'name')->get();
        return view('package.create', [
            'title' => 'Thêm gói cước',
            'lever' => $lever,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'lever_package_id' => ['required'],
            'describe' => ['required'],
        ]);
        try {
            $request['lever_package'] =  $request->lever_package_id;
            $package = new jobAttractive();
            $package->fill($request->all());
            $package->save();
            return redirect()->route('package.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
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
        $lever = LeverPackage::query()->select('id', 'name')->get();
        return view('package.edit', [
            'package' => jobAttractive::query()->find($id),
            'lever' => $lever,
            'title' => 'Sửa gói cước' . jobAttractive::query()->find($id)->name
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
        $credentials = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'lever_package_id' => ['required'],
            'describe' => ['required'],
        ]);
        try {
            $request['lever_package'] =  $request->lever_package_id;
            $package = jobAttractive::query()->find($id);
            $package->fill($request->all());
            $package->save();
            return redirect()->route('package.index');
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
        Packageoffer::destroy($id);
        return back();
    }
}
