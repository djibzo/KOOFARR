<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountC extends Model
{
    use HasFactory;
    protected $table='account_c';
    protected $guarded =[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pack() :HasMany{
        return $this->hasMany(Pack::class,'id');
    }
}
