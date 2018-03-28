<?php

/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 01/03/2018
 * Time: 23:39
 */
class PerfectTable
{
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();

    }

    function setTableTemplate($id_table)
    {
        $this->CI->load->library('table');
        $template = array(
            'table_open' => ' <table id="' . $id_table . '" class="table table-striped table-bordered table-hover" >',

            'thead_open' => '<thead class="blue-grey lighten-4">',
            'thead_close' => '</thead>',

            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th scope="row">',
            'heading_cell_end' => '</th>',

            'tbody_open' => '<tbody>',
            'tbody_close' => '</tbody>',

            'row_start' => '<tr>',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',

            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',

            'table_close' => '</table>'
        );

        return $this->CI->table->set_template($template);
    }


}