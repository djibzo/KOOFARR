<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountE extends Model
{
    use HasFactory;
    protected $table='account_e';
    protected $guarded =[];
    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
