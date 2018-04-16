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
    <h2>Combustivel</h2>
    <?php
    if (isset($response['id'])) {
        echo form_open('Fuel/new_user/' . $response['id'], ['role' => 'form']);
    } else {
        echo form_open('Fuel/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Titulo:</label>
                <input type="text" name="title" class="form-control" value="<?php echo @$response['title']?>" id="title">
            </div>
        </div>

    </div>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Medida::</label>
                <input type="text" name="measure" class="form-control"  value="<?php echo @$response['measure']?>" id="measure">
            </div>
        </div>
        <!-- Default input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Dinheiro:</label>
                <input type="text" name="valor" class="form-control" value="<?php echo @$response['value']?>" id="valor">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Debito:</label>
                <input type="text" name="debit" class="form-control" value="<?php echo @$response['debit']?>" id="debit">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Credito:</label>
                <input type="text" name="credit" class="form-control" value="<?php echo @$response['credit']?>" id="credit">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Estabelecimento:</label>
                <input type="text" name="establishment_id" class="form-control" id="establishment_id">
            </div>
        </div>
        <div class="col-md-12" align="right">

            <button type="submit" class="btn btn-default"> Salvar</button>

        </div>
    </div>
    <?php echo form_close() ?>
</div>
