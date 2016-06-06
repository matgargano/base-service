<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Course;

class CourseController extends Controller {

	protected $noun = 'course';

	public function index() {
		$data = Course::All();

		return $this->createSuccessResponse( $data );
	}

	public function show( $id ) {

		$course = Course::find( $id );
		if ( $course ) {
			return $this->createSuccessResponse( $course );
		}

		return $this->createErrorResponse( $this->doesNotExist( $id ) );

	}

}