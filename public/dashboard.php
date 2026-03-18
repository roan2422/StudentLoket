<?php
$title = 'Dashboard';
include_once __DIR__ . '/views/header.php';
include_once __DIR__ . '/views/navbar-dashboard.php';
?>
 <div class="flex-1 min-h-screen pt-20 p-10"> 
  <h1 class="text-xl font-bold mb-6 lg:text-2xl pb-16">Welkom, Admin Gebruiker</h1>        
<div class="grid grid-cols-2 auto-rows-min gap-x-6 gap-y-10 lg:grid-cols-4 ">


<div class="bg-[#D9D9D9] py-10 px-8 text-xl rounded-xl h-40 text-center">
    <p class="text-[#000000] text-xl">Open tickets</p>
    <p class="font-bold text-3xl mt-1 lg:text-4xl">2</p>
</div>
  <div class="bg-[#D9D9D9] py-10 px-8 text-xl rounded-xl h-40 text-center">
    <p class="text-[#000000] text-xl">In behandeling</p>
    <p class="font-bold text-3xl mt-1 lg:text-4xl">1</p>
</div>
 <div class="bg-[#D9D9D9] py-10 px-8 text-xl rounded-xl h-40 text-center">
    <p class="text-[#000000] text-xl">Opgelost</p>
    <p class="font-bold text-3xl mt-1 lg:text-4xl">0</p>
</div>
  <div class="bg-[#D9D9D9] py-10 px-8 text-xl rounded-xl h-40 text-center">
    <p class="text-[#000000] text-xl">Totaal tickets</p>
    <p class="font-bold text-3xl mt-1 lg:text-4xl">3</p>
</div>
  <div class="bg-[#D9D9D9] p-10 text-xl rounded-xl h-60 col-span-2 lg:col-span-4 text-center lg:h-80">
      <p class="text-[#000000] text-xl">Mijn toegewezen tickets</p>
      <p class="font-thin text-xs mt-4 lg:text-sm">Je hebt nog geen toegewezen tickets</p>
  </div>
  
  </div>
</div>  
<?php include_once 'views/footer-dashboard.php'
?>