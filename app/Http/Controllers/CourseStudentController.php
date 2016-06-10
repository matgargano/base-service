<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Course;

class CourseStudentController extends Controller {

	protected $noun = 'course';

	public function index( $course_id ) {
		$course = Course::find( $course_id );
		if ( $course ) {
			$data = $course->students;

			return $this->createSuccessResponse( $data );

		}

		return $this->createErrorResponse( $this->doesNotExist( $course_id ) );
	}

	public function store( $course, $student ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

	public function destroy( $course, $student ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

	public function updatePut( $course, $student ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}
	
}