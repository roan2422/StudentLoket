<?php
    $title = 'Home';
    include_once 'views/header.php';
    include_once 'views/navbar-main.php';
?>

<div class="h-[92vh] py-[20vh]">
    <div class="bg-gray-100 mx-[25vw] p-[20px] rounded-[20px] flex flex-col items-center">
        <div>
            <p class="text-[50px]">Inloggen</p>
        </div>
        <form>
            <div class="mt-[20px]">
                <p class="text-[20px] text-center">E-mailadres</p>
                <input required class="w-[300px] mt-[10px] border-[1.5px] rounded-[6px] p-[5px]" placeholder="Uw.email@school.nl" type="email" name="email-login-input" id="email-login-input">
            </div>
            <div class="mt-[20px]">
                <p class="text-[20px] text-center">Wachtwoord</p>
                <input required class="w-[300px] mt-[10px] border-[1.5px] rounded-[6px] p-[5px]" type="password" name="wachtwoord-login-input" id="wachtwoord-login-input">
            </div>
            <div class="mt-[50px] w-full flex justify-end">
                <button class="cursor-pointer bg-accent-pink py-[10px] px-[15px] text-white rounded-[10px]">Inloggen</button>
            </div>
        </form>
    </div>
</div>

<?php
            include_once 'views/footer.php';
        ?>