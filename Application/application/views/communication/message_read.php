<?php
$message_id = $this->input->get('id');
$message = $this->communication_model->getSingle('MESSAGE', $message_id, true);
$getSender = explode('-', $message->SENDER);
$senderRoleID = $getSender[0];
$senderUserID = $getSender[1];
$getReciever = explode('-', $message->RECIEVER);
$recieverRoleID = $getReciever[0];
$recieverUserID = $getReciever[1];
if ($message->SENDER == $active_user) {
    $status = $message->FAV_SENT;
}
if ($message->RECIEVER == $active_user) {
    $status = $message->FAV_INBOX;
}
?>   



<div class="main-content container-fluid p-0">
    <div class="email-head">
        <div class="email-head-subject">
            <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-star"></i></span></a> <span>	<?php echo $message->SUBJECT; ?></span>
                <div class="icons"><a href="#" class="icon"><i class="fas fa-reply"></i></a><a href="#" class="icon"><i class="fas fa-print"></i></a><a href="#" class="icon"><i class="fas fa-trash"></i></a></div>
            </div>
        </div>
        <div class="email-head-sender">
            <div class="date">August 23, 3:37</div>
            <div class="avatar"><img src="../assets/images/avatar-2.jpg" alt="Avatar" class="rounded-circle user-avatar-md"></div>
            <div class="sender"><a href="#"><?php echo $this->communication_model->getUserNameByRoleID($senderRoleID, $senderUserID)['FIRST_NAME']; ?></a> to <a href="#">me</a>
                <div class="actions"><a class="icon toggle-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Mark as read</a><a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item" href="#">Spam</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="email-body">
        <p><?php echo $message->BODY; ?></p>

    </div><br><br>
    <div class="email-attachments">
        <?php if (!empty($message->ENC_NAME)): ?>
            <blockquote class="warning">
                <p><?php ///zzecho translate('attachment_file') ?></p>
                <a href="<?= base_url('communication/download?type=mailbox&file=' . $message->ENC_NAME) ?>" class="btn btn-default btn-sm"><i class="fas fa-paper-plane"></i><span> Download</span></a>
            </blockquote>
        <?php endif; ?>
     
    </div>
</div>