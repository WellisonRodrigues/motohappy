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
    <h2>Administradores</h2>
    <div class="row">
        <div class="col-md-12" align="right">
            <a href="<?php echo base_url() ?>Subadmins/new_user">
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button>
            </a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($response as $row) { ?>
            <div class="col-md-4" style="margin-top: 20px">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?php echo base_url() ?>imgs/Elemento6.png" class="rounded-circle">
                            </div>
                            <div class="col-md-7">
                                <b class="card-title"><?php echo $row['name'] ?></b>
                                <p class="card-text">
                                    <?php echo $row['email'] ?>
                                </p>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo base_url() ?>Subadmins/new_user/<?php echo $row['id']?>"><i class="fas fa-pencil-alt"
                                                                                    style="color: gray"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo base_url() ?>Subadmins/delete/"<?php echo $row['id']?>>  <i class="fas fa-times" style="color: gray"></i></a>
                            </div>
                        </div>
                        <!--

                        <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    $(".card").filter("john");
</script>
