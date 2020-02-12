<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\dept_name;
class pdfcontroller extends Controller
{
 
    //

    public function index()
    {   $depts=dept_name::all();
    return view('blade.pdf',compact('depts'));

        
    }
    public  function pdf_converter()
    {   $data=['print pdf'];
        $pdf = PDF::loadView('blade.htmltopdf', $data);
        return $pdf->download('pdffile.pdf');
    }
}
