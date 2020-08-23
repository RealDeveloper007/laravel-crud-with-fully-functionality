@extends('layouts.app')
@section('content')
<style>
    form { display: flex;}
    .form-group {
    margin: 16px;
}
.content a {
    margin: 12px;
}
td span {
    display: inherit;
}
    </style>
                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-3">
                            <h1 class="page-heading">
                           All Users
                            </h1>
                        </div>
                   
                        {{ Form::open(['route' => 'user.index', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'get', 'id' => 'create-class']) }}
                            <div class="form-group search_class">
                            {{ Form::select('school_id',$Schools,request()->has('school_id')=='' ? null : request()->school_id, ['class' => 'form-control', 'placeholder' => 'Select School', 'required' => 'required']) }}
                            </div>

                            <div class="form-group search_class">
                            {{ Form::select('class_id',$Classes,request()->has('class_id')=='' ? null : request()->class_id, ['class' => 'form-control', 'placeholder' => 'Select Class', 'required' => 'required']) }}
                            </div>

                            <div class="form-group search_class">
                            {{ Form::select('subject_id',$Subjects,request()->has('subject_id')=='' ? null : request()->subject_id, ['class' => 'form-control', 'placeholder' => 'Select Subject', 'required' => 'required']) }}
                            </div>

                            <div class="form-group">
                                     {{ Form::submit('Search', ['class' => 'btn btn-success btn-md']) }}
                                     {{ Form::button('Reset', ['class' => 'btn btn-danger btn-md reset']) }}
                                </div> 
                            {{ Form::close() }}
                        <a href="{{route('user.create')}}" class="pull-right"><button class="mb-2 mr-2 btn-icon btn-pill btn btn-outline-primary"><span class="glyphicon glyphicon-plus"></span>Add New User</button></a>
                    </div>
                </div>
                    <div class="content">
                    <!-- Full Table -->
                    <div class="block">
                        <div class="block-content">
                            <div class="table-responsive">
                    @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif                                
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered datatable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Full Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>School</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Gender</th>
                                    <th>Interests</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                    @foreach($Users as $allusers)
                                    <tr>
                                    <td>{{$i}}</td>
                                    <td><img src="{{ env('USER_SHORT_IMAGE_URL').$allusers->short_image}}" width="100px"></td>
                                    <td><img src="{{ env('USER_FULL_IMAGE_URL').$allusers->full_image}}" width="100px"></td>
                                    <td>{{$allusers->name}}</td>
                                    <td>{{$allusers->email}}</td>
                                    <td>{{$allusers->school->school_name}}</td>
                                    <td>{{$allusers->class->class_name}}</td>
                                    <td>{{$allusers->subject->subject_name}}</td>
                                    <td>{!! $allusers->gender=='1' ? '<span class="mb-2 mr-2 badge badge-success">Male</span>' : '<span class="mb-2 mr-2 badge badge-danger">Female</span>' !!}
                                    </td>
                                    <td>{{$allusers->allinterests}}</td>
                                    <td>
                                        <span>
                                        <a href="{{route('user.edit', [$allusers->id])}}" title="Edit User">
                                        <button type="submit"><span class="fa fa-pencil"></span></button>
                                         </a> 
                                        </span> 

                                        <span>
                                        {{ Form::open(['route' => ['user.destroy', $allusers->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'delete', 'id' => 'create-user']) }}

                                       <button type="submit" onclick="return confirm('Are you sure to delete this User ?')"> <span class="fa fa-trash" ></span></button>
                                        {{ Form::close() }}
                                                                           
                                        </span>
                                       
                                    </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach

                                    @if($i==1)
                                    <tr>
                                        <td colspan="10" class="text-center">No user found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pull-right"> {{ !empty($Users) ? $Users->links() : '' }} </div>
                            </div>
                </div>
                </div>
                </div>
                <script>
             $('.reset').on('click',function(){
                 window.location.href = "{{ route('user.index')}}"
             })
         </script> 
                           
@endsection