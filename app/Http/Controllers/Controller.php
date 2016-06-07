<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController {

	protected $noun = 'thing';

	public function createSuccessResponse( $data, $code = 200 ) {
		return response()->json( [ 'data' => $data, 'code' => $code ], $code );
	}

	public function createErrorResponse( $message, $code = 404 ) {
		return response()->json( [ 'message' => $message, 'code' => $code ], $code );
	}

	public function doesNotExist($id, $noun = null) {
		$noun = $noun ?: $this->noun;
		return sprintf( 'The %s with id %d, does not exist', $noun, $id );
	}

	public function created($id, $noun = null) {
		return $this->createResponseText($id, $this->getShortName(__METHOD__), $noun);
	}

	public function updated($id, $noun = null) {
		return $this->createResponseText($id, $this->getShortName(__METHOD__), $noun);
	}

	public function deleted($id, $noun = null) {
		return $this->createResponseText($id, $this->getShortName(__METHOD__), $noun);
	}

	private function createResponseText($id, $verb, $noun = null) {
		$noun = $noun ?: $this->noun;
		return sprintf( 'The %s with the id of %d has been %s', $noun, $id, $verb );

	}

	public function alreadyExists($id, $noun = null) {
		$noun = $noun ?: $this->noun;
		return sprintf( 'A very similar %s already exists at id %d', $noun, $id );
	}

	protected function buildFailedValidationResponse(Request $request, array $errors)
	{
		return $this->createErrorResponse($errors, 422);


	}

	private function getShortName($longName = null){

		$longNameExploded = explode('::', $longName);


		return array_pop($longNameExploded);
	}
}