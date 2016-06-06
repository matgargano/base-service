<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {

	protected $noun = 'student';

	public function index() {
		$data = Student::All();

		return $this->createSuccessResponse( $data );
	}


	public function update() {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}


	public function show( $id ) {

		$course = Student::find( $id );
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
			'career'  => 'required|in:engineering,math,physics'

		];
		$this->validate( $request, $rules );
		$student = Student::create( $request->all() );

		return $this->createSuccessResponse( $this->created( $student->id ), 201 );

	}

	public function destroy( $teacher ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

}