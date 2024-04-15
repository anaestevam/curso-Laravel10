<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support){

        $supports = $support->all();
        
        return view('admin/supports/index', compact('supports'));
    }
    public function show(string|int $id){
        // Support::find($id);
        // Support::where('id, $id)->first();
        // Support::where('id, '!=' , $id)->first();

        if(!$support = Support::find($id)){
            return back();
        }

        return view('admin/supports/show', compact('support'));
    }
    public function create(){
        return view('admin/supports/create');
    }
    public function aprender(){
        return view('admin/supports/aprender');
    }
    public function store(StoreUpdateSupport $request, Support $support){
        
        $data = $request->validated();
        $support = $support->create($data);

        return redirect()->route('supports.index');
    }
    public function edit(Support $support, string|int $id){
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }

        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string|int $id){
        if(!$support = Support::find($id)){
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->status = $request->status;
        // $support->save();

        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id){
        if(!$support = Support::find($id)){
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }

}
