<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;
    protected $table='pack';
    protected $guarded =[];
    public function account_cp()
    {
        return $this->belongsTo(AccountC::class,'idPack');
    }

}
