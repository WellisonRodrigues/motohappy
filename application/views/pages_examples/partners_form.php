<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */
//print_r($message);
//print_r($response);
?>

<div class="container">
    <h2>Parceiros</h2>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($message)) {
                if (isset($message['data']['id']) or isset($message['id'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">Salvo com sucesso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    if (isset($message['data']['id'])) {
                        $response['partner'] = $message['data'];
                    } else {
                        $response['partner'] = $message;
                    }
                }
            } ?>
            <?php if (isset($message['errors'])) {
                $texto = $message['errors']['full_messages'][0];
                echo "<div class='alert alert-danger' role='alert'>
                $texto  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span
                                    aria-hidden=\"true\">&times;</span></button>
               </div>";
                $response['partner'] = $message['data'];
            } ?>
        </div>
    </div>
    <?php
    if (isset($response['partner']['id'])) {
        echo form_open('Partners/new_user/' . $response['partner']['id'], ['role' => 'form']);
    } else {
        echo form_open('Partners/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" class="form-control" value="<?php echo @$response['partner']['name'] ?>"
                       required
                       id="name">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" required
                       value="<?php echo @$response['partner']['email'] ?>"
                       id="email">
            </div>
        </div>

        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="nickname">Usuário:</label>
                <input type="text" class="form-control" name="nickname" required
                       value="<?php echo @$response['partner']['nickname'] ?>"
                       id="nickname">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <label for="file">Imagem:</label>
            <input type="file" onchange="readURL3(this);" class="form-control" name="file" id="file">
            <input type="hidden" name="image" id="new_image3" value="">
        </div>
        <input type="hidden" value="" id="partner_id" name="establishments_id">
        <?php if (!isset($response['id'])) { ?>
            <div class="col-md-6">
                <!-- Default input -->
                <div class="form-group">
                    <label for="email">Senha:</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>

        <?php } ?>


        <!--            <div class="form-group">-->

        <div class="col-md-12" align="right">
            <a href="<?php echo base_url() ?>Partners">
                <button type="button" class="btn btn-primary"> Voltar</button>
            </a>
            <button type="submit" class="btn btn-default"> Salvar</button>

        </div>
        <div class="col-md-12">
            <div id="selects2">
            </div>

        </div>
        <!--            </div>-->


        </form>
    </div>
    <script>

        $(document).ready(function () {
            $('#novo_partner').click(function () {
                var valor2 = $('.tm2 option:selected').text();
                var idpart = $('.tm2 option:selected').val();
                $('#selects2').append('<div class="input-group mb-2 col-md-4 remover" id="' + valor2 + '" style="margin-bottom: 10px"><input type="text" class="form-control clearable clear2"  value="' + valor2 + '" readonly> <div class="input-group-prepend"><a href="#" onclick="excluir(\'' + valor2 + '\')" class="input-group-text">' +
                    '<i class=" fas fa-times"></i> </a><input type="hidden" class="id_part" value="' + idpart + '"></div></div>')

            });
            $('.close').click(function () {
                $(".alert").alert('close');
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