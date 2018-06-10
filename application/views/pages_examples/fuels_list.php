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
            <a href="<?php echo base_url() ?>Establishments">
                <button type="button" class="btn btn-primary mt-2"> Voltar</button>
            </a>
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
        <?php
        if (isset($response)) {
            foreach ($response as $row) {
                if (isset($row['id'])) {
                    ?>
                    <newtag>
                    <div class="col-md-4 contem" style="margin-top: 20px">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <b class="card-title"><?php echo @$row['establishments']['name'] ?></b>
                                        <p class="card-text">
                                            <?php echo $row['title'] ?>
                                            &nbsp; <?php echo $row['money_atual'] ?>

                                        </p>
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
        } else { ?>

            <div class="col-md-6 mx-auto" style="margin-top: 20px">
                <h2>Não há Combustiveis para serem exibidos.</h2>
            </div>
        <?php } ?>
    </div>
    <br>
</div>
<script>
    $(document).ready(function () {
        $('#easyPaginate').easyPaginate({
            paginateElement: 'newtag',
            elementsPerPage: 15,
            firstButtonText: 'Primeira',
            lastButtonText: 'Ultima',
            prevButton: false,
            nextButton: false
            // effect: 'slide'
        });
    });
</script>