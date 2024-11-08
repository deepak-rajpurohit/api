<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function list(){
        return Student::all();
    }

    function addStudent(Request $request){
        $student = new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        if($student->save()){
            return ["result"=>"Student adde"];
        }else{
            return ["result"=>"failed"];
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
