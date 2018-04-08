<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 14:14
 */

?>

<div class="container">
    <h2>Usuários</h2>
    <?php
    if (isset($response['data']['id'])) {
        echo form_open('Users/new_user/' . $response['id'], ['role' => 'form']);
    } else {
        echo form_open('Users/new_user', ['role' => 'form']);
    } ?>
        <div class="row">
            <!-- Default input -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome">
                </div>
            </div>
            <div class="col-md-12">
                <!-- Default input -->
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@mail.com">
                </div>
            </div>

            <div class="col-md-12">
                <!-- Default input -->
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-3">
                            <label for="date">Data de Nascimento:</label>
                            <input type="date" class="form-control" name="date" id="date"
                            >
                        </div>
                        <div class="col-md-3">
                            <label for="phone">Telefone:</label>
                            <input type="number" class="form-control" name="email" id="phone"
                            >
                        </div>
                        <div class="col-md-3">
                            <label for="city">Cidade:</label>
                            <input type="text" class="form-control" name="city" id="city"
                            >
                        </div>
                        <div class="col-md-3">
                            <label for="state">Estado:</label>
                            <input type="text" class="form-control" name="state" id="state"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- Default input -->
                <div class="form-group">
                    <label for="address">Endereço:</label>
                    <input type="text" class="form-control" name="address" id="address">
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

        </div>
    </form>
</div>
