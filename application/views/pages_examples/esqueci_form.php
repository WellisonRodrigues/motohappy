<?php
/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 03/03/2018
 * Time: 23:49
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!---->
<div class="container">
    <!--    <div class="col-md-12">-->

    <div class="row justify-content-md-center" style="margin-top: 5%">
        <div class="col-md-4">
            <?php if (isset($message)) {

                echo "<div class='alert alert-success' role='alert'>
                $message
               </div>";

            } ?>
            <?php
            echo form_open('esqueci/reset', ['role' => 'form']);
            ?>
            <!--            <div class="md-form">-->
            <!--                <div class="col-md-6 justify-content-md-center"> Comfirme seu email:</div><br></div>-->
            <!-- Material input email -->
            <div class="md-form">
                <select name="user" id="materialFormLoginEmailEx" class="form-control">
                    <option value="admin">Master</option>
                    <option value="subadmin">Sub Master</option>
                    <option value="partners">Parceiro</option>
                </select>
            </div>
            <div class="md-form">

                <i class="fa fa-user prefix " style="color: #FF5D00"></i>
                <label for="materialFormLoginEmailEx">Confirme seu email:</label>
                <input type="email" name="email" id="materialFormLoginEmailEx"
                       class="form-control"
                       style="color: #FF5D00">

                <button type="submit" class="btn btn-default" name="entrar"
                        style="border-radius: 10px; padding-left: 100px;padding-right: 100px" value="ENTRAR"> Resetar
                </button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>

