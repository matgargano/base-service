<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class CourseStudentController extends Controller {

	public function index( $course ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
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

}