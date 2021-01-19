<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productarray = Product::join('categories','products.category_id','=','categories.category_id')
                        ->select('products.*','categories.category_name')
                        ->get();
        return view('product.index', compact('productarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryarray = category::all();
        return view('product.create', compact('categoryarray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([

            'product_name' => 'required',
            'product_details' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',

        ]);

        $file123 = $request->file('product_image');

        $extension = $file123->getClientOriginalExtension();
        $mimetype = $file123->getClientMimeType();
        $getfilename = $file123->getFilename();

        $original_filename = $file123->getClientOriginalName();

        Storage::disk('public')->put($original_filename, File::get($file123));

        $productq = new Product([

            'product_name'=> $request->get('product_name'),
            'category_id'=> $request->get('category_id'),
            'product_details'=> $request->get('product_details'),
            'product_price'=> $request->get('product_price'),
            'product_image'=> $original_filename
        ]);

        $productq ->save();
        return redirect('/product/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('product_id','=',$id)->delete();

        return redirect('/product')->with('success','Product Delete Successfully');
    }
}
