<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    protected $table = 'estabelecimentos';

    protected $fillable = ['nome'];
    public $timestamps = false;
}
