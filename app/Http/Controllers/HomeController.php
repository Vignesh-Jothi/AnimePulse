<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show\Show;

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
        $shows = Show::select()->orderBy('id','desc')->take(4)->get();
        $trandingshows = Show::select()->orderBy('name','desc')->take(6)->get();
        $advantureshows = Show::select()->orderBy('name','desc')->take(6)->where('genere','Adventure')->get();
        $liveshows = Show::select()->orderBy('name','desc')->take(6)->where('genere','Action')->get();
        $recentshows = Show::select()->orderBy('id','desc')->take(6)->get();
        $foryoushows = Show::select()->orderBy('name','asc')->take(4)->get();
        
        return view('home', compact('shows','trandingshows','advantureshows','recentshows','liveshows','foryoushows'));
    }
}
