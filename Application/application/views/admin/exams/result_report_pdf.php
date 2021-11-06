<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }
</style>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="section_print" id="section-to-print">
                                <table id="customers">
                                        <thead>
                                            <tr>
                                                <!--  <th><?php //echo $this->lang->line("id"); 
                                                            ?></th> -->
                                                <th><?php echo "Serial No"; ?></th>
                                                <th><?php echo $this->lang->line("admission_no"); ?></th>

                                                <th><?php echo $this->lang->line("f_name"); ?></th>
                                                <th><?php echo $this->lang->line("class"); ?></th>
                                                <th><?php echo $this->lang->line("section"); ?></th>
                                                <th><?php echo $this->lang->line("session"); ?></th>
                                                <th><?php echo $this->lang->line("exam_name"); ?></th>
                                                
                                                <th><?php echo $this->lang->line("marks"); ?></th>
                                                <th><?php echo $this->lang->line("status"); ?></th>




                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                            if (isset($allPdt)) {
                                                $i=1;


                                                foreach ($allPdt as $value) {

                                                    if (isset($allPdtfail)) {
                                                        
        
        
                                                        foreach ($allPdtfail as $valuefail) {

                                                            if($value->STUDENT_ID!=$valuefail->STUDENT_ID)
                                                            {



                                            ?>

                                                    <tr>
                                                        <!--  <td><?php //echo $value->ID
                                                                    ?></td> -->
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->ADMISSION_NO ?></td>

                                                        <td><?php echo $value->F_NAME ?></td>
                                                        <td><?php echo $value->CLASS_NAME ?></td>
                                                        <td><?php echo $value->SECTION_NAME ?></td>
                                                        <td><?php echo $value->SESSION_NAME ?></td>
                                                        <td><?php echo $value->EXAM_NAME ?></td>
                                                        <td><?php echo $value->MARKS ?></td>
                                                        <td><?php echo "PASS" ?></td>






                                                    </tr>

                                            <?php
                                                            }

                                                            else
                                                            {

                                                                ?>

                                                                <tr>
                                                                    <!--  <td><?php //echo $value->ID
                                                                                ?></td> -->
                                                                    <td><?php echo $i++ ?></td>
                                                                    <td><?php echo $value->ADMISSION_NO ?></td>
            
                                                                    <td><?php echo $value->F_NAME ?></td>
                                                                    <td><?php echo $value->CLASS_NAME ?></td>
                                                                    <td><?php echo $value->SECTION_NAME ?></td>
                                                                    <td><?php echo $value->SESSION_NAME ?></td>
                                                                    <td><?php echo $value->EXAM_NAME ?></td>
                                                                    <td><?php echo $value->MARKS ?></td>
                                                                    <td><?php echo "FAIL" ?></td>
            
            
            
            
            
            
                                                                </tr>
            
                                                        <?php

                                                            }

                                                }
                                            }
                                        }
                                    }

                                            ?>


                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                            <br>

                        </div>