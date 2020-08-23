@extends('layouts.app')
@section('content')

                    <main id="main-container">
                        <!-- Page Header -->
                        <div class="content bg-gray-lighter">
                            <div class="row items-push">
                                <div class="col-sm-8">
                                    <h1 class="page-heading">
                                    Add User
                                    </h1>
                                </div>
                            
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
   
                                {{ Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','enctype'=>"multipart/form-data", 'id' => 'create-user']) }}

                                                @include("user.form")

                                                    
                                <div class="form-group">
                                     {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-md']) }}
                                </div>               
                                            
                                {{ Form::close() }}
                                </div>
                                </div>
                        </main>
@endsection
