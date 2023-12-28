<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items_summary extends Model
{
    use HasFactory; 
    protected $guarded = ['id'];

    public function items_results()
    {
        return $this->hasMany(Items_results::class);
    }
}
