<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomGallery extends Model
{
    use HasFactory;
    protected $table    = 'room_gallery';
    protected $fillable = [
        'room_id',
        'image_name',

        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
