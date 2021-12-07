<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../../vendor/autoload.php';

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Error\Debug;
use GraphQL\Error\FormattedError;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

abstract class Graphql_Controller extends MY_Controller
{
	public abstract function init();

	public function rootValue()
	{
		return [];
	}

	public final function index()
	{
		// ## Non-aktifkan error reporting
		// -----------------------------------------------------------------------------------------------
		// karena library ini memiliki debugger khusus
		ini_set('display_errors', 0);

		// ## Aktifkan mode debugging jika terdapat query debug (e.g: url.php?debug)
		// -----------------------------------------------------------------------------------------------
		$debug = !empty($_GET['debug']);
		if ($debug) {
			$phpErrors = [];
			// simpan error kedalam $phpErrors untuk nantinya dihandle pada bagian bawah
			set_error_handler(function($severity, $message, $file, $line) use (&$phpErrors) {
				$phpErrors[] = new ErrorException($message, 0, $severity, $file, $line);
			});
		}

		try{

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

			// # MEMPERSIAPKAN TYPE & SKEMA
    		// ===============================================================================================

			// ## Load Types
			// -----------------------------------------------------------------------------------------------
			// Load beberapa type pada file lain
			require __DIR__ . '/types/UserType.php';
			require __DIR__ . '/types/ProductType.php';
			require __DIR__ . '/types/ProductCategoryType.php';
			require __DIR__ . '/types/ProductReviewType.php';
			require __DIR__ . '/types/ProductImageType.php';
			require __DIR__ . '/Types.php';

			// ## Membuat Query Type
			// -----------------------------------------------------------------------------------------------
			// query type adalah type yg digunakan untuk root node
			$queryType = new ObjectType([
				'name'	=> 'Query',
				'fields'=> $this->init(),
			]);

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
			
			// ## Eksekusi GraphQL
			// ===============================================================================================
			$result = GraphQL::executeQuery(
				$schema,
				$data['query'],
				null,
				null, // $appContext,
				(array) $data['variables']
			);

			// ## Memasukkan Error kedalam $result (jika ada)
			// ===============================================================================================
			if ($debug && !empty($phpErrors)) {
				$result['extensions']['phpErrors'] = array_map(
					['GraphQL\Error\FormattedError', 'createFromPHPError'],
					$phpErrors
				);
			}

			$httpStatus = 200;

		} catch (\Exception $error) {
			// ## Handling Exception
			// ===============================================================================================

			$httpStatus = 500;

			if (!empty($_GET['debug'])) {
				$result['extensions']['exception'] = FormattedError::createFromException($error);
			} else {
				$result['errors'] = [FormattedError::create('Unexpected Error')];
			}
		}

		// ## Tampilkan Hasilnya (JSON)
		// ===============================================================================================
		header('Content-Type: application/json', true, $httpStatus);
		echo json_encode($result);
	}
}