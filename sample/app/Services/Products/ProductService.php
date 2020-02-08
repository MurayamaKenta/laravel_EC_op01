<?php

namespace App\Services\Products;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProductService
 * @package App\Services\Products
 */
class ProductService
{
    /**
     * @return mixed
     */
    public function productShowAll()
    {
        return Auth::user()->id;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return product::query()->find($id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $products = product::query()->paginate();

        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $products = product::where('category_id', $keyword)->paginate();
        }

        return $products;
    }
}
