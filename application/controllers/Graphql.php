<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GraphQL\Type\Definition\Type;

class Graphql extends Graphql_Controller
{

	public function init()
	{
		return [
			// default
            'welcome' => [
                'description' => 'Selamat Datang!',
                'type' => Types::string(),
                'resolve' => function() {
                    return 'Selamat Datang di msGraphQL! Skripsi - [185410014] Rochmad Widianto';
                }
            ],
			
			// user
			'user' => [
				'description' => 'Data List User',
				'type' => Types::listOf(Types::user()),
				'resolve' => function($rootValue, $args, $context) {
					$result = $this->graphql_model->GetDataUser();
					return $result;
				}
			],
			'user_by_id' => [
				'description' => 'Data User By ID',
				'type' => Types::user(),
				'args' => [
					'id' => Types::nonNull(Types::int())
				],
				'resolve' => function($rootValue, $args, $context) {
					$id = $args['id'];
					$result = $this->graphql_model->GetDataUserById($id);
					return $result;
				}
			],

			// konsumen
			'konsumen' => [
				'description' => 'Data List Konsumen',
				'type' => Types::listOf(Types::konsumen()),
				'resolve' => function($rootValue, $args, $context) {
					$result = $this->graphql_model->GetDataKonsumen();
					return $result;
				}
			],
			'konsumen_by_id' => [
				'description' => 'Data Konsumen By ID',
				'type' => Types::konsumen(),
				'args'=> [
					'id'	=> [
						'type'=>Type::int(),
						'defaultValue'=> 0
					],
				],
				'resolve' => function($rootValue, $args, $context) {
					$id = $args['id'];
					$result = $this->graphql_model->GetDataKonsumenById($id);
					return $result;
				}
			],

			// inventory
			'inventory' => [
				'description' => 'Data List Inventory',
				'type' => Types::listOf(Types::inventory()),
				'resolve' => function($rootValue, $args, $context) {
					$result = $this->graphql_model->GetDataInventory();
					return $result;
				}
			],
			'inventory_by_id' => [
				'description' => 'Data Inventory By ID',
				'type' => Types::inventory(),
				'args'=> [
					'id'	=> [
						'type'=>Type::int(),
						'defaultValue'=> 0
					],
				],
				'resolve' => function($rootValue, $args, $context) {
					$id = $args['id'];
					$result = $this->graphql_model->GetDataInventoryById($id);
					return $result;
				}
			],

			// penjualan
			'penjualan' => [
				'description' => 'Data List Penjualan',
				'type' => Types::listOf(Types::penjualan()),
				'resolve' => function($rootValue, $args, $context) {
					$result = $this->graphql_model->GetDataPenjualan();
					return $result;
				}
			],
			'penjualan_by_id' => [
				'description' => 'Data Penjualan By ID',
				'type' => Types::penjualan(),
				'args'=> [
					'id'	=> [
						'type'=>Type::int(),
						'defaultValue'=> 0
					],
				],
				'resolve' => function($rootValue, $args, $context) {
					$id = $args['id'];
					$result = $this->graphql_model->GetDataPenjualanById($id);
					return $result;
				}
			]
		];
	}
}
