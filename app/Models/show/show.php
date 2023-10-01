<?php

namespace App\Models\show;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class show extends Model
{
    use HasFactory;

    protected $table = 'shows';

    protected $fillable = [
        "name",
        "image",
        "description",
        "type",
        "studios",
        "date_aired",
        "status",
        "genere",
        "duration",
        "quality"
    ];

    public $timestamps = true;
}
