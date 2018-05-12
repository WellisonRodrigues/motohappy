<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */

//foreach ($response['category'] as $new) {
//    print_r($new);
//}
//print_r($response['category']);
//print_r($this->session->userdata("user"));


?>

<div class="container">

    <div class="col-md-6">
        <h2>Categorias</h2>
    </div>
    <div class="row">
        <div class="col-md-12" align="right">
            <div class="float-md-right">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <div class="input-group mb-3">
                            <!-- Default input -->
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" class="form-control mt-sm-2" id="search-criteria">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="search" class="btn btn-primary mt-sm-auto">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--    <input type="text" id="search-criteria" class=""/>-->
    <!--    <input type="button" id="search" class="btn btn-default" value="buscar"/>-->
    <div class="row">
        <!--        <ul style="list-style: none">-->
        <?php
        if (isset($response)) {
            foreach ($response['category'] as $row) {
                $new = str_replace("_", " ", $row);
                ?>

                <div class="col-md-3 contem" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <!--                        </div>-->
                                <div class="col-md-12">
                                    <b class="card-title"><?php echo $new ?></b>
                                    <!--                            <p class="card-text">With supporting text below as a natural lead-in to additional-->
                                    <!--                                content.</p>-->
                                </div>
                                <!--                        <div class="col-md-1">-->
                                <!--                            <a href="-->
                                <?php //echo base_url() ?><!--Establishments/new_establishments"><i-->
                                <!--                                        class="fas fa-pencil-alt"-->
                                <!--                                        style="color: gray"></i></a>-->
                                <!--                        </div>-->
                                <!--                        <div class="col-md-1">-->
                                <!--                            <i class="fas fa-times" style="color: gray"></i>-->
                                <!--                        </div>-->
                            </div>
                            <!--

                            <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                        </div>
                    </div>
                </div>
                <!--                </li>-->
            <?php }
        } ?>
        <!--        </ul>-->
    </div>
    <br>
    <!--    <nav aria-label="Page navigation example">-->
    <div class="row">
        <div class="col-md-12">
            <ul id="pagin" class="pagination justify-content-center">
            </ul>
        </div>
    </div>
    <!--    </nav>-->
</div>
