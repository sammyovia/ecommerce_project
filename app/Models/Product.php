<?php

namespace App\Models;

use App\Helpers\ProductCollectionHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * ATTRIBUTES.
     */
    public function newCollection(array $models = [])
    {
        return new ProductCollectionHelper($models);
    }

    /**
     * RELATIONSHIPS.
     */
    /**
     * SCOPES.
     */
    /**
     * FUNCTIONS.
     */
    public function getImage()
    {
        return asset('storage/'.$this->image_path.$this->image_name);
    }

    public function getLink($id)
    {
        return route('products.details', ['id' => $id]);
    }

    public function getCartQuantityPrice()
    {
        return $this->price * $this->pivot->quantity;
    }
}