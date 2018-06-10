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
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Tipo:</label>
                <?php
                $array_tipo [''] = ' - - - Escolha um tipo  - - - ';
                $array_tipo ['fuel'] = 'Combustivel ';
                $array_tipo ['combo'] = ' Combos';
                echo form_dropdown('type', $array_tipo,
                    set_value('type', @$response['hot']['category']), ' class="form-control"
                id="type" ');
                ?>
                <!--                <select name="type" id="type" class="form-control">-->
                <!--                    <option value="fuel"> Combustivel</option>-->
                <!--                    <option value="combo"> Combo</option>-->
                <!--                </select>-->
            </div>
        </div>

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
        <div class="col-md-12 row" id="fuel">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Dinheiro: <b> Original </b> </label>
                    <input type="text" name="money_before" class="form-control"
                           value="<?php echo str_replace(".", ",", @$response['hot']['value_before']) ?>"
                           id="valor">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Debito: <b> Original </b> </label>
                    <input type="text" name="debit_before" class="form-control"
                           value="<?php echo str_replace(".", ",", @$response['hot']['debit_before']) ?>"
                           id="debit">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Credito: <b> Original </b> </label>
                    <input type="text" name="credit_before" class="form-control"
                           value="<?php echo str_replace(".", ",", @$response['hot']['credit_before']) ?>"
                           id="credit">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name">Medida(Litros) :</label>
                    <input type="text" name="measure" class="form-control"
                           value="<?php echo @$response['hot']['measure'] ?>"
                           id="measure">
                </div>
            </div>
            <div class="col-md-4">
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
                    echo form_dropdown('establishment_id_fuel', $array_tiposprodutos,
                        set_value('establishment_id_fuel', @$response['hot']['establishment_id']), ' class="form-control"
                id="establishment_id_fuel"');
                    ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name"><b class="h-25" style="font-size: 10pt">Dinheiro c/ MotoHappy:</b></label>
                    <input type="text" name="money_atual" class="form-control"
                           value="<?php echo str_replace(".", ",", @$response['hot']['value']) ?>"
                           id="valor">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name"><b class="h-25" style="font-size: 10pt">Debito c/ MotoHappy:</b></label>
                    <input type="text" name="debit_atual" class="form-control"
                           value="<?php echo str_replace(".", ",", @$response['hot']['debit_atual']) ?>"
                           id="debit">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="name"><b class="h-25" style="font-size: 10pt">Credito c/ MotoHappy:</b></label>
                    <input type="text" name="credit_atual" class="form-control"
                           value="<?php echo str_replace(".", ",", @$response['hot']['credit_atual']) ?>"
                           id="credit">
                </div>
            </div>

        </div>
        <div id="combos" class="col-md-12 row">
            <div class="col-md-4">
                <!-- Default input -->
                <div class="form-group">
                    <label for="nickname">Value:</label>
                    <input type="text" class="form-control" name="value"
                           value="<?php echo str_replace(".", ",", @$response['hot']['value']) ?>"
                           id="nickname">
                </div>
            </div>
            <div class="col-md-4">
                <!-- Default input -->
                <div class="form-group">
                    <label for="nickname">Value Before :</label>
                    <input type="text" class="form-control" name="value_before"
                           value="<?php echo str_replace(".", ",", @$response['hot']['value_before']) ?>"
                           id="nickname">
                </div>
            </div>
            <div class="col-md-4">
                <!-- Default input -->
                <div class="form-group">
                    <label for="">Estabelecimento:</label>
                    <?php
                    $array_tiposprodutos [''] = ' - - - Escolha um estabelecimento  - - - ';
                    foreach ($estabelecimentos['establishments'] as $newline) {
                        foreach ($newline['category'] as $categoria) {
                            if ($categoria != 'combustivel') {
                                $array_tiposprodutos[$newline['id']] = $newline['name'];
                            }
                        }
                    }
                    echo form_dropdown('establishment_id', $array_tiposprodutos,
                        set_value('establishment_id', @$response['hot']['establishment_id']), ' class="form-control"
                id="establishment_id" ');
                    ?>
                </div>
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
            var a = $('#type').val();
            if (a === 'fuel') {
                $('#fuel').show();
                $('#combos').hide();
            } else {
                $('#fuel').hide(); // hide the first one
                $('#combos').show();
            }
            $('#type').change(function () {
                var i = $('#type').val();
                if (i === "fuel") // equal to a selection option
                {
                    $('#fuel').show();
                    $('#combos').hide(); // show the other one
                } else if (i === "combo") {
                    $('#fuel').hide(); // hide the first one
                    $('#combos').show(); // show the other one

                } else if (i === "") {
                    $('#fuel').hide();
                    $('#combos').hide();
                }

            });

        });


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