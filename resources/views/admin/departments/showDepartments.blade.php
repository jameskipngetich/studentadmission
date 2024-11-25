@extends('layouts.master')
@section('content')
<!--header section-->
   
<div class="container-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <H1 class="m-0 text-dark">Departments</H1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('adminShowUsers')}}">Go back</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard></a></li>
                    <li class="breadcrumb-item active">Manage</li>
                </ol>
            </div>
        </div>
    </div>
</div>
   <!--END of header section-->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group1" style="float:right">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadDepartmentModal"><i class="fa fa-plus"></i>Upload File</button>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addDepartmentModal">
                                <i class="fa fa-plus"></i>
                                Add New Department
                            </button>
                            <a href="{{route('adminExportDepartmentsAsExcel')}}" class="btn btn-sm btn-secondary">Export Excel</a>
                            <a href="{{route('adminExportDepartmentsAsPdf')}}" class="btn btn-sm btn-info">Export pdf</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Department</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if(!empty($departments))
                                    @foreach($departments as $key=>$department)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$department->departmentname}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                                        Action 
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#"><h6>More action</h6></a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#updateDepartmentModal{{$department->id}}" href="#">Update</a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#deleteDepartmentModal{{$department->id}}" href="#">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--modal for updating department-->
                                        <div class="modal fade" id="updateDepartmentModal{{$department->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Update Department</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{route('adminUpdateDepartment')}}">
                                                        @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="id" value="{{$department->id}}" class="form-control" hidden="true">
                                                                <input type="text" name="departmentname" class="form-control" value="{{$department->departmentname}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>update</button>
                                                    </div>    
                                                    </form>
                                                </div>
                                            </div>
                                        </div> 
                                        <!--end of updating modal-->
                                        <!--Delete user modal-->
                                        <div class="modal fade" id="deleteDepartmentModal{{$department->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Are you sure you want to delete this record ?</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>


                                                    </div>
                                                    <form method="POST" action="{{route('adminDeleteDepartment')}}">
                                                    @csrf

                                                        <input type="text" name="id" value="{{$department->id}}" class="form-control" hidden="true">

                                                    <div class="modal-footer justify-content-between">
                                                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                                                        <button  type="submit" class="btn btn-success"><i class="fa fa-trash"></i>Delete</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of delete user modal-->
                                    @endforeach
                                @else
                                    <p>No departments to show</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Modal for adding departments-->
<div class="modal fade" id="addDepartmentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Add Department</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('adminAddDepartment')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" name="departmentname" class="form-control" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end of adding departments modal-->
<!--upload of Departments data modal-->
<div class="modal fade" id="uploadDepartmentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Upload Departments</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="{{route('adminImportDepartmentsData')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select File</label>
                            <input type="file" name="department_file" class="form-control"  required>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                <button  type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>Save</button>
            </div>
            
            </form>
        </div>
    </div>
</div>
<!--end of upload department modal-->
@endsection