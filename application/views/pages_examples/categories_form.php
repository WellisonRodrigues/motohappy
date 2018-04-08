<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */

?>

<div class="container">
    <h2>Categoria</h2>
    <?php
    if (isset($response['data']['id'])) {
        echo form_open('Categories/new_categories/' . $response['id'], ['role' => 'form']);
    } else {
        echo form_open('Categories/new_categories', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome">
            </div>
        </div>

    </div>
    <?php echo form_close() ?>
</div>
