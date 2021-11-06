<div class="main-content container-fluid p-0">
    <div class="email-head">
        <div class="email-head-title">Compose new message<span class="icon mdi mdi-edit"></span></div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">	Receiver</th>
                <th scope="col">	Subjects</th>
                <th scope="col">	Message</th>
                <th scope="col">	Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
           // $this->db->order_by('ID', 'DESC');
           // $messages = $this->db->get_where('MESSAGE', array('RECIEVER' => $active_user, 'TRASH_INBOX' => 1))->result();
           $sql = "SELECT * FROM MESSAGE WHERE (SENDER = " . $this->db->escape($active_user) . " AND TRASH_SENT = 1) OR (RECIEVER = " .
					$this->db->escape($active_user) . " AND TRASH_INBOX = 1) ORDER BY ID DESC";
           	$messages = $this->db->query($sql)->result();
            foreach ($messages as $message):
                $get_sender = explode('-', $message->RECIEVER);
                $recieverRoleID = $get_sender[0];
                $recieverUserID = $get_sender[1];
                ?>
                <tr <?= ($message->REPLY_STATUS == 1 ? 'class="text-weight-bold"' : ''); ?>>
                    <td class="checked-area" width="30px">
                        <div class="checkbox-replace">
                            <label class="i-checks">
                                <input type="checkbox" class="msg_checkbox" id="<?= $message->ID ?>"><i></i>
                            </label>
                        </div>
                    </td>
                    <td width="20%">
                        <a data-id="<?= $message->ID ?>" href="javascript:void(0);" class="mailbox-fav" data-toggle="tooltip"
                           data-original-title="Click to teach if this conversation is important"><i class="text-warning <?= ($message->FAV_SENT == 0 ? 'far fa-bell' : 'fas fa-bell'); ?>"></i></a><?= '&nbsp;&nbsp;&nbsp;' . $this->communication_model->getUserNameByRoleID($recieverRoleID, $recieverUserID)['FIRST_NAME'] ?>
                    </td>


                    <td>
    <?php echo (!empty($message->FILE_NAME) ? '<i class="fas fa-paperclip"></i>' : ''); ?>
                        <a href="<?= base_url('communication/mailbox/read?type=inbox&id=' . $message->ID) ?>" class="text-dark mail-subj"><?php echo $message->SUBJECT ?></a>
                    </td>
                    <td>
    <?php
    $body = strip_tags($message->BODY);
    echo mb_strimwidth($body, 0, 60, "...");
    ?>
                    </td>
                    <td><?php echo get_nicetime($message->CREATED_AT); ?></td>  
                </tr>
<?php endforeach; ?>

        </tbody>
    </table>


</div>

