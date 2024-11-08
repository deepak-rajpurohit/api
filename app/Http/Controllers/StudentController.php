<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    //
    function list(){
        return Student::all();
    }

    function addStudent(Request $request){
        // $student = new Student();
        // $student->name=$request->name;
        // $student->email=$request->email;
        // $student->phone=$request->phone;
        // if($student->save()){
        //     return ["result"=>"Student add"];
        // }else{
        //     return ["result"=>"failed"];
        // }

        $rules = array(                      //for validation
            'name'=>'required | min:2 | max:10',
            'email'=> 'email | required',
            'phone'=> "required"
        );
        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return$validation->errors();
        }else{
               $student = new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        if($student->save()){
            return ["result"=>"Student add"];
        }else{
            return ["result"=>"failed"];
        }
    }
}

        function updateStudent(Request $request){
            $student=Student::find($request->id);
            $student->name=$request->name;
            $student->email=$request->email;
            $student->phone=$request->phone;

            if($student->save()){
                return["result"=>"student data updated"];
            }else{
                return["result"=>"student not updated"];
            }
        }

        function deleteStudent($id){
            $student =Student::destroy($id);
            if($student){
                return["result"=>"Student deleted"];
            }else{
                return["result"=> "not deleted"];
            }
        }

        function searchStudent($name){
            $student= Student::where('name','like',"%$name%")->get();
            if($student){
                return ["result"=>$student];
            }else{
                return ["result"=> "NO data found"];
            }
        }

}
