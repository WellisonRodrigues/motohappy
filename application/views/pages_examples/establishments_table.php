<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */
//echo '<pre>';
//print_r($response);
//print_r($this->session->userdata("user"));

?>

<div class="container">
    <h2>Estabelecimentos</h2>
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
                        <a href="<?php echo base_url() ?>Establishments/new_establishments">
                            <button type="button" class="btn btn-default mt-sm-auto"><i class="fas fa-plus"></i>
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($response

                       as $row) { ?>
            <div class="col-md-4 contem">
                <div class="card" style="margin-top: 30px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <!--                            <div class="col-md-12">-->

                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if ($row['image']['url'] != null) { ?>
                                            <img src="<?php echo $row['image']['url'] ?>"
                                                 class="rounded-circle" width="50px" height="50px">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>imgs/Elemento6.png"
                                                 class="rounded-circle" width="50px" height="50px">

                                        <?php } ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 h-25 d-inline-block">
                                        <p class="card-text h-25 d-inline-block"> <?php echo @$row['establishment_cod'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <!--                        </div>-->
                            <div class="col-md-6">
                                <b class="card-title h-25 d-inline-block"><?php echo @$row['name'] ?></b><br>
                                <p class="card-text h-25 d-inline-block"><?php echo @$row['address'] ?>,<?php echo @$row['number'] ?>
                                    <?php echo @$row['state'] ?>,<?php echo @$row['city'] ?></p>
                            </div>
                            <div class="col-md-1">
                                <a href="<?php echo base_url() ?>Establishments/new_establishments/<?php echo $row['id'] ?>"><i
                                            class="fas fa-pencil-alt"
                                            style="color: gray"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a class="delete"
                                   href="<?php base_url() ?>Establishments/delete/<?php echo $row['id'] ?>">
                                    <i class="fas fa-times" style="color: gray"></i></a>
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
    <!--    <nav aria-label="Page navigation example">-->
    <div class="row">
        <div class="col-md-12">
            <ul id="pagin" class="pagination justify-content-center">
            </ul>
        </div>
    </div>
    <!--    </nav>-->
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