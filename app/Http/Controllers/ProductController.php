<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
        ]);

        ProductModel::create(['name' => $request->name, 'description' => $request->description, 'cost' => $request->cost]);

        return back()->with('success', 'Товар добавлен');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductModel::find($id);
        if ($product === null) return back()->withErrors('Товар не найден');
        return view('products.show',compact('product','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductModel::find($id);
        return view('products.edit',compact('product','id'));
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
        $product = ProductModel::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
        ]);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->cost = $request->get('cost');
        $product->save();
        return redirect('products')->with('success','Товар обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductModel::find($id);
        if ($product === null) return back()->withErrors('Товар не найден');
        $product->delete();
        return redirect('products')->with('success','Товар удален');
    }
}
