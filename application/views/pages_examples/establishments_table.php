<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */

//print_r($this->session->userdata("user"));

?>

<div class="container">
    <h2>Estabelecimentos</h2>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <!--                            <div class="col-md-12">-->

                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?php echo base_url() ?>imgs/Elemento6.png" class="rounded-circle">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted">Codigo</p>
                                </div>
                            </div>
                        </div>
                        <!--                        </div>-->
                        <div class="col-md-7">
                            <b class="card-title">Special title treatment</b>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.</p>
                        </div>
                        <div class="col-md-1">
                            <a href="<?php echo base_url() ?>Establishments/new_establishments"><i class="fas fa-pencil-alt"
                                                                                           style="color: gray"></i></a>
                        </div>
                        <div class="col-md-1">
                            <i class="fas fa-times" style="color: gray"></i>
                        </div>
                    </div>
                    <!--

                    <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
