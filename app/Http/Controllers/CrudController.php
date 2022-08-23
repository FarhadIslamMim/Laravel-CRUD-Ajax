<?php

namespace App\Http\Controllers;

use App\Models\Curd;
use Session;
use Illuminate\Http\Request;

class CrudController extends Controller
{

    public function showDataApi($id=null)
    {
        
       return  $id?Curd::find($id):Curd::all();
    }
    public function addDataApi(Request $request)
    {
        $curdtable=new Curd();
        $curdtable->name= $request->name;
        $curdtable->email= $request->email;
        $curdtable->address= $request->address;

        $result=$curdtable->save();

        if($result){
            return  ["Result"=>"Data Saved Successfully!"];
        }
        else{
            return  ["Result"=>"Faield!"];
        }
    }
    public function updateDataApi(Request $request)
    {
        $curdtable=Curd::find($request->id);
        $curdtable->name= $request->name;
        $curdtable->email= $request->email;
        $curdtable->address= $request->address;

       $result= $curdtable->save();

        if($result){
            return  ["Result"=>"Data Saved Successfully!"];
        }
        else{
            return  ["Result"=>"Faield!"];
        }
    
    }
    public function deleteDataApi($id=null)
    {
        $curdtable= Curd::find($id);

        $result=$curdtable->delete();

        if($result){
            return  ["Result"=>"Data Saved Successfully!".$id];
        }
        else{
            return  ["Result"=>"Faield!"];
        }
    }
    public function searchDataApi($name)
    {
        
            return Curd::where("name","like","%".$name."%")->get();
        
    
    }


    public function showData()
    {
        $showData= Curd::all();

        //pagination
        //$showData=Curd::paginate(5);
        //Another pagination
        $showData=Curd::simplePaginate(5);

        return view('show_data',compact('showData'));
    }

    public function addData()
    {
        return view('add_data');
    }
    
    public function storeData(Request $request)
    {
        $rules=[
            'name'=> 'required|max:15',
            'email'=> 'required',
            'address'=> 'required|max:15',
        ];

        $cm=[
            'name.requires'=>'Enter your Name',
            'name.max'=>'Your name must not be greater than 15 characters.',
            'email.email'=>'Enter a Valid Email',
            'address.requires'=>'Enter your Address',
            'address.max'=>'Your Address must not be greater than 15 characters.',
        ];
        $this->validate($request,$rules,$cm);

        //Model name is Curd

        $curd= new Curd();   
        $curd->name=$request->name;
        $curd->email=$request->email;
        $curd->address=$request->address;
        $curd->save();

        'Session'::flash('msg','Data Successfully Added!');


        return redirect('/data');
        
    }
    
    public function editData($id=null)
    {
        $editData= Curd::find($id);
        return view('edit_Data',compact('editData'));
    }

    public function updateData(Request $request,$id)
    {
        $rules=[
            'name'=> 'required|max:15',
            'email'=> 'required',
            'address'=> 'required|max:15',
        ];

        $cm=[
            'name.requires'=>'Enter your Name',
            'name.max'=>'Your name must not be greater than 15 characters.',
            'email.email'=>'Enter a Valid Email',
            'address.requires'=>'Enter your Address',
            'address.max'=>'Your Address must not be greater than 15 characters.',
        ];
        $this->validate($request,$rules,$cm);

        //Model name is Curd

        $curd=  Curd::find($id);   
        $curd->name=$request->name;
        $curd->email=$request->email;
        $curd->address=$request->address;
        $curd->save();

        'Session'::flash('msg','Data Successfully Updated!');


        return redirect('/data');
        
    }


    public function deleteData($id=null)
    {
        $deleteData= Curd::find($id);
        $deleteData->delete();
        'Session'::flash('msg','Data Successfully Deleted.');
        return redirect('/data');
    }
}
