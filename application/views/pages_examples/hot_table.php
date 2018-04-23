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
            <a href="<?php echo base_url() ?>Hot/new_user">
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button>
            </a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($response['hots'] as $row) { ?>
            <div class="col-md-4" style="margin-top: 20px">
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($row['image']['url'])) { ?>
                            <!--                            <div class="col-md-12">-->
                            <img src="<?php echo @$row['image']['url']; ?>"
                            <!--                            </div>-->
                        <?php } ?>
                        <div class="row">

                            <div class="col-md-7">
                                <b class="card-title"><?php echo $row['description'] ?> R$<?php echo $row['value'] ?>
                                    /litro</b>
                                <p class="card-text">

                                </p>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo base_url() ?>Hot/new_user/<?php echo $row['id'] ?>"><i
                                            class="fas fa-pencil-alt"
                                            style="color: gray"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo base_url() ?>Hot/delete/<?php echo $row['id'] ?>"><i
                                            class="fas fa-times" style="color: gray"></i></a>
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
