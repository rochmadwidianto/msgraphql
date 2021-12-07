<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GraphQL\Type\Definition\Type;

class API_GraphQL extends Graphql_Controller
{

	public function init()
	{
		return [
            'welcome' => [
                'description' => 'Selamat Datang!',
                'type' => Types::string(),
                'resolve' => function() {
                    return 'Selamat Datang di msGraphQL! Skripsi - [185410014] Rochmad Widianto';
                }
            ],
			'user' => [
				'description' => 'Data user berdasarkan ID',
				'type' => Types::user(),
				'args' => [
					'id' => Types::nonNull(Types::int())
				],
				'resolve' => function($rootValue, $args, $context) {
					$_dataId = $args['id'];
					$result = $this->graphql_model->GetDataUser($_dataId);
					return $result;
				}
			],
			'product' => [
				'description' => 'Data produk berdasarkan ID',
				'type' => Types::product(),
				'args' => [
					'id' => Types::nonNull(Types::int())
				],
				'resolve' => function($rootValue, $args, $context) {
					$_dataId = $args['id'];
					$result = $this->graphql_model->GetDataProduct($_dataId);
					return $result;
				}
			],
			'products' => [
				'description' => 'Data list produk',
				'type' => Types::listOf(Types::product()),
				'args' => [
					// argumen untuk keperluan paging
					'offset' => Types::int(),
					'limit' => Types::int()
				],
				'resolve' => function($rootValue, $args, $context) {
					$result = $this->graphql_model->GetDataProducts();
					return $result;
				}
			],
			'productCategories' => [
				'description' => 'Data list kategori produk',
				'type' => Types::listOf(Types::productCategory()),
				'resolve' => function($rootValue, $args, $context) {
					$result = $this->graphql_model->GetDataProductCategories();
					return $result;
				}
			]
		];
	}

	// public function init()
	// {
	// 	return [
    //         'welcome' => [
    //             'description' => 'Selamat Datang!',
    //             'type' => Type::string(),
    //             'resolve' => function() {
    //                 return 'Selamat Datang di msGraphQL! Skripsi - [185410014] Rochmad Widianto';
    //             }
    //         ],
	// 		'konsumen'=>[
    //             'description' => 'Data Referensi Konsumen',
	// 			'type'=> Type::string(),
	// 			'args'=> [
	// 				'id'	=> [
	// 					'type'=>Type::int(),
	// 					'defaultValue'=> 0
	// 				],
	// 			],
	// 			'resolve'=> function($root, $args){

	// 				$_dataId = $args['id'];
	// 				$_arrLapKonsumen = $this->graphql_model->GetData($_dataId);
	// 				return $_arrLapKonsumen;
	// 			}
	// 		],
	// 		'echo'=>[
	// 			'type'=> Type::string(),
	// 			'args'=> [
	// 				'message' => Type::nonNull(Type::string()),
	// 			],
	// 			'resolve'=> function($root, $args){
	// 				return $root['prefix'] . $args['message'];
	// 			}
	// 		],
	// 		'randomint'=>[
	// 			'type'=>Type::int(),
	// 			'args'=>[
	// 				'min'	=> [
	// 					'type'=>Type::int(),
	// 					'defaultValue'=> 0
	// 				],
	// 				'max'	=> [
	// 					'type'=>Type::int(),
	// 					'defaultValue'=>10
	// 				],
	// 			],
	// 			'resolve'=>function($root, $args){
	// 				return rand(
	// 					$args['min'],
	// 					$args['max']
	// 				);
	// 			}
	// 		]
	// 	];
	// }

	public function rootValue()
	{
		return ['prefix' => 'You said: '];
	}
}
