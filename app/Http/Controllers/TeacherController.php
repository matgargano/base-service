<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller {

	protected $noun = 'teacher';

	public function index() {
		$data = Teacher::All();

		return $this->createSuccessResponse( $data );
	}

	public function show( $id ) {

		$course = Teacher::find( $id );
		if ( $course ) {
			return $this->createSuccessResponse( $course );
		}

		return $this->createErrorResponse( $this->doesNotExist( $id ) );

	}

	public function store( Request $request ) {

		$rules = [
			'name'    => 'required',
			'phone'   => 'required|numeric',
			'address' => 'required',
			'profession'  => 'required|in:engineering,math,physics'

		];
		$this->validate( $request, $rules );
		$teacher = Teacher::create( $request->all() );

		return $this->createSuccessResponse( $this->created( $teacher->id ), 201 );

	}



	public function update($teacher) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;
		return $to_return;
	}

	public function destroy($teacher) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;
		return $to_return;
	}


}