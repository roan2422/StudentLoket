<?php
$title = 'Ticket Aanmaken';
require_once 'views/header.php';
require_once 'views/navbar-main.php';
?>

<div class="h-[110vh] py-[11vh]">
    <div class="bg-gray-100 ml-[25vw] mr-[25vw] p-[20px] rounded-[20px]">
        <div>
            <p class="text-7xl text-[35px] text-center">Ticket Indienen</p>
        </div>
        <form>
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
                </select>
            </div>
            <div class="mt-[10px]">
                <p>Korte titel van het probleem *</p>
                <input required class="mt-[10px] w-full border-[1.5px] rounded-[10px] px-[10px] py-[5px]" placeholder="Geef een korte titel voor uw titel" type="text" name="titel-ticket-input" id="titel-ticket-input">
            </div>
            <div class="mt-[10px]">
                <p>Details van uw probleem/vraag</p>
                <textarea required class="h-[200px] mt-[10px] w-full border-[1.5px] rounded-[10px] px-[10px] py-[5px]" placeholder="Geef een beschrijving van uw probleem/vraag" type="text" name="details-ticket-input" id="details-ticket-input"></textarea>
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