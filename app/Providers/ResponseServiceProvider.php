<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 */
	public function register(): void {
		//
	}

	/**
	 * Bootstrap services.
	 */
	public function boot(): void {
		$this->descriptiveResponseMethods();
	}

	public function format($status, $message, $data) {
		return ['status' => $status, 'message' => $message, 'data' => $data];
	}

	protected function descriptiveResponseMethods() {
		$instance = $this;
		Response::macro('ok', function ($data = [], $message = '') use ($instance) {
			return Response::json($instance->format('200: success', $message, $data), 200);
		});

		Response::macro('created', function ($data = [], $message = '') use ($instance) {
			return Response::json($instance->format('201: created', $message, $data), 201);
		});

		Response::macro('noContent', function ($data = [], $message = '') use ($instance) {
			return Response::json($instance->format('204: no content', '', []), 204);
		});

		Response::macro('badRequest', function ($errors = [], $message = 'Validation Failure') use ($instance) {
			return $instance->handleErrorResponse($message, $errors, 400);
		});

		Response::macro('unauthorized', function ($errors = [], $message = 'User unauthorized') use ($instance) {
			return $instance->handleErrorResponse($message, $errors, 401);
		});

		Response::macro('forbidden', function ($errors = [], $message = 'Access denied') use ($instance) {
			return $instance->handleErrorResponse($message, $errors, 403);
		});

		Response::macro('notFound', function ($errors = [], $message = 'Resource not found.') use ($instance) {
			return $instance->handleErrorResponse($message, $errors, 404);
		});

		Response::macro('internalServerError', function ($errors = [], $message = 'Internal Server Error.') use ($instance) {
			return $instance->handleErrorResponse($message, $errors, 500);
		});
	}

	public function handleErrorResponse($message, $errors, $status) {
		$response = [
			'message' => $message,
		];

		if (count($errors)) {
			$response['errors'] = $errors;
		}

		return Response::json($response, $status);
	}
}
