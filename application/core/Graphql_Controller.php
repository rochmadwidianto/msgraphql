<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../../vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\GraphQL;

abstract class Graphql_Controller extends MY_Controller
{
	public abstract function init();

	public function rootValue()
	{
		return [];
	}

	public final function index()
	{
		try{
			// ## Membuat Query Type
			// -----------------------------------------------------------------------------------------------
			// query type adalah type yg digunakan untuk root node
			$queryType = new ObjectType([
				'name'	=> 'Query',
				'fields'=> $this->init(),
			]);

			// ## Mengambil data yang dikirimkan client
			// -----------------------------------------------------------------------------------------------
			// data disini dapat berisi query dan variables
			// query = graphql query
			// variables = variable tambahan

			// jika request header content_type adalah 'application/json'
			if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
				// ambil data berdasarkan php://input (request body)
				$raw = file_get_contents('php://input') ?: '';
				$data = json_decode($raw, true);
			} else {
				// kalau bukan, ambil data berdasarkan $_REQUEST ($_POST dan $_GET)
				$data = $_REQUEST;
			}
			// merge data (memastikan supaya tidak terjadi error undefined index array)
			$data += ['query' => null, 'variables' => null];
			// jika tidak terdapat query pada data
			if (null === $data['query']) {
				// set query menjadi '{welcome}' (default query)
				$data['query'] = '{welcome}';
			}

			// jika tidak terdapat default query
			if (!isset($data['query'])) {
				// tampilkan error
				throw new Exception('Invalid request.',-1);
			}

			// ## Membuat Skema
			// -----------------------------------------------------------------------------------------------
			// Ada beberapa key yang dapat digunakan pada parameter pertama Schema, 
			// diantaranya adalah 'query' dan 'mutation'
			// key 'query' digunakan untuk melakukan operasi read (R dari CRUD),
			// sedangkan key 'mutation' digunakan untuk operasi write (CUD dari CRUD)
			// disini hanya menggunakan 'query' atau select data saja
			$schema = new Schema([
				'query'=> $queryType
			]);
			
			// ## Ambil Data
			// -----------------------------------------------------------------------------------------------
			// Ambil data dari 'query' dan 'variables'
			$query = $data['query'];
			$variableValues = isset($data['variables']) ? $data['variables'] : null;
			
			// ## Eksekusi GraphQL
			// ===============================================================================================
			$result = GraphQL::executeQuery($schema, $query, $this->rootValue(), NULL, $variableValues);
			$output = $result->jsonSerialize();

		} catch (Exception $e) {
			// ## Handling Exception
			// ===============================================================================================
			$output = [
				'errors' => [
					[
						'message' 	=> $e->getMessage(),
						'code'		=> $e->getCode()
					]
				]
			];
		} finally {
			// ## Tampilkan Hasilnya (Berupa JSON)
			// ===============================================================================================
			$this
				->output
				->set_content_type('json')
				->set_output(json_encode($output));
		}
	}
}
