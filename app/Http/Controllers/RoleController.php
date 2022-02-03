<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;  // database connection complete

use Str;
use Carbon\Carbon; //for timestemp

class RoleController extends Controller
{
    public function addform()
    {
        $all_the_role = Role::all(); //database er all data selection
        return view('role.add', compact('all_the_role')); //via compact selected data gula role.add e send kora hocche
    }

    public function store_role(Request $request)
    {
        $request->validate([
            'role'=> 'required',
        ]);
        // print_r($request->all());
        $role = Str::lower($request->role); //doesn't matter what input dewa hok na keno in string, it will always return or add in lower case


        if(Role::Where('role', '=', $role)->doesntExist()){ //FIRST E INPUT role o exist kora role MILIYE DEKHBE JE ASE KINA, NA THAKLE ADD KORBE

            Role::insert([ //query run.....
                'role' => $role,
                'created_at' => Carbon::now(),
            ]);

        } else { //TAHKLE PAGE E BACK KORE NIA ASBE
                return back()->with('InsErr', 'Already Inserted'); //return hole se page e with function er data gulo nia jabe
        }




        return back(); //add howar por page e back kore nia asar method/way/function
    }
}
