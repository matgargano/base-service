<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController {

	protected $noun = 'thing';

	public function createSuccessResponse( $data, $code = 200 ) {
		return response()->json( [ 'data' => $data ], $code );
	}

	public function createErrorResponse( $message, $code = 404 ) {
		return response()->json( [ 'message' => $message, 'code' => $code ], $code );
	}

	public function doesNotExist($id, $noun = null) {
		$noun = $noun ?: $this->noun;
		return sprintf( 'The %s with id %d, does not exist', $noun, $id );
	}

	public function created($id, $noun = null) {
		$noun = $noun ?: $this->noun;
		return sprintf( 'The %s with the id of %d has been created', $noun, $id );
	}

	protected function buildFailedValidationResponse(Request $request, array $errors)
	{
		return $this->createErrorResponse($errors, 422);


	}
}