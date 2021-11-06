   <div class="main-content container-fluid p-0">
                    <div class="email-inbox-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="email-title"><span class="icon"><i class="fas fa-inbox"></i></span> Inbox <span class="new-messages">(<?= $this->communication_model->count_unread_message() ?> new messages)</span> </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="email-search">
                                    <div class="input-group input-search">
                                        <input class="form-control" type="text" placeholder="Search mail..."><span class="input-group-btn">
                                       <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
       <form action="<?php echo base_url()?>communication/delete" method="post" onclick=" return deleteconfirm();">
                    <div class="email-filters">
                        <div class="email-filters-left">
                            <label class="custom-control custom-checkbox be-select-all">
                                <input class="custom-control-input chk_all" type="checkbox" name="chk_all"><span class="custom-control-label"></span>
                            </label>
                        
                            <div class="btn-group">
                            
                                <button class="btn btn-light"  type="submit" name="baluk_delete_submit">Delete</button>
                            </div>
                           
                        </div>
                        <!--
                        <div class="email-filters-right"><span class="email-pagination-indicator">1-50 of 253</span>
                            <div class="btn-group email-pagination-nav">
                                <button class="btn btn-light" type="button"><i class="fas fa-angle-left"></i></button>
                                <button class="btn btn-light" type="button"><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                       -->
                    </div>
                    <div class="email-list">
                           	<?php
                               // echo $active_user;
			$this->db->order_by('ID', 'DESC');
			$messages = $this->db->get_where('MESSAGE', array('RECIEVER' => $active_user, 'TRASH_INBOX' => 0))->result();
			
                        foreach ($messages as $message){
				$get_sender = explode('-', $message->SENDER);
				$senderRoleID = $get_sender[0];
				$senderUserID = $get_sender[1];
                                if($message->READ_STATUS == 0) {
			?>
                        <div  class="email-list-item email-list-item--unread">
                            <div class="email-list-actions">
                                  <label class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkboxes" type="checkbox" value="<?php echo $message->ID?>" name="checked_id[]" id="three"><span class="custom-control-label"></span>
                                </label><a class="favorite" href="#"><span><i class="fas fa-star"></i></span></a>
                            </div>
                            <div class="email-list-detail"><span class="date float-right"><span class="icon"><?php echo (!empty($message->FILE_NAME) ? '<i class="fas fa-paperclip"></i>' : ''); ?> </span><?php echo get_nicetime($message->CREATED_AT);?></span><span class="from">						<?php echo (!empty($message->file_name) ? '<i class="fas fa-paperclip"></i>' : ''); ?>
						<a href="<?=base_url('communication/mailbox/read?type=inbox&id='.$message->ID)?>" class="text-dark mail-subj"><?php echo $message->SUBJECT ?></a></span>
                                <p class="msg"><?php
						$body = strip_tags($message->BODY);
						echo mb_strimwidth($body, 0, 60, "...");
						?></p>
                            </div>
                        </div>
                        
                          <?php
    
                        } else { ?>
                     
                        <div class="email-list-item">
                            <div class="email-list-actions">
                                <label class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkboxes" type="checkbox" value="<?php echo $message->ID?>" name="checked_id[]" id="three"><span class="custom-control-label"></span>
                                </label><a class="favorite" href="#"><span><i class="fas fa-star"></i></span></a>
                            </div>
                             <div class="email-list-detail"><span class="date float-right"><span class="icon"><?php echo (!empty($message->FILE_NAME) ? '<i class="fas fa-paperclip"></i>' : ''); ?> </span><?php echo get_nicetime($message->CREATED_AT);?></span><span class="from">						<?php echo (!empty($message->file_name) ? '<i class="fas fa-paperclip"></i>' : ''); ?>
						<a href="<?=base_url('communication/mailbox/read?type=inbox&id='.$message->ID)?>" class="text-dark mail-subj"><?php echo $message->SUBJECT ?></a></span>
                                <p class="msg"><?php
						$body = strip_tags($message->BODY);
						echo mb_strimwidth($body, 0, 60, "...");
						?></p>
                            </div>
                        </div>
                        <?php
    }
                        }
                        ?>
                   
                    </div>
           
       </form>
                </div>