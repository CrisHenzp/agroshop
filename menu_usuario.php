<?php 

include('header.php'); 
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>

<div class="row center-xs around-xs grupocartas">
    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics"
                        width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <path d="M9 17v-5" />
                        <path d="M12 17v-1" />
                        <path d="M15 17v-3" />
                    </svg>
                    <h5 class="card-title">Editar información personal</h5>
                    <p class="card-text">Editar mi perfil de usuario</p>
                    <a href="editar_perfil.php" class="btn btn-primary">Ir a editar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="100"
                        height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="10" y1="14" x2="21" y2="3" />
                        <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
                    </svg>
                    <h5 class="card-title">Estado de mis pedidos</h5>
                    <p class="card-text">Estado de los pedidos de usuario</p>
                    <a href="" class="btn btn-primary">Ir a Pedidos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-discount"
                        width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="6" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M20 6l-1 7h-13" />
                        <path d="M10 10l6 -6" />
                        <circle cx="10.5" cy="4.5" r=".5" />
                        <circle cx="15.5" cy="9.5" r=".5" />
                    </svg>
                    <h5 class="card-title">Ver Historial de compras</h5>
                    <p class="card-text">Ver compras realizadas</p>
                    <a href="historial.compra.php" class="btn btn-primary">Ir historial</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Aquí puedes agregar tu código JavaScript si es necesario
</script>

<style>
    .card {
        margin: 30px;
        width: 200px;
        height: 290px;
        background-color: #ECE5E4;
    }

    .card:hover {
        background-color: #CDC5C3;
    }

    .divicon {
        padding-left: 10px;
    }

    .grupocartas {
        padding-top: 25px;
    }

    .card-body {
        padding-bottom: 10px;
        border-radius: 40px;
    }

    .btn-primary:hover {
        background-color: transparent;
        font-size: 20px;
    }
</style>

<?php include('footer.php'); ?>
