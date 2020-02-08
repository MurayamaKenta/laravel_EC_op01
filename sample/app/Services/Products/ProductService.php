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
    public function search(string $keyword)
    {
        $products = product::all();

        if (!empty($keyword)) {
            $products->where('category_id', $keyword)->paginate();
        }

        return $products;
    }
}
