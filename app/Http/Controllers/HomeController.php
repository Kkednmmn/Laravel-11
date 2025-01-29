<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class HomeController extends Controller
{
    public function generatePDF()
    {
        // Get all users from the database
        $users = User::get();

        // Create the data array to pass to the view
        $data = [
            'title' => 'Export Data to PDF',
            'date' => date('m/d/Y'),
            'users' => $users
        ];
        
        $pdf = PDF::loadView('myPDF, $data');
        return $pdf->download('itsolutionstuff.pdf');
    }
}