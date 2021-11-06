<div class="main-content container-fluid p-0">
    <div class="email-head">
        <div class="email-head-title">Compose new message<span class="icon mdi mdi-edit"></span></div>
    </div>
    <form enctype="multipart/form-data" action="<?php echo base_url() ?>communication/message_send" method="post" >

        <div class="email-compose-fields">
            <div class="to">
                <div class="form-group row pt-0">
                    <label class="col-md-2 control-label">Role:</label>
                    <div class="col-md-10">
                        <select class="js-example-basic-multiple"  name="role_id" id="roleID">
                            <option value="0">Choose role</option>
                            <?php
                            foreach ($allRoles as $cat) {
                                echo "<option value=\"{$cat->ID}\">{$cat->NAME}</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="to">
                <div class="form-group row pt-0 class_div" <?php if (empty($class_id)) { ?> style="display: none" <?php } ?>>

                    <label class="col-md-2 control-label">Class : </label>
                    <div class="col-md-10">
                        <select class="js-example-basic-multiple" id="class_id"  name="class_id">
                            <option value="0"><?php echo $this->lang->line("choose_class"); ?></option>
                            <?php
                            foreach ($allCat as $cat) {
                                echo "<option value=\"{$cat->ID}\">{$cat->CLASSES}</option>";
                            }
                            ?>


                        </select>
                    </div>
                </div>
            </div>
            <div class="to">
                <div class="form-group row pt-0">
                    <label class="col-md-2 control-label">Receiver :</label>
                    <div class="col-md-10">
                        <select class="form-control"  id="scid"  name="receiver">

                        </select>
                    </div>
                </div>
            </div>

            <div class="subject">
                <div class="form-group row pt-2">
                    <label class="col-md-2 control-label">Subject</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="subject">
                    </div>
                </div>
            </div>
        </div>

        <div class="email editor">
            <div class="col-md-12 p-0">
                <div class="form-group">
                    <label class="control-label sr-only" for="summernote">Descriptions </label>
                    <textarea class="form-control" id="summernote" name="message_body" rows="6" placeholder="Write Descriptions"></textarea>
                </div>
            </div>
            <div class="email action-send">
                <div class="subject">
                    <div class="form-group row pt-2">
                        <label class="col-md-2 control-label">Attachment File</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="attachment_file">
                        </div>
                    </div>
                </div>
            </div>

            <div class="email action-send">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <button class="btn btn-primary btn-space" type="submit"><i class="icon s7-mail"></i> Send</button>
                        <button class="btn btn-secondary btn-space" type="button"><i class="icon s7-close"></i> Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('change', '#roleID', function () {
            var roleID = $(this).val();

            if (roleID == 4) {
                //alert(roleID);
            } else if (roleID == 5) {
                $(".class_div").show(400);
              
                $('#scid').empty().html("<option value=''>select_user");
            } else {
                $(".class_div").hide(400);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url(); ?>communication/getStafflistRole",

                    data: {
                        role_id: roleID
                    },
                    success: function (data) {
                        $('#scid').html(data);

                    }
                });
            }
        });
        $(document).on('change', '#class_id', function () {
            var classID = $(this).val();


 
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>communication/getStudentByClass",

                data: {
                    class_id: classID,
                },
                        
                success: function (data) {
                    $('#scid').html(data);
                   
                  
                }
            });
        });

    });
</script>
