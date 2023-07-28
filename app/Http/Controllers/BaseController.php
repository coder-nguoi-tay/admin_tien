<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\PaymentHistoryEmployer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function getPaymentMouth($request, $year)
    {
        $date = $year ?? Carbon::parse(Carbon::now())->format('Y');
        return PaymentHistoryEmployer::where(function ($q) use ($request, $date) {
            $q->whereMonth('created_at', $request)
                ->whereYear('created_at', $date);
        })->get();
    }
    public function getNewMouth($request, $year)
    {
        $date = $year ?? Carbon::parse(Carbon::now())->format('Y');
        return Job::where(function ($q) use ($request, $date) {
            $q->whereMonth('created_at', $request)
                ->whereYear('created_at', $date);
        })->count();
    }
}
