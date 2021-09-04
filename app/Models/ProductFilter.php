<?php

namespace App\Models;

use Illuminate\Support\Facades\Redis;

class ProductFilter extends QueryFilter
{
    public function contains($input)
    {
        return $this->builder
            ->where('name', 'like', '%' . $input . '%')
            ->orWhere('author', 'like', '%' . $input . '%')
            ->orWhere('publisher', 'like', '%' . $input . '%')
            ->orWhere('description', 'like', '%' . $input . '%')
            ->orWhere('genre', 'like', '%' . $input . '%');
    }

    public function popular($order = 'desc')
    {
        $trending = Redis::zrevrange('trending_products', 0, 4);

        return Product::hydrate(
            array_map('json_decode', $trending)
        );

        //return $this->builder->orderBy('views', $order);
    }

    public function bestsellers($order = 'desc')
    {
        $trending = Redis::zrevrange('bestsellers', 0, 4);

        return Product::hydrate(
            array_map('json_decode', $trending)
        );

        //return $this->builder->orderBy('views', $order);
    }

    public function newest()
    {
        return $this->builder->orderBy('created_at', 'desc');
    }

    public function name($name)
    {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }

    public function author($author)
    {
        return $this->builder->where('name', 'like', '%' . $author . '%');
    }

    public function publisher($publisher)
    {
        return $this->builder->where('name', 'like', '%' . $publisher . '%');
    }

    public function id($id)
    {
        $product = $this->builder->where('id', $id);

        Redis::zincrby('trending_products', 1,  $product->first());

        return $product;
    }
}
