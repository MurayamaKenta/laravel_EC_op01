<?php

namespace App\Http\Controllers;

use App\User;
use App\product;
use Illuminate\Http\Request;

class SerchController extends Controller
{
    public function index(Request $request)
    {
        //formからキーワードの受け取り
        $keyword = $request->input('keyword');

        // $query = product::all();
        // dd($query);

        //もしキーワードがあったら
        if (!empty($keyword)) {
            $query = product::where('category_id', $keyword)->get();
            // var_dump($query);
        } else {
            $query = product::all();
        }


        // $data = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('Product/serch', compact('keyword',  'query'));
    }
}
