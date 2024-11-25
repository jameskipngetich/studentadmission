@extends('layouts.master')
@section('content')
<div class="container-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <H1 class="m-0 text-dark">Trainees</H1>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="btn-group1" style="float:right">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addUserMOdal">
                                <i class="fa fa-plus"></i>
                                Add New Trainee
                            </button>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phonenumber</th>
                                <th>School</th>
                                <th>form</th>
                                <th>year</th>
                                
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if(!empty($users))
                                    @foreach($users as $key=>$user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phonenumber}}</td>
                                            <td>{{$user->school}}</td>
                                            <td>{{$user->form}}</td>
                                            <td>{{$user->year}}</td>
                                            
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                                        Action 
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#"><h6>More action</h6></a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#updateUserModal{{$user->id}}" href="#">Update</a></li>
                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#deleteUserModal{{$user->id}}" href="#">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--update of user data modal-->
                                        <div class="modal fade" id="updateUserModal{{$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Update User</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>

                                                    </div>
                                                   <form action="{{route('adminUpdateUsers')}}" method="POST">
                                                           @csrf
                                                    <div class="modal-body">
                                                        <input type="text" name="id" value="{{$user->id}}" class="form-control" hidden="true">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Fullname</label>
                                                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>School</label>
                                                                    <input type="text" name="school" class="form-control" value="{{$user->school}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Phonenumber</label>
                                                                    <input type="number" name="phonenumber" class="form-control" value="{{$user->phonenumber}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Form</label>
                                                                    <input type="text" name="form" class="form-control" value="{{$user->form}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Year</label>
                                                                    <input type="number" name="year" class="form-control" value="{{$user->year}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="is_Trainee" value="yes" hidden>
                                                    <div class="modal-footer justify-content-between">
                                                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                                                        <button  type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>update</button>
                                                    </div>
            
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of update user modal-->
                                        <!--Delete user modal-->
                                        <div class="modal fade" id="deleteUserModal{{$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Are you sure you want to delete this record ?</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>


                                                    </div>
                                                    <form method="POST" action="{{route('adminDeleteUsers')}}">
                                                            @csrf

                                                        <input type="text" name="id" value="{{$user->id}}" class="form-control" hidden="true">

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
                                <p>No users record</p>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--add user modal-->
<div class="modal fade" id="addUserMOdal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Add user</h6>
            </div>
            <form method="POST" action="{{route('adminAddUsers')}}">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>School</label>
                            <input type="text" name="school" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phonenumber</label>
                            <input type="number" name="phonenumber" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Form</label>
                            <input type="text" name="form" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Year</label>
                            <input type="number" name="year" class="form-control"  required>
                        </div>
                    </div>
                </div>
                <input type="text" name="is_Trainee" value="yes" hidden>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                <button  type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end of add user modal-->
<!--upload of user data modal-->
<div class="modal fade" id="uploadUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Upload Users</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="{{route('adminImportUsersData')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select File</label>
                            <input type="file" name="user_file" class="form-control"  required>
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
<!--end of upload user modal-->

@endsection