<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    protected $fillable = [
        'name',
        'deleted_at',
    ];
}
