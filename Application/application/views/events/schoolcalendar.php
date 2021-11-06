
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>
$(document).ready(function(){
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:''
            //right:'month,agendaWeek,agendaDay'
        },
        events:"<?php echo base_url(); ?>admin/events/schoolcalendar/load",
        selectable:true,
        selectHelper:true,
        select:function(start, end, allDay)
        {
            var title = prompt("Enter Event Title");
            
            if(title)
            {//alert(title)
            //    var start = $.fullCalendar.formatDate(start, "yy-MM-dd HH:mm:ss");
            //    var end = $.fullCalendar.formatDate(end, "yy-MM-dd HH:mm:ss");
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                

                
               

                
              // alert(start)
               //alert(end)
           
            
                $.ajax({
                    url:'<?php echo base_url(); ?>admin/events/schoolcalendar/insert',
                    type:"POST",
                    data:{title:title, start:start, end:end},

                    success:function(data)
                    {
                        console.log(start);
                        
                        calendar.fullCalendar('refetchEvents');
                       // alert("Added Successfully");
                    }
                })
            }
        },
        editable:true,
        eventResize:function(event)
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

            var title = event.title;

            var id = event.id;

            $.ajax({
                url:"<?php echo base_url(); ?>admin/events/schoolcalendar/update",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Update");
                }
            })
        },
        eventDrop:function(event)
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            //alert(start);
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            //alert(end);
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"<?php echo base_url(); ?>admin/events/schoolcalendar/update",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                }
            })
        },
        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"<?php echo base_url(); ?>admin/events/schoolcalendar/delete",
                    type:"POST",
                    data:{id:id},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert('Event Removed');
                    }
                })
            }
        }
    });
});
         
</script>

    <br />
   
    <br />
    <div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h2><?php echo $this->lang->line("schoolcalander"); ?></h2>
    </div>


    <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">


                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("dashboard"); ?></a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->lang->line("schoolcalander"); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line("schoolcalander"); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
   
        <div id="calendar"></div>
    </div>
    
</div>
    </div>
