<?php

namespace App\Services\Products;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductService
{
  public function product_show_all()
  {
    return Auth::user()->id;
  }

  public function find(int $id)
  {
    return product::query()->find($id);
  }

  public function search(Request $request)
  {
    $keyword = $request->input('keyword');

    if (!empty($keyword)) {
      $products = product::where('category_id', $keyword)->paginate();
    } else {
      $products = product::paginate(20);
    }

    return $products;
  }
}
