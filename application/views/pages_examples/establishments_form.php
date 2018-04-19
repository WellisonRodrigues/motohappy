<?php


/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */
//print_r($categories['response']);
//echo '<pre>';
//print_r($response);
?>
    <div class="container">
        <h2>Estabelecimento</h2>
        <div class="row">
            <!-- Default input -->
            <div class="col-md-12">
                <?php if (isset($message)) {
                    if ($message['id'] != null) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">Salvo com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <?php
                    }
                } ?>
                <?php if (isset($message['errors'][0])) {
                    $texto = $message['errors'][0];
                    echo "<div class='alert alert-danger' role='alert'>
                $texto
               </div>";

                } ?>
            </div>
        </div>

        <?php
        if (isset($response['id'])) {
            echo form_open('Establishments/new_establishments/' . $response['id'], ['role' => 'form']);
        } else {
            echo form_open('Establishments/new_establishments', ['role' => 'form']);
        } ?>
        <div class="row">
            <!-- Default input -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo @$response['name'] ?>"
                           id="name" placeholder="Nome">
                </div>
            </div>
            <div class="col-md-12">
                <!-- Default input -->
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">
                            <label for="address">Endereço:</label>
                            <input type="text" class="form-control" name="address" id="address"
                                   value="<?php echo @$response['address'] ?>">
                        </div>

                        <div class="col-md-3">
                            <label for="city">Cidade:</label>
                            <input type="text" class="form-control" name="city" value="<?php echo @$response['city'] ?>"
                                   id="city">
                        </div>
                        <div class="col-md-3">
                            <label for="state">Estado:</label>
                            <input type="text" class="form-control" name="state" id="state"
                                   value="<?php echo @$response['state'] ?>">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-3">
                            <label for="email">Código do Estabelecimento:</label>
                            <input type="number" class="form-control" name="establishment_cod" id="establishment_cod"
                                   value="<?php echo @$response['establishment_cod'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="email">Atendimento:</label>
                            <input type="text" class="form-control" name="attendance" id="attendance"
                                   value="<?php echo @$response['attendance'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="categories">Categoria:</label>
                            <select class="form-control tm-input" name="categories" id="categories">
                                <?php foreach ($categories['response']['category'] as $line) {
//                                    $idoption = $line['id'];
//                                    $nameoption = $line['name'];
                                    echo "<option value='$line'>$line</option>";
                                } ?>
                            </select>
                        </div>
                        <input type="hidden" value="" id="salvar" name="categorys">
                        <div class="col-md-3">
                            <br/>
                            <button type="button" id="novo" class="btn btn-default" data-toggle="modal"
                                    data-target="#modal"> Nova
                                Categoria
                            </button>
                        </div>
                    </div>
                </div>
                <!--                <div class="form-group">-->
                <div class="form-group row" id="selects">

                    <!--                    </div>-->
                </div>
                <div class="form-group">
                    <!-- Default input -->
                    <div class="row">

                        <div class="col-md-3">
                            <label for="email">Parceiro:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <button type="button" class="btn btn-default"> Novo Parceiro</button>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Imagem:</label>
                            <input type="file" class="form-control" name="email" id="email">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12" align="right">

                        <button type="submit" class="btn btn-default salvar" name="salvar" value="salvar"> Salvar
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>


    <script>
        $(document).ready(function () {
            $('#novo').click(function () {
                var valor = $('.tm-input option:selected').val();
                $('#selects').append('<div class="input-group mb-2 col-md-2 remover" id="' + valor + '" style="margin-bottom: 10px"><input type="text" class="form-control clearable"  value="' + valor + '" readonly> <div class="input-group-prepend"><a href="#" onclick="excluir(\'' + valor + '\')" class="input-group-text">' +
                    '<i class=" fas fa-times"></i> </a></d</div>')

            });
            $('.close').click(function () {
                $(".alert").alert('close');
            });


        });

        function excluir(id) {
            $('#' + id).remove();
        }

        var valores = [];
        $('.salvar').click(function () {
            $(".clearable").each(function (index) {

                valores.push($(this).val());
                $('#salvar').val(valores)
                // console.log(valores);

            });

            //

        });

    </script>


<?php //echo form_open('Categories/new_categories', ['role' => 'form']) ?>
    <!--    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"-->
    <!--         aria-hidden="true">-->
    <!--        <div class="modal-dialog" role="document">-->
    <!--            <div class="modal-content">-->
    <!--                <div class="modal-header">-->
    <!--                    <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>-->
    <!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                        <span aria-hidden="true">&times;</span>-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--                <div class="modal-body">-->
    <!--                    <label for="categoria_name">Nome:</label>-->
    <!--                    <input type="text" class="form-control" id="categoria_name" name="categoria_name">-->
    <!--                </div>-->
    <!--                <div class="modal-footer">-->
    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>-->
    <!--                    <button type="submit" class="btn btn-primary">Salvar</button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
<?php //echo form_close() ?>