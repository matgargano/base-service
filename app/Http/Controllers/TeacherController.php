<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TeacherController extends BaseController {

	public function index() {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;
		return $to_return;
	}

	public function store() {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;
		return $to_return;
	}


	public function show($teacher) {
		$to_return = __CLASS__;
		$to_return .= '::';
		$to_return .= __METHOD__;
		return $to_return;
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