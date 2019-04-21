<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\userExport;
use App\Imports\userImport;

use App\User;
use Maatwebsite\Excel\Facades\Excel;

class exportController extends Controller
{
   function index(){
       $users = User::all();
       return view('export.userExport')->with('users',$users);
   }

   function import(Request $request){
     $users = Excel::toCollection(new userImport(), $request->file('import_file'));
      foreach($users[0] as $user){
        User::where('id',$user[0])->update([
          'role_id'=>$user[1],
          'name'=>$user[2],
          'isAdmin'=>$user[3],
          'email'=>$user[4],  
        ]);
      }
      return redirect('/export');
  }

}
