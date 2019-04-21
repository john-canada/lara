<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\userExport;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class exportController extends Controller
{
   function index(){
       $users = User::all();
       return view('export.userExport')->with('users',$users);
   }

   function export(){
    return Excel::download(new userExport(), 'users.xlsx');
  }

}
