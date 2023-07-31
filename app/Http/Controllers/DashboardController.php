<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\KeyUserSearch;
use App\Models\PaymentHistoryEmployer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // total doanh thu 
        $totalPrice = PaymentHistoryEmployer::query()->get()->pluck('price')->toArray();
        // total doanh thu  trong ngay
        $totalPriceOnDay = PaymentHistoryEmployer::query()->whereDay('created_at', Carbon::parse(Carbon::now())->format('d'))->get()->pluck('price')->toArray();
        // tong user
        $TotalUser  =  User::query()->count();
        // số lượng bv
        $totalJob = Job::query()->count();
        // từ khóa ttimf kiếm
        $keySearch = KeyUserSearch::query()->get();
        return view('index', [
            'totalPrice' => $totalPrice,
            'totalPriceOnDay' => $totalPriceOnDay,
            'TotalUser' => $TotalUser,
            'totalJob' => $totalJob,
            'keySearch' => $keySearch,
            'countPaymentMoth1' => $this->getPaymentMouth(1, $request->date_payment),
            'countPaymentMoth2' => $this->getPaymentMouth(2, $request->date_payment),
            'countPaymentMoth3' => $this->getPaymentMouth(3, $request->date_payment),
            'countPaymentMoth4' => $this->getPaymentMouth(4, $request->date_payment),
            'countPaymentMoth5' => $this->getPaymentMouth(5, $request->date_payment),
            'countPaymentMoth6' =>  $this->getPaymentMouth(6, $request->date_payment),
            'countPaymentMoth7' => $this->getPaymentMouth(7, $request->date_payment),
            'countPaymentMoth8' => $this->getPaymentMouth(8, $request->date_payment),
            'countPaymentMoth9' => $this->getPaymentMouth(9, $request->date_payment),
            'countPaymentMoth10' => $this->getPaymentMouth(10, $request->date_payment),
            'countPaymentMoth11' => $this->getPaymentMouth(11, $request->date_payment),
            'countPaymentMoth12' => $this->getPaymentMouth(12, $request->date_payment),
            'countNewMoth1' => $this->getNewMouth(1, $request->date_new),
            'countNewMoth2' => $this->getNewMouth(2, $request->date_new),
            'countNewMoth3' => $this->getNewMouth(3, $request->date_new),
            'countNewMoth4' => $this->getNewMouth(4, $request->date_new),
            'countNewMoth5' => $this->getNewMouth(5, $request->date_new),
            'countNewMoth6' =>  $this->getNewMouth(6, $request->date_new),
            'countNewMoth7' => $this->getNewMouth(7, $request->date_new),
            'countNewMoth8' => $this->getNewMouth(8, $request->date_new),
            'countNewMoth9' => $this->getNewMouth(9, $request->date_new),
            'countNewMoth10' => $this->getNewMouth(10, $request->date_new),
            'countNewMoth11' => $this->getNewMouth(11, $request->date_new),
            'countNewMoth12' => $this->getNewMouth(12, $request->date_new),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
