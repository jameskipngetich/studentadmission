@extends('layouts.master')
@section('content')
<!--header section-->
   
<div class="container-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <H1 class="m-0 text-dark">Schools</H1>
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
                            
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addDepartmentModal">
                                <i class="fa fa-plus"></i>
                                Add New School
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>School Name</th>
                                <th>Contact Person</th>
                                <th>Address</th>
                                <th>School Location</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if(!empty($schools))
                                    @foreach($schools as $key=>$school)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$school->schoolName}}</td>
                                            <td>{{$school->contactPerson}}</td>
                                            <td>{{$school->contactDetails}}</td>
                                            <td>{{$school->schoolLocation}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                                        Action 
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#"><h6>More action</h6></a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#updateDepartmentModal{{$school->id}}" href="#">Update</a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#deleteDepartmentModal{{$school->id}}" href="#">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--modal for updating department-->
                                        <div class="modal fade" id="updateDepartmentModal{{$school->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Update School</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{route('adminUpdateSchools')}}">
                                                        @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="text" name="id" value="{{$school->id}}" class="form-control" hidden="true">
                                                                <label for="schoolName">School Name</label>
                                                                <input type="text" name="schoolName" class="form-control" value="{{$school->schoolName}}" required>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="contactPerson">Contact Person</label>
                                                                <input type="text" name="contactPerson" class="form-control" value="{{$school->contactPerson}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label for="contactDetails">Address</label>
                                                                <input type="text" name="contactDetails" class="form-control" value="{{$school->contactDetails}}" required>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="schoolLocation">Location</label>
                                                                <input type="text" name="schoolLocation" class="form-control" value="{{$school->schoolLocation}}" required>
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
                                        <div class="modal fade" id="deleteDepartmentModal{{$school->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Are you sure you want to delete this record ?</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>


                                                    </div>
                                                    <form method="POST" action="{{route('adminDeleteSchools')}}">
                                                    @csrf

                                                        <input type="text" name="id" value="{{$school->id}}" class="form-control" hidden="true">

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
                                    <p>No schools to show</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Modal for adding Schools-->
<div class="modal fade" id="addDepartmentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Add Department</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('adminAddSchools')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="schoolName">School Name</label>
                            <input type="text" name="schoolName" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="contactPerson">Contact Person</label>
                            <input type="text" name="contactPerson" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="contactDetails">Address</label>
                            <input type="text" name="contactDetails" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="schoolLocation">Location</label>
                            <input type="text" name="schoolLocation" class="form-control" required>
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
<!--end of adding  modal-->
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