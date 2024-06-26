<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Training;

class TrainingController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$trainings = Training::all();

		return response()->ok($trainings, 'List of ' . count($trainings) . ' trainings');
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
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Training $training) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Training $training) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Training $training) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Training $training) {
		//
	}
}
