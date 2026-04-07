<?php
$title = 'Ticket Aanmaken';
require_once 'inc/database.inc.php';
require_once 'views/header.php';
require_once 'views/navbar-main.php';
require_once 'inc/tickets.inc.php';
require_once 'inc/schools.inc.php';
require_once 'inc/users.inc.php';
$schools = getschoolnames($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {                                       //Toevoegen dat wanneer er een fout optreed er niks gecommit wordt?
        $user = [
            'name' => $_POST['naam-ticket-input'],
            'email' => $_POST['e-mail-ticket-input']
        ];
        $userid = adduser($conn, $user);
        $ticket = [
            'title' => $_POST['titel-ticket-input'],
            'description' => $_POST['details-ticket-input'],
            'school' => $_POST['school-ticket-input'],
            'maker' => $userid
        ];
        addticket($conn, $ticket);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>

<div class="h-[120vh] py-[11vh]">
    <div class="bg-gray-100 mx-[5vw] md:mx-[25vw] p-[20px] rounded-[20px]">
        <div>
            <p class="text-7xl text-[35px] text-center">Ticket Indienen</p>
        </div>
        <form method="POST">
            <div class="mt-[30px] flex justify-between gap-[20px]">
                <div class="w-[50%]">
                    <p>Naam *</p>
                    <input required class="mt-[10px] w-full border-[1.5px] rounded-[10px] px-[10px] py-[5px]" placeholder="Voor-en Achternaam" type="text" name="naam-ticket-input" id="naam-ticket-input">
                </div>
                <div class="w-[50%]">
                    <p>E-mailadres *</p>
                    <input required class="mt-[10px] w-full border-[1.5px] rounded-[10px] px-[10px] py-[5px]" placeholder="uw.email@school.nl" type="email" name="e-mail-ticket-input" id="e-mail-ticket-input">
                </div>
            </div>
            <div class="mt-[10px]">
                <p>School *</p>
                <select required class="mt-[10px] w-full border-[1.5px] rounded-[10px] px-[10px] py-[5px]" placeholder="Uw huidige school" name="school-ticket-input" id="school-ticket-input">
                    <option value="">--Selecteer een school--</option>
                    <?php foreach ($schools as $school) { ?>
                        <option value="<?= strval($school['schoolid']) ?>"><?= $school['schoolname'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-[10px]">
                <p>Korte titel van het probleem *</p>
                <input required class="mt-[10px] w-full border-[1.5px] rounded-[10px] px-[10px] py-[5px]" placeholder="Geef een korte titel voor uw titel" type="text" name="titel-ticket-input" id="titel-ticket-input">
            </div>
            <div class="mt-[10px]">
                <p>Details van uw probleem/vraag</p>
                <textarea required class="h-[200px] mt-[10px] w-full border-[1.5px] rounded-[10px] px-[10px] py-[5px]" placeholder="Geef een beschrijving van uw probleem/vraag" name="details-ticket-input" id="details-ticket-input"></textarea>
            </div>
            <div class="mt-[30px]">
                <button class="rounded-[10px] cursor-pointer bg-primary-blue text-white w-full text-7xl text-[30px] p-[10px]">Ticket Indienen</button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'views/footer.php';
?>