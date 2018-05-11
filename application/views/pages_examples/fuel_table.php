<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */

//print_r($this->session->userdata("user"));
//echo '<pre>';
//print_r($response);

?>

<div class="container">
    <h2>Combustivel</h2>
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
                        <?php if ($this->session->userdata("user")['typeuser'] != 'partners') { ?>
                            <a href="<?php echo base_url() ?>Fuel/new_user">
                                <button type="button" class="btn btn-default  mt-sm-auto"><i class="fas fa-plus"></i>
                                </button>
                            </a>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="easyPaginate">
        <div class="row">
            <?php
            if (isset($response['fuels'])) {
                foreach ($response['fuels'] as $row) {
                    if (isset($row['id'])) {
                        ?>
                        <newtag>
                            <div class="col-md-4 contem" style="margin-top: 20px;">
                                <div class="card" style="height: 120px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <b class="card-title"><?php echo @$row['establishments']['name'] ?></b>
                                                <p class="card-text">
                                                    <?php echo $row['title'] ?>
                                                    &nbsp;&nbsp;R$ <?php echo $row['money_atual'] ?>/Litro

                                                </p>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="<?php echo base_url() ?>Fuel/new_user/<?php echo $row['id'] ?>"><i
                                                            class="fas fa-pencil-alt"
                                                            style="color: gray"></i></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a class="delete"
                                                   href="<?php echo base_url() ?>Fuel/delete/<?php echo $row['id'] ?>">
                                                    <i
                                                            class="fas fa-times"
                                                            style="color: gray"></i></a>
                                            </div>
                                        </div>
                                        <!--

                                        <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                                    </div>
                                </div>

                            </div>
                        </newtag>
                    <?php }
                }
            } ?>
        </div>
    </div>
    <br>
</div>
