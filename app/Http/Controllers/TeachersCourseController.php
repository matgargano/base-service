<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Teacher;

class TeachersCourseController extends Controller {

	protected $noun = 'teacher';

	public function index( $teacher_id ) {
		$teacher = Teacher::find( $teacher_id );
		if ( $teacher ) {
			$data = $teacher->courses;

			return $this->createSuccessResponse( $data );

		}

		return $this->createErrorResponse( $this->doesNotExist( $teacher_id ) );
	}

	public function store( $teacher ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

	public function updatePut( $teacher, $course ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

	public function destroy( $teacher, $course ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

}