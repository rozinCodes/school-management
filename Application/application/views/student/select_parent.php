<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">


        <!--  -->

        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select Your Son</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
       
        <div class="modal-body">

                            <!--  -->

                            <form class="needs-validation" novalidate="" onsubmit="return validate()" 
                            action="<?php echo base_url() ?>student/student_view/student_profile_by_guardian"  onsubmit="validate()" method="post">   
                           

                    <?php 

                    if(isset($allPdt)){
                        foreach ($allPdt as $value) {
                            ?>

                       


                            
                    
                    
                            <input type="radio" id="r" class="clschg" name="student_name" value="<?php  echo $value->ADMISSION_NO ?>">
                            <label  for="male"><?php echo $value->F_NAME?></label><br>
                   
                    

                    <?php
                        }
                        
                        }
                        ?>
                    <hr>
                        <button type="submit" class="btn btn-primary" onclick="display()">Select To Proced</button>


            </form>

            <div id="disp" style= 
        "color:green; font-size:18px; font-weight:bold;"> 
        </div>  

        </div>
       
      
        </div>
    </div>
    </div>



        <!--  -->



    </div>

</div>

<script>
    $('#form').parsley();
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script type="text/javascript">
    document.querySelector("#today2").valueAsDate = new Date();
</script>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
       $(document).ready(function(){
            $('#exampleModal').modal('show');
        }); 
    </script>
    <script>

$('#exampleModal').modal({backdrop: 'static', keyboard: false})  
    </script>

<script type="text/javascript">
function validate()
{
  var retval = false;
  for (var i=0; i < document.myForm.r.length; i++)
  {
    if (document.myForm.r[i].checked)
    {
      retval = true;
    }
  }  

  return retval;
}
</script>

<script> 
        function display() {  
            var checkRadio = document.querySelector( 
                'input[name="student_name"]:checked'); 
              
            if(checkRadio != null) { 
                document.getElementById("disp").innerHTML 
                    = checkRadio.value 
                    + " radio button checked"; 
            } 
            else { 
                document.getElementById("disp").innerHTML 
                    = "No one selected"; 
            } 
        } 
    </script> 