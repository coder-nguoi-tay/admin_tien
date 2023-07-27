<?php

namespace App\Http\Controllers;

use App\Models\Accuracy;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Accuracy::leftjoin('company', 'company.id', 'accuracy.user_id')
            ->select('company.*', 'accuracy.status as status', 'accuracy.id as idAccuracy', 'accuracy.images as imagesAccuracy')
            ->orderBy('accuracy.status', 'ASC')->get();
        return view('company.index', [
            'title' => 'Danh sách công ty',
            'company' => $company,
        ]);
    }
    public function changeStatus($id)
    {
        try {
            $acc = Accuracy::query()->where('user_id', Company::query()->find($id)->id)->first();
            $acc->status = 1;
            $acc->save();
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back();
        }
    }
}
