<?php

namespace App\Http\Controllers;

use App\Models\Student;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$students = Student::all();

		return response()->json([
			'message' => 'count: ' . count($students),
			'data' => $students,
		], 200);
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
	public function store(Request $request) {
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

			$student = Student::create($validated);

			return response()->json([
				'message' => 'Student #' . $student->id . ' succesfully added.',
				'data' => $student,
			], 201);
		} catch (ValidationException $e) {
			$errors = $e->validator->errors();

			return response()->json($errors, 400);
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
	public function addTraining(Request $request) {
		try {
			$validated = $request->validate([
				'student_id' => 'required|integer|exists:students,id',
				'training_id' => 'required|integer|exists:trainings,id',
			]);

			$student = Student::findOrFail($validated['student_id']);
			$training = Training::findOrFail($validated['training_id']);

			$student->trainings()->attach($training);

			return response()->json($student->load('trainings'), 201);
		} catch (ValidationException $e) {
			$errors = $e->validator->errors();

			return response()->json($errors, 400);
		}
	}
}
