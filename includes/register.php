<?php include 'includes/header.php' ?>

<div class="login_page">
    <div class="login_container">
        <div class="login_space">
            <h1>Welcome !</h1>
            <p class="login_subtext">Create an account to continue</p>
            <form action="#" method="post">
                <div class="field autocomplete="off">
                    <label for="login">Email address</label>
                    <br>
                    <input type="text" name="login" id="login" value="<?= !empty($_POST['login']) ? $_POST['login'] : '' ?>" placeholder="john.doe@gmail.com">
                </div>

                <?php foreach ($messages['mail-error'] as $message): ?>
                    <div class="message error">
                        <?= $message; ?>
                        <img src="<?= URL ?>assets/images/error.svg">
                    </div>
                <?php endforeach; ?>

                <div class="field">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="••••••••••••••">
                    <input type="password" name="password2" id="password2" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="••••••••••••••">
                </div>

                <?php foreach ($messages['pwd-error'] as $message): ?>
                    <div class="message error">
                        <?= $message; ?>
                        <img src="<?= URL ?>assets/images/error.svg">
                    </div>
                <?php endforeach; ?>

                <div class="field">
                    <label for="login">Username</label>
                    <br>
                    <input type="text" name="username" id="username" value="<?= !empty($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="DarkPhoenix">
                </div>

                <div class="field">
                    <input class="submit_button" type="submit" value="Sign up">
                </div>
            </form>
        <div class="new">
            <p class="login_subtext">Already have an account ?</p>
            <a href="<?= '/login.php' ?>">Login here</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>