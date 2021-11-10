<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property string id
 * @property int from
 * @property int to
 * @property array single
 */
class FeedCursor extends Model
{
    public const FIELD_ID     = 'id';
    public const FIELD_FROM   = 'from';
    public const FIELD_TO     = 'to';
    public const FIELD_SINGLE = 'single';

    protected $fillable = [
        self::FIELD_ID,
        self::FIELD_FROM,
        self::FIELD_TO,
        self::FIELD_SINGLE,
    ];

    protected $casts = [
        self::FIELD_ID => 'string',
        self::FIELD_SINGLE => 'json',
    ];
}
