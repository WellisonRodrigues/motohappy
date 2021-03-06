<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */
?>
<style>
    .disabled {
        pointer-events: none;
    / / This makes it not clickable opacity: 0.6;
    / / This grays it out to look disabled
    }
</style>
<div class="col-md-10 mx-auto">
    <div class="row">
        <div class="col-md-2" align="left">
            <h2>Parceiros</h2>
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
                        <a href="<?php echo base_url() ?>/Partners/new_user">
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
            foreach ($response as $key => $row) { ?>
                <newtag>
                    <div class="col-md-4 contem" style="margin-top: 20px">
                        <div class="card" style="height: 150px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php if ($row['image']['url'] != null) { ?>
                                            <img src="<?php echo $row['image']['url'] ?>"
                                                 class="rounded-circle" width="50px" height="50px">&nbsp;&nbsp;
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>imgs/Elemento6.png"
                                                 class="rounded-circle" width="50px" height="50px">&nbsp;&nbsp;

                                        <?php } ?>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-6">
                                        <b class="card-title"><?php echo @$row['name'] ?></b>
                                        <p class="card-text h-25" style="font-size: 10pt;">
                                            <!--                                    -->
                                            <?php echo @$row['nickname'] ?><br>
                                            <?php echo @$row['email'] ?><br>
                                            <!--                                    -->
                                            <?php //echo @$row['establishments_ids']['establishments_id'] ?><!--<br>-->

                                        </p>
                                    </div>
                                    <div class="col-md-1 d-inline-block">
                                        <a href="<?php echo base_url() ?>Partners/new_user/<?php echo $row['id'] ?>"><i
                                                    class="fas fa-pencil-alt"
                                                    style="color: gray"></i></a></div>
                                    <div class="col-md-1 d-inline-block">
                                        <a class="delete"
                                           href="<?php echo base_url() ?>Partners/delete/<?php echo $row['id'] ?>"">
                                        <i
                                                class="fas fa-times"
                                                style="color: gray"></i></a></div>
                                    <div class="col-md-1 d-inline-block">
                                        <a data-toggle="modal" data-target="#<?php echo $row['id'] ?>" href="#">
                                            <i class="fas fa-home" style="color: gray"></i></a>
                                    </div>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Estabelecimentos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="esta<?php echo $row['id'] ?>">
                                        <div class="row">
                                            <?php
                                            if (isset($row['establishments'])) {
                                                foreach ($row['establishments'] as $line) {
//                                                print_r($row['establishments']);
//
                                                    $newid = $line['id'];
                                                    ?>

                                                    <div class="col-md-3 remover<?php echo $newid ?>">
                                                        <input type="text" class="form-control" readonly
                                                               value="<?php echo $line['name'] ?>">
                                                    </div>
                                                    <div class="col-md-3 remover<?php echo $newid ?>">
                                                        <button type="button"
                                                                class="btn btn-danger mt-sm-auto"
                                                                onclick="deletar('<?php echo $newid ?>')"><i
                                                                    class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    <script>
                                                        function deletar(idesta) {
                                                            $.get('<?php echo base_url()?>Partners/deleteesta/' + "<?php echo $row['id']?>/" + idesta,
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
                                            <label for="categories">Estabelecimento:</label>
                                            <select class="form-control tm-input<?php echo $row['id'] ?>"
                                                    name="categories"
                                                    id="categories">
                                                <?php foreach ($estabelecimentos['establishments'] as $vars) {
                                                    $name = $vars['name'];
                                                    $id = $vars['id'];
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
                        $('#salvar<?php echo $row['id']?>').click(function () {
                            var idpartner = $('.tm-input<?php echo $row['id']?>').val();
                            var name = $(".tm-input<?php echo $row['id']?> option:selected").text();
                            $.get('<?php echo base_url()?>Partners/addesta/' + "<?php echo $row['id']?>/" + idpartner,
                                function (data) {
                                    $(".esta<?php echo $row['id']?> .row").append
                                    ("<div class='col-md-3 remover" + idpartner + "'><input type='text' class='form-control' readonly value='" + name + "' ></div><div class='col-md-3 remover" + idpartner + "'><button type=\"button\"\n" +
                                        "                                                            id=\"\"\n" +
                                        "                                                            class=\"btn btn-danger mt-sm-auto\" onclick='deletar(" + idpartner + ")'><i\n" +
                                        "                                                                class=\"fas fa-trash\"></i>\n" +
                                        "                                                    </button></div> ")
                                });
                        });
                    </script>
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
            elementsPerPage: 12,
            firstButtonText: 'Primeira',
            lastButtonText: 'Ultima',
            prevButton: false,
            nextButton: false
            // effect: 'slide'
        });
    });
</script>
