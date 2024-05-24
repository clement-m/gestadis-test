<?php

namespace App\Http\Controllers;

// use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
	public function index() {
		return response()->json(['INDEX'], 201);
	}

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
}
