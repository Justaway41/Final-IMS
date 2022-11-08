<?php

namespace App\Http\Controllers;

use MilanTarami\NepaliCalendar\Facades\NepaliCalendar;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $nepalidate = NepaliCalendar::AD2BS(Carbon::now()->toDateString());
        $nepaliMonth = $nepalidate["MM"];
        $nepaliYear = $nepalidate["YYYY"];
        $startdateandenddate = NepaliCalendar::bsMonthStartEndDates($nepaliMonth,  $nepaliYear);
        $firstdayofMonth = $startdateandenddate["start_date_of_month"];
        $lastdayofMonth = $startdateandenddate["end_date_of_month"];
        $firstdayofMonthinAD = NepaliCalendar::BS2AD($firstdayofMonth)["AD_DATE"];
        $lastdayofMonthinAD = NepaliCalendar::BS2AD($lastdayofMonth)["AD_DATE"];
        // dd($firstdayofMonthinAD, $lastdayofMonthinAD);
        $departments = Department::get();

        $worklogs = Auth::user()->MonthlyWorklogs;
        if (Auth::user()->role->title != "Intern") {
            return view('admin.dashboard', ['departments' => $departments]);
        }
        return view('dashboard', ['worklogs' => $worklogs]);
    }
}
