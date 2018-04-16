<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */
//print_r($response);

?>

<div class="container">
    <h2>Combos</h2>
    <?php
    if (isset($response['id'])) {
        echo form_open('Combos/new_user/' . $response['id'], ['role' => 'form']);
    } else {
        echo form_open('Combos/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Descrição:</label>
                <input type="text" name="description" value="<?php echo @$response['description'] ?>" class="form-control"
                       id="description">
            </div>
        </div>

    </div>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Valor:</label>
                <input type="text" name="valor" value="<?php echo @$response['value'] ?>" class="form-control" id="valor">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Estabelecimento:</label>
                <input type="text" name="establishment_id" value="<?php echo @$response['establishment_id'] ?>"
                       class="form-control" id="establishment_id">
            </div>
        </div>

        <div class="col-md-12" align="right">

            <button type="submit" class="btn btn-default"> Salvar</button>

        </div>

    </div>
    <?php echo form_close() ?>
</div>
