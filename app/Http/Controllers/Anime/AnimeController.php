<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Show\Show;
use App\models\Comment\Comment;
use App\models\View\View;
use Auth;
use Redirect;

class AnimeController extends Controller
{
    public function animeDetails($id){
        $anime = Show::find($id);

        $randomanime =Show::select()->orderBy('id','desc')->take(5)->where('id','!=',$id)->get();

        $comments =comment::select()->orderBy('id','desc')->take(8)->where('show_id',$id)->get();
        $numberComments = comment::Where('show_id', $id)->count();
       

        if(isset(Auth::user()->id)){

             //Validating Views
            $validateViwes = View::where('user_id',Auth::user()->id)->Where('show_id', $id)->count();

            if($validateViwes == 0){    
                $views = View::create([
                    "show_id" =>$id,
                    "user_id" => Auth::user()->id,
               ]);
        }
        }
        $numberViwes = View::Where('show_id', $id)->count();

        return view('shows.anime-deatils',compact('anime','randomanime','comments','numberViwes','numberComments'));
    }

    public function insertComments(Request $request, $id){
        $anime = Show::find($id);
        
        $insertComments = Comment::create([
            "show_id" => $id,
            "user_name" =>Auth::user()->name,
            "image" => Auth::user()->image,
            "comment" => $request->comment
        ]);
        if($insertComments){
          
            return Redirect::route('anime-deatils',$id)->with(['message'=>'Comment Added SuccessFully.']);
        }

        // return view('shows.anime-deatils',compact('insertComments'));
    }



}
