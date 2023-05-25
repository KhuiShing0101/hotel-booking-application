<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Room;

class View extends Model
{
    use HasFactory;
    protected $table    = 'view';
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRoom () : HasMany
    {   
        return $this->hasMany(Room::class, "view_id", "id");
    }
}
