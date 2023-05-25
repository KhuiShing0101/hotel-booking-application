<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;
    protected $table    = 'room';
    protected $fillable = [
        'name',
        'type',
        'occupancy',
        'bed_id',
        'size',
        'view_id',
        'description',
        'detail',
        'price_per_day',
        'extra_bed_price_per_day',
        'thumbnail',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getBed() :BelongsTo
    {
        return $this->belongsTo(
            Bed::class,
            'bed_id',
            'id'
        );
    }

    public function getView() :BelongsTo
    {
        return $this->belongsTo(
            View::class,
            'view_id',
            'id'
        );
    }

    public function getRoomAmenitiesByRoom(): HasMany
    {
        return $this->hasMany(
            RoomAmenities::class,
            'room_id',
            'id'
        );
    }

    public function getRoomGalleriesByRoom(): HasMany
    {
        return $this->hasMany(
            RoomGallery::class,
            'room_id',
            'id'
        );
    }

    public function getRoomSpecialFeatureNameByRoomId(): HasMany
    {
        return $this->hasMany(
            RoomSpecialFeatures::class,
            'room_id',
            'id'
        );
    }

    public function getRoomAmenityNameByAmenityId(): HasMany
    {
        return $this->hasMany(
            RoomAmenities::class,
            'room_id',
            'id'
        );
    }
}
