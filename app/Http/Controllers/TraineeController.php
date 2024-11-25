<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class TraineeController extends Controller
{
    //
    public function adminShowTrainees(){
        $users = User::where('is_Trainee','yes')->get();
        return view('admin.users.showTrainees',compact(['users']));
    }

    public function adminAddTrainees(Request $request){
        $save = User::create($request ->all());
        if ($save){
            Alert::success('Success', 'Data saved');
            return redirect()->back();
        }else{
            Alert::error('Failed', 'Failed to save data');
            return redirect()->back();
        }
    }
//UPDATING TRAINEES DATA
    public function adminUpdateTrainees(Request $request){
        $id = $request->id;
        $update = User::find($id)->update($request->all());
        if($update){
            Alert::success('Success','Data successfuly updated');
            return redirect()->back();
        }else{
            Alert::error('Failed','Could not update data');
            return redirect()->back();
        }
    }

    //DELETING TRAINEES DATA
    public function adminDeleteTrainees(Request $request){
        $id = $request->id;
        $delete = User::find($id)->delete();
        if($delete){
            Alert::success('Success','Data successfuly deleted');
            return redirect()->back();
        }else{
            Alert::error('Failed','Failed to delete data');
            return redirect()->back();
        }
    }
}
