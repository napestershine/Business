<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $materials = Material::paginate(10);

        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('materials.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'name' => 'bail|required|max:255',
            'description' => 'bail|required',
            'code' => 'bail|required|unique:materials|max:255',
            'price' => 'bail|required',
            'quantity' => 'required|integer'
        ]);
        if ($validate->fails())
            return redirect()->back()->withErrors($validate->errors())->withInput($request->all());

        $material = Material::create($request->all());

        return redirect($material->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material) {
        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material) {
        return view('materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Material $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material) {
        $validate = Validator::make($request->all(), [
            'name' => 'bail|required|max:255',
            'description' => 'bail|required',
            'code' => 'bail|required|unique:materials,code,' . $material->id.'|max:255',
            'price' => 'bail|required',
            'quantity' => 'required|integer'
        ]);
        if ($validate->fails())
            return redirect()->back()->withErrors($validate->errors())->withInput($request->all());

        $material->name = $request->get('name');
        $material->description = $request->get('description');
        $material->code = $request->get('code');
        $material->price = $request->get('price');
        $material->quantity = $request->get('quantity');
        $material->save();
        return redirect($material->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material) {
        $material->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted the material!');
        return \Redirect::to('materials');
    }
}
