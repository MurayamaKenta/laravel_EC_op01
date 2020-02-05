<?php

namespace App\Services\Products;

use App\product;



class ProductService
{

  public function find(int $id)
  {
    return product::query()->find($id);
  }
}
