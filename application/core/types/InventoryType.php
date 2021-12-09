<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../../../vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class InventoryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Inventory',
            'description' => 'Data Inventory',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::nonNull(Types::int()),
                        'resolve' => function($value) {
                            return (int) $value->inv_id;
                        }
                    ],
                    'nama' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->inv_nama;
                        }
                    ],
                    'deskripsi' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->inv_deskripsi;
                        }
                    ],
                    'stok' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->inv_stok;
                        }
                    ],
                    'harga' => [
                        'type' => Types::string(),
                        'resolve' => function($value) {
                            return $value->inv_harga;
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
