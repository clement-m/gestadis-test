<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$students = Student::all();
		return response()->json($students, 201);
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
		// $validated = $request->validate([
		// 	'nom' => 'required|string|max:255',
		// 	'prenom' => 'required|string|max:255',
		// 	'email' => 'required|email|unique:eleves,email',
		// ]);

		// $eleve = Eleve::create($validated);

		// return response()->json($eleve, 201);
		return response()->json(['store add'], 201);
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
}
