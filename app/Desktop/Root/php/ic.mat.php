<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = idErr = birthErr = phone1Err = "";
$name = $email = $gender = $comment = $website = id = birth = phone = phone1 = "";

if ((isset($_POST['submit'])) {
  if (empty($_POST["nombre"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["nombre"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["direccion"])) {
    $address = "address is required";
  } else {
    $address = test_input($_POST["direccion"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["cedula"])) {
    $idErr = "ID is required";
  } else {
    $id = test_input($_POST["cedula"]);
  }

  if (empty($_POST["fecha"])) {
    $birthErr = "date is required";
  } else {
    $birth = test_input($_POST["fecha"]);
  }

  if (empty($_POST["nacionalidad"])) {
    $nac = "ID is required";
  } else {
    $nac = test_input($_POST["nacionalidad"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["phone1"])) {
    $phone1Err = "";
  } else {
    $phone1 = test_input($_POST["phone1"]);
  }

  $query = "INSERT INTO matricula(name, address, IDcard, birth, nacionality, gender, phone, phone1) VALUES('".$name."','".$address."','".$id."','".$birth."','".$nac."','".$gender."','".$phone."','".$phone1."')";
    $create_mat_query = mysqli_query($IC, $query);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>