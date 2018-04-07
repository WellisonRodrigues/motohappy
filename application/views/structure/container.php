<?php
/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 01/03/2018
 * Time: 21:49
 */
$this->load->view('structure/head');
if ($menu == true) {
    $this->load->view('structure/header');
}
?>
<article style="margin-top: 100px">
    <?php $this->load->view($view) ?>
</article>


<?php
$this->load->view('structure/footer');
?>
