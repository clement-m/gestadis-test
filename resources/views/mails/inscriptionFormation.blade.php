<!-- resources/views/emails/inscription_formation.blade.php -->

<p>Bonjour {{ $student->firstname }} {{ $student->lastname }},</p>

<p>Votre inscription à la formation {{ $training->label }} a bien été enregistrée.</p>

<!-- Autres détails de la formation ou instructions supplémentaires peuvent être ajoutés ici -->

<p>Merci,</p>
<p>L'équipe de votre plateforme de formation - Gestadis-test</p>
