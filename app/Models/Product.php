<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    	'id',
    	'name',
        'user_id',
    	'slug',
    	'type',
    	'amount',
    	'price',
    	'description',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
