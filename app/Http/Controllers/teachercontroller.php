<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\teachers_model;
use App\dept_name;
use App\date;
class teachercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates=date::all();
        $depts=dept_name::all();
       $names=teachers_model::all();
        return view('blade.teacher',compact('names','depts','dates'));
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
        $teacher=new teachers_model();
        $teacher->t_name=$request->t_name;
        $teacher->designation=$request->designation;
        $teacher->dept_name=$request->dept_name;
        $teacher->total_duty=$request->total_duty;
        $teacher->exam_duty=$request->exam_duty;
      //  $teacher->exam_duty=$teacher->exam_duty;
        $teacher->save();
        return redirect('name');
    }
    public function print()
    {
        $dates=date::all();
        $depts=dept_name::all();
        $results=DB::select('select * from notices where id = ?', [23]);

        $names=teachers_model::all();
        return view('blade.print',compact('names','depts','dates','results'));
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
        $edit=teachers_model::findorfail($id);
        //$depts=dept_name::findorfail($id);

      return view('blade.edit_name',compact('edit',' '));
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
        $teacher=teachers_model::findorfail($id);
       // $dept=dept_name::findorfail($id);
        $teacher->t_name=$request->t_name;
        $teacher->designation=$request->designation;
        $teacher->total_duty=$request->total_duty;
       $teacher->dept_name=$request->dept_name;

     //$dept->save();
        $teacher->save();
        return redirect('name');
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
        $delete=teachers_model::findorfail($id);
        session()->flash('message',"ডিলেট হয়েছে");
        $delete->delete();
        return redirect('name');
    }
}
