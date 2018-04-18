<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */

?>

<div class="container">
    <h2>Parceiros</h2>
    <?php
    if (isset($response['id'])) {
        echo form_open('Partners/new_user/' . $response['id'], ['role' => 'form']);
    } else {
        echo form_open('Partners/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" class="form-control" value="<?php echo @$response['name']?>" id="name">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" value="<?php echo @$response['email']?>" id="email">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="nickname">Usuário:</label>
                <input type="text" class="form-control" name="nickname" value="<?php echo @$response['nickname']?>" id="nickname">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="">Estabelecimento:</label>
                <input type="text" class="form-control" name="" id="">
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
            <div class="form-group">
                <label for="image">Imagem:</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
        </div>
        <!--            <div class="form-group">-->
        <div class="col-md-12" align="right">

            <button type="submit" class="btn btn-default"> Salvar</button>

        </div>
        <!--            </div>-->


        </form>
    </div>
