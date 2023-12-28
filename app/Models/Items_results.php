<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items_results extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function items_summary()
    {
        return $this->belongsTo(Items_summary::class);
    }

    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}
