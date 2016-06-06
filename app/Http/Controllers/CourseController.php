<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class CourseController extends BaseController {

	public function index() {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

	public function show( $course ) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;

		return $to_return;
	}

}