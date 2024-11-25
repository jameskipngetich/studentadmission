<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\School;

class TrainerController extends Controller
{
    //
    public function adminShowTrainers(){
        $users = User::where('is_Trainer','yes')->get();
        $schools = School::all();
        return view('admin.users.showTrainer', compact(['users','schools']));
    }

    public function adminAddTrainers(Request $request){
        $save = User::create($request->all());
        if ($save){
            Alert::success('Success', 'Data saved');
            return redirect()->back();
        }else{
            Alert::error('Failed', 'Could not save');
            return redirect()->back();
        }
    }

    //UPDATING TRAINERS DATA
    public function adminUpdateTrainers(Request $request){
        $id = $request->id;
        $update = User::find($id)->update($request -> all());
        if($update){
            Alert::success('Success','Data successfuly Updated');
            return redirect()->back();
        }else{
            Alert::error('Failed','Could not update data');
            return redirect()->back();
        }
    }

    //DELETING TRAINERS DATA
    public function adminDeleteTrainers(Request $request){
        $id = $request->id;
        $delete = User::find($id)->delete();
        if($delete){
            Alert::success('Success','Data successfuly deleted');
            return redirect()->back();
        }else{
            Alert::error('Failed','Failed to delete');
            return redirect()->back();
        }
    }
}
?>