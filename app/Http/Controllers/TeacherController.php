<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Teacher;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware;

class TeacherController extends Controller {

	protected $noun = 'teacher';


	public function __construct(){
		$this->middleware('oauth', []);
	}

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
			'name'       => 'required',
			'phone'      => 'required|numeric',
			'address'    => 'required',
			'profession' => 'required|in:engineering,math,physics'

		];
		$this->validate( $request, $rules );

		$id = Teacher::where( $request->all() )->get()[0]->id;

		if ( $id ) {
			return $this->createErrorResponse( $this->alreadyExists( $id ), 422 );
		}


		$teacher = Teacher::create( $request->all() );

		return $this->createSuccessResponse( $this->created( $teacher->id ), 201 );

	}


	public function destroy( $teacher_id ) {
		$teacher = Teacher::find( $teacher_id );
		if ( $teacher ) {

			$courses = $teacher->courses;
			if ( sizeof( $courses ) > 0 ) {
				return $this->createErrorResponse( 'You cannot remove a teacher who has active courses. Please remove the courses associated with the teacher first.', 409 );
			}

			$teacher->delete();

			return $this->createSuccessResponse( $this->deleted( $teacher_id ) );
		}

		return $this->createErrorResponse( $this->doesNotExist( $teacher_id ) );
	}


	public function updatePut( Request $request, $teacher_id ) {
		$teacher = Teacher::find( $teacher_id );

		if ( $teacher ) {

			$this->validateRequest( $request );

			$teacher->name       = $request->get( 'name' );
			$teacher->phone      = $request->get( 'phone' );
			$teacher->address    = $request->get( 'address' );
			$teacher->profession = $request->get( 'profession' );

			$teacher->save();

			return $this->createSuccessResponse( $this->updated( $teacher_id ) );


		}

		return $this->createErrorResponse( $this->doesNotExist( $teacher_id ) );

	}

	public function updatePatch( Request $request, $student_id ) {
		$student = Teacher::find( $student_id );

		if ( $student ) {

			if ( $request->get( 'name' ) ) {
				$student->name    = $request->get( 'name' );
			}
			if ( $request->get( 'phone' ) ) {
				$student->phone = $request->get( 'phone' );
			}
			if ($request->get( 'address' )){
				$student->address = $request->get( 'address' );
			}
			if ($request->get( 'profession' )) {
				$student->career = $request->get( 'profession' );
			}

			$student->save();
			return $this->createSuccessResponse( $this->updated( $student_id ) );


		}

		return $this->createErrorResponse( $this->doesNotExist( $student_id ) );

	}



	public function validateRequest( Request $request ) {
		$rules = [
			'name'       => 'required',
			'phone'      => 'required|numeric',
			'address'    => 'required',
			'profession' => 'required|in:engineering,math,physics'

		];
		$this->validate( $request, $rules );

	}


}