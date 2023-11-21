<?php

namespace App\Http\Controllers;

use App\Models\ModelCrud;
use Illuminate\Http\Request;
use Session;

class ControllerCrud extends Controller
{
    public function showData(){
        $showData = ModelCrud::all();
        // dd($showData);
        $data = [
            "showdatas"=> $showData,
        ];
        return view('show_data', $data);
    }

    public function addData(){
        return view('add-data');
    }

    public function storeData(Request $request){
        $ruls = [
            'name'=>'required|max:20',
            'email'=>'required|email',
        ];
        $cm = [
            'name.required'=>'Enter your name',
            'name.max'=>'Your name can not contain more then 20 ch',
            'email.required'=>'Enter your email',
            'email.email'=>'Email must be a valid email'
        ];
        $this->validate($request, $ruls, $cm);

        $crud = new ModelCrud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data successfully Added'); 
        return redirect('/');
    }

    public function editData($id=null){
        $editData = ModelCrud::find($id);
        $data = [
            "editData"=> $editData,
        ];
        return view('edit-data', $data);
    }

    public function updateData(Request $request,$id){
        $ruls = [
            'name'=>'required|max:20',
            'email'=>'required|email',
        ];
        $cm = [
            'name.required'=>'Enter your name',
            'name.max'=>'Your name can not contain more then 20 ch',
            'email.required'=>'Enter your email',
            'email.email'=>'Email must be a valid email'
        ];
        $this->validate($request, $ruls, $cm);

        $crud = ModelCrud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data successfully Updated'); 
        return redirect('/');
    }
    public function deleteData($id=null){
        $deleteData = ModelCrud::find($id);
        $deleteData->delete();

        Session::flash('msg','Data successfully Deleted'); 
        return redirect('/');
    }

    public function viewData($id){
        $viewData = ModelCrud::where('id', $id)->first();
        $data = [
            "viewData"=> $viewData,
        ];
        return view('view-data', $data);
    }

}
