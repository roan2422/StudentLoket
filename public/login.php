<?php
session_start();

require_once 'inc/database.inc.php';
$error = "";

if (isset($_POST['login'])) {
    $emailInvoer = $_POST['email'];
    $wachtwoordInvoer = $_POST['wachtwoord'];

    $sql = "SELECT users.userid, users.email, accounts.password, accounts.role 
                FROM users 
                JOIN accounts ON users.userid = accounts.userid 
                WHERE users.email = :email 
                AND accounts.password = :password";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'email' => $emailInvoer,
        'password' => $wachtwoordInvoer
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['userid'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['firstname'] = "Gebruiker";

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "E-mailadres of wachtwoord is onjuist.";
    }
}

$title = 'Inloggen';
include_once 'views/header.php';
include_once 'views/navbar-main.php';
?>

<div class="h-[92vh] py-[20vh]">
    <div class="bg-gray-100 mx-[5vw] md:mx-[25vw] p-[20px] rounded-[20px] flex flex-col items-center">
        <div>
            <p class="text-[50px]">Inloggen</p>
        </div>
        <form>
            <div class="mt-[20px]">
                <p class="text-[20px] text-center">E-mailadres</p>
                <input required class="md:w-[300px] mt-[10px] border-[1.5px] rounded-[6px] p-[5px]" placeholder="Uw.email@school.nl" type="email" name="email-login-input" id="email-login-input">
            </div>
            <div class="mt-[20px]">
                <p class="text-[20px] text-center">Wachtwoord</p>
                <input required class="md:w-[300px] mt-[10px] border-[1.5px] rounded-[6px] p-[5px]" type="password" name="wachtwoord-login-input" id="wachtwoord-login-input">
            </div>
            <div class="mt-[50px] w-full flex justify-center md:justify-end">
                <button class="cursor-pointer bg-accent-pink py-[10px] px-[15px] text-white rounded-[10px]">Inloggen</button>
            </div>
        </form>
    </div>
</div>

<?php include_once 'views/footer.php'; ?>