<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */
//print_r($message);
//echo '<pre>';
//print_r($response);

?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="container">
    <h2>Hots</h2>
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
                    $response['hot'] = $message;
                }
            } ?>
            <?php if (isset($message['message'])) {
                $texto = $message['message'];
                echo "<div class='alert alert-danger' role='alert'>
                $texto  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span
                                    aria-hidden=\"true\">&times;</span></button>
               </div>";

            } ?>
        </div>
    </div>
    <?php
    if (isset($response['hot']['id'])) {
        echo form_open('Hot/new_user/' . $response['hot']['id'], ['role' => 'form']);
    } else {
        echo form_open('Hot/new_user', ['role' => 'form']);
    } ?>
    <div class="row">
        <!-- Default input -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Titulo do anúncio:</label>
                <input type="text" name="title" class="form-control" value="<?php echo @$response['hot']['title'] ?>"
                       required
                       id="name">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="email">Descrição:</label>
                <input type="text" class="form-control" name="description" required
                       value="<?php echo @$response['hot']['description'] ?>"
                       id="email">
            </div>
        </div>
        <?php if (isset($response['hot']['duration'])) {
            $phpdate = strtotime($response['hot']['duration']);
            $data = date('d/m/Y', $phpdate);
//            print_r($data);
        } ?>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="nickname">Data de expiração:</label>
                <input type="text" name="duration" class="form-control" required
                       value="<?php echo @$data ?>"
                       id="duration">
            </div>
        </div>

        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="nickname">Value:</label>
                <input type="text" class="form-control" name="value" required
                       value="<?php echo str_replace(".", ",", @$response['hot']['value']) ?>"
                       id="nickname">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="nickname">Value Before :</label>
                <input type="text" class="form-control" name="value_before" required
                       value="<?php echo str_replace(".", ",", @$response['hot']['value_before']) ?>"
                       id="nickname">
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default input -->
            <div class="form-group">
                <label for="">Estabelecimento:</label>
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
                    set_value('establishment_id', @$response['hot']['establishment_id']), ' class="form-control"
                id="establishment_id" required="" ');
                ?>
            </div>
        </div>
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

            <a href="<?php echo base_url() ?>Hot">
                <button type="button" class="btn btn-primary"> Voltar</button>
            </a>
            <button type="submit" value="salvar" name="salvar" class="btn btn-default"> Salvar</button>

        </div>
        <!--            </div>-->


        </form>
    </div>
    <script>
        $(function () {
            $("#duration").datepicker();
        });

        // $('#duration').datepicker();
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