<?php
/**
 * Created by PhpStorm.
 * User: wrodrigues
 * Date: 27/03/2018
 * Time: 16:00
 */
//print_r($this->session->userdata('user')['uid'][0])
//echo '<pre>';
//print_r($response);

?>
<div class="row" style="margin-top: 5%"></div>


<div class="container">


    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <a href="<?php echo base_url() ?>Users" style=" color: inherit; text-decoration: inherit;">
                                <div class="card-body" style="padding:0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url() ?>imgs\Elemento1.png">
                                        </div>
                                        <div class="col-md-5" style="margin-left:3%; margin-top:2%; margin-bottom:2px">

                                            <strong style=""> <?php echo $response['users_count'] ?> usuarios
                                                cadastrados</strong><br>
                                            <br>Ultimo cadastro: <?php echo $response['last_user'] ?><br>
                                            <?php echo $response['last_month_users'] ?> Novos usuarios nos ultimos 30
                                            dias<br>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <a href="<?php echo base_url() ?>Establishments"
                               style=" color: inherit; text-decoration: inherit;">
                                <div class="card-body" style="padding:0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url() ?>imgs\Elemento2.png">
                                        </div>
                                        <div class="col-md-5" style="margin-left:3%; margin-top:2%; margin-bottom:2px">

                                            <strong style=""> <?php echo $response['establishment_count'] ?>
                                                Estabelecimenos
                                                cadastrados</strong><br>
                                            <br>Ultimo cadastro: <?php echo $response['last_establishment'] ?><br>
                                            <?php echo $response['last_month_establishments'] ?> Novos estabelecimentos
                                            nos
                                            ultimos 30 dias<br>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <a href="<?php echo base_url() ?>Partners"
                               style=" color: inherit; text-decoration: inherit;">
                                <div class="card-body" style="padding:0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url() ?>imgs\Elemento3.png">
                                        </div>
                                        <div class="col-md-5" style="margin-left:3%; margin-top:2%; margin-bottom:2px">

                                            <strong style=""> <?php echo $response['partners_count'] ?> Parceiros
                                                cadastrados</strong><br>
                                            <br>Ultimo cadastro: <?php echo $response['last_partner'] ?><br>
                                            <?php echo $response['last_month_partners'] ?> Novos parceiros nos ultimos
                                            30
                                            dias<br>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        Ultimos 07 dias
                        <hr style="margin-top:20px">
                        <a href="<?php echo base_url() ?>Users" style=" color: inherit; text-decoration: inherit;"><img
                                    src="<?php echo base_url() ?>imgs\icon1.png" width="25px" height="25px"
                                    class="img-responsive"> Usuarios
                            cadastrados <?php echo @$response['last_seven_days'][0]['users_count'] ?>
                        </a>
                        <hr style="margin-top:20px">
                        <a href="<?php echo base_url() ?>Establishments"
                           style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon2.png" width="25px" height="25px"
                                 class="img-responsive">Estabelecimento
                            cadastrados <?php echo @$response['last_seven_days'][0]['establishments_count'] ?>
                        </a>
                        <hr style="margin-top:20px">
                        <a href="<?php echo base_url() ?>Partners" style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon3.png" width="25px" height="25px"
                                 class="img-responsive">Parceiros
                            cadastrados <?php echo @$response['last_seven_days'][0]['partners_count'] ?>
                        </a>
                        <hr style="margin-top:20px">
                        <a href="<?php echo base_url() ?>Hot" style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon4.png" width="25px" height="25px"
                                 class="img-responsive">Hot
                            cadastrados <?php echo @$response['last_seven_days'][0]['combos_count'] ?>
                        </a>
                        <hr style="margin-top:20px">
                        <a href="<?php echo base_url() ?>Combos" style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon5.png" width="25px" height="25px"
                                 class="img-responsive">Combos
                            cadastrados <?php echo @$response['last_seven_days'][0]['hots_count'] ?>
                        </a>
                        <hr style="margin-top:20px">
                        <a href="<?php echo base_url() ?>fuel" style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon5.png" width="25px" height="25px"
                                 class="img-responsive">Combustiveis
                            cadastrados <?php echo @$response['last_seven_days'][0]['fuels_count'] ?>
                        </a>
                        <hr style="margin-top:20px;">
                        <a href="<?php echo base_url() ?>Hot" style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon5.png" width="25px" height="25px"
                                 class="img-responsive">Hots
                            comprados <?php echo @$response['last_seven_days'][0]['purchase_hots'] ?>
                        </a>
                        <hr style="margin-top:20px;">
                        <a href="<?php echo base_url() ?>Combos" style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon5.png" width="25px" height="25px"
                                 class="img-responsive">Combos
                            comprados <?php echo @$response['last_seven_days'][0]['purchase_combos'] ?>
                        </a>
                        <hr style="margin-top:20px;">
                        <a href="<?php echo base_url() ?>Fuel" style=" color: inherit; text-decoration: inherit;">
                            <img src="<?php echo base_url() ?>imgs\icon5.png" width="25px" height="25px"
                                 class="img-responsive">Combustiveis
                            comprados <?php echo @$response['last_seven_days'][0]['purchase_fuel'] ?>
                        </a>
                        <hr style="margin-top:20px;">
                        <div class="text-center">
                            <a href="<?php echo base_url() ?>Charts">
                                <button class="btn btn-default btn-sm" type="submit"
                                        style="border-radius: 5px; "> VER GRÁFICOS
                                </button>
                            </a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <div class="col-md-8">-->
<!--                <div class="row">-->
<!--                    <div class="card">-->
<!--                        <div class="card-body">-->
<!--                            <strong> 326 ususarios cadastrados</strong><br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div class="card">-->
<!--                        <div class="card-body">-->
<!--                            <strong> 326 ususarios cadastrados</strong><br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div class="card">-->
<!--                        <div class="card-body">-->
<!--                            <strong> 326 ususarios cadastrados</strong><br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                            326 ususarios cadastrados<br>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div class="col-md-4">-->
<!--                        <div class="card">-->
<!--                            <ul class="list-group list-group-flush">-->
<!--                                <li class="list-group-item">Cras justo odio</li>-->
<!--                                <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                                <li class="list-group-item">Vestibulum at eros</li>-->
<!--                                <li class="list-group-item">Vestibulum at eros</li>-->
<!--                                <li class="list-group-item">Vestibulum at eros</li>-->
<!--                                <li class="list-group-item">Vestibulum at eros</li>-->
<!--                                <li class="list-group-item">Vestibulum at eros</li>-->
<!--                                <li class="list-group-item">Vestibulum at eros</li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

