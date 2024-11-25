<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Exports\DepartmentsExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\PDF;
use App\Imports\DepartmentsImports;

class DepartmentController extends Controller
{
    //
    public function adminShowDepartments(){
        $departments=Department::all();
        return view('admin.departments.showDepartments', compact(['departments']));
    }

    public function adminAddDepartment(request $request){
        $save=Department::create($request->all());
        if ($save){
            Alert::success('Success','Data saved');
            return redirect()->back();
        }else{
            Alert::error('Failed','Could Not save');
            return redirect()->back();
        }

    }
    public function adminUpdateDepartment(Request $request){
        $id=$request->id;
        $update=Department::find($id)->update($request ->all());
        if($update){
            alert()->success('Success','Data Updated');
            return redirect()->back();

        }else{
            alert()->error('Failed','Could not Update');
            return redirect()->back();
        }
    }


    public function adminDeleteDepartment(Request $request){
        $id=$request->id;
        $delete=Department::find($id)->delete();
        if($delete){
            alert()->success('Success','Data Deleted');
            return redirect()->back();

        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        }
    }

    public function adminExportDepartmentsAsExcel(){
        return Excel::download(new DepartmentsExport, 'departments.xlsx');
    }

    public function adminExportDepartmentsAsPdf(){
        $departments=Department::all();
        $pdf= Pdf::loadview('admin.departments.adminExportDepartmentsAsPdf',['departments'=>$departments]);
        return $pdf->download('departments.pdf');
    }

    public function adminImportDepartmentsData(Request $request){
        $file = $request->file('department_file');

        //import the date
        Excel::import(new DepartmentsImports, $file);

        return redirect()->back()->with('success', 'Departments Imported successsfully');
    } 
}
