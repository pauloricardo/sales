<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    // tem que ter.
    protected $fillable = [
        'name', 'client_id', 'user_deliveryman_id', 'total', 'status'
    ];

    public function items(){
        return $this->hasMany(\CodeDelivery\Models\OrderItem::class);
    }
    public function delivery_man(){
        return $this->belongsTo(\CodeDelivery\Models\User::class);
    }
    public function client(){
        return $this->belongsTo(\CodeDelivery\Models\Client::class);
    }
    public function getStatusAttribute(){
        $status = ['1'=>'Aprovado', '2'=>'Encaminhado', '3'=>'Entregue', '4'=>'Erro'];
        $atributo = $this->attributes['status'];

        return $status[$atributo];
    }
    public function getTotalAttribute(){
        return number_format($this->attributes['total'],2,",",".");
    }

}
