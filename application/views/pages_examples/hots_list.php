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
    <h2>Hot</h2>
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
                            <a href="<?php echo base_url() ?>Hot/new_user">
                                <button type="button" class="btn btn-default mt-sm-auto"><i class="fas fa-plus"></i>
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
            foreach ($response as $row) { ?>
                <newtag>
                    <div class="col-md-4 contem" style="margin-top: 20px">
                        <div class="card-deck">
                            <div class="card">
                                <div class="view overlay">
                                    <?php if (@$row['image']['url']) { ?>
                                        <img class="card-img-top" src="<?php echo @$row['image']['url']; ?>"
                                             width="349px"
                                             height="233.33px"
                                             alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    <?php } else { ?>
                                        <img class="card-img-top"
                                             src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg"
                                             alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-9">
                                            <b class="card-title"><?php echo @$row['title'] ?> </b><b
                                                    style="color: #FF5D00"><?php echo @$row['value'] ?>
                                            </b><br>
                                            <p class="card-text">
                                                <?php echo @$row['description'] ?><br>
                                            </p>
                                        </div>
                                        <?php if ($this->session->userdata("user")['typeuser'] != 'partners') { ?>
                                            <div class="col-md-1">
                                                <a href="<?php echo base_url() ?>Hot/new_user/<?php echo $row['id'] ?>"><i
                                                            class="fas fa-pencil-alt"
                                                            style="color: gray"></i></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a class="delete"
                                                   href="<?php echo base_url() ?>Hot/delete/<?php echo $row['id'] ?>"><i
                                                            class="fas fa-times" style="color: gray"></i></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!--

                                    <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </newtag>
            <?php }
        } else { ?>

            <div class="col-md-6 mx-auto" style="margin-top: 20px">
                <h2>Não há Hots para serem exibidas.</h2>
            </div>

        <?php } ?>
    </div>
    <br>
</div>
<script>
    $(document).ready(function () {
        $('#easyPaginate').easyPaginate({
            paginateElement: 'newtag',
            elementsPerPage: 6,
            firstButtonText: 'Primeira',
            lastButtonText: 'Ultima',
            prevButton: false,
            nextButton: false
            // effect: 'slide'
        });
    });
</script>
