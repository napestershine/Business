<?php

namespace App\Http\Controllers;

use App\Material;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $materials = Material::all();
        return view('products.new', compact('materials'));
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
            'description' => 'bail|required'
        ]);
        if ($validate->fails())
            return redirect()->back()->withErrors($validate->errors())->withInput($request->all());

        $materials = $request->get('materials');
        $integerIDs = array_map('intval', $materials);

        $results = \DB::table('materials')->whereIn('id', $integerIDs)
            ->where('quantity', '>', 0)->get();
        foreach ($results as $result) {
            $data[] = $result->id;
        }

        $validMaterials = array_intersect($materials, $data);
        $orders = array_diff($materials, $validMaterials);

        if (count($orders) > 0) {
            foreach ($orders as $o) {
                $order = new Order();
                $order->material_id = $o;
                $order->save();
            }
        }
        $product = Product::create($request->all());
        $product->materials()->sync($validMaterials);

        foreach ($validMaterials as $validMaterial) {
            $material = Material::find($validMaterial);
            --$material->quantity;
            $material->save();
        }
         return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        //
    }
}
