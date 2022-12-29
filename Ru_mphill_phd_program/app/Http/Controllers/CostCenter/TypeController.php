<?php

namespace App\Http\Controllers\CostCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostCenterType;
class TypeController extends Controller
{
    public function index()
    {   
        $types = CostCenterType :: all();
         return view('backend.admin.cost-center.types.index',['types' => $types]);
    }
    public function create()
    {
       return view('backend.admin.cost-center.types.create');
    }
    public function store(Request $request)
    {
        $request -> validate([
            
            'name' => ['required'],
            'description' => ['required']
        ]);

        $name = $request -> name;
        $description = $request -> description;

        CostCenterType :: create([
            'name' => $name,
            'description' => $description
        ]);
       
        return redirect() -> route('admin.cost-center.type.index')->with('message','New Cost Center Type added successfully');
    }
    public function view($id)
    {
        $type = CostCenterType :: find($id);
        return view('backend.admin.cost-center.types.view',['type' => $type]);
    }
    public function edit($id)
    {
       $type  = CostCenterType :: find($id);
       return view('backend.admin.cost-center.types.edit',['type' => $type]);
    }
    public function update(Request $request,$id)
    {
        $request -> validate([

            'name' => ['required'],
            'description' => ['required']
        ]);
        $type = CostCenterType :: find($id);
        $type -> name = $request -> name;
        $type -> description = $request -> description;
        $type -> save();
        $message = 'Type info updated successfully';
        return redirect() -> route('admin.cost-center.type.index')->with('message',$message);
    }
    public function delete(Request $request)
    {
       $type_id = $request -> type_id;
       $type = CostCenterType :: find($type_id);
       $type -> delete();
       $message = 'Type deleted successfully';
       return $message;
    }
}
