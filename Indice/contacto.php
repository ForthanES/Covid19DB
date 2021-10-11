<?php
if (isset($_SESSION['paciente'])) {
    ?>
<main>
    <div class="text-center">
        <h1>Contactos</h1>
    </div>
    <div class="d-flex justify-content-around p-2">
        <div class="card" style="width: 18rem;">
            <img src="Indice/img/covid19.jpg" class="card-img-top">
            <div class="card-body text-center">
                <h5 class="card-title">Contacto 1</h5>
                <p class="card-text">Información</p>
                <p class="card-text">Mail: contacto@mail.com</p>
                <a href="#" class="btn btn-primary">Contactar</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="Indice/img/covid19.jpg" class="card-img-top">
            <div class="card-body text-center">
                <h5 class="card-title">Contacto 2</h5>
                <p class="card-text">Síntomas</p>
                <p class="card-text">Tel: 555 666 777</p>
                <a href="#" class="btn btn-primary">Contactar</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="Indice/img/covid19.jpg" class="card-img-top">
            <div class="card-body text-center">
                <h5 class="card-title">Contacto 3</h5>
                <p class="card-text">Responsables</p>
                <p class="card-text">Mail: correo@mail.com</p>
                <a href="#" class="btn btn-primary">Contactar</a>
            </div>
        </div>
    </div>
</main>
<?php } else {
    header('Location:index.php');
    die();
}?>