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


	public function update( Request $request, $student_id ) {
		$student = Student::find( $student_id );

		if ( $student ) {

			$this->validateRequest( $request );

			$student->name    = $request->get( 'name' );
			$student->phone   = $request->get( 'phone' );
			$student->address = $request->get( 'address' );
			$student->career  = $request->get( 'career' );

			$student->save();
			return $this->createSuccessResponse( $this->updated( $student_id ) );


		}

		return $this->createErrorResponse( $this->doesNotExist( $student_id ) );

	}


	public function show( $id ) {

		$course = Student::find( $id );
		if ( $course ) {
			return $this->createSuccessResponse( $course );
		}

		return $this->createErrorResponse( $this->doesNotExist( $id ) );

	}

	public function store( Request $request ) {


		$this->validateRequest( $request );

		$id = Student::where( $request->all() )->get()[0]->id;

		if ( $id ) {
			return $this->createErrorResponse( $this->alreadyExists( $id ), 422 );
		}


		$student = Student::create( $request->all() );

		return $this->createSuccessResponse( $this->created( $student->id ), 201 );

	}

	public function destroy( $student_id ) {
		$student = Student::find( $student_id );

		if ( $student ) {

			$student->courses()->detach();
			$student->delete();

			return $this->createSuccessResponse( $this->deleted( $student_id ) );


		}

		return $this->createErrorResponse( $this->doesNotExist( $student_id ) );
	}

	public function validateRequest( Request $request ) {
		$rules = [
			'name'    => 'required',
			'phone'   => 'required|numeric',
			'address' => 'required',
			'career'  => 'required|in:engineering,math,physics'

		];
		$this->validate( $request, $rules );

	}

}