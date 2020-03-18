<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function age(Request $request){
        $data = $request->input('age');
        $students = config("students.students");
        $result = [
            "errore" => "",
            "response"=> []
        ];
        if(empty($data)){
            $result["errore"] = " non hai settato il valore";
        }
        else {
            foreach ($students as  $student) {
                if ($data < $student["age"])
                    $result["response"][] = $student;
            }
         }
        return response()->json($result, 200);
        }
        
}