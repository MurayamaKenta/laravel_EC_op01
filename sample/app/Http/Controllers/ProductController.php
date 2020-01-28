<?php

namespace App\Http\Controllers;

use App\product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Comparator\Comparator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product)
    {
        //!一覧画面
        $products = DB::table('products')->paginate(20);
        $users = Auth::id();
        // $product = new product;->これいらないね。findですでにインスタンス返していいる
        // $products =  $product->find(1);//?product::find()でいけるわ
        // var_dump($products);
        // Log::info($products);
        return view('Product/index', compact('products', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //!商品登録画面
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
        //!商品登録機能

        // $validate =  $this->validateCustomer();
        // product::create( $validate)->save();
        // createの場合はsaveまですでにしてくれているので必要ない。
        // またモデルのインスタンスを返しているのでインスタンスの作成も必要がない
        // fillの場合はインスタンス作成、saveまでしなければならない
        //このやり方だとなぜかできなかった。一旦保留ー＞save()をしていたからだと思う

        $product = new product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->comment = $request->comment;
        $product->user_id = 5;
        //↑ここが問題。inputがないけどどのようにinsertするのか？
        // input hiddenにして値をいれる？
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
    public function show(product $product, $id)
    {
        //!商品詳細画面
        $product = product::find($id);
        // dd($product);
        return view('Product/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product, $id)
    {
        //!商品編集画面
        $product = product::find($id);
        return view('Product/update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product, $id)
    {
        //!商品編集機能
        // $product->fill($request->all())->save();

        // dd($request->all());
        $product = product::find($id);
        $product->create($this->validateCustomer());


        return redirect('Ploduct/update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //!商品削除機能
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
