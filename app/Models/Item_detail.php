<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_detail extends Model
{
    use HasFactory;

   protected $guarded = ['id'];
   
   public function items()
   {
       return $this->belongsTo(Item::class);
   }
}
