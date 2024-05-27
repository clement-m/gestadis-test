<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Student;
use App\Models\Training;

class InscriptionFormationMail extends Mailable {
	use Queueable, SerializesModels;

	private Student $student;
	private Training $training;

	/**
	 * Create a new message instance.
	 */
	public function __construct($student, $training) {
		$this->student = $student;
		$this->training = $training;
	}

	public function build() {
		return $this->view('mails.inscriptionFormation')
			->with([
				'student' => $this->student,
				'training' => $this->training,
			]);
	}

	/**
	 * Get the message envelope.
	 */
	public function envelope(): Envelope {
		return new Envelope(
			subject: "Mail d'inscription en formation",
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function content(): Content {
		return new Content(
			view: 'mails.inscriptionFormation',
		);
	}

	/**
	 * Get the attachments for the message.
	 *
	 * @return array<int, \Illuminate\Mail\Mailables\Attachment>
	 */
	public function attachments(): array {
		return [];
	}
}
