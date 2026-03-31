<?php
$title = 'Tickets Openen';
require_once 'inc/database.inc.php';
require_once 'views/header.php';
require_once 'views/navbar-dashboard.php';
require_once 'inc/tickets.inc.php';
require_once 'inc/enum.inc.php';

$id = $_GET['id'];
$ticket = getticketoverview($conn, $id);
$statuses = getEnumOptions($conn, 'tickets', 'status');
$prioritys = getEnumOptions($conn, 'tickets', 'priority');

if ($ticket['status'] == 'Open') {
    $statuscolor = 'bg-pink-200 text-pink-800';
} else if ($ticket['status'] == 'In behandeling') {
    $statuscolor = 'bg-blue-200 text-gray-600';
} else {
    $statuscolor = 'bg-green-200 text-gray-600';
}
if ($ticket['priority'] == 'Laag') {
    $prioritycolor = 'bg-[#9D9D00] text-[#636300]';
} else if ($ticket['priority'] == 'Gemiddeld') {
    $prioritycolor = 'bg-[#FF8800] text-[#824500]';
} else {
    $prioritycolor = 'bg-[#FF0000] text-[#5C0000]';
}
?>


<div class="h-[100vh] md:w-[90vw]">
    <div class="shadow-2xl border rounded-[20px] mx-[5vw] md:mx-[20vw] mt-[6vh]">
        <div class="border-b p-[20px] flex flex-col gap-[10px]">
            <div>
                <div class="flex flex-col md:flex-row justify-between gap-[20px] md:gap-[0]">
                    <p class="font-semibold text-xl text-center md:text-left"><?= $ticket['title'] ?></p>
                    <p class="<?= $statuscolor ?> px-[5px] rounded-[5px] text-center md:text-left"><?= $ticket['status'] ?></p>
                </div>
            </div>
            <div class="flex gap-[20px]">
                <p><?= $ticket['name'] ?></p>
                <p><?= $ticket['creationdate'] ?></p>
            </div>
            <div class="flex gap-[20px] flex-col md:flex-row">
                <p class="<?= $prioritycolor ?> px-[5px] rounded-[5px] text-center md:text-left">Prioriteit: <?= $ticket['priority'] ?></p>
                <p class="bg-[#8cd7af] text-[#1db162] px-[5px] rounded-[5px] text-center md:text-left"><?= $ticket['schoolname'] ?></p>
            </div>
        </div>
        <div class="border-b p-[20px]">
            <div class="flex flex-col gap-[5px]">
                <p class="text-center md:text-left font-semibold text-xl">Beschrijving</p>
                <p><?= $ticket['description'] ?></p>
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
                            <?php foreach ($statuses as $status): ?>
                                <option value="<?= htmlspecialchars($status) ?>" <?= $status === $ticket['status'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($status) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold">Priotiriteit wijzigen</p>
                        <select class="cursor-pointer border border-gray-400 bg-gray-200 px-[6px] py-[3px] rounded-[7px] md:w-[170px]" name="" id="">
                            <?php foreach ($prioritys as $priority): ?>
                                <option value="<?= htmlspecialchars($priority) ?>" <?= $priority === $ticket['priority'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($priority) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="flex justify-end md:justify-center"><button class="border border-primary-blue cursor-pointer bg-primary-blue py-[3px] text-white rounded-[7px] md:w-[170px] px-[10px]">Aan mij toewijzen</button></div>
                </div>
            </div>
        </div>
        <div class="p-[20px]">
            <div class="flex flex-col gap-[10px]">
                <p class="text-center md:text-left font-semibold text-xl">Notitie</p>
                <textarea class="border border-gray-400 rounded-[10px] p-[10px] bg-gray-200 w-full h-[150px]" placeholder="Typ je notitie hier..." name="" id=""><?= $ticket['notes'] ?></textarea>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'views/footer-dashboard.php';
?>