<?php

namespace App\Models;

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
        return $this->builder->orderBy('views', $order);
    }

    public function newest()
    {
        return $this->builder->orderBy('created_at', 'desc');
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
