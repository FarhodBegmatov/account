<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Finance
 * @package App\Models
 * @property integer $id
 * @property integer $tip_id
 * @property integer $category_id
 * @property string $date
 * @property integer $summa
 * @property integer $overall
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 *
 */

class Finance extends Model
{
    protected $fillable = ['tip_id', 'category_id', 'date', 'summa', 'overall', 'comment', 'created_at', 'updated_at'];

    public function tip()
    {
        return $this->hasOne(Tip::class, 'id', 'tip_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
