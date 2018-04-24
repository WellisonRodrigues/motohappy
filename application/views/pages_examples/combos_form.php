<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */
//print_r($estabelecimentos);

?>

<div class="container">
    <h2>Combos</h2>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($message)) {
                if (isset($message['id']) or isset($message['id'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">Salvo com sucesso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    $response['combo'] = $message;
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
    if (isset($response['combo']['id'])) {
        echo form_open('Combos/new_user/' . $response['combo']['id'], ['role' => 'form']);
    } else {
        echo form_open('Combos/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Descrição:</label>
                <input type="text" name="description" required value="<?php echo @$response['combo']['description'] ?>"
                       class="form-control"
                       id="description">
            </div>
        </div>

    </div>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Valor:</label>
                <input type="text" name="valor" required value="<?php echo @$response['combo']['value'] ?>"
                       class="form-control"
                       id="valor">
            </div>
        </div>
        <div class="col-md-3">
            <label for="establishment_id">Estabelecimento:</label>
            <select class="form-control tm-input tm2" name="establishment_id" id="establishment_id">
                <?php foreach ($estabelecimentos['establishments'] as $line2) {
                    $idesta = $line2['id'];
                    $text = $line2['name'];
                    echo "<option value='$idesta'>$text</option>";
                } ?>
            </select>
        </div>

        <div class="col-md-12" align="right">
            <a href="<?php echo base_url()?>Combos"> <button type="button"  class="btn btn-primary"> Voltar</button></a>
            <button type="submit" value="salvar" name="salvar" class="btn btn-default"> Salvar</button>

        </div>

    </div>
    <?php echo form_close() ?>
</div>

<script>

</script>