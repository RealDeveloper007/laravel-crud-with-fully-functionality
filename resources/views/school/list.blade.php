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
                           All Schools
                            </h1>
                        </div>
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
                                    <th>School</th>
                                    <th>Classes</th>
                                    <th>Subjects</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                    @foreach($Schools as $allschools)
                                    <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$allschools->school_name}}</td>
                                    <td>@foreach($allschools->classes as $class) 
                                                {{ $class->class_name }}, 
                                    @endforeach</td>
                                    <td>@foreach($allschools->subjects as $subject) 
                                                {{ $subject->subject_name }}, 
                                    @endforeach</td>
                                    
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach

                                    @if($i==1)
                                    <tr>
                                        <td colspan="10" class="text-center">No school found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pull-right"> {{ !empty($Schools) ? $Schools->links() : '' }} </div>
                            </div>
                </div>
                </div>
                </div>
                <script>
             $('.reset').on('click',function(){
                 window.location.href = "{{ route('school.index')}}"
             })
         </script> 
                           
@endsection