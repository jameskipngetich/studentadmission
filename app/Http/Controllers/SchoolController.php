<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolController extends Controller
{
    //GETTING THE VIEW
    public function adminShowSchools(){
        $schools = School::all();
        return view('admin.schools.showSchool', compact(['schools']));
    }

    //ADDING SCHOOLS
    public function adminAddSchools(Request $request){
        $save = School::create($request->all());
        if ($save){
            Alert::success('Success','Data successfuly Saved');
            return redirect()->back();

        }else{
            Alert::error('Failed','Failed to save');
            return redirect()->back();
        }
    }

    //UPDATING SCHOOLS
    public function adminUpdateSchools(Request $request){
        $id = $request -> id;
        $update = School::find($id)->update($request->all());
        if($update){
            Alert::success('Success','Data successfuly Updated');
            return redirect()->back();
        }else{
            Alert::error('Failed','Could not update');
            return redirect()->back();
        }
    }

    //DELETING SCHOOLS
    public function adminDeleteSchools(Request $request){
        $id = $request -> id;
        $delete = School::find($id)->delete();
        if($delete){
            Alert::success('Success','Data successfuly Deleted');
            return redirect()->back();
        }else{
            Alert::error('Failed','Failed to Delete');
            return redirect()->back();
        }
    }
}
