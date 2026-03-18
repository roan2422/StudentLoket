<?php
    $title = 'Home';
    include_once 'views/header.php';
    include_once 'views/navbar-main.php';
?>
        <div>
            <div class="homepage-title-div h-[20vh] flex justify-center items-end text-7xl p-[20px] font-bold">
                <p>StudentLoket</p>
            </div>
            <div class="homepage-slogan-div flex flex-col items-center h-[20vh] p-[20px] text-[35px]">
                <p>Het centrale platform voor IT-support binnen uw scholengroep.</p>
                <p>Snel, efficient en overzichtelijk problemen melden en oplossen.</p>
            </div>
            <div class="homepage-options-buttons-div flex justify-center gap-[40px]">
                <button onclick="document.location='create-ticket.php'" class="cursor-pointer homepage-ticket-indienen-button bg-accent-pink border border-accent-pink bg-none py-[15px] px-[20px] text-white text-[20px] text-7xl rounded-[6px]">Ticket indienen →</button>
                <button class="cursor-pointer homepage-inloggen-voor-medewerkers-button border bg-white bg-none py-[15px] px-[20px] text-accent-pink text-[20px] text-7xl rounded-[6px]">Inloggen voor medewerkers</button>
            </div>
            <div class="homepage-cards-div flex justify-between py-[150px] mx-[50px]">
                <div class="homepage-card-1 text-white aspect-[4/3] p-[40px] rounded-[25px] text-center flex flex-col items-center justify-evenly bg-primary-blue">
                    <p class="card-title text-[35px] text-7xl">Eenvoudig melden</p>
                    <p class="card-text text-[25px]">
                        Dien eenvoudig een ticket in zonder<br />
                        inloggen. Beschrijf uw probleem en<br />
                        wij nemen het op.
                    </p>
                </div>
                <div class="homepage-card-2 text-white aspect-[4/3] p-[40px] rounded-[25px] text-center flex flex-col items-center justify-evenly bg-accent-pink">
                    <p class="card-title text-[35px] text-7xl">Snelle reactie</p>
                    <p class="card-text text-[25px]">
                        Ons team van technische<br />
                        medewerkers pakt uw ticket snel op<br />
                        en helpt u verder.
                    </p>
                </div>
                <div class="homepage-card-3 text-white aspect-[4/3] p-[40px] rounded-[25px] text-center flex flex-col items-center justify-evenly bg-accent-green">
                    <p class="card-title text-[35px] text-7xl">Volledige transparantie</p>
                    <p class="card-text text-[25px]">
                        Ons team van technische<br />
                        medewerkers pakt uw ticket snel op<br />
                        en helpt u verder.
                    </p>
                </div>
            </div>
            <div class="homepage-wide-card-1-div">
                <div class="wide-card-1-div flex bg-accent-green rounded-[25px] justify-evenly m-[50px] h-[35vh] items-center">
                    <div class="wide-card-1 text-white text-center">
                        <p class="wide-card-1-number text-[50px] text-7xl">1</p>
                        <p class="wide-card-1-title text-[30px] text-7xl">Ticket indienen</p>
                        <p class="wide-card-1-text">
                            Beschrijf uw probleem of vraag in het<br />
                            ticketformulier
                        </p>
                    </div>
                    <div class="wide-card-1 text-white text-center">
                        <p class="wide-card-1-number text-[50px] text-7xl">2</p>
                        <p class="wide-card-1-title text-[30px] text-7xl">Ticket wordt opgepakt</p>
                        <p class="wide-card-1-text">
                            Een medewerker neemt uw ticket in<br />
                            behandeling
                        </p>
                    </div>
                    <div class="wide-card-1 text-white text-center">
                        <p class="wide-card-1-number text-[50px] text-7xl">3</p>
                        <p class="wide-card-1-title text-[30px] text-7xl">Probleem oplossen</p>
                        <p class="wide-card-1-text">
                            We werken aan een oplossing en<br />
                            houden u op de hoogte
                        </p>
                    </div>
                    <div class="wide-card-1 text-white text-center">
                        <p class="wide-card-1-number text-[50px] text-7xl">4</p>
                        <p class="wide-card-1-title text-[30px] text-7xl">Ticket afgerond</p>
                        <p class="wide-card-1-text">
                            Het probleem is opgelost en het<br />
                            ticket wordt gesloten
                        </p>
                    </div>
                </div>
            </div>
            <div class="homepage-wide-card-2-div">
                <div class="wide-card-2 bg-primary-blue m-[50px] rounded-[25px] h-[35vh] flex flex-col items-center justify-between text-center text-white">
                    <div class="wide-card-top">
                        <p class="wide-card-2-title text-[35px] mt-[50px] text-7xl">Voor medewerkers</p>
                        <p class="wide-card-2-text text-[25px] m-[10px]">
                            Bent u medewerker van de helpdesk? Log in om tickets te beheren, toe te wijzen en op te
                            lossen.
                        </p>
                    </div>
                    <div class="wide-card-bottom">
                        <button class="cursor-pointer wide-card-2-medewerker-login-button bg-accent-green border-none px-[25px] py-[30px] text-white text-[20px] rounded-[15px] text-7xl m-[30px]">Medewerker login</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include_once 'views/footer.php';
        ?>