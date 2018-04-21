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
                        <a href="<?php echo base_url() ?>Fuel/new_user">
                            <button type="button" class="btn btn-default  mt-sm-auto"><i class="fas fa-plus"></i></button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($response['fuel'] as $row) { ?>
            <div class="col-md-4 contem" style="margin-top: 20px">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <!--                                <img src="-->
                                <?php //echo base_url() ?><!--imgs/Elemento6.png" class="rounded-circle">-->
                            </div>
                            <div class="col-md-7">
                                <b class="card-title"><?php echo $row['establishment_id'] ?></b>
                                <p class="card-text">
                                    <?php echo $row['title'] ?>
                                    &nbsp;&nbsp;R$ <?php echo $row['value'] ?>/Litro

                                </p>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo base_url() ?>Fuel/new_user/<?php echo $row['id'] ?>"><i
                                            class="fas fa-pencil-alt"
                                            style="color: gray"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo base_url() ?>Fuel/delete/<?php echo $row['id'] ?>"> <i
                                            class="fas fa-times"
                                            style="color: gray"></i></a>
                            </div>
                        </div>
                        <!--

                        <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <ul id="pagin" class="pagination justify-content-center">
            </ul>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.contem').show();
        $('#search').click(function () {
            $('.contem').hide();
            var txt = $('#search-criteria').val();
            // $('.contem:contains("' + txt + '")').show();
            $('.contem').each(function () {
                if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                    $(this).show();
                }
            });

        });
        pageSize = 6;

        var pageCount = $(".contem").length / pageSize;


        if (pageCount > 4) {
            var contagem = 4;

        } else {
            contagem = pageCount;
        }

        $("#pagin").append('<li class="page-item"><a class="page-link" href="#">Anterior</a></li> ');
        for (var i = 0; i < contagem; i++) {


            $("#pagin").append('<li class="page-item"><a class="page-link" href="#">' + (i + 1) + '</a></li> ');

        }
        $("#pagin").append('<li class="page-item"><a class="page-link" href="#">Proxima</a></li> ');
        $("#pagin li").eq(1).addClass("active");

        showPage = function (page) {
            $(".contem").hide();
            $(".contem").each(function (n) {
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();
            });
        }

        showPage(1);

        $("#pagin li ").click(function () {
            $("#pagin li").removeClass("active");
            $(this).addClass("active");
            showPage(parseInt($(this).text()))
        });
        $('.delete').bind('click', function () {
            var comf = confirm('Deseja mesmo excluir?');
            if (comf == true) {
            } else {
                event.preventDefault();
            }
        });
    });


</script>
