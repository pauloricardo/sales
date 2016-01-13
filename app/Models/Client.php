<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    // tem que ter.
    protected $fillable = [
        'user_id', 'phone', 'address', 'city', 'state', 'zip_code'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
