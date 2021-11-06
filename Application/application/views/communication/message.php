<?php $active = html_escape($this->input->get('type')); ?>    



<div class="dashboard-wrapper">
    <div class="container-fluid">
        <aside class="page-aside">
            <div class="aside-content">
                <div class="aside-header">
                    <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon"><i class="fas fa-caret-down"></i></span></button><span class="title">Mail Service</span>
                    <p class="description">Service description</p>
                </div>
                <div class="aside-compose"><a class="btn btn-lg btn-secondary btn-block" href="<?= base_url('communication/mailbox/compose') ?>">Compose Email</a></div>
                <div class="aside-nav collapse">
                    <ul class="nav">
                        <li><a href="<?= base_url('communication/mailbox/inbox') ?>"><span class="icon"><i class="fas fa-fw fa-inbox"></i></span>Inbox<span class="badge badge-primary float-right"><?= $this->communication_model->count_unread_message() ?></span></a></li>
                        <li >
                            <a href="<?= base_url('communication/mailbox/sent') ?>"> <i class="fas fa-share-square"></i>
                                Sent<span class="label text-weight-normal pull-right"><?= $this->communication_model->reply_count_unread_message() ?></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?= base_url('communication/mailbox/important') ?>"> <i class="far fa-bell text-yellow"></i>
                                important
                            </a>
                        </li>
                        <li class="">
                            <a href="<?= base_url('communication/mailbox/trash') ?>"> 
                                <i class="far fa-trash-alt"></i> trash
                            </a>
                        </li>


                </div>
            </div>
        </aside>
        <?php //$this->load->view('communication/'. $inside_subview . '.php') ?>
        <?php
        if (isset($inside_subview)) {
            echo $inside_subview;
        }
        ?>

    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>




<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({tags: true});
    });
</script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300

        });
    });
</script>