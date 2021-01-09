<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=DB::table("employee")->get(); // this is get all the continents from DB
        //  dd($items);
          return view ("employees.index")->with("items",$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|integer',
            'gender' => 'required|max:1',
            'empNo' => 'required|integer'

          ]);
  
        DB::table("employee")->insert ([
             'firstname'=>$request['firstname'],
             'lastname'=>$request['lastname'],
             'email'=>$request['email'],
             'phone'=>$request['phone'],
             'gender'=>$request['gender'],
             'empNo'=>$request['empNo']
          ]);
  
         Session::flash("msg","Created Successfully");
  
          return redirect (route("employees.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=DB::table("employee")->find($id);
        if(!$item)
        {
            session()->flash("msg","Invalid ID");
        }

        return view("employees.show")->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=DB::table("employee")->find($id);
        if(!$item)
        {
            session()->flash("msg","Invalid ID");
        }
        return view("employees.edit")->with('item',$item);
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
        $request-> validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|integer',
            'gender' => 'required|max:1',
            'empNo' => 'required|integer'

          ]);
  
        DB::table("employee")-> where('id',$id)->update  ([
             'firstname'=>$request['firstname'],
             'lastname'=>$request['lastname'],
             'email'=>$request['email'],
             'phone'=>$request['phone'],
             'gender'=>$request['gender'],
             'empNo'=>$request['empNo']
          ]);
  
         Session::flash("msg","Updated Successfully");
  
          return redirect (route("employees.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("employee")->where('id',$id)->delete();
        Session::flash("msg","Deleted Successfully");

        return redirect (route("employees.index"));
    }
}
