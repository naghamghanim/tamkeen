<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //->get=select * from continents بتعرض كل الداتا
        $items=\DB::table("continents")->get(); // this is get all the continents from DB
      //  dd($items);
        return view ("continents.index")->with("items",$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("continents.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       // dd($request->input('name'));
        $request-> validate([
          'name' => 'required|max:50'
        ]);

       \DB::table("continents")->insert (['name'=>$request['name']]);

       \Session::flash("msg","Created Successfully");

        return redirect (route("continents.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // just use primary key 
        // return only one item or null
        $item=\DB::table("continents")->find($id);
        if(!$item)
        {
            \Session::flash("msg","invalid Item id");
            return view("continents.index"); 
        }
        return view("continents.show")->withItem($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item=\DB::table("continents")->find($id);
        return view("continents.edit")->withItem($item);
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
        //
         // dd($request->input('name'));
         $request-> validate([
            'name' => 'required|max:50'
          ]);
  
         \DB::table("continents")->where('id',$id)->update(['name'=>$request['name']]);
  
         \Session::flash("msg","Updated Successfully");
  
          return redirect (route("continents.index"));
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
        \DB::table("continents")->where('id',$id)->delete();
        \Session::flash("msg","Deleted Successfully");

        return redirect (route("continents.index"));

    }
}
