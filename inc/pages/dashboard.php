<?php

if (!$accesos_login) {
    redir_js("login");
    exit;
}


$all_data = getAllDataUser($_SESSION["id"]);

?>
<section class="marco">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="Logo">
                <a class="navbar-brand" href="/">
                    <img src="/img/img/images/1_5143645411986112722.png" alt=" ">
                </a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link " href="/"><i class="fas fa-home"></i>Inicio </a>
                <a class="nav-link " href="#"><i class="fas fa-th"></i> Dashboard </a>
                <a class="nav-link " href="#"><i class="fas fa-search"></i> Explorer </a>
                <a class="nav-link " href="#"><i class="fas fa-download"></i> Descargas </a>
                <a class="nav-link " href="#"><i class="fas fa-clipboard-check"></i> Exchange </a>
                <a class="nav-link " href="off"><i class="fas fa-sign-in-alt"></i> Salir</a>
            </div>
        </nav>
    </header>
    <div class="marcoDo">
        <section class="Dashboard">
            <div class="NavBar">
                <a href="#"><i class="fas fa-wallet"></i> MONEDERO</a>
                <a href="#"><i class="fas fa-piggy-bank"></i> AHORRO</a>
                <a href="#"><i class="fas fa-shopping-cart"></i> SERVICIOS Y TIENDA</a>
                <a href="#"><i class="fas fa-sync-alt"></i> INTERCAMBIO P2P</a>
            </div>
            <div class="hero_iconos">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook-square"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-telegram"></i></a>
                <a href="#"><i class="fab fa-btc"></i></a>
            </div>
            <div class="Contenido">
                <h3>
                    Monedero Online LKRcoin
                </h3>
                <hr>
                <small>Monedero > Escritorio</small>
                <div style="margin-top: 10%;">
                    <div class="Contenido_Balances">
                        <h6>Balace Disponible</h6>
                        <p><?= $all_data["balance"] ?> LKR</p>
                        <button>Transferir</button>
                    </div>
                    <div class="Contenido_Balances">
                        <h6>Balace Ahorro</h6>
                        <p><?= $all_data["balance"] ?> LKR</p>
                        <button>Transferir</button>
                    </div>
                    <div class="Contenido_Balances">
                        <h6>Balace Market</h6>
                        <p>0.00000000 LKR</p>
                        <button>Transferir</button>
                    </div>
                    <div class="Contenido_Balances">
                        <h6>Balace P2P</h6>
                        <p>0.00000000 LKR</p>
                        <button>Transferir</button>
                    </div>
                </div>
                <h6 style="margin-top: 5%;">
                    Monedero
                    <pre id='p1'><?= BuscarWallet($_SESSION["id"]) ?></pre>
                    <button id="btn" onclick="copiar_link_ref()" style="padding: 0%; width: 10%;">Copiar</button>
                </h6>
                <hr>
                <!--  <button style="padding: 0%;">Recibir</button> -->
                <form>
                    <input type="text" placeholder="Dirección">
                    <input type="number" placeholder="Cantidad" onkeypress='return validaNumericos(event)'>
                    <button style="margin-top: 2%; padding: 0%;">Enviar</button>
                </form>
            </div>
        </section>
    </div>
</section>