<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\parties;
use Illuminate\Support\Facades\DB;
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

    public function showUsers(){
        return view("admin.dashboard");
    }

    public function showUser(Request $rs){
            function sort_db($column, $sort){
                $rs =DB::table('users')
                ->select('id','email','created_at')
                ->orderby($column,$sort)
                ->get();
                return $rs;
        }
        if ($rs->sort == NULL || $rs->sort == "id asc") {
            $users = sort_db('users', "id", 'asc');
            $sort_by = 'id_lowToHigh';
        } else if ($rs->sort == "email asc") {
            $users = sort_db('users', "email", 'asc');
            $sort_by = 'email_lowToHigh';
    } else{
            $users = sort_db('users', "created_at", 'asc');
            $sort_by = 'created_at_lowToHigh';
    }
    return view("admin.dashboard",compact('users','sort_by'));
    }
}
//