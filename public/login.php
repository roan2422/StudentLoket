<?php
    $title = 'Home';
    include_once 'views/header.php';
    include_once 'views/navbar-main.php';
?>

<div class="h-[92vh]">
    <div>
        <div>
            <p>Inloggen</p>
        </div>
        <form>
            <div>
                <p>E-mailadres</p>
                <input placeholder="Uw.email@school.nl" type="email" name="email-login-input" id="email-login-input">
            </div>
            <div>
                <p>Wachtwoord</p>
                <input type="password" name="wachtwoord-login-input" id="wachtwoord-login-input">
            </div>
        </form>
        <div>
            <button>Inloggen</button>
        </div>
    </div>
</div>

<?php
            include_once 'views/footer.php';
        ?>