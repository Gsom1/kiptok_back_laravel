<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string url
 * @property string poster
 * @property Carbon created_at
 */
class Video extends Model
{
    public const FIELD_ID     = 'id';
    public const FIELD_URL    = 'url';
    public const FIELD_POSTER = 'poster';

    protected $fillable = [
        self::FIELD_URL,
        self::FIELD_POSTER,
    ];
}
