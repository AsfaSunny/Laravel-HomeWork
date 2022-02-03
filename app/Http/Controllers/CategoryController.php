<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;  // database connection complete

use Str; //for String type lower or upper

use Carbon\Carbon; //for timestemp

use Auth; //for added by







class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all_the_category = Category::all(); //database er all data selection
        // return view('category.index', compact('all_the_category')); //via compact selected data gula path e send kora hocche

        //
        //or
        //

        return view('category.index', [
            'all_the_category' => Category::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=> 'required',
        ]);
        $category = Str::lower($request->category); //doesn't matter what input dewa hok na keno in string, it will always return or add in lower case


        if(Category::Where('category_name', '=', $category)->doesntExist()){

            Category::insert([ //query run.....
                'category_name' => $category,
                'created_at' => Carbon::now(),
                'added_by' => Auth::user()->id,
            ]);

        } else {
                return back()->with('InsErr', 'Already Inserted'); //return hole se page e with function er data gulo nia jabe
        }




        return back()->with('InsDone', 'New Category Inserted');
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
        $single_data = Category::find($id);
        return view('category.edit', compact('single_data'));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'category_name'=> 'required',
        ], [
            'category.required' => 'An Updated name-field must not be empty!!!',
        ]);

        $category_name = Str::lower($request->category_name);
        Category::findOrFail($request->category_id)->update([
            'category_name' => $category_name,
        ]);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo "$id";
        // echo Category::find($id); to check what the id got, and yes id is our primary key

        Category::find($id)->delete(); //deleteing data via delete method based on primary key.
        return back();
    }





    public function trashed() //recycle bin method....
    {
        $all_trashed = Category::onlyTrashed()->get(); //get kore nia jacche...
        return view('category.trashed', compact('all_trashed'));
    }




    public function CategoryRestore($id) //restoring method...
    {
        // echo "say hi to your new method<br> $id";
        Category::withTrashed()
                ->where('id', $id)
                ->restore();

        return back();
    }





    public function PermanentDelete($id) //restoring method...
    {
        // echo "say hi to your new method<br> $id";



        Category::withTrashed()
                ->where('id', $id)
                ->forceDelete();

        return back()->with('DelErr', 'Category have been Permanently Deleted from System!!!!');
    }











}
