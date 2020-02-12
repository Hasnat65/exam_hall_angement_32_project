<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\date;
class storecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates=date::all();
        return view('blade.exam_date',compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,['unique:date']
        );
        $date=new date();
        $date->date=$request->date;
        $date->save();
        return redirect('store');

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
        $edit=date::findorfail($id);
        return view('blade.edit_date',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $this->validate(
        $request,['unique:date']
    );
        $update=date::findorfail($id);
        $update->date=$request->date;
        $update->save();
        session()->flash('message',"পরিবর্তন হয়েছে");
        return redirect('store');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete_date=date::find($id);
       $delete_date->delete();
       session()->flash('message',"ডিলেট হয়েছে");
       return redirect('/store');
    }
}
