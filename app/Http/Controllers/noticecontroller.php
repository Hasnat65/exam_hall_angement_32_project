<?php

namespace App\Http\Controllers;
use App\date;
use App\Http\Controllers\storecontroller;
use App\teachers_model;
use Illuminate\Http\Request;
use App\notice;
use Illuminate\Support\Facades\DB;

class noticecontroller extends Controller
{
    /**N
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dates=date::all();
        $names=teachers_model::all();
        $results=DB::select('select * from notices where id = ?', [23]);
       return view('blade.pdf',compact('results','names','dates'));
    }
public  function getnotice(){
        $notices= DB::select('select * from notices where id = ?', [23]);
       // return view('blade.notice',compact('notices'));
 foreach ($notices as $notice){
     $result= $notice->notice;
     $notice_id=$notice->id;
 } return view('blade.notice',compact('result','notice_id'));
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
        $notice=new notice();
        $notice->notice=$request->notice;
        $notice->save();
     //  DB::insert('insert into notices (id,notice) values (?,?)', [24, 'Dayle']);
        return redirect('notices');
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
     return view('blade.home');   //
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
        $update=notice::find($id);
        $update->notice=$request->notice;
        //DB::update('update notices set notice =$update where id = ?', ['24']);
$update->save();
        return redirect('/notices');
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
