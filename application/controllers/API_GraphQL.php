<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GraphQL\Type\Definition\Type;

class API_GraphQL extends Graphql_Controller
{
	public function init()
	{
		return [
            'welcome' => [
                'description' => 'Selamat Datang!',
                'type' => Type::string(),
                'resolve' => function() {
                    return 'Selamat Datang di msGraphQL! Skripsi - [185410014] Rochmad Widianto';
                }
            ],
			'echo'=>[
				'type'=> Type::string(),
				'args'=> [
					'message' => Type::nonNull(Type::string()),
				],
				'resolve'=> function($root, $args){
					return $root['prefix'] . $args['message'];
				}
			],
			'randomint'=>[
				'type'=>Type::int(),
				'args'=>[
					'min'	=> [
						'type'=>Type::int(),
						'defaultValue'=> 0
					],
					'max'	=> [
						'type'=>Type::int(),
						'defaultValue'=>10
					],
				],
				'resolve'=>function($root, $args){
					return rand(
						$args['min'],
						$args['max']
					);
				}
			]
		];
	}

	public function rootValue()
	{
		return ['prefix' => 'You said: '];
	}
}
