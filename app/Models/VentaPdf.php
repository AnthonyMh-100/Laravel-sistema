<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPdf extends Model
{
    use HasFactory;

    protected $table = 'ventas_pdf';

    protected $fillable =[
        'id_user',
        'name',
        'ventaPdf',
        'times'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;
}
