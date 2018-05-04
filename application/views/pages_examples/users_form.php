<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */
//echo '<pre>';
//print_r($response);
?>

<div class="container">
    <h2>Usuários</h2>
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
                    $response = $message['data'];
                }
            } ?>
            <?php if (isset($message['errors'])) {
                $texto = $message['errors']['full_messages'][0];
                echo "<div class='alert alert-danger' role='alert'>
                $texto  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span
                                    aria-hidden=\"true\">&times;</span></button>
               </div>";

            } ?>
        </div>
    </div>

    <?php
    if (isset($response['id'])) {
        echo form_open('Users/new_user/' . $response['id'], ['role' => 'form']);
    } else {
        echo form_open('Users/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" value="<?php echo @$response['name'] ?>" class="form-control" required
                       id="name"
                >
            </div>
        </div>
        <div class="col-md-12">
            <!-- Default input -->
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" required value="<?php echo @$response['email'] ?>"
                       id="email" placeholder="example@mail.com">
            </div>
        </div>

        <div class="col-md-12">
            <!-- Default input -->
            <div class="form-group">
                <div class="row">

                    <div class="col-md-3">
                        <label for="date">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="birthday"
                               value="<?php echo @$response['birthday'] ?>" required id="birthday"
                        >
                    </div>
                    <div class="col-md-3">
                        <label for="phone">Telefone:</label>
                        <input type="number" class="form-control" required value="<?php echo @$response['phone'] ?>"
                               name="phone"
                               id="phone"
                        >
                    </div>
                    <div class="col-md-3">
                        <label for="city">Cidade:</label>
                        <input type="text" class="form-control" required name="city" id="city"
                               value="<?php echo @$response['city'] ?>"
                        >
                    </div>
                    <div class="col-md-3">
                        <label for="state">Estado:</label>
                        <input type="text" class="form-control" required name="state" id="state"
                               value="<?php echo @$response['state'] ?>"
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- Default input -->
            <div class="form-group">
                <label for="address">Endereço:</label>
                <input type="text" class="form-control" required name="address" id="address"
                       value="<?php echo @$response['address'] ?>">
            </div>
        </div>
        <?php if (!isset($response['id'])) { ?>
            <div class="col-md-6">
                <!-- Default input -->
                <div class="form-group">
                    <label for="email">Senha:</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>

        <?php } ?>

        <div class="col-md-12">
            <!-- Default input -->
            <!--            <div class="col-md-6">-->
            <label for="file">Imagem:</label>
            <input type="file" onchange="readURL3(this);" class="form-control" name="file" id="file">
            <!--            </div>-->
            <input type="hidden" name="image" id="new_image3" value="">
        </div>
        <!--            <div class="form-group">-->
        <div class="col-md-12" align="right">
            <a href="<?php echo base_url() ?>Users">
                <button type="button" class="btn btn-primary"> Voltar</button>
            </a>
            <button type="submit" value="salvar" name="salvar" class="btn btn-default"> Salvar</button>

        </div>
        <!--            </div>-->

    </div>
    <?php echo form_close() ?>
</div>
<script>
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