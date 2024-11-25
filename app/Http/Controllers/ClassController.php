<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Exports\ClassesExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\PDF;
use App\Imports\ClassesImport;

class ClassController extends Controller
{
    //
    public function adminShowClass(){
        $classes=Classe::all();
        return view('admin.classes.showClasses', compact(['classes']));
    }

    public function adminAddClass(request $request){
        $save=Classe::create($request->all());
        if ($save){
            Alert::success('Success','Data saved');
            return redirect()->back();
        }else{
            Alert::error('Failed','Could Not save');
            return redirect()->back();
        }

    }
    public function adminUpdateClass(Request $request){
        $id=$request->id;
        $update=Classe::find($id)->update($request ->all());
        if($update){
            alert()->success('Success','Data Updated');
            return redirect()->back();

        }else{
            alert()->error('Failed','Could not Update');
            return redirect()->back();
        }
    }


    public function adminDeleteClass(Request $request){
        $id=$request->id;
        $delete=Classe::find($id)->delete();
        if($delete){
            alert()->success('Success','Data Deleted');
            return redirect()->back();

        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        }
    }

    public function adminExportClassesAsExcel(){
        return Excel::download(new ClassesExport, 'classes.xlsx');
    }

    public function adminExportClassesAsPdf(){
        $classes=Classe::all();
        $pdf= Pdf::loadview('admin.classes.adminExportClassesAsPdf',['classes'=>$classes]);
        return $pdf->download('classes.pdf');
    }

    public function adminImportClassesData(Request $request){
        $file = $request->file('class_file');

        //import the date
        Excel::import(new ClassesImport, $file);

        return redirect()->back()->with('success', 'classes Imported successsfully');
    } 
}
