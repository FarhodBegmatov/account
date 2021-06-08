<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @property integer $id
 * @property integer $tip_id
 * @property string $category_name
 * @property string $created_at
 * @property string $updated_at
 *
 */

class Category extends Model
{
    protected $fillable = ['category_name', 'tip_id', 'created_at', 'updated_at'];

    public function tip(){
        return $this->belongsTo(Tip::class);
    }

}
