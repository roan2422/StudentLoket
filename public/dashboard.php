<?php
  $title = 'Dashboard';
  include_once 'views/header.php';
?>
    
    
    <div class="relative min-h-screen md:flex">
        <?php
          include_once 'views/navbar-dashboard.php';
        ?>
      
        <div class="text-center">
          <div class="py-10">
            <h2 class="text-xs">Admin gebruiker</h2>
            <p class="text-xs font-thin">Scholengroep Amsterdam</p>
          </div>
          <a href="" class="flex flex-row justify-center mx-5 py-3 bg-[#FF008C] rounded-2xl hover:bg-[#FF87BF] mb-8">
            <img src="../img/logout.png" alt="logout" class="w-5 h-5 mt-1" />
            <h2 class="text-xl ml-2">Uitloggen</h2>
          </a>
        </div>
      </div>
    </div>

    <script src="../javascript/sidebar.js"></script>
  </body>
</html>
