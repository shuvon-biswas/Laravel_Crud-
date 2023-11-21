<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCrud extends Model
{
    protected $table = 'model_cruds';

    const CREATED_AT = 'cd';
    const UPDATED_AT = 'ud';

}
