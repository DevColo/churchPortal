<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dept=DB::table('departments')->count();
        $member=DB::table('members')->count();
        $male=DB::table('members')->where('sex','=','male')->count();
        $female=DB::table('members')->where('sex','=','female')->count();
        $admin=DB::table('users')->count();
        $malePer = ($male/$member)* 100;
        $femalePer = ($female/$member)* 100;
        $tithe=DB::table('tithe')->sum('amount');
        return view('home', compact('dept','member','admin','male','malePer','female','femalePer','tithe'));
    }
}
