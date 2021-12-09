<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../../vendor/autoload.php';

use GraphQL\Type\Definition\Type;

/**
 * Class Types
 * 
 * Class ini digunakan untuk mempermudah mengambil instance
 * dari type yang tersedia pada graphql yang kita buat
 * 
 * Instance yang diambil disini dipakai untuk 
 * mendefinisikan type ke setiap node pada graphql
 *
 * Karena pada kasus ini semua type yang dibuat bersifat sama
 * contoh: User pada semua node memiliki fields yang sama
 * jadi instance yang dibuat disini  bersifat singleton
 * untuk lebih menghemat penggunaan memory
 */
class Types extends Type
{

    protected static $typeInstances = [];

    public static function user()
    {
        return static::getInstance(UserType::class);
    }

    public static function konsumen()
    {
        return static::getInstance(KonsumenType::class);
    }

    public static function inventory()
    {
        return static::getInstance(InventoryType::class);
    }

    public static function penjualan()
    {
        return static::getInstance(PenjualanType::class);
    }
    

    protected static function getInstance($class, $arg = null)
    {
        if (!isset(static::$typeInstances[$class])) {
            $type = new $class($arg);
            static::$typeInstances[$class] = $type;
        }

        return static::$typeInstances[$class];
    }
}
