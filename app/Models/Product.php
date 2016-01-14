<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    // tem que ter.
    protected $fillable = [
        'name', 'category_id', 'description', 'price','purchase_price', 'foto','qtd'
    ];

    public function category(){
        return $this->belongsTo(\CodeDelivery\Models\Category::class);
    }
    public function getPriceAttribute(){
        return number_format($this->attributes['price'],2,",",".");
    }public function getPurchasePriceAttribute(){
        return number_format($this->attributes['purchase_price'],2,",",".");
    }

}
