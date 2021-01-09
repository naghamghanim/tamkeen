<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 


use DB;
use Session;

use App\Models\Employee;
use App\Models\Department;
use App\Models\City;

use App\Http\Requests\EmployeeRequest;


class EmployeeControllerModel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q=$request->q;
        $gender=$request->gender;
        $city_id=$request->city_id;
        $active=$request->active;
        $items=Employee::whereRaw("true");
        $cities=City::all();
        $city_name=City::whereRaw("true");

        if($gender)
        {
            $items->where('gender',$gender);
        }
        if($city_id)
        {
            $items->where('city_id',$city_id);
            $city_name->where('id',$city_id);
        }
        if($active !==0)
        {
            $items->where("active",$active);
        }

        if($q)
        {
            $items->whereRaw('(firstname like ? or lastname like ? or email like ?)',["%$q%","%$q%","%$q%"]);
        }
       
        $items=$items->paginate(10)
        ->appends([
            'q'=>$q,
            'gender'=>$gender,
            'city_id'=>$city_id,
            'active'=>$active

        ]);


       return view ("employees-model.index",compact("items","cities","city_name"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        $cities=City::all();
        return view("employees-model.create",compact('departments','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
       
        // here we have privacy
       $filename= $request->image->store("images");
       $data=$request->all();
       $data['image']= $filename;
     //  dd($filename);
         Employee::create($data);
         Session::flash("msg","Created Successfully");
  
          return redirect (route("employees-model.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $item= Employee::find($id);
       $departments=Department::all();
       $cities=City::all();
        if(!$item)
        {
            session()->flash("msg","Invalid ID");
            return redirect(route("employees-model.index"));
        }

        return view("employees-model.show",compact('item','departments','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item= Employee::find($id);
      $departments=Department::all();
      $cities=City::all();

        if(!$item)
        {
            session()->flash("msg","Invalid ID");
            return redirect(route("employees-model.index"));

        }
       // dd($item->image);
        return view("employees-model.edit",compact('item','departments','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
  
          $item=Employee::find($id);
          $filename= $request->image->store("images");
          $data=$request->all();
          $data['image']=$filename;
       //  dd($data);
          $item->update($data);
  
         Session::flash("msg","Updated Successfully");
  
          return redirect (route("employees-model.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item= Employee::find($id);
        $item->delete();
        Session::flash("msg","Deleted Successfully");
        return redirect (route("employees-model.index"));
    }


    function postUploadFile(Request $request)
    {
        $request->validate
        ([
            'file'=>'required|image'
        ]);

        // here we have privacy
       $filename= $request->file->store("images");

       //store for everyone
       //$filename= $request->file->store("public");
       //$filename= $request->file->store("public/images");

       //Storage::putFile('images', $request->file('images'));
       //dd($filename);
       session()->flash("msg","s: Uploaded Successfully");
        return view('upload-file.index');
    }

    function getSecureFile()
    {
        return Storage::download("images/7KoAB8YBLZEOLrMKj0WLGe4f5w4EuCPTi1KyKtPP.png",'x.jpg');
    }
}
