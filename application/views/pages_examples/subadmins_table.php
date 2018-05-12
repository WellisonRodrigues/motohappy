<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */
//echo '<pre>';
//print_r($response);
?>

<div class="container">
    <h2>Administradores</h2>
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
                        <a href="<?php echo base_url() ?>/Subadmins/new_user">
                            <button type="button" class="btn btn-default mt-sm-auto"><i class="fas fa-plus"></i>
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!--        <div class="col-md-12" align="right">-->
        <!--            <a href="--><?php //echo base_url() ?><!--Users/new_user">-->
        <!--                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button>-->
        <!--            </a>-->
        <!--        </div>-->
    </div>
    <div id="easyPaginate">
        <!--        <div class="row">-->
        <?php
        if (isset($response)) {
            foreach ($response as $row) { ?>
                <newtag>
                    <div class="col-md-4 contem" style="margin-top: 20px">
                        <div class="card" style="height: 140px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php if ($row['image']['url'] != null) { ?>
                                            <img src="<?php echo $row['image']['url'] ?>"
                                                 class="rounded-circle" width="50px" height="50px">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>imgs/Elemento6.png"
                                                 class="rounded-circle" width="50px" height="50px">

                                        <?php } ?>
                                    </div>
                                    <div class="col-md-7">
                                        <b class="card-title"><?php echo $row['name'] ?></b>
                                        <p class="card-text h-25">
                                            <!--                                    -->
                                            <?php echo @$row['nickname'] ?><br>
                                            <?php echo @$row['email'] ?><br>
                                            <!--                                    -->
                                            <?php //echo @$row['establishments_ids']['establishments_id'] ?><!--<br>-->

                                        </p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="<?php echo base_url() ?>Subadmins/new_user/<?php echo $row['id'] ?>"><i
                                                    class="fas fa-pencil-alt"
                                                    style="color: gray"></i></a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="delete"
                                           href="<?php echo base_url() ?>Subadmins/delete/<?php echo $row['id'] ?>"">
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
        } ?>
    </div>
    <!--    </div>-->
    <br>
</div>
<script>
    $(document).ready(function () {
        $('#easyPaginate').easyPaginate({
            paginateElement: 'newtag',
            elementsPerPage: 9,
            firstButtonText: 'Primeira',
            lastButtonText: 'Ultima',
            prevButton: false,
            nextButton: false
            // effect: 'slide'
        });
    });
</script>
