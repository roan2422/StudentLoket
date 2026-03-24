<?php
$title = 'Alle_tickets';
require_once 'inc/database.inc.php';
require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/views/navbar-dashboard.php';
require_once 'inc/tickets.inc.php';
$tickets = gettickets($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $args = [
            'search' => $_POST['search'],
            'priority' => $_POST['priority'],
            'status' => $_POST['status']
        ];
        $tickets = searchtickets($conn, $args);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<div class="flex-1 min-h-screen p-10">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-center font-bold text-4xl my-12">Alle tickets</h1>
        <form method="POST">
            <div class="grid bg-white py-8 px-8 rounded-2xl border mb-6 gap-6 md:grid-cols-4 items-end">
                <div class="flex flex-col">
                    <label for="zoeken" class="text-lg font-bold">Zoeken</label>
                    <input type="text" id="zoeken" class="w-full mt-1 py-4 px-2 border rounded-xl text-center lg:text-left bg-gray-200 text-gray-500" placeholder="Zoek op titel of beschrijving" name="search">
                </div>
                <div class="flex flex-col">
                    <label for="status" class="text-lg font-bold">Status</label>
                    <select id="status" class="w-full mt-1 py-4 px-2 border rounded-xl text-center lg:text-left bg-gray-200 text-gray-500 hover:cursor-pointer" name="status">
                        <option value="">Alle</option>
                        <option value="Open">Open</option>
                        <option value="In behandeling">In behandeling</option>
                        <option value="Opgelost">Opgelost</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="Prioriteit" class="text-lg font-bold">Prioriteit</label>
                    <select id="Prioriteit" class="w-full mt-1 py-4 px-2 border rounded-xl text-center lg:text-left bg-gray-200 text-gray-500 hover:cursor-pointer" name="priority">
                        <option value="">Alle</option>
                        <option value="Geen">Geen</option>
                        <option value="Laag">Laag</option>
                        <option value="Gemiddeld">Gemiddeld</option>
                        <option value="Hoog">Hoog</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-bold invisible">Filter</span>
                    <button type="submit" class="w-full mt-1 py-4 bg-blue-500 text-white rounded-2xl hover:cursor-pointer hover:underline hover:bg-blue-400 transition-colors">
                        Filteren
                    </button>
                </div>
            </div>
        </form>
        <div class="bg-white rounded-2xl border overflow-hidden mt-6">
            <div class="px-6 py-6 border-b font-semibold"><?= count($tickets) ?> tickets</div>
            <div class="divide-y">
                <?php foreach ($tickets as $ticket):
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
                    <div class="p-6 flex justify-between items-start">
                        <div>
                            <h2 class="font-bold">
                                <?= $ticket['title'] ?>
                                <span class="<?= $statuscolor ?> text-xs px-2 py-1 rounded ml-2"><?= $ticket['status'] ?></span>
                            </h2>
                            <p class="text-sm mt-2 text-gray-700">
                                <?= $ticket['description'] ?>
                            </p>
                            <p class="text-xs text-gray-500 mt-2">
                                <?= $ticket['maker'] ?> • <?= $ticket['schoolname'] ?><?php if (!empty($ticket['assignee'])): ?> • Toegewezen aan: <?= $ticket['assignee'] ?> <?php endif; ?>
                            </p>
                        </div>
                        <div class="text-right">
                            <?php if ($ticket['priority'] != 'Geen'): ?>
                                <span class="<?= $prioritycolor ?> text-xs px-2 py-1 rounded">
                                    <?= $ticket['priority'] ?>
                                </span>
                            <?php endif; ?>
                            <p class="text-xs mt-2 text-gray-500"><?= date_format(date_create($ticket['creationdate']), "d-m-Y") ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include_once 'views/footer-dashboard.php'
    ?>