<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baskets extends Model {
    protected $table = 'baskets';

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'product_id',
        'count'
    ];

    public static function beginTransaction()
    {
        self::getConnectionResolver()->connection()->beginTransaction();
    }
    public static function commit()
    {
        self::getConnectionResolver()->connection()->commit();
    }
    public static function rollBack()
    {
        self::getConnectionResolver()->connection()->rollBack();
    }
}

?>