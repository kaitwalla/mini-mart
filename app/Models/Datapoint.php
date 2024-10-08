<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class Datapoint extends Model
{
    use HasTimestamps;

    protected $table = 'datapoint';
    protected $fillable = ['key', 'value'];
}
