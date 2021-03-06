<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */
//echo '<pre>';
//foreach($response['establishments'] as $test){
//    print_r($test['category']);
//}
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
    <div id="easyPaginate">
        <div class="row">
            <?php
            if ($response) {
                foreach ($response['establishments'] as $row) { ?>
                    <newtag>
                        <div class="col-md-4 contem">
                            <div class="card" style="margin-top: 30px; min-height: 250px;">
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
                                                <a data-toggle="modal" data-target="#<?php echo $row['id'] ?>" href="#">
                                                    <i class="fas fa-user" style="color: gray"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-text"><br>
                                                        <?php
                                                        if ($row['category']) {
                                                            foreach ($row['category'] as $cats) { ?>
                                                                <b class="align-bottom h-25"
                                                                   style="color: #FF5D00"><?php echo $cats ?> &nbsp;</b>
                                                            <?php }
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } elseif ($this->session->userdata("user")['typeuser'] == 'partners') {
                                            foreach ($row['category'] as $category) {
                                                if ($category == 'combustivel') {


                                                    ?>
                                                    <div class="col-md-1">
                                                        <a href="<?php echo base_url() ?>Establishments/fuel_list/<?php echo $row['id'] ?>">
                                                            <i
                                                                    class="fas fa-tint"
                                                                    style="color: gray"></i></a>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a
                                                                href="<?php base_url() ?>Establishments/hot_list/<?php echo $row['id'] ?>">
                                                            <img src="<?php echo base_url() ?>imgs\icon4.png"
                                                                 width="25px"
                                                                 height="25px"
                                                                 class="img-responsive"></a>
                                                    </div>

                                                    <?php break;
                                                } else { ?>
                                                    <div class="col-md-1">
                                                        <a href="<?php echo base_url() ?>Establishments/combo_list/<?php echo $row['id'] ?>">
                                                            <img src="<?php echo base_url() ?>imgs\icon5.png"
                                                                 width="25px"
                                                                 height="25px"
                                                                 class="img-responsive"></a>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a
                                                                href="<?php base_url() ?>Establishments/hot_list/<?php echo $row['id'] ?>">
                                                            <img src="<?php echo base_url() ?>imgs\icon4.png"
                                                                 width="25px"
                                                                 height="25px"
                                                                 class="img-responsive"></a>
                                                    </div>
                                                <?php } ?>
                                                <?php
                                            }
                                        } ?>
                                    </div>
                                    <!--

                                    <!--                    <a href="#" class="btn btn-primary">Go somewhere</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="<?php echo $row['id'] ?>" tabindex="-1" role="dialog"
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
                                                    foreach ($row['partners'] as $newrow) {
                                                        $chave = $newrow['partner_id'];
                                                        ?>

                                                        <div class="col-md-3 remover<?php echo $chave ?>">
                                                            <input type="text" class="form-control" readonly
                                                                   value="<?php echo $newrow['partner_name'] ?>">
                                                        </div>
                                                        <div class="col-md-3 remover<?php echo $chave ?>">
                                                            <button type="button"
                                                                    onclick="part(<?php echo $chave ?>)"
                                                                    class="btn btn-danger mt-sm-auto"><i
                                                                        class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        <script>
                                                            function part(idesta) {
                                                                $.get('<?php echo base_url()?>Establishments/deletepart/' + "<?php echo $row['id']?>/" + idesta,
                                                                    function (data) {
                                                                        $('.remover' + idesta).remove()
                                                                    })
                                                            }
                                                        </script>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="categories">Parceiros:</label>
                                                <select class="form-control tm-input<?php echo $row['id'] ?>"
                                                        name="categories"
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('#salvar<?php echo $row['id']?>').click(function () {
                                    var idpartner = $('.tm-input<?php echo $row['id']?>').val();
                                    var name = $(".tm-input<?php echo $row['id']?> option:selected").text();
                                    $.get('<?php echo base_url()?>Establishments/addpartner/' + "<?php echo $row['id']?>/" + idpartner,
                                        function (data) {
                                            $(".esta<?php echo $row['id']?> .row").append
                                            ("<div class='col-md-3 remover" + idpartner + "'><input type='text' class='form-control' readonly value='" + name + "' ></div><div class='col-md-3 remover" + idpartner + "'><button type=\"button\"\n" +
                                                "                                                            id=\"\"\n" +
                                                "                                                            class=\"btn btn-danger mt-sm-auto\" onclick='part(" + idpartner + ")'><i\n" +
                                                "                                                                class=\"fas fa-trash\"></i>\n" +
                                                "                                                    </button></div> ")
                                        });
                                });
                            });
                        </script>
                    </newtag>
                <?php }
            } ?>
        </div>
    </div>
    <br>
    <!--    </nav>-->
</div>
<script>
    $(document).ready(function () {
        $('#easyPaginate').easyPaginate({
            paginateElement: 'newtag',
            elementsPerPage: 12,
            firstButtonText: 'Primeira',
            lastButtonText: 'Ultima',
            prevButton: false,
            nextButton: false
            // effect: 'slide'
        });
    });
</script>