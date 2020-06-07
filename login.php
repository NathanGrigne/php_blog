<?php
$title = 'The Green Thumb - Login';

include 'includes/config.php';

// Error and success messages

$messages = [
    'mail-error' => [],
    'pwd-error' => [],
    'usrnm-error' => [],
];

if (!empty($_POST))
{
    // Get variables
    $login = trim($_POST['login']) ;
    $password = $_POST['password'];
    $username = $_POST['username'];

    // Handle errors

    if (empty($login))
    {
        $messages['mail-error'][] = 'Please enter an email address';
    }

    if (empty($password))
    {
        $messages['pwd-error'][] = 'Please enter a password';
    }
    if (!empty($login) && filter_var($login, FILTER_VALIDATE_EMAIL) == FALSE)
    {
        $messages['mail-error'][] = 'Please enter a valid email address';
    }

    // Success
    if (empty($messages['mail-error']) && empty($messages['pwd-error']))
    {
        $data = [
            'name'=> $login,
            'password' => hash('sha256', $password)
        ];

        // Check if username exists
        $temp = 'SELECT id, email FROM users WHERE email = \''.$data['name'].'\' AND password = \''.$data['password'].'\'';

        $user = $pdo->query($temp)->fetch();
        if ($user != FALSE)
        {

            $_SESSION["loggedin"] = true;
            $_SESSION["login"] = $login;
            $_SESSION["username"] = $username;
            header('Location:/');
            exit;
        }
        else
        {
            $messages['pwd-error'][] = 'Incorrect informations';
        }
    }
}

include 'includes/login.php';