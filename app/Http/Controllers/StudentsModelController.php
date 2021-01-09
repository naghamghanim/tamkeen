<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Student;
use App\Models\City;
use App\Http\Requests\StudentRequest;

class StudentsModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // here we will use Model 
      //  $items=DB::table("students")->get(); // this is get all the continents from DB
      $items=Student::get(); //$items=Student::all();
      //$items=Student::paginate(5);
      
        // dd($items);
      return view ("students-model.index")->with("items",$items);
    }
    public function paging()
    {
      //هون عشان نرتب حسب ال id
     // $items=Student::orderBy('id')->paginate(5); //$items=Student::all();

      $items=Student::paginate(5); // return arry of object contains array of data and info about paging

        // dd($items);
      return view ("students-model.paging")->with("items",$items);
    }

    public function search(Request $request)
    {
      // هاد الطلب الي جاينا وبيجي سواءا من get h, f,sj
      // المعلومة جاي ب q
      $q='';
      if($request->q)
      {
        $q=$request->q;
      }
      $items=Student::where("name","like","%$q%")
      ->orWhere("email","like","%$q%")
      ->get();

      return view ("students-model.search")->with("items",$items);
    }

    public function searchPagingAdvanced(Request $request)
    {
      // هاد الطلب الي جاينا وبيجي سواءا من get h, f,sj
      // المعلومة جاي ب q
      $q=$request->q;
      $gender=$request->gender;
      $active=$request->active;

      $items=Student::whereRaw('true');
      if($gender)
      {
        $items->where("gender",$gender);
      }

      if($active!="")// here we can't put 0 since we have not active =0
      {
        $items->where("active",$active);
      }

      if($q)
      {
        //$items->where("name","like","%$q%");// it doesn't get the items we must put get()
        $items->whereRaw('(name like ? or email like ? or phone like ?)',["%$q%","%$q%","%$q%"]);
      } 
      $items=$items->paginate(10)
      ->appends([
        'q'=> $q,
        'gender'=>$gender, 
        'active'=>$active

      ]);
      dd($items);
      return view ("students-model.search-paging-advanced")->with("items",$items);
    }


    public function searchPaging(Request $request)
    {
      // هاد الطلب الي جاينا وبيجي سواءا من get h, f,sj
      // المعلومة جاي ب q
      $q='';
      if($request->q)
      {
        $q=$request->q;
      }
      $items=Student::where("name","like","%$q%")
      ->orWhere("email","like","%$q%")
      ->paginate(5)
      ->appends(['q'=>$q]);

      return view ("students-model.search-paging")->with("items",$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=City::all();
       // dd($items);

        return view("students-model.create")->with('items',$items);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

          if(!isset($request['active']))
          {
              $request['active']=0;
          }

        // insert in DB using Model
          Student::create($request->all());

          Session::flash("msg","s:Created Successfully");
  
          return redirect (route("students-model.search-paging-advanced"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $item=DB::table("students")->find($id);
       $item=Student::find($id);
       $cities=City::all();
       
        if(!$item)
        {
            session()->flash("msg","i:Invalid ID");
            return redirect(route("students-model.search-paging"));

        }

        return view("students-model.show")->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$item=DB::table("students")->find($id);
        $item=Student::find($id);
        $cities=City::all();
        if(!$item)
        {
            session()->flash("msg","i:Invalid ID");
            return redirect(route("students-model.search-paging"));

        }
        return view("students-model.edit",compact('item','cities'));
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
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|integer',
            'gender' => 'required|max:1',
            'city_id'=>'required'

          ]);
  

          $request['active']=isset($request['active'])?1:0;
          $item=Student::find($id);
          $item->update($request->all());
            
  
         Session::flash("msg","s:Updated Successfully");
  
          return redirect (route("students-model.search-paging"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  DB::table("students")->where('id',$id)->delete();
      $item=Student::find($id);
      $item->delete();
      Session::flash("msg","w:Deleted Successfully");
      return redirect (route("students-model.search-paging"));

    }
}
