<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;

use PDF;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    //
    public function index(){
        $data=['pdf'];
        $pdf = PDF::loadView('invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}
