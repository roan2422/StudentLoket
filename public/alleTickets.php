<?php
$title = 'Alle_tickets';
include_once __DIR__ . '/views/header.php';
include_once __DIR__ . '/views/navbar-dashboard.php';
?>
<div class="flex-1 min-h-screen p-10">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-center font-bold text-4xl my-12">Alle tickets</h1>
        <form method="get">
        <div class="grid bg-white py-8 px-8 rounded-2xl border mb-6 gap-6 md:grid-cols-4 items-end">
            <div class="flex flex-col">
                <label for="zoeken" class="text-lg font-bold">Zoeken</label>
                <input type="text" id="zoeken" class="w-full mt-1 py-4 px-2 border rounded-xl text-center lg:text-left bg-gray-200 text-gray-500" placeholder="Zoek op titel of beschrijving">
            </div>
            <div class="flex flex-col">
                <label for="status" class="text-lg font-bold">Status</label>
                <select id="status" class="w-full mt-1 py-4 px-2 border rounded-xl text-center lg:text-left bg-gray-200 text-gray-500 hover:cursor-pointer">
                    <option>Alle</option>
                    <option>Open</option>
                    <option>In behandeling</option>
                    <option>Opgelost</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="Prioriteit" class="text-lg font-bold">Prioriteit</label>
                <select id="Prioriteit" class="w-full mt-1 py-4 px-2 border rounded-xl text-center lg:text-left bg-gray-200 text-gray-500 hover:cursor-pointer">
                    <option>Alle</option>
                    <option>Gemiddeld</option>
                    <option>Hoog</option>
                    <option>Urgent</option> 
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
            <div class="px-6 py-6 border-b font-semibold">3 tickets</div>
            <div class="divide-y">
                <div class="p-6 flex justify-between items-start">
                    <div>
                        <h2 class="font-bold">
                            Printer werkt niet in lokaal 203
                            <span class="bg-pink-200 text-pink-800 text-xs px-2 py-1 rounded ml-2">Open</span>
                        </h2>
                        <p class="text-sm mt-2 text-gray-700">
                            De printer in lokaal 203 geeft een error message...
                        </p>
                        <p class="text-xs text-gray-500 mt-2">
                            Docent Gebruiker • Scholengroep Amsterdam • hardware
                        </p>
                    </div>

                    <div class="text-right">
                        <span class="bg-[#9D9D00] text-[#636300] text-xs px-2 py-1 rounded">
                            Gemiddeld
                        </span>
                        <p class="text-xs mt-2 text-gray-500">5-3-2026</p>
                    </div>
                </div>
                <div class="p-6 flex justify-between items-start">
                    <div>
                        <h2 class="font-bold">
                            Kan niet inloggen op digitaal lesmateriaal
                            <span class="bg-blue-200 text-gray-600 text-xs px-2 py-1 rounded ml-2">In behandeling</span>
                        </h2>
                        <p class="text-sm mt-2 text-gray-700">
                            Studenten kunnen niet inloggen op het digitale lesmateriaal platform. Ze krijgen een "access denied" error.
                        </p>
                        <p class="text-xs text-gray-500 mt-2">
                            Docent Gebruiker • Scholengroep Amsterdam • Account • Toegewezen aan: Agent Medewerker
                        </p>
                    </div>

                    <div class="text-right">
                        <span class="bg-[#FF8800] text-[#824500] text-xs px-2 py-1 rounded">
                            Hoog
                        </span>
                        <p class="text-xs mt-2 text-gray-500">4-3-2026</p>
                    </div>
                </div>
                <div class="p-6 flex justify-between items-start">
                    <div>
                        <h2 class="font-bold">
                            Kan niet inloggen op digitaal lesmatriaal 
                            <span class="bg-green-200 text-gray-600 text-xs px-2 py-1 rounded ml-2">Opgelost</span>
                        </h2>
                        <p class="text-sm mt-2 text-gray-700">
                            Studenten kunnen niet inloggen op het digitale lesmateriaal platform. Ze krijgen een "access denied" error.
                        </p>
                        <p class="text-xs text-gray-500 mt-2">
                            Docent Gebruiker • Scholengroep Amsterdam • Account • Toegewezen aan: Agent Medewerker
                        </p>
                    </div>

                    <div class="text-right">
                        <span class="bg-[#FF0000] text-[#5C0000] text-xs px-2 py-1 rounded">
                            Urgent
                        </span>
                        <p class="text-xs mt-2 text-gray-500">6-3-2026</p>
                    </div>
                    
                </div>
            </div>
        </div>
</div>

<?php include_once 'views/footer-dashboard.php'
?>