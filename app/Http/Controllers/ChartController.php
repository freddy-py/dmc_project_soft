<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;
use App\Charts\grapheUser;

class ChartController extends Controller
{
    public function index(){

        $today_users = DB::table('users')->whereDate('created_at', today())->count();
        $yesterday_users = DB::table('users')->whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago =DB::table('users')->whereDate('created_at', today()->subDays(2))->count();

        $chart = new grapheUser;
        $chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $chart->dataset('My dataset', 'bar', [$users_2_days_ago, $yesterday_users, $today_users]);

        return view('admin.graphes.chart', compact('chart'));
    }
}
