<?php
/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 01/03/2018
 * Time: 21:55
 */
?>
<body>

<header style="position: fixed;width: 100%;top: 0; z-index: 1000">
    <div class="pos-f-t">

        <nav class="navbar navbar-dark" style="background-color: #FF5D00">
            <div class="row">
                &ensp;
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>&ensp;
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url() ?>imgs\logobrand.png" height="30" class="d-inline-block align-left">
                </a>
            </div>
        </nav>
    </div>

</header>
<style>
    li:hover {
        background-color: gray;
        opacity: 0.20;
        text-decoration: none;
    }

    a {
        color: white;
        text-decoration: none;
    }

</style>
<div class="collapse" id="navbarToggleExternalContent"
     style="position: fixed; width: 15%; height: 100%;top: 6.7%; z-index: 1000">
    <div class="p-4" style="background-color: #FF5D00;">
        <!--        <div class="tab-content vertical">-->
        <ul class="nav md-pills pills-primary flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Users">Usuarios</a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Categories">Categorias</a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Establishments">Estabelecimentos</a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Hot">Hot</a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Partners">Parceiros</a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Subadmins">Administradores</a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Fuel">Combustivel</a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>Combos">Combos</a></li>
            <!--        </div>-->
    </div>
</div>
