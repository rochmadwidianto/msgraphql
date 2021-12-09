<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../../../vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class UserType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'User',
            'description' => 'Data User',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::nonNull(Types::int()),
                        'resolve' => function($value) {
                            return (int) $value->id;
                        }
                    ],
                    'nama' => [
                        'type' => Types::string()
                    ],
                    'username' => [
                        'type' => Types::string()
                    ],
                    'telp' => [
                        'type' => Types::string()
                    ],
                    'email' => [
                        'type' => Types::string()
                    ],
                    'alamat' => [
                        'type' => Types::string()
                    ]
                ];
            },
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                if (method_exists($this, $info->fieldName)) {
                    return $this->{$info->fieldName}($value, $args, $context, $info);
                } else {
                    return $value->{$info->fieldName};
                }
            }
        ];
        parent::__construct($config);
    }
}
