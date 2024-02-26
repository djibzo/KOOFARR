<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountC extends Model
{
    use HasFactory;
    protected $table='account_c';
    protected $guarded =[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
