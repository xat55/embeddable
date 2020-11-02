<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Data
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $description
 * @property string $page_uid
 */
class Data extends Model
{
    protected $table = 'data';

    protected $fillable = [
        'title', 'content', 'description', 'page_uid'
    ];

    protected $dates = [
     'created_at',
     'updated_at',
     'deleted_at'
   ];

    protected $visible = ['id', 'title', 'content', 'description', 'page_uid'];
}
