<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php
// création d'une variable "formulaire rempli" (si un champ rempli, forcément tous remplis)
$form_filled = isset($_POST['user_name']);

// création de deux variables "email valide" et "téléphone valide"
if($form_filled)
{
	$email_valid = preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['user_email']);
	$phone_valid = preg_match("#^0[1-9]([-. ]?[0-9]{2}){4}$#", $_POST['user_phone']);
}

// si formulaire rempli et email et téléphone valides
if($form_filled && $email_valid && $phone_valid)
// alors on affiche le récapitulatif des données
{
			echo '<p>Your message have been sent, thank you.<br><br>';
			echo '<span>Your name : </span>' . htmlspecialchars($_POST['user_name']);
			echo '<br><span>Your email : </span>' . $_POST['user_email'];
			echo '<br><span>Your phone number : </span>' . $_POST['user_phone'];
			echo '<br><span>Your topic : </span>' . htmlspecialchars($_POST['user_topic']);
			echo '<br><span>Your message : </span>' . htmlspecialchars($_POST['user_message']);
			echo '</p>';
} else {
// sinon, on affiche le formulaire
?>

	<form action="form.php" method="post">
		<div>
			<label for="name">Name :</label>
			<input type="text" id="name" name="user_name" value="<?php if ($form_filled) {echo $_POST['user_name'];} ?>" required>
		</div>

		<div>
			<label for="email">Email :</label>
			<input type="email" id="email" name="user_email" value="<?php if ($form_filled) {echo $_POST['user_email'];} ?>" required>
		</div>

<?php
// si email invalide on affiche un message d'erreur
if ($form_filled && !$email_valid)
{
	echo '<p><em>Veuillez entrer une adresse mail valide.</em></p>';
}
?>

		<div>
			<label for="phone">Phone number :</label>
			<input type="text" id="phone" name="user_phone" value="<?php if ($form_filled) {echo $_POST['user_phone'];} ?>" required>
		</div>

<?php
// si téléphone invalide on affiche un message d'erreur
if ($form_filled && !$phone_valid)
{
	echo '<p><em>Veuillez entrer un numéro de téléphone valide.</em></p>';
}
?>

		<div>
			<label for="topic">Topic :</label>
			<select id="topic" name="user_topic" required>
				<option value="information" <?php if ($form_filled && $_POST['user_topic']=="information") {echo 'selected';} ?>>Information</option>
				<option value="complaint" <?php if ($form_filled && $_POST['user_topic']=="complaint") {echo 'selected';} ?>>Complaint</option>
				<option value="subscription" <?php if ($form_filled && $_POST['user_topic']=="subscription") {echo 'selected';} ?>>Subscription</option>
				<option value="other" <?php if ($form_filled && $_POST['user_topic']=="other") {echo 'selected';} ?>>Other</option>
			</select>
		</div>

		<div>
			<label for="message">Message :</label>
			<textarea id="message" name="user_message" required><?php if ($form_filled) {echo $_POST['user_message'];} ?></textarea>
		</div>

		<div class="button">
			<button type="submit">Send your message</button>
		</div>
	</form>

</body>
</html>

<?php
}
?>