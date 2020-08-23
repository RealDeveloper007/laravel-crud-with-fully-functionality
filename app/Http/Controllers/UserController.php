<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Schools;
use App\Classes;
use App\Subject;

class UserController extends Controller
{

    public function __construct()
    {
        $this->upload_path = 'images'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try
        {

            $Schools  = Schools::pluck('school_name','id');
            $Classes  = array();
            $Subjects = array();
    
            if(request()->has('subject_id'))
            {
                $Users = User::where('subject_id',request()->subject_id)->paginate(10)->appends('subject_id',request()->subject_id);
            } else {
                $Users = User::paginate(10);
            }
            return view('user/list',compact('Users','Schools','Classes','Subjects'));

        } catch (\Illuminate\Database\QueryException $exception) {

            $Schools  = array();
            $Classes  = array();
            $Subjects = array();
            $Users    = array();

            return view('user/list',compact('Users','Schools','Classes','Subjects'))->with('error',$exception->getMessage());               
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Schools  = Schools::pluck('school_name','id');
        $Classes  = array();
        $Subjects = array();

        return view('user/create',compact('Schools','Classes','Subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'school_id'=>'required',
            'class_id'=>'required',
            'subject_id'=>'required',
            'short_image'=>'required',
            'full_image'=>'required',
            'gender'=>'required',
            'interests'=>'required',
            'password'=>'required',
        ]);

            $Profile                    = new User();
            $Profile->short_image       = $this->uploadImage($request->short_image);
            $Profile->full_image        = $this->uploadImage($request->full_image);
            $Profile->name              = $request->name;
            $Profile->email             = $request->email;
            $Profile->school_id         = $request->school_id;
            $Profile->class_id          = $request->class_id;
            $Profile->subject_id        = $request->subject_id;
            $Profile->gender            = $request->gender;
            $Profile->interests         = json_encode($request->interests);
            $Profile->password          = Hash::make($request->password);
            $Profile->created_at        = date('Y-m-d h:i:s');
            $Profile->updated_at        = date('Y-m-d h:i:s');

            if( $Profile->save())
            {
                return redirect()->route('user.index')->with('success','User details added successfully!');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User     = User::where('id',$id)->first();
        $Schools  = Schools::pluck('school_name','id');
        $Classes  = Classes::where('school_id',$User->school_id)->pluck('class_name','id');
        $Subjects = Subject::where('class_id',$User->class_id)->pluck('subject_name','id');

        return view('user/edit',compact('Schools','Classes','Subjects','User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            'school_id'=>'required',
            'class_id'=>'required',
            'subject_id'=>'required',
            // 'short_image'=>'required',
            // 'full_image'=>'required',
            'gender'=>'required',
            'interests'=>'required',
            // 'password'=>'required',
        ]);

            $Profile                    = User::find($id);
            if($request->short_image)
            {
                $Profile->short_image       = $this->uploadImage($request->short_image);
            }

            if($request->full_image)
            {
                $Profile->full_image       = $this->uploadImage($request->full_image);
            }
            $Profile->name              = $request->name;
            $Profile->email             = $request->email;
            $Profile->school_id         = $request->school_id;
            $Profile->class_id          = $request->class_id;
            $Profile->subject_id        = $request->subject_id;
            $Profile->gender            = $request->gender;
            $Profile->interests         = json_encode($request->interests);
            if($request->password)
            {
                $Profile->password          = Hash::make($request->password);
            }
            $Profile->created_at        = date('Y-m-d h:i:s');
            $Profile->updated_at        = date('Y-m-d h:i:s');

            if( $Profile->save())
            {
                return redirect()->route('user.index')->with('success','User details updated successfully!');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $DeleteUser = User::where('id',$id)->delete();

            if($DeleteUser)
            {
                return redirect()->route('user.index')->with('success','User deleted successfully.');
            }
    }

     // Get Classes
     public function GetClasses(Request $request)
     {
         $Clasess =  Classes::where('school_id',$request->schoolID)->get();
 
             if($Clasess) 
             {
                 return response()->json([
                     'status' => true,
                     'message' => 'All Classes',
                     'data' => $Clasess,
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'No class found'
                 ]);
             }
     }

       // Get Subjects
       public function GetSubjects(Request $request)
       {
           $Subjects =  Subject::where('class_id',$request->classID)->get();
   
               if($Subjects) 
               {
                   return response()->json([
                       'status' => true,
                       'message' => 'All Subjects',
                       'data' => $Subjects,
                   ]);
               } else {
                   return response()->json([
                       'status' => false,
                       'message' => 'No subject found'
                   ]);
               }
       }


       private function uploadImage($image)
       {
           $avatar = $image;
   
           if (isset($image) && !empty($image)) 
           {
              $fileName = time().$avatar->getClientOriginalName();
   
              $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));
   
               return $fileName;
           }
       }
}
