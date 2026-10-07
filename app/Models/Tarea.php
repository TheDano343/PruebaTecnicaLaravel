<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    /** @use HasFactory<\Database\Factories\TareaFactory> */
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'project_id',
        'name',
        'description',
        'status',
        'priority',
        'due_date'
    ];

    public function Proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'project_id','id');
    }
}
