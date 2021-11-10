<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string url
 * @property Carbon created_at
 */
class Video extends Model
{
    public const FIELD_ID  = 'id';
    public const FIELD_URL = 'url';

    protected $fillable = [
        self::FIELD_URL,
    ];
}
