<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */
//echo '<pre>';
//print_r($response)
//print_r($this->session->userdata("user"));
//print_r($this->session->userdata("user"));

?>
<div class="col-md-10 mx-auto">
    <div class="row">
        <div class="col-md-2" align="left">
            <h2>Estabelecimentos</h2>
        </div>
        <div class="col-md-10" align="right">
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
                            <a href="<?php echo base_url() ?>Establishments/new_establishments">
                                <button type="button" class="btn btn-default mt-sm-auto"><i class="fas fa-plus"></i>
                                </button>
                            </a>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($response) {
            foreach ($response['establishments'] as $row) { ?>
                <div class="col-md-4 contem">
                    <div class="card" style="margin-top: 30px;height: 200px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
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
                                            <p class="card-text h-25 d-inline-block"> <?php echo $row['establishment_cod'] ? $row['establishment_cod'] : 'N/A' ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--                        </div>-->
                                <div class="col-md-7">
                                    <b class="card-title h-25 d-inline-block"><?php echo @$row['name'] ?></b><br>
                                    <p class="card-text h-25 d-inline-block">
                                        <?php echo $row['description'] ? $row['description'] : 'Descrição indefinida' ?>
                                        ,
                                        <?php echo $row['attendance'] ? $row['attendance'] : 'Atendimento indefinido' ?>
                                        <br>
                                        <?php echo $row['address'] ? $row['address'] : 'Endereço indefinido' ?>
                                        , <?php echo $row['number'] ? $row['number'] : 'Número indefinido' ?>
                                        <?php echo $row['city'] ? $row['city'] : 'Cidade indefinida' ?> ,
                                        <?php echo $row['state'] ? $row['state'] : 'Estado indefinido' ?></p>
                                </div>
                                <?php if ($this->session->userdata("user")['typeuser'] != 'partners') { ?>
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
                                    <div class="col-md-1">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="fas fa-user" style="color: gray"></i></a>
                                    </div>
                                <?php } ?>
                            </div>
                            <!--

                            <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Parceiros</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="esta<?php echo $row['id'] ?>">
                                        <div class="row">
                                        <?php
                                        if (isset($row['partners'])) {
                                            foreach ($row['partners'] as $newrow) { ?>

                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" readonly
                                                           value="<?php echo $newrow['partner_name'] ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button"
                                                            id=""
                                                            class="btn btn-danger mt-sm-auto"><i
                                                                class="fas fa-trash"></i>
                                                    </button>
                                                </div>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="categories">Parceiros:</label>
                                        <select class="form-control tm-input<?php echo $row['id'] ?>" name="categories"
                                                id="categories">
                                            <?php foreach ($partners['response'] as $line) {
                                                $name = $line['name'];
                                                $id = $line['id'];
                                                echo "<option value='$id'>$name</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button type="button" id="salvar<?php echo $row['id'] ?>"
                                                class="btn btn-primary mt-sm-auto">Salvar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $('#salvar<?php echo $row['id']?>').click( function () {
                            var idpartner = $('.tm-input<?php echo $row['id']?>').val();
                            var name = $(".tm-input<?php echo $row['id']?> option:selected").text();
                            $.get('<?php echo base_url()?>Establishments/addpartner/' + "<?php echo $row['id']?>/" + idpartner,
                                function (data) {
                                    $(".esta<?php echo $row['id']?> .row").append
                                    ("<div class='col-md-3'><input type='text' class='form-control' readonly value='" + name + "' ></div><div class='col-md-3'><button type=\"button\"\n" +
                                        "                                                            id=\"\"\n" +
                                        "                                                            class=\"btn btn-danger mt-sm-auto\"><i\n" +
                                        "                                                                class=\"fas fa-trash\"></i>\n" +
                                        "                                                    </button></div> ")
                                });
                        });
                    });
                </script>
            <?php }
        } ?>
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
        pageSize = 12;

        var pageCount = $(".contem").length / pageSize;

        contagem = pageCount;


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
