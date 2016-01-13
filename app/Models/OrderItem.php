<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItem extends Model implements Transformable
{
    use TransformableTrait;

    // tem que ter.
    protected $fillable = [
        'name', 'product_id', 'order_id', 'price', 'qtd'
    ];

    public function product(){
        return $this->hasOne(\CodeDelivery\Models\Product::class);
    }
    public function order(){
        return $this->hasOne(\CodeDelivery\Models\Order::class);
    }

}
