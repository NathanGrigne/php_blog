<?php include 'includes/header.php' ?>

<div class="login-page">
    <div class="login-container">
        <div class="login-space">
            <h1>Welcome !</h1>
            <p class="login-subtext">Create an account to continue</p>
            <form class="login-form" action="#" method="post">
                <div class="field autocomplete="off">
                    <label for="login">Email address</label>
                    <br>
                    <input class="input-text" type="text" name="login" id="login" value="<?= !empty($_POST['login']) ? $_POST['login'] : '' ?>" placeholder="john.doe@gmail.com">
                </div>

                <?php foreach ($messages['mail-error'] as $message): ?>
                    <div class="message error">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>

                <div class="field">
                    <label for="password">Password</label>
                    <br>
                    <input class="input-text" type="password" name="password" id="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="••••••••••••••">
                    <br>
                    <label for="password2">Repeat Password</label>
                    <br>
                    <input class="input-text" type="password" name="password2" id="password2" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="••••••••••••••">
                </div>

                <?php foreach ($messages['pwd-error'] as $message): ?>
                    <div class="message error">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>

                <div class="field">
                    <label for="username">Username</label>
                    <br>
                    <input class="input-text" type="text" name="username" id="username" value="<?= !empty($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="SudoTheFrenchie">
                </div>

                <div class="field">
                    <input class="submit-button" type="submit" value="Sign up">
                </div>
            </form>
        <div class="new">
            <p class="login-subtext">Already have an account ?</p>
            <a class="redirection" href="<?= '/login.php' ?>">Login here</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>