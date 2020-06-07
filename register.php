<?php
include 'includes/config.php';

$messages = [
    'mail-error' => [],
    'pwd-error' => [],
    'usrnm-error' => [],
];

// Form sent

if(!empty($_POST))
{
    // Get variables
    $login = trim($_POST['login']) ;
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $username = trim($_POST['username']) ;

    // Handle errors

    if (empty($login))
    {
        $messages['mail-error'][] = 'Your email is missing';
    }
    if (empty($username))
    {
        $messages['usrnm-error'][] = 'Your username is missing';
    }

    if (strlen($password) < 5)
    {
        $messages['pwd-error'][] = 'Your password is too short';
    }

    // Check if email already exists
    $temp = 'SELECT email, username FROM users WHERE email ="'.$login.'"';

    $user = $pdo->query($temp)->fetch();
    if ($user->login === $login)
    {
        $messages['mail-error'][] = 'This mail already have an account';
    }
    if ($user->username === $username)
    {
        $messages['usrnm-error'][] = 'This username already taken';
    }
    if ($password != $password2){
        $messages['pwd-error'][] = 'Your password are different';
    }
// Success
    if (empty($messages['mail-error']) && empty($messages['pwd-error']) && empty($messages['usrnm-error']))
    {
        $data = [
            'login'=> $login,
            'password'=> hash('sha256', $password),
            'username'=> $username
        ];
        $prepare = $pdo->prepare('INSERT INTO users (email, password, username) VALUES (:login, :password, :username)');

        $prepare->execute($data);

        $_SESSION["loggedin"] = true;
        $_SESSION["login"] = $login;
        $_SESSION["username"] = $username;

        header("location:/");

        $_POST['name'] = '';
        $_POST['password'] = '';
        $_POST['username'] = '';
    }
}

// Form not sent
else
{
    $_POST['login'] = '';
    $_POST['password'] = '';
    $_POST['username'] = '';
}

include 'includes/register.php';