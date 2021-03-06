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
                    $response['fuel'] = $message;
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
    if (isset($response['fuel']['id'])) {
        echo form_open('Fuel/new_user/' . $response['fuel']['id'], ['role' => 'form']);
    } else {
        echo form_open('Fuel/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Titulo:</label>
                <input type="text" name="title" class="form-control" required
                       value="<?php echo @$response['fuel']['title'] ?>"
                       id="title">
            </div>
        </div>

    </div>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Dinheiro: <b> Original </b> </label>
                <input type="text" name="money_before" class="form-control" required
                       value="<?php echo str_replace(".", ",", @$response['fuel']['money_before'] )?>"
                       id="valor">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Debito: <b> Original </b> </label>
                <input type="text" name="debit_before" class="form-control" required
                       value="<?php echo str_replace(".", ",", @$response['fuel']['debit_before'] )?>"
                       id="debit">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Credito: <b> Original </b> </label>
                <input type="text" name="credit_before" class="form-control" required
                       value="<?php echo str_replace(".", ",", @$response['fuel']['credit_before'] )?>"
                       id="credit">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Medida(Litros) :</label>
                <input type="text" name="measure" class="form-control" required
                       value="<?php echo @$response['fuel']['measure'] ?>"
                       id="measure">
            </div>
        </div>
        <div class="col-md-4">
            <label for="establishment_id">Estabelecimento:</label>
            <?php
            $array_tiposprodutos [''] = ' - - - Escolha um estabelecimento  - - - ';
            foreach ($estabelecimentos['establishments'] as $newline) {
                foreach ($newline['category'] as $categoria) {
                    if ($categoria == 'combustivel') {
                        $array_tiposprodutos[$newline['id']] = $newline['name'];
                    }
                }
            }
            echo form_dropdown('establishment_id', $array_tiposprodutos,
                set_value('establishment_id', @$response['fuel']['establishment_id']), ' class="form-control"
                id="establishment_id" required="" ');
            ?>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name"><b class="h-25" style="font-size: 10pt">Dinheiro c/ MotoHappy:</b></label>
                <input type="text" name="money_atual" class="form-control" required
                       value="<?php echo str_replace(".", ",", @$response['fuel']['money_atual'] )?>"
                       id="valor">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name"><b class="h-25" style="font-size: 10pt">Debito c/ MotoHappy:</b></label>
                <input type="text" name="debit_atual" class="form-control" required
                       value="<?php echo str_replace(".", ",", @$response['fuel']['debit_atual'] )?>"
                       id="debit">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name"><b class="h-25" style="font-size: 10pt">Credito c/ MotoHappy:</b></label>
                <input type="text" name="credit_atual" class="form-control" required
                       value="<?php echo str_replace(".", ",", @$response['fuel']['credit_atual'] )?>"
                       id="credit">
            </div>
        </div>
        <div class="col-md-12" align="right">
            <a href="<?php echo base_url() ?>Fuel">
                <button type="button" class="btn btn-primary"> Voltar</button>
            </a>
            <button type="submit" value="salvar" name="salvar" class="btn btn-default"> Salvar</button>

        </div>
    </div>
    <?php echo form_close() ?>
</div>
