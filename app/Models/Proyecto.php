<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    /** @use HasFactory<\Database\Factories\ProyectoFactory> */
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'client_id',
        'name',
        'description',
        'status',
        'start_date',
        'end_date'
    ];

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'client_id','id');
    }

}
