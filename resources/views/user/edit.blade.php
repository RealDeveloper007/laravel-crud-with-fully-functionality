@extends('layouts.app')
@section('content')


                        <main id="main-container">
                        <!-- Page Header -->
                        <div class="content bg-gray-lighter">
                            <div class="row items-push">
                                <div class="col-sm-8">
                                    <h1 class="page-heading">
                                    Edit User
                                    </h1>
                                </div>
                           
                        </div>

                        <div class="row">
         
                            <div class="col-md-6 col-md-offset-3">
                             @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif 
                                {{ Form::model($User, ['route' => ['user.update', $User->id], 'class' => 'col-md-10 mx-auto', 'role' => 'form', 'method' => 'put','enctype'=>"multipart/form-data", 'id' => 'edit-User']) }}

                                                @include("user.form")
                                                    
                                <div class="form-group">
                                     {{ Form::submit('Update', ['class' => 'btn btn-primary btn-md']) }}
                                </div>               
                                            
                                {{ Form::close() }}
                                </div>
                                </div>
                        </main>
@endsection
