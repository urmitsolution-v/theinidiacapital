<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Projectasign;
use App\Models\Projectasignuser;
use App\Models\Projectstatus;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
class Teamcontroller extends Controller
{
    public function dashboard(){
          $data = Projectasign::join('projectasignuser', 'projectasignuser.project_id', '=', 'projectasign.id')
    ->where('projectasignuser.user_id', '=', Auth::user()->id)
    // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
    ->join('projects', 'projectasign.project_id', '=', 'projects.id')
    ->take(10)->get(['projectasignuser.*', 'projectasign.*','projectasignuser.id as asignid','projects.name as projectname']);
        return view('team/dashboard',compact('data'));
    }
    public function profile(Request $request){
        return view('team.profile');
    }
    public function team_projects(){

    // $data = Projectasignuser::where('user_id',Auth::user()->id)->get();

    $data = Projectasign::join('projectasignuser', 'projectasignuser.project_id', '=', 'projectasign.id')
    ->where('projectasignuser.user_id', '=', Auth::user()->id)
    // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
    ->join('projects', 'projectasign.project_id', '=', 'projects.id')
    ->get(['projectasignuser.*', 'projectasign.*','projectasignuser.id as asignid','projects.name as projectname']);
    
    
    //  $data = Projectasign::join('projectasignuser', 'projectasignuser.project_id', '=', 'projectasign.id')
    // ->where('projectasignuser.user_id', '=', Auth::user()->id)
    // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
    // ->join('projects', 'projectasign.project_id', '=', 'projects.id')
    // ->get(['projectasignuser.*', 'projectasign.*','projectasignuser.id as asignid','projectstatus.name as projectstatusname','projects.name as projectname']);
    
    
        return view('team.myprojects',compact('data'));
    }

    public function projectview_team($id){
        $row = Projectasign::find($id);
        if (isset($row)) {
            $datareal = DB::table('projectasignuser')->where('user_id',Auth::user()->id)->where('project_id',$id)->first();
            if (isset($datareal)) {
                return view('team.viewproject',compact('row'));
            }else{
                return redirect('/team/dashboard')->with('error','Invalid Url');
            }

        }else{
            return redirect('/team/dashboard')->with('error','Invalid Url');
        }
    }

}
