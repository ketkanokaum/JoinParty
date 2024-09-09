<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\parties;
class AdminController extends Controller
{

  /*  public function checktype()
    {
        if(Auth::id()){

            $usertype = Auth::user()->usertype;
            if($usertype== 'user')
            {
                return view('dashboard');
            }
            else{
                return view('admin.dashboard');
            }
        }
    }*/

    public function index(){
        $parties=parties::all();
        return view("admin.dashboard",compact('parties'));
    }

    public function createParty(){
        return view("admin.create");
    }

    public function insert(Request $request){
        $new_Party = new parties;
        $new_Party->party_name = $request->party_name;
        $new_Party->date = $request->date;
        $new_Party->start_time = $request->start_time;
        $new_Party->end_time = $request->end_time;
        $new_Party->location = $request->location;
        $new_Party->type_party = $request->type_party;
        $new_Party->detail = $request->detail;
        $new_Party->numpeople = $request->numpeople;
        $new_Party->save();
        $parties=parties::all();
        return view("admin.create",compact('parties'));
    }
}


