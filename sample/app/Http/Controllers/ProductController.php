<?php

namespace App\Http\Controllers;

use App\User;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\Products\ProductService;
use SebastianBergmann\Comparator\Comparator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }


    public function index(Request $request)
    {
        //!一覧画面
        $keyword = $request->input('keyword');
        $products = $this->service->search($request);

        $users = $this->service->productShowAll();

        return view('Product/index', compact('products', 'users', 'keyword'));
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
     * @param \Illuminate\Http\Request $request
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


        //todo これでもよいんじゃね？そしたら外部キー制約していればuser_idに勝手に入るやろ
        // $product = new product;
        // $user = Atuh::user()->products()->save($product->fill($request->all()));

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'price' => $request->price,
            'pic1' => $request->pic1,
        ]);


        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\product $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //!商品詳細画面
        $product = $this->service->find($id);

        return view('Product/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product, $id)
    {
        //!商品編集画面
        $product = Auth::user()->products()->find($id);

        $auth = Auth::id();

        return view('Product/update', compact('product', 'auth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product, $id)
    {
        //!商品編集機能
        // Product::create([
        //     'name' => $request->name,
        //     'category_id' => $request->category_id,
        //     'comment' => $request->comment,
        //     'user_id' => Auth::user()->id,
        //     'price' => $request->price,
        //     'pic1' => $request->pic1,
        // ]);

        $product = product::find($id); //変更したいidを指定しないといけなかったわけだ
        $product->fill([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'price' => $request->price,
            'pic1' => $request->pic1,
        ])->save();


        return redirect('Ploduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\product $product
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
