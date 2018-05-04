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
                &ensp;<?php if ($this->session->userdata("user")['typeuser'] != 'partners') { ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>&ensp;
                <?php } ?>
                <a class="navbar-brand" href="<?php echo base_url() ?>Home">
                    <img src="<?php echo base_url() ?>imgs\logobrand.png" height="30" class="d-inline-block align-left">
                </a>
            </div>
            <a class="navbar-brand" href="#">
                <div class="dropdown">
                    <a class="dropdown-toggle" style="margin-left: 70px" id="dropdownMenuButton" data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <b style="color: white"><?php echo $this->session->userdata("user")['name'] ?> </b>
                        <?php if (isset($this->session->userdata("user")['image'])) { ?>
                            <img src="<?php echo $this->session->userdata("user")['image'] ?>"
                                 class="rounded-circle" width="40px" height="40px">
                        <?php } else {
                            ?>
                            <img src="<?php echo base_url() ?>imgs/Elemento6.png"
                                 class="rounded-circle">
                            <?php
                        } ?>
                    </a>
                    <ul class='dropdown-menu' aria-labelledby="dropdownMenuButton"
                        style="margin-top:12px">
                        <li><a href='<?php echo base_url() ?>Profile'
                               style='color: gray'>
                                <i
                                        class='fas fa-user'> </i>&nbsp;&nbsp; Meus Dados</a></li>
                        <li>
                            <a href='<?php echo base_url() ?>/Sair' style='color: gray'> <i
                                        class='fas fa-sign-out-alt'> </i>&nbsp;&nbsp; Logout</a></li>
                    </ul>
                </div>
            </a>
        </nav>
    </div>

</header>
<style>

    li a:hover {
        background: rgba(0, 0, 0, 0.1);
        color: #fff;
        -moz-box-shadow: 0 1px 1px 0 #CCC;
        -webkit-box-shadow: 0 1px 1px 0 #ccc;
        text-shadow: 0px 0px 0px #fff;
        list-style-type: none;
    }

    /*li:hover {*/
    /*box-shadow: -9px -9px 5px -5px rgba(0,0,0, 1) inset,   !* combined shadows *!*/
    /*2px -2px 3px 0px rgba(255,255,255, 0.2),*/
    /*2px 2px 3px 0px rgba(255,255,255, 0.2);*/

    /*}*/

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

            <?php if ($this->session->userdata("user")['typeuser'] != 'partners') { ?>

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
            <?php } ?>
    </div>
</div>
