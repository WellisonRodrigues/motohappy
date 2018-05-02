<?php


/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */
//print_r($categories['response']);
//echo '<pre>';
//print_r($message);

//print_r($partners['response']);
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
                    $response = $message;
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
                <input type="text" name="name" class="form-control" required value="<?php echo @$response['name'] ?>"
                       id="name" placeholder="Nome">
            </div>
        </div>
        <div class="col-md-12">
            <!-- Default input -->
            <div class="form-group">
                <div class="row">

                    <div class="col-md-6">
                        <label for="address">Rua:</label>
                        <input type="text" class="form-control" required name="address" id="address"
                               value="<?php echo @$response['address'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="address">Bairro:</label>
                        <input type="text" class="form-control" required name="neighborhood" id="neighborhood"
                               value="<?php echo @$response['neighborhood'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="address">Numero:</label>
                        <input type="number" class="form-control" required name="number" id="number"
                               value="<?php echo @$response['number'] ?>">
                    </div>

                    <div class="col-md-3">
                        <label for="city">Cidade:</label>
                        <input type="text" class="form-control" required name="city"
                               value="<?php echo @$response['city'] ?>"
                               id="city">
                    </div>
                    <div class="col-md-3">
                        <label for="state">Estado:</label>
                        <input type="text" class="form-control" required name="state" id="state"
                               value="<?php echo @$response['state'] ?>">
                    </div>

                    <div class="col-md-3">
                        <label for="email">Código do Estabelecimento:</label>
                        <input type="number" class="form-control" min="1" max="9999" required name="establishment_cod"
                               id="establishment_cod"
                               value="<?php echo @$response['establishment_cod'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Atendimento:</label>
                        <input type="text" class="form-control" required name="attendance" id="attendance"
                               value="<?php echo @$response['attendance'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="email">Descrição:</label>
                        <input type="text" class="form-control" required name="description" id="description"
                               value="<?php echo @$response['description'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="categories">Categoria:</label>
                        <select class="form-control tm-input" name="categories" id="categories">
                            <?php foreach ($categories['response']['category'] as $line) {
                                echo "<option value='$line'>$line</option>";
                            } ?>
                        </select>
                    </div>
                    <input type="hidden" name="image" id="new_image3" value="">
                    <input type="hidden" value="" id="salvar" name="categorys">
                    <div class="col-md-3">
                        <br/>
                        <button type="button" id="novo" class="btn btn-default" data-toggle="modal"
                                data-target="#modal"> Nova
                            Categoria
                        </button>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Imagem:</label>
                        <input type="file" onchange="readURL3(this);" class="form-control" name="file" id="file">
                    </div>
                </div>
            </div>
            <div class="form-group row" id="selects">
            </div>

            <div class="row">
                <div class="col-md-12" align="right">
                    <a href="<?php echo base_url() ?>Establishments">
                        <button type="button" class="btn btn-primary"> Voltar</button>
                    </a>
                    <button type="submit" class="btn btn-default salvar" name="salvar" value="salvar"> Salvar
                    </button>

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
                    '<i class=" fas fa-times"></i> </a></div></div>')

            });

            // $('#novo_partner').click(function () {
            //     var valor2 = $('.tm2 option:selected').text();
            //     var idpart = $('.tm2 option:selected').val();
            //     $('#selects2').append('<div class="input-group mb-2 col-md-2 remover" id="' + valor2 + '" style="margin-bottom: 10px"><input type="text" class="form-control clearable clear2"  value="' + valor2 + '" readonly> <div class="input-group-prepend"><a href="#" onclick="excluir(\'' + valor2 + '\')" class="input-group-text">' +
            //         '<i class=" fas fa-times"></i> </a><input type="hidden" class="id_part" value="' + idpart + '"></div></div>')
            //
            // });
            $('.close').click(function () {
                $(".alert").alert('close');
            });

        });

        function excluir(id) {
            $('#' + id).remove();
        }

        var valores = new Array();
        var valores2 = [];
        $('.salvar').click(function () {
            $(".clearable").each(function (index) {
                // alert(index);
                valores.push($(this).val());
                $('#salvar').val(valores);

            });

            // alert($('#salvar').val());
            $(".id_part").each(function (index) {

                valores2.push($(this).val());
                $('#partner_id').val(valores2)
            });
        });


        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#falseinput3').attr('src', e.target.result);
                    $('#new_image3').val(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
