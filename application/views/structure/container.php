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
<script>
    $(document).ready(function () {
        $('#search').click(function () {
            $('.contem').hide();
            var txt = $('#search-criteria').val();
            // $('.contem:contains("' + txt + '")').show();
            $('.contem').each(function () {
                if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                    $(this).show();
                }
            });

        });
        $('li').bind('click', function () {
            $('li').removeClass('active');
            $(this).addClass('active')
        });
        $('.delete').bind('click', function () {
            var comf = confirm('Deseja mesmo excluir?');
            if (comf == true) {
            } else {
                event.preventDefault();
            }
        });
    });

</script>

<?php
$this->load->view('structure/footer');
?>
