
<?php
$title = 'Tickets Openen';
require_once 'views/header.php';
require_once 'views/navbar-dashboard.php';
?>

<div class="h-[100vh] md:w-[90vw]">
    <div class="shadow-2xl border rounded-[20px] mx-[5vw] md:mx-[20vw] mt-[6vh]">
        <div class="border-b p-[20px] flex flex-col gap-[10px]">
            <div>
                <div class="flex flex-col md:flex-row justify-between gap-[20px] md:gap-[0]">
                <p class="font-semibold text-xl text-center md:text-left">Printer werkt niet in lokaal 203</p>
                <p class="bg-[#ec8ac0] text-[#d81681] px-[5px] rounded-[5px] text-center md:text-left">Open</p>
                </div>
            </div>
            <div class="flex gap-[20px]">
                <p>Docent Gebruiker</p>
                <p>5-3-2026</p>
            </div>
            <div class="flex gap-[20px] flex-col md:flex-row">
                <p class="bg-[#cece7f] text-[#9e9e02] px-[5px] rounded-[5px] text-center md:text-left">Prioriteit: Gemiddeld</p>
                <p class="bg-[#8cd7af] text-[#1db162] px-[5px] rounded-[5px] text-center md:text-left">Scholengroep Amsterdam</p>
            </div>
        </div>
        <div class="border-b p-[20px]">
            <div class="flex flex-col gap-[5px]">
                <p class="text-center md:text-left font-semibold text-xl">Beschrijving</p>
                <p>De printer in lokaal 203 geeft een error message en wil niet printen. Ik heb al geprobeerd om hem opnieuw op te starten.</p>
            </div>
        </div>
        <div class="border-b bg-[#d4eaf5] p-[20px]">
            <div class="flex flex-col gap-[20px]">
                <div>
                <p class="text-center md:text-left font-semibold text-xl">Ticket beheren</p>
                </div>
                <div class="flex flex-col md:flex-row justify-between gap-[20px] md:gap-[0] md:items-end">
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold">Status Wijzigen</p>
                        <select class="cursor-pointer border border-gray-400 bg-gray-200 px-[6px] py-[3px] rounded-[7px] md:w-[170px]" name="" id="">
                            <option value="" disabled selected hidden>Open</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold">Priotiriteit wijzigen</p>
                        <select class="cursor-pointer border border-gray-400 bg-gray-200 px-[6px] py-[3px] rounded-[7px] md:w-[170px]" name="" id="">
                            <option value="" disabled selected hidden>Gemiddeld</option>
                        </select>
                    </div>
                    <div class="flex justify-end md:justify-center"><button class="border border-primary-blue cursor-pointer bg-primary-blue py-[3px] text-white rounded-[7px] md:w-[170px] px-[10px]">Aan mij toewijzen</button></div>
                </div>
            </div>
        </div>
        <div class="p-[20px]">
            <div class="flex flex-col gap-[10px]">
                <p class="text-center md:text-left font-semibold text-xl">Notitie</p>
                <textarea class="border border-gray-400 rounded-[10px] p-[10px] bg-gray-200 w-full h-[150px]" placeholder="Typ je notitie hier..." name="" id=""></textarea>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'views/footer-dashboard.php';
?>