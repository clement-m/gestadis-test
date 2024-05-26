<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;

use App\Models\Student;
use App\Models\Training;

use App\Mail\InscriptionFormationMail;
use App\Services\Geocode;

class StudentController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$students = Student::all();

		return response()->ok($students, 'List of ' . count($students) . ' students');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request, Geocode $geo) {
		try {
			$validated = $request->validate([
				'lastname' 			=> 'required|string|max:255',
				'firstname' 		=> 'required|string|max:255',
				'phone' 				=> 'nullable|string|max:20',
				'email' 				=> 'required|email|unique:students,email',
				'address' 			=> 'nullable|string|max:255',
				'postal_code' 	=> 'nullable|string|max:10',
				'city' 					=> 'nullable|string|max:255',
				'date_of_birth' => 'required|date',
			]);

			$validated = $geo->fillGPSCoord($validated);

			$student = Student::create($validated);

			return response()->created($student, 'Student #' . $student->id . ' succesfully added.');
		} catch (ValidationException $e) {
			$errors = $e->validator->errors();

			return response()->badRequest($errors);
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Student $student) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Student $student) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Student $student) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Student $student) {
		//
	}

	/**
	 * Attach training to a student
	 */
	public function attachTraining(Request $request) {
		try {
			$validated = $request->validate([
				'student_id' => 'required|integer|exists:students,id',
				'training_id' => 'required|integer|exists:trainings,id',
			]);

			$student = Student::find($validated['student_id']);
			$training = Training::find($validated['training_id']);

			$student->trainings()->attach($training);

			Mail::to($student->email)->send(new InscriptionFormationMail($student, $training));

			return response()->created(
				$student->load('trainings'),
				'Student #' . $student->id . ' succesfully added.'
			);
		} catch (ValidationException $e) {
			$errors = $e->validator->errors();

			return response()->badRequest($errors);
		}
	}
}
