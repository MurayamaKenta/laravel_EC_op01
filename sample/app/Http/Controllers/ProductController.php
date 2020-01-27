<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product)
    {
        //一覧画面
        $products = DB::table('products')->paginate(20);
        // $product = new product;
        // $products =  $product->find(1);
        // var_dump($products);
        // Log::info($products);
        return view('Product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //商品登録画面


        return view('product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //商品登録機能

        // $validate =  $this->validateCustomer();
        // product::create()->save();
        //このやり方だとなぜかできなかった。一旦保留

        $product = new product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->comment = $request->comment;
        $product->user_id = 5;
        $product->price = $request->price;
        $product->pic1 = $request->pic;
        $product->save($this->validateCustomer());


        // Log::info($product);
        return redirect('product/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //商品詳細画面
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //商品編集画面
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //商品編集機能
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //商品削除機能
    }

    public function validateCustomer()
    {
        return request()->validate([
            'name' => 'required',
            'category_id' => 'required',
            'comment' => 'max:255',
            'price' => 'required',
        ]);
    }
}
