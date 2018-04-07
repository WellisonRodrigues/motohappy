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
    <form>
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
                    <div class="row">

                        <div class="col-md-6">
                            <label for="address">Endereço:</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>

                        <div class="col-md-3">
                            <label for="city">Cidade:</label>
                            <input type="text" class="form-control" name="city" id="city">
                        </div>
                        <div class="col-md-3">
                            <label for="state">Estado:</label>
                            <input type="text" class="form-control" name="state" id="state">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-3">
                            <label for="email">Código do Estabelecimento:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="example@mail.com">
                        </div>
                        <div class="col-md-3">
                            <label for="email">Atendimento:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="example@mail.com">
                        </div>
                        <div class="col-md-3">
                            <label for="email">Categoria:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="example@mail.com">
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <button type="button" class="btn btn-default"> Nova Categoria</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!-- Default input -->
                    <div class="row">

                        <div class="col-md-3">
                            <label for="email">Parceiro:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="example@mail.com">
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <button type="button" class="btn btn-default"> Novo Parceiro</button>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Imagem:</label>
                            <input type="file" class="form-control" name="email" id="email"
                                   placeholder="example@mail.com">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12" align="right">

                        <button type="button" class="btn btn-default"> Salvar</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
