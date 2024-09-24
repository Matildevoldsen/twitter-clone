<?php

namespace App\Models;

use App\Entities\EntityDatabaseCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function newCollection(array $models = []): EntityDatabaseCollection
    {
        return  new EntityDatabaseCollection($models);
    }
}
