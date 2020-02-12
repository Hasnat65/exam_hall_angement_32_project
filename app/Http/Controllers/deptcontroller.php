<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dept_name;
class deptcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function send(){
       $depts=dept_name::all();
       //return view('blade.teacher',compact('depts'));//just name of variable
   }
    public function index()
    {
        //
        $depts=dept_name::all();
        return view('blade.dept',compact('depts'));//just name of variable
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
        //store deptname
        $dept=new dept_name();
        $dept->dept_name=$request->dept_name;
        $dept->save();
        return redirect('dept');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $delete=dept_name::findorfail($id);
        $delete->delete();
        session()->flash('message',"ডিলেট হয়েছে");
        return redirect('dept');

    }
}
