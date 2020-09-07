  <style>
      form {
    margin: 17px;
    padding: 15px;
}
  </style>

<div class="form-group">
                            <label for="name">Short Image</label>
                            <div>
                                      
                            {{ Form::file('short_image',null, ['class' => 'form-control', 'required' => 'required']) }}

                         </div>
                </div>


                <div class="form-group">
                            <label for="name">Full Image</label>
                            <div>
                                      
                            {{ Form::file('full_image[]', ['class' => 'form-control', 'required' => 'required',"multiple"=>true]) }}

                         </div>
                </div>

  <div class="form-group">
                            <label for="name">Name</label>
                            <div>
                                      
                            {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']) }}

                         </div>
                </div>

                <div class="form-group">
                            <label for="name">Email</label>
                            <div>
                                      
                            {{ Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) }}

                         </div>
                </div>

                <div class="form-group">
                            <label for="name">School</label>
                            <div>
                                      
                            {{ Form::select('school_id',$Schools,null, ['class' => 'form-control', 'placeholder' => 'Select School', 'required' => 'required']) }}

                         </div>
                </div>


                <div class="form-group">
                            <label for="name">Class</label>
                            <div>
                                      
                            {{ Form::select('class_id',$Classes,null, ['class' => 'form-control', 'placeholder' => 'Select Class', 'required' => 'required']) }}

                         </div>
                </div>

                <div class="form-group">
                            <label for="name">Subject</label>
                            <div>
                                      
                            {{ Form::select('subject_id',$Subjects,null, ['class' => 'form-control', 'placeholder' => 'Select Subject', 'required' => 'required']) }}

                         </div>
                </div>
                   
                <div class="form-group">
                <label for="name">Gender</label>

                            <div>
                            <label for="name">Male</label>
    
            {{ Form::radio('gender',1, ['class' => 'form-control', 'required' => 'required']) }}
            <label for="name">Female</label>

            {{ Form::radio('gender',2, ['class' => 'form-control', 'required' => 'required']) }}

                </div>
            </div>

            <div class="form-group">
                            <label for="name">Interests</label>
                            <div>
                            
            {{ Form::select('interests[]', ['1' => 'Play Football', '2' => 'Listen Music','3'=>'Reading Books','4'=>'Surfing Internet'],isset($User->interests) ? json_decode($User->interests) : null, ['class' => 'form-control js-example-basic-multiple','multiple'=>"multiple", 'required' => 'required']) }}
                       
                </div>
            </div>

            <div class="form-group">
                <label for="name">Password</label>

                            <div>    
            {{ Form::password('password', ['class' => 'form-control']) }}

                </div>
            </div>
                
       

       


 