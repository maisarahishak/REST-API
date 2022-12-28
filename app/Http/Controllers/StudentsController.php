<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Providers\AppServiceProvider;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Student::all("name","address");
    }

    public function search($name){
        return Student::where("name","like","%".$name."%")->get();
    }

    public function paginate(){
        return Student::simplePaginate(3);
    }

    public function upload(Request $req){
        $result=$req->file('file')->store('apiDocs');
        return["result"=>$result];
    }

    public function add(Request $req){
        $student = new Student;
        $student->name=$req->name;
        $student->email=$req->email;
        $student->address=$req->address;
        $student->course=$req->course;
        $result = $student->save();
        if($result){
            return ["Result"=>"Data has been saved"];
        }else{
            return ["Result"=>"Operation failed"];
        }
        
    }

    public function update(Request $req){
        $student = Student::find($req->id);
        $student->name=$req->name;
        $result = $student->save();
        if($result){
            return ["result"=>"Data has been updated"];
        }else{
            return ["result"=>"Operation failed"];
        }
    }
    
    public function delete($id){
        $student = Student::find($id);
        $result = $student->delete();
        if($result){
            return ["result"=>"Record has been deleted"];
        }else{
            return ["result"=>"Operation failed"];
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
        //
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
    }
}
