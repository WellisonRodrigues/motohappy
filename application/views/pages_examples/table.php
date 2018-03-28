<?php
/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 01/03/2018
 * Time: 23:13
 */

?>
<div class="container" style="margin-top: 5%;margin-bottom: 5%">
    <div class="row">

        <?php
        $id_table = 'teste';
        $this->perfecttable->setTableTemplate($id_table);
        $this->table->set_heading(array('Name', 'Color', 'Size'));

        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Fred', 'Blue', 'Small'));
        $this->table->add_row(array('Mary', 'Red', 'Large'));
        $this->table->add_row(array('John', 'Green', 'Medium'));

        echo $this->table->generate();
        ?>


        <script>
            $(document).ready(function () {
                $('#teste').DataTable();
            })
        </script>
    </div>
</div>


