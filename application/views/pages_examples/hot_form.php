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
                <input type="text" class="form-control" name="duration" required
                       value="<?php echo @$data ?>"
                       id="nickname">
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
                <select class="form-control tm-input tm2" name="establishment_id" id="establishment_id">
                    <?php foreach ($estabelecimentos['establishments'] as $line2) {
                        $idesta = $line2['id'];
                        $text = $line2['name'];
                        echo "<option value='$idesta'>$text</option>";
                    } ?>
                </select>
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