<?php

//definition des messages d'erreurs
const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
const ERROR_LENGTH = 'Le champ ne peut etre vide';
const ERROR_EMAIL = "L'email n'est pas valide";
//declaration d'un tableau qui va contenir les erreurs
$errors = [
  'firstName' => '',
  'lastName' => '',
  'email' => '',
  'phoneNumber' => '',
  'message' => ''
];

//condition si la requete est quest alors j'applique des filtres
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$_POST = filter_input_array(INPUT_POST, [
  'firstName' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  'lastName' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  'email' => FILTER_SANITIZE_EMAIL,
  'phoneNumber' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  'message' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
]);

  $firstName = $_POST['firstName'] ?? '';
  $lastName = $_POST['lastName'] ?? '';
  $email = $_POST['email'] ?? '';
  $phoneNumber = $_POST['phoneNumber'] ?? '';
  $message = $_POST['message'] ?? '';
  
  if (!$firstName){
    $errors['firstName'] = ERROR_REQUIRED;
  } 
  if (!$lastName){
    $errors['lastName'] = ERROR_REQUIRED;
  } 

  if(!$phoneNumber){
    $errors['phoneNumber'] = ERROR_REQUIRED;
  } 

  if(!$email) {
    $errors['email'] = ERROR_REQUIRED;
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = ERROR_EMAIL;
  }



}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire</title>
</head>
<body>
    
</body>
</html>

<form  action=""  method="post">
    <div>

      <label  for="nom">Nom :</label>

      <input  type="text"  id="firstName"  name="firstName" required = "required">
      
      <?= $errors['firstName'] ? '<p>' . $errors['firstName'] . '</p>' : "" ?>
    </div>

    <div>

        <label  for="prénom">Prénom :</label>
  
        <input  type="text"  id="prénom"  name="lastName" required = "required">
        <?= $errors['lastName'] ? '<p>' . $errors['lastName'] . '</p>' : "" ?>

    </div>

    <div>

        <label  for="tel">Télephone :</label>
  
        <input  type="text"  id="Télephone"  name="phoneNumber" required = "required">
        <?= $errors['phoneNumber'] ? '<p>' . $errors['phoneNumber'] . '</p>' : "" ?>
    </div>

    <div>
        <label for="emailHeader">Sujet :</label>
        <select name="subject" required = "required"> 
            <option value="" selected>--Sélectionner une option--</option>
            <option value="Remboursement">Remboursement</option>
            <option value="sav">S.A.V</option>
            <option value="Autre">Autre</option>
        </select>
    </div>

    <div>

      <label  for="courriel">Courriel :</label>

        <input  type="email"  id="courriel"  name="email" required = "required">
        <?= $errors['email'] ? '<p>' . $errors['email'] . '</p>' : "" ?>
    </div>

    <div>

      <label  for="message">Message :</label>

      <textarea  id="message"  name="message" required = "required"></textarea>
      <?= $errors['message'] ? '<p>' . $errors['message'] . '</p>' : "" ?>


    </div>

    <div  class="button">

      <button  type="submit" name="submit">Envoyer votre message</button>

    </div>

  </form>