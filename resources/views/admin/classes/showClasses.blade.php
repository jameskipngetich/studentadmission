@extends('layouts.master')
@section('content')
<!--header section-->
   
<div class="container-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <H1 class="m-0 text-dark">Classes</H1>
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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadClassesModal"><i class="fa fa-plus"></i>Upload File</button>
                        <div class="btn-group1" style="float:right">
                            
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addClassModal">
                                <i class="fa fa-plus"></i>
                                Add New Class
                            </button>
                            <a href="{{route('adminExportClassesAsExcel')}}" class="btn btn-sm btn-secondary">Export Excel</a>
                            <a href="{{route('adminExportClassesAsPdf')}}" class="btn btn-sm btn-info">Export pdf</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Class</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if(!empty($classes))
                                    @foreach($classes as $key=>$Class)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$Class->classname}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                                        Action 
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#"><h6>More action</h6></a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#updateClassModal{{$Class->id}}" href="#">Update</a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal{{$Class->id}}" href="#">Delete</a></li>                                                         
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--modal for updating Class-->
                                        <div class="modal fade" id="updateClassModal{{$Class->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Update Class</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{route('adminUpdateClass')}}">
                                                        @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="id" value="{{$Class->id}}" hidden="true">
                                                                <input type="text" name="classname" class="form-control" value="{{$Class->classname}}" required>
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
                                        <!--Delete Class modal-->
                                        <div class="modal fade" id="deleteClassModal{{$Class->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Are you sure you want to delete this record ?</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>


                                                    </div>
                                                    <form method="POST" action="{{route('adminDeleteClass')}}">
                                                            @csrf

                                                        <input type="text" name="id" value="{{$Class->id}}" class="form-control" hidden="true">

                                                    <div class="modal-footer justify-content-between">
                                                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                                                        <button  type="submit" class="btn btn-success"><i class="fa fa-trash"></i>Delete</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of delete Class modal-->
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
<!--Modal for adding Class-->
<div class="modal fade" id="addClassModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Add Class</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('adminAddClass')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" name="classname" class="form-control" required>
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
<!--end of adding Class modal-->
<!--upload of Classes data modal-->
<div class="modal fade" id="uploadClassesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Upload Classes</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="{{route('adminImportClassesData')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select File</label>
                            <input type="file" name="class_file" class="form-control"  required>
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
<!--end of upload classes modal-->
@endsection