<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:36
 */

//print_r($this->session->userdata("user"));
//echo '<pre>';
//print_r($response);
?>
<div class="col-md-9 mx-auto">
    <h2>Usuários</h2>
    <div class="row">
        <div class="col-md-12" align="right">
            <div class="float-md-right">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <div class="input-group mb-3">
                            <!-- Default input -->
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" class="form-control mt-sm-2" id="search-criteria">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="search" class="btn btn-primary mt-sm-auto">
                            <i class="fas fa-search"></i>
                        </button>
                        <?php if ($this->session->userdata("user")['typeuser'] != 'partners') { ?>
                            <a href="<?php echo base_url() ?>Users/new_user">
                                <button type="button" class="btn btn-default mt-sm-auto"><i class="fas fa-plus"></i>
                                </button>
                            </a>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="easyPaginate">
        <!--        <div class="row">-->
        <?php foreach ($response

                       as $row) { ?>
            <newtag>
                <div class="col-md-4 contem" style="margin-top: 20px;">
                    <div class="card" style="min-height: 200px">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2" style="padding-left: 0px;">
                                        <?php if ($row['image']['url'] != null) { ?>
                                            <img src="<?php echo $row['image']['url'] ?>"
                                                 class="rounded-circle" width="50px" height="50px">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>imgs/Elemento6.png"
                                                 class="rounded-circle" width="50px" height="50px">

                                        <?php } ?>
                                    </div>
                                    <div class="col-md-7" style="margin-left: 4px;">
                                        <b class="card-title h-25"><?php echo @$row['name'] ?></b>
                                        <p class="h-25"
                                           style="font-size: 10pt;margin-bottom: 0;"><?php echo @$row['email'] ?></p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="<?php echo base_url() ?>Users/new_user/<?php echo $row['id'] ?>"><i
                                                    class="fas fa-pencil-alt"
                                                    style="color: gray"></i></a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="delete"
                                           href="<?php echo base_url() ?>Users/delete/<?php echo $row['id'] ?>">
                                            <i
                                                    class="fas fa-times" style="color: gray"></i>
                                        </a></div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="h-25" style="font-size: 10pt;padding-top: 10px"><?php
                                    $phpdate = strtotime($row['birthday']);
                                    $data = date('d/m/Y', $phpdate);
                                    echo @$data ?> &nbsp;&nbsp;&nbsp;<?php echo @$row['phone'] ?></div>
                                <div class="h-25"
                                     style="font-size: 10pt">  <?php echo @$row['address'] ?>,
                                    <?php echo @$row['city'] ?></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-12">
                                <?php if ($row['document_present']) {
                                    if ($row['document_present'] == 'habilitação enviada') {
                                        ?>
                                        <a data-toggle="modal" data-target="#<?php echo $row['id'] ?>" style="color: green">
                                            <?php echo @$row['document_present']; ?>
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <?php
                                    } else {
                                        echo @$row['document_present'];
                                    }
                                } else {
                                    echo 'habilitação não enviada';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b>Habilitação</b>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo $row['document']['url']?>" width="770" height="500">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </newtag>
        <?php } ?>
        <!--        </div>-->
    </div>
    <br>
    <!--    <nav aria-label="Page navigation example">-->
</div>
<script>
    $(document).ready(function () {
        $('#easyPaginate').easyPaginate({
            paginateElement: 'newtag',
            elementsPerPage: 9,
            firstButtonText: 'Primeira',
            lastButtonText: 'Ultima',
            prevButton: false,
            nextButton: false
            // effect: 'slide'
        });
    });
</script>