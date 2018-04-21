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

                echo "<div class='alert alert-danger' role='alert'>
                $message
               </div>";

            } ?>
            <?php
            echo form_open('login/sign_in', ['role' => 'form']);
            ?>
            <p class="h4 text-center mb-4"><img src="<?php echo base_url() ?>imgs\logo.png"></p>

            <!-- Material input email -->
            <div class="md-form">
                <i class="fa fa-user prefix " style="color: #FF5D00"></i>
                <input type="email" name="email" id="materialFormLoginEmailEx"
                       class="form-control"
                       style="color: #FF5D00">
                <!--                    <label for="materialFormLoginEmailEx">Your email</label>-->
            </div>

            <!-- Material input password -->
            <div class="md-form">
                <i class="fa fa-lock prefix " style="color: #FF5D00"></i>
                <input type="password" name="password" id="materialFormLoginPasswordEx" class="form-control" style="color:
                    #FF5D00">
                <!--                    <label for="materialFormLoginPasswordEx">Your password</label>-->
            </div>
            <div class="md-form">
                <select name="user" id="materialFormLoginEmailEx" class="form-control">
                    <option value="admin">Master</option>
                    <option value="subadmin">Sub Master</option>
                    <option value="partners">Parceiro</option>
                </select>
            </div>

            <div class="text-center mt-3">
                &ensp;
                <button type="submit" class="btn btn-default" name="entrar"
                        style="border-radius: 10px; padding-left: 100px;padding-right: 100px" value="ENTRAR"> ENTRAR
                </button>

            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>


<!--<div class="card">-->
<!--    <div class="col-12">-->
<!--        <!-- Default form register -->
<!--        --><?php
//        echo form_open('Login/sign_in', ['role' => 'form']);
//        ?>
<!--        <br>-->
<!---->
<!--        <p class="h4 text-center mb-4"><img src="--><?php //APPPATH ?><!--imgs\logo.png"></p>-->
<!--        <!-- Default input email -->
<!--        <label for="defaultFormRegisterEmailEx" class="grey-text">Your email</label>-->
<!--        <input type="email" name="email" id="defaultFormRegisterEmailEx" class="form-control">-->
<!--        <br>-->
<!--        <!-- Default input password -->
<!--        <label for="defaultFormRegisterPasswordEx" class="grey-text">Your password</label>-->
<!--        <input type="password" name="password" id="defaultFormRegisterPasswordEx" class="form-control">-->
<!---->
<!--        <div class="text-center mt-4">-->
<!--            <button class="btn btn-default btn-lg" name="sign_in" type="submit"> Entrar</button>-->
<!--        </div>-->
<!--        <br>-->
<!--        --><?php
//        echo form_close();
//        ?>
<!--    </div>-->
<!--</div>-->