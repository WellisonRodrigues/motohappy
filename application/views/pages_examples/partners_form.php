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
    if (isset($response['data']['id'])) {
        echo form_open('Partners/new_user/' . $response['id'], ['role' => 'form']);
    } else {
        echo form_open('Partners/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="email">Usuário:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="email">Estabelecimento:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
        </div>


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
