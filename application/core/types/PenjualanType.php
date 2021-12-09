<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../../../vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class PenjualanType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Penjualan',
            'description' => 'Data Penjualan',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::nonNull(Types::int()),
                        'resolve' => function($value) {
                            return (int) $value->penj_id;
                        }
                    ],
                    'kons_id' => [
                        'type' => Types::int(),
                        'resolve' => function($value) {
                            return $value->kons_id;
                        }
                    ],
                    'kons_nama' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->kons_nama;
                        }
                    ],
                    'kons_telp' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->kons_telp;
                        }
                    ],
                    'kons_alamat' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->kons_alamat;
                        }
                    ],
                    'inv_id' => [
                        'type' => Types::int(),
                        'resolve' => function($value) {
                            return $value->inv_id;
                        }
                    ],
                    'inv_nama' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->inv_nama;
                        }
                    ],
                    'inv_deskripsi' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->inv_deskripsi;
                        }
                    ],
                    'inv_stok' => [
                        'type' => Types::int(),
                        'resolve' => function($value) {
                            return $value->inv_stok;
                        }
                    ],
                    'inv_harga' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->inv_harga;
                        }
                    ],
                    'tanggal' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->penj_tanggal;
                        }
                    ],
                    'jumlah' => [
                        'type' => Types::int(),
                        'resolve' => function($value) {
                            return $value->penj_jumlah;
                        }
                    ],
                    'nominal' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->penj_nominal;
                        }
                    ]
                ];
            },
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                if (method_exists($this, $info->fieldName)) {
                    return $this->{$info->fieldName}($value, $args, $context, $info);
                } else {
                    return is_numeric($value->{$info->fieldName})? (int) $value->{$info->fieldName} : $value->{$info->fieldName};
                }
            }
        ];
        parent::__construct($config);
    }
}
