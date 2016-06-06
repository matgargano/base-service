<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TeacherCourseController extends BaseController {

	public function index( $teacher ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;
		return $to_return;
	}

	public function store( $teacher ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;
		return $to_return;
	}

	public function update( $teacher, $course ) {
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