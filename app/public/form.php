<?php

session_start();

class User {

    private $username;
    private $age;

    public function __construct($username, $age)
    {
        $this->username = $username;
        $this->age = $age;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getAge() {
        return $this->age;
    }

    public function saveToSession() {
        $_SESSION['users'][] = $this;
    }

}

class FormValidator {

    private $errors = [];

    public function processValue($formData) {
        $processText = function($text) {
            return strip_tags($text);
        };
        return array_map($processText, $formData);
    }

    public function isValid($formData) {
        $this->errors = [];
        $this->checkData($formData);

        return false === $this->hasErrors();
    }

    public function hasErrors() {
        return count($this->getErrors()) > 0;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function addError($field, $error) {
        $this->errors[$field] = $error;
        return $this;
    }

    public function checkData($formData) {

        if (array_key_exists('username', $formData) && strlen($formData['username'])== 0) {
            $this->addError('username', 'Username is required');
        }

        if (!(array_key_exists('age', $formData) && is_int(intval($formData['age'])) && intval($formData['age']) > 0)) {
            $this->addError('age', 'Age should be a positive number');
        }
        return $this;
    }

    public function getFieldErrors($fieldName)
    {
        if (array_key_exists($fieldName, $this->errors)) {
            return $this->errors[$fieldName];
        }
        return '';
    }
}

$formDataValidator = new FormValidator();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_POST = $formDataValidator->processValue($_POST);
    if ($formDataValidator->isValid($_POST)) {
        $user = new User($_POST['username'], $_POST['age']);
        $user->saveToSession();

        echo "<p class='valid'>User added to session !</p>";
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
        .valid {color: green;}
    </style>
</head>
<body>

<form method="post">
    User name: <input type="text" name="username" >
    <span class="error">* <?=$formDataValidator->getFieldErrors('username')?></span>
    <br><br>
    Age: <input type="number" name="age" >
    <span class="error">* <?=$formDataValidator->getFieldErrors('age')?></span>
    <br><br>
    <p><span class="error">* required field.</span></p>
    <input type="submit" name="submit" value="Submit">
</form>

<?php

if ($_SESSION && array_key_exists('users', $_SESSION) && count($_SESSION['users'])) {

    echo "<p>Users : </p>";
    echo "<ul>";
    foreach ($_SESSION['users'] as $user) {
        echo "<li>".$user->getUsername(). " (".$user->getAge()." years old)</li>";
    }
    echo "</ul>";
}

?>
</body>
</html>
