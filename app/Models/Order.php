<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //table create gareko jati sab lai fiable banaidinxa. 
    protected $guarded = [];

    
    public function user()
    {
        // This function defines a relationship with the User model. 
        // It specifies that the current model belongs to the User model, meaning it uses the belongsTo relationship.
        return $this->belongsTo(User::class);
    }
    
    public function product()
    {
        // This function defines a relationship with the Product model. 
        // It indicates that the current model belongs to the Product model, using the belongsTo relationship.
        return $this->belongsTo(Product::class);
    }


}
