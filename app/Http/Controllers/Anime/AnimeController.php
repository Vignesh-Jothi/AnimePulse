<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Show\Show;

class AnimeController extends Controller
{
    public function animeDetails($id){
        $anime = Show::find($id);

        $randomanime =Show::select()->orderBy('id','desc')->take(5)->where('id','!=',$id)->get();

        return view('shows.anime-deatils',compact('anime','randomanime'));
    }



}
