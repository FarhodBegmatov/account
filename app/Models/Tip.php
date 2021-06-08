<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tip
 * @package App\Models
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 */

class Tip extends Model
{
    protected $fillable = ['name', 'parent_id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

}
