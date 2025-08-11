<?php

namespace  App\Domain\Model\Plant;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model {
    protected $table = 'plants';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'category', 'family'];
}