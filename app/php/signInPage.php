<div class='content_login'>
    <form action='php/signInVerification.php' method='POST'>
        <img id='diamond_gif' alt='Sign in gif' src='img/diamond_gif.gif' />
        <div class='login_informations'>
            <p class='login_pseudo'>Login :</p>
            <input class='pseudo_input' type='text' name='login' />
            <p class='login_passsword'>Password :</p>
            <input class='password_input' type='password' name='pwd' />
        </div>
        <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == -1) {
                    echo "<p class='error_msg'>Login or password incorrect.</p>";
                } else if ($_GET["error"] == 0) {
                    echo "<p class='error_msg'>Incorrect password.</p>";
                }
            }
        ?>
        <div class='login_button'><input type='submit' value='Sign In'></div>
    </form>
</div>