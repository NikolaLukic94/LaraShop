<?php

namespace App\Models;

class ProductFilter extends QueryFilter
{
    public function popular($order = 'desc')
    {
        return $this->builder->orderBy('views', $order);
    }

    public function newest()
    {
        return $this->builder->orderBy('id', 'desc');
    }

    public function name($name)
    {
        return $this->where('name', 'like', '%' . $name . '%');
    }

    public function author($author)
    {
        return $this->where('name', 'like', '%' . $author . '%');
    }

    public function publisher($publisher)
    {
        return $this->where('name', 'like', '%' . $publisher . '%');
    }
}
