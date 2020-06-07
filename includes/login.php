<?php include 'includes/header.php' ?>

<div class="login_page">
    <div class="login_container">
        <div class="login_space">
            <h1>Welcome back !</h1>
            <p class="login_subtext">Please login to continue</p>
            <form action="#" method="post">
                <div class="field autocomplete="off">
                    <label for="login">Email</label>
                    <br>
                    <input type="text" name="login" id="login" value="<?= !empty($_POST['login']) ? $_POST['login'] : '' ?>" placeholder="john.doe@gmail.com">

                    <?php foreach ($messages['mail-error'] as $message): ?>
                        <div class="message error">
                            <?= $message; ?>
                            <img src="<?= URL ?>assets/images/error.svg">
                        </div>
                    <?php endforeach; ?>

                    <br>
                    <label for="login">Username</label>
                    <br>
                    <input type="text" name="username" id="username" value="<?= !empty($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Kikou48">

                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="••••••••••••••">

                    <?php foreach ($messages['pwd-error'] as $message): ?>
                        <div class="message error">
                            <?= $message; ?>
                            <img src="<?= URL ?>assets/images/error.svg">
                        </div>
                    <?php endforeach; ?>

                </div>

        <div class="field">
                    <input class="submit_button" type="submit" value="Login">
                </div>
            </form>
        <div class="new">
            <p class="login_subtext">You are new ?</p>
            <a href="<?= '/register.php' ?>">Create account here</a>
        </div>
    </div>
</div>


<?php include 'includes/footer.php' ?>