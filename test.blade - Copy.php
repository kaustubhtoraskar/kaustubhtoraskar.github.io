
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VPS CliniLinQ</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../css/boot.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/datetimepicker.css" />
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/font1.css" rel="stylesheet" type="text/css">
    <link href='../css/font2.css' rel='stylesheet' type='text/css'>
    <link href='../css/font3.css' rel='stylesheet' type='text/css'>
    <link href='../css/font4.css' rel='stylesheet' type='text/css'>
    <link href="../css/agency.css" rel="stylesheet">
    
    <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">


    <style type="text/css">
        .navbar
        {
            background-color:#FFFAFA;
        }
        #morn-data,#aft-data,#eve-data
        {
            display: none;
        }
        body
        {
            counter-reset: Serial;           /* Set the Serial counter to 0 */
        }

        #allappt_table tr td:first-child:before
        {
          counter-increment: Serial;      /* Increment the Serial counter */
        }
    </style>
</head>

<body id="page-top" class="index" style="color: #00BFFF" onload="clock();">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background-color: #00BFFF;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top" style="color: black; font-size: 30px;"><b>{{ Session::get("userdata")['name'] }}</b></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio"><b>Appointments</b></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services"><b>Calendar</b></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about" ><b>Scheduling</b></a>
                    </li>
                    <li> 
                        <a href="{{ action('patientregistration_controller@logout') }}" class="btn btn-default btn-sm" style="background-color:#00BFFF">
                            Logout 
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!--navigation ends-->
    <!-- Header -->
   

    <!-- Form and first 3 in line Section -->

    <section id="portfolio" style="background-color:#202020;padding-top: 80px;">
       <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="section-heading"><h2 style="padding-bottom: 30px; color: #00BFFF; padding-top: 20px;">Appointments</h2></p>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6" style="border:1px solid #00BFFF;padding-bottom: 50px;border-radius:7px; " id="cappointment">
    <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left " action=" " style="vertical-align: middle;">
    {{csrf_field()}}
    <center>
        <b style="font-size: 20pt">
            Call Appointment
        </b>
    </center>
     <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" >
            Purpose* 
                <span class="required">
                </span>
        </label>
        <div class="control-label col-md-4 col-sm-4 col-xs-12">
            <select id="PURPOSE" class="form-control col-md-12 col-xs-12" required name="PURPOSE" style="text-align: center;">
            </select>
        </div>
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" style="padding-top: 10px;">
            Sub-Type
                <span class="required">
                </span>
        </label>
        <div class="control-label col-md-4 col-sm-4 col-xs-12">
            <select id="SUB-PURPOSE" class="form-control col-md-12 col-xs-12" required name="SUB-PURPOSE">
            </select>
        </div>
    </div>
    <div class="form-group">
     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" >
            Room
                <span class="required">
                </span>
        </label>
        <div class="control-label col-md-4 col-sm-4 col-xs-12">
            <select id="ROOM" class="form-control col-md-12 col-xs-12" required name="ROOM" style="text-align: center;">
            </select>
        </div>
        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="padding-top: 10px;">
            Date
        </label>
        <div class="control-label col-md-4 col-sm-4 col-xs-12">
            <div class='input-group date ' id='datetimepicker1' class="form-control col-md-7 col-xs-12" >
            <input type='text' id="date1" class="form-control" required="true" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group" style="padding-bottom: 10px; text-align: left;">
        
        
        <div class="control-label col-md-2 col-sm-3 col-xs-3">
            <button class="btn btn-primary" id="b_time" class="form-control col-md-7 col-xs-12">
                Time
            </button>
        </div>
        <div class="control-label col-md-3 col-sm-3  col-xs-6">
            <input type="text" id="disptime" value="" class="form-control col-md-7 col-xs-12" required disabled>
        </div>
         <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" style="padding-top: 10px;">
            Name* 
                <span class="required">
                </span>
        </label>
        <div class="control-label col-md-5 col-sm-5 col-xs-12">
            <input type="text" name="NAME" id="NAME" value="" class="form-control col-md-7 col-xs-12" required="true">
        </div>  
        </div>   

    <div class="form-group" >
        <label for="P_DEPT" class="control-label col-md-2 col-sm-2 col-xs-12" style="padding-top: 10px;">
            Type*
        </label>
        <div class="control-label col-md-4 col-sm-4 col-xs-12">
            <input type="tel" id="TYPE" value="Call" name="TYPE" class="form-control col-md-7 col-xs-12" readonly>
        </div>
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" style="padding-top: 10px;">
            Contact* 
                <span class="required">
                </span>
        </label>
        <div class="control-label col-md-4 col-sm-4 col-xs-12">
            <input type="tel" id="MOBILE_NO" value="" name="MOBILE_NO" class="form-control col-md-7 col-xs-12" text>
        </div>  
    </div>

    
        <center>
            <button style="display: none;" type="submit" id="submit-button1">Not Shown</button>
            <input type="button" class="btn btn-success" value="Submit" style="margin-top: 5px;" id="sub" />
        </center>
    </form>
</div>

    <div class="col-md-6" style="border:1px solid #00BFFF;padding-bottom: 50px; border-radius:7px; " id="cappointment">
        <form id="demo-form3" method="post" data-parsley-validate class="form-horizontal form-label-left " action=" " style="vertical-align: middle;">
        {{csrf_field()}}
        <center>
            <b style="font-size: 20pt">
                Walk-Ins
            </b>
        </center>
         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" style="padding-top: 10px;">
                Purpose* 
                <span class="required">
                </span>
            </label>
            <div class="control-label col-md-4 col-sm-4 col-xs-12">
                <select id="PURPOSE_1" class="form-control col-md-12 col-xs-12" name="PURPOSE_1" style="text-align: center;">
                </select>
            </div>
            <!--<label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" style="padding-top: 10px;">
                Sub-Type
                <span class="required">
                </span>
            </label>
            <div class="control-label col-md-4 col-sm-4 col-xs-12">
                <select id="SUB-PURPOSE_1" class="form-control col-md-12 col-xs-12" name="SUB-PURPOSE_1">
                </select>
            </div>-->
        </div>
        <div class="form-group" style="vertical-align: middle;">
            
           <!-- <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" >
        Room
        <span class="required">
        </span>
    </label>
    <div class="control-label col-md-4 col-sm-4 col-xs-12">
    <select id="ROOM1" class="form-control col-md-12 col-xs-12" required name="ROOM1" style="text-align: center;">
    </select>
    </div>-->
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" style="padding-top: 10px;">
                Name* 
                <span class="required">
                </span>
            </label>
            <div class="control-label col-md-4 col-sm-4 col-xs-12">
                <input type="text" name="NAME_1" id="NAME_1" value="" required class="form-control col-md-7 col-xs-12" >
            </div>
            </div>

               <div class="form-group" >
            <label for="P_DEPT" class="control-label col-md-2 col-sm-2 col-xs-12" style="padding-top: 10px;">
                Type*
            </label>
            <div class="control-label col-md-4 col-sm-4 col-xs-12">
                <input type="tel" id="TYPE_1" value="Walk-In" name="TYPE_1" class="form-control col-md-7 col-xs-12" readonly>
            </div>
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="P_ID" style="padding-top: 10px;">
                Contact* 
                <span class="required">
                </span>
            </label>
            <div class="control-label col-md-4 col-sm-4 col-xs-12">
                <input type="tel" id="MOBILE_1" value="" name="MOBILE_1" class="form-control col-md-7 col-xs-12" text>
            </div>  
        </div>

        <div class="form-group" style="padding-bottom: 10px; text-align: left;">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" style="padding-top: 10px;">
                Date
            </label>
            <div class="control-label col-md-5 col-sm-5 col-xs-12">
                <div class='input-group date ' id='datetimepicker2' class="form-control col-md-7 col-xs-12"onclick="dateclick2()">
                    <input type='text' class="form-control" required="true" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>
            </div>
            <div class="control-label col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;padding-top: 10px;padding-left: 0px;">
                    Time
                </label>
            </div>
            <div class="control-label col-md-3 col-sm-3 col-xs-12">
                <input type="text" id="disptime_1" value="" class="form-control col-md-7 col-xs-12">
            </div>  
        </div>
        <center>
            <button style="display: none;" type="submit" id="submit-button2">Not Shown</button>
            <input type="button" class="btn btn-success" value="Submit" style="margin-top: 5px;" id="sub1"/>
        </center>
    </form>
</div>
    </div>
        </div>  
    </section>

    <!--form ends -->
    
    <!-- Calendar Grid Section -->
    <section id="services" style="background-color: #202020;color: #00BFFF;">
 <div class="container">
            <div class="row" style="padding-bottom: 20px;vertical-align: middle;">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <center>
                        <h3 style="color: #00BFFF; margin-top: 20px;">Appointment Calendar</h4>
                    </center>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12" style="padding-top:10px;padding-right: 30px;text-align: center;"> 
                    <button type="button" class="btn btn-info callapp">
                        Call Appointment
                    </button>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12" style="padding-top:10px;padding-right: 30px;text-align: center;"> 
                    <button type="button" class="btn btn-info walkapp">
                        Walk-In
                    </button>
                </div>
            </div>

            <div class="row text-center">
            <div class="col-md-6" style="min-height: 500px;border:1px solid #00BFFF;border-radius:7px; padding-top: 20px; padding-bottom: 20px;">
            <!--calendar here-->
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                   <!-- <h2>Calendar Events</h2>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id='calendar' style="color: #00BFFF">
                      
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!--calendar ends here-->
            </div>
            
            <div class="form-group col-md-6" style="height: 500px; border:1px solid #00BFFF;border-radius:7px;">
                <div class="row">
                    <span style="float: right; margin-top: 10px; margin-bottom: 1%; padding-bottom: 10px;padding-top: 20px;">
                    <button class="btn btn-sm btn-default" style="font-size: 12pt;" id="showAll">All</button>

                    <button class="btn btn-sm btn-danger" style="font-size: 12pt;" id="showLaser">Laser</button>

                    <button class="btn btn-sm btn-info" style="font-size: 12pt;" id="showProcedure">Procedure</button>

                    <button class="btn btn-sm btn-success" style="font-size: 12pt;" id="showConsultation">Consultation</button>

                    <button class="btn btn-sm btn-warning" style="font-size: 12pt;" id="showFollowup">Follow-up</button>
                    </span>
                </div>
                <div class="row">
                <div class="col-sm-3 col-md-3 col-xs-12" style="border:black;padding-left: 0px;padding-right: 0px; padding-top:20px;color: #00BFFF;text-align: center;">
                    <label style="text-align: center;vertical-align: middle; font-size: 10pt;">
                        Selected Date: 
                    </label>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12" style="border:black;padding-top:12px;color: black;padding-right: 0px;padding-left: 0px;">
                    <b><input type="text" class="form-control" id="txtdate" style="text-align: left;" readonly ></b>
                </div>
                <div class="col-sm-2 col-md-2 col-xs-12" style="border:black;padding-top:20px;color: #00BFFF;text-align: center;padding-right: 0px; padding-left: 0px;">
                    <label style="text-align: center;vertical-align: middle; font-size: 10pt;">
                        Search: 
                    </label>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12" style="border:black;padding-top:12px;text-align: center;color: black;padding-right: 0px; padding-left: 0px;">
                    <b><input type="text" class="form-control" id="filter"  ></b>
                </div>

                </div>
            <table class="table" style="margin-top: 20px; color: white; margin-bottom: 0px;">
            <thead>
            <tr>
                <td class="col-sm-2">Time</td>
                <td class="col-sm-1">ID</td>
                <td class="col-sm-3">Name</td>
                <td class="col-sm-2">Purpose</td>
                <td class="col-sm-2">Sub-Purpose</td>
                <td class="col-sm-2">Delete</td>
            </tr>
            </thead>
            </table>
            <div class="responsive-table" style="overflow-y: auto; max-height: 300px;">
            <div style="max-height: 270px ;overflow-y:auto; ">
            <table id="patient_table" class="table-bordered table responsive-table" style="color: white;">
            </table>
            </div>
            <center>
            <div class="wrapper container" style="overflow-x: hidden; width: 200px; margin-bottom: 20px;">
            <div  id="errormsg" class="row toggler" style="overflow-x: hidden;">
            <div class="alert alert-danger" style="text-align: center;vertical-align: middle;margin-top: 30px;width: 200px; overflow-x: hidden">
            <strong>No Appointment found</strong>
            </div>
            </div>
            </div>
            </center> 
                <div id ="divmsg" class="row toggler" style="margin-top: 40px;max-width: 100%">
                    <div><img src='thumb.png' alt='Thumb' height='100' width='100'></div>
                    <div><b>Select a date to display appointments </b></div>
                </div> 

            </div>
            </div>
        </div>

    </section>
    
<!--calendar section ends-->
    <!--main schedule of current day-->
     <section id="about" style="background-color: #202020;padding-top: 13px;">
<div class="container" style="">
    <div class="row text-center" style="margin-top: 30px;">
        <div class="form-group col-md-6" style="border:1px solid #00BFFF;border-radius:7px; padding-top: 10px;height: 500px;overflow-y: scroll;">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <p class="section-heading">
                <h2 style="color:#00BFFF; padding-bottom: 20px;margin-top: 5px; text-align: center;padding-bottom: 0px;">
                    Today's Call Appointment
                </h2>
                </p>
                </div>
            <caption style="color:white;"><b style="font-size: 15pt;">Consultation</b></caption>         
                <table class="table table-bordered" style="margin-bottom: 0px;">
                    <thead>
                        <tr style="font-size: 12pt;">
                            <td class="col-sm-1">ID</td>
                            <td class="col-sm-5 tbl">Name</td>
                            <td class="col-sm-2 tbl">Room</td>
                            <td class="col-sm-2">TIME</td>
                            <td class="col-sm-2 tbl">Arrived</td>
                        </tr>
                    </thead>
                </table> 
                <div class="responsive-table">
                    <table class="table table-bordered" id="consul_table" style="color:white;">
                    </table>
                </div> 
                
                
                <caption style="color: white;"><b style="font-size: 15pt;padding-top: 10px;">Laser</b></caption>         
                    <table class="table table-bordered" style="margin-bottom: 0px;">
                        <thead>
                            <tr style="font-size: 12pt;">
                                <td class="col-sm-1 tbl">ID</td>
                                <td class="col-sm-5 tbl">Name</td>
                                <td class="col-sm-2 tbl">Room</td>
                                <td class="col-sm-2 tbl">TIME</td>
                                <td class="col-sm-2 tbl">Arrived</td>
                            </tr>
                        </thead>
                    </table> 
                    <div class="responsive-table">
                        <table class="table table-bordered" id="laser_table" style="color:white;">
                        </table>
                    </div>
                                    
                
                <caption style="color: white;"><b style="font-size: 15pt;padding-top: 10px;">Procedure</b></caption>         
                    <table class="table table-bordered" style="margin-bottom: 0px;">
                        <thead>
                            <tr style="font-size: 12pt;">
                                <td class="col-sm-1">ID</td>
                                <td class="col-sm-5 tbl">Name</td>
                                <td class="col-sm-2 tbl">Room</td>
                                <td class="col-sm-2">TIME</td>
                                <td class="col-sm-2">Arrived</td>
                            </tr>
                        </thead>
                    </table>
                <div class="responsive-table">
                    <table class="table table-bordered" id="procedure_table" style="color:white;">
                    </table>
                </div>

                <caption style="color: white;"><b style="font-size: 15pt;padding-top: 10px;">Follow-up</b></caption>         
                    <table class="table table-bordered" style="margin-bottom: 0px;">
                        <thead>
                            <tr style="font-size: 12pt;">
                                <td class="col-sm-1">ID</td>
                                <td class="col-sm-5 tbl">Name</td>
                                <td class="col-sm-2 tbl">Room</td>
                                <td class="col-sm-2">TIME</td>
                                <td class="col-sm-2">Arrived</td>
                            </tr>
                        </thead>
                    </table>
                <div class="responsive-table">
                    <table class="table table-bordered" id="follow_table" style="color:white;">
                    </table>
                </div>

            </div>
            
            <div class="form-group col-md-6" style="border:1px solid #00BFFF;border-radius:7px;min-height: 500px;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p class="section-heading">
                 <h2 style="margin-top: 20px;text-align: center;">Main List (Call + Walkins)</h2>
            </p>
            </div>
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
            <span id="countBox" style="float: left;color:white;padding:4px;width:100px;height:40px;border-radius: 3px"></span>
            <span style="float: right; margin-bottom: 1%;">
            <button class="btn btn-default btn-sm" style="font-size: 12pt;"  id="showAllCount" onclick="getAllCount()">All</button>
            <button class="btn btn-danger btn-sm" style="font-size: 12pt;"  id="showLaserCount" onclick="getLaserCount()">Laser</button>
            <button class="btn btn-info btn-sm" style="font-size: 12pt;"  id="showProcedureCount" onclick="getProcedureCount()">Procedure</button>
            <button class="btn btn-success btn-sm" style="font-size: 12pt;"  id="showConsultationCount" onclick="getConsultationCount()">Consultation</button>
            <button class="btn btn-warning btn-sm" style="font-size: 12pt;"  id="showFollowup" onclick="getFollowupCount()">Follow-up</button>
            </div>
            <script>
            $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
            });
            </script>
Try it Yourself »

            <div class="responsive-table" style="overflow-y: scroll; max-height: 350px; margin-top: 10px; overflow:auto">
               <table class="responsive-table table-bordered" id="allapt_table" >
               <thead >
                    <tr class="tbl">
                        <th class="col-sm-2 tbl">Sr.No.</th>
                        <th class="col-sm-2 tbl">Name</th>
                        <th class="col-sm-2 tbl">Purpose</th>
                        <th class="col-sm-2 tbl">Contact</th>
                        <th class="col-sm-2 tbl">Return</th>
                        <th class="col-sm-2 tbl">Entry</th>
                    </tr>
                    </thead>
                </table>             
                </div>
   
            </div>

    </section>

<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright" style="color: #00BFFF;font-size: 14pt;">Copyright &copy; VPS Techub 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/vpstechub" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/vpstechub/" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;            
                    </button>
                    <h4 class="modal-title" style = "text-align: center">
                        Success
                    </h4>
                </div>
                <div class="modal-body">
                    <p>
                        Appointment of Patient done successfully.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick='reloadpage()'>Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;            
        </button>
        <h4 class="modal-title" style = "text-align: center">
            Choose Time
        </h4>
    </div>
    <div class="modal-body" style="margin-bottom: 30px;text-align: center;vertical-align: middle;">
        <div class="row-fluid" style="margin-bottom: 20px;">
            <div class="span4 text-left" style="display: inline-block;"><button type="button" class="btn btn-info" id="morn">Morning</button></div>
            <div class="span4 text-center" style="display: inline-block;"><button type="button" class="btn btn-info" id="aft">Afternoon</button></div>
            <div class="span4 text-right" style="display: inline-block;"><button type="button" class="btn btn-info" id="eve">Evening</button></div>
        </div>
        
        <div id = "timedata">
                       
        </div>
    </div>
    <div class="modal-footer" style="margin-top: 130px;">
       
    </div>
</div>
</div>
</div>




<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<script type="text/javascript">
    function clock() 
    {
       var now = new Date();
       var outStr = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
       document.getElementById('disptime_1').value=outStr;
       setTimeout('clock()',1000);
    }
    clock();
</script>

<script type="text/javascript">
    function morningfn($e)
    {
        console.log($e);
        $('#disptime').val($e);
        $('#myModal1').modal('hide');
    }

    $('#myModal1').on('hidden.bs.modal', function () {
       $("#timedata").empty();
    });

    $("#morn").click(function()
    {
        var sdate = $("#datetimepicker1").find("input").val();
        console.log(sdate);
        var cdate = moment(new Date).format('YYYY-MM-DD');
        console.log(cdate);
        var seltype = $('#PURPOSE').find(":selected").text();
        console.log(seltype);
        var room = $('#ROOM').find(":selected").text();
        var ctime = $("#disptime_1").val();
        console.log(ctime); 
        $.ajax(
        {
            type: "GET",
            url: "/getmorn",
            data: 
            {
                'sel_date': sdate,
                'sel_type':seltype,
                'room' : room
            }, 
            success: function(_response)
            {
                
                var $e = $('#timedata');
                $("#timedata").empty();
                var data = jQuery.parseJSON(JSON.stringify(_response));
                console.log(data);
                $.each(data,function(key,value)
                {
                    if(sdate >= cdate && ctime < value.actual_time)
                    {
                        alert("in If");
                        $e.append($("<button id='"+value.actual_time+"' onclick='morningfn(this.id)' class='btn btn-primary col-sm-3' value='"+value.actual_time+"'>"+value.disp_time+"</button>"));
                    } 
                   /* else
                    {
                        alert("in else");
                        $e.append($("<button id='"+value.actual_time+"'disabled  class='btn btn-primary col-sm-3' value='"+value.actual_time+"'>"+value.disp_time+"</button>"));  
                    }  */                

                });
            },
            error: function( _response )
            {
                // Handle error
            }
        });          
    });

$("#aft").click(function()
{
    var sdate = $("#datetimepicker1").find("input").val();
    var seltype = $('#PURPOSE').find(":selected").text();
    var ctime = $("#disptime_1").val(); 
    var room = $('#ROOM').find(":selected").text();
    var cdate = moment(new Date).format('YYYY-MM-DD');
    $.ajax(
    {
        type: "GET",
        url: "/getaft",
        data: 
        {
            'sel_date': sdate,
            'sel_type':seltype,
            'room' : room
        }, 
        success: function(_response)
        {
            var $e = $('#timedata');
            $("#timedata").empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $.each(data,function(key,value)
                {
                    if(sdate > cdate || sdate == cdate && ctime < value.actual_time)
                    {
                        //alert("in If");
                        $e.append($("<button id='"+value.actual_time+"' onclick='morningfn(this.id)' class='btn btn-primary col-sm-3' value='"+value.actual_time+"'>"+value.disp_time+"</button>"));
                    } 
                    else
                    {
                        //alert("in else");
                        $e.append($("<button id='"+value.actual_time+"'disabled  class='btn btn-primary col-sm-3' value='"+value.actual_time+"'>"+value.disp_time+"</button>"));  
                    }
                });
        },
        error: function( _response )
        {
            // Handle error
        }
    });          
});

$("#eve").click(function()
{
    var sdate = $("#datetimepicker1").find("input").val();
    var seltype = $('#PURPOSE').find(":selected").text();
    var ctime = $("#disptime_1").val(); 
    var room = $('#ROOM').find(":selected").text();
    var cdate = moment(new Date).format('YYYY-MM-DD');
    $.ajax(
    {
        type: "GET",
        url: "/geteve",
        data: 
        {
            'sel_date': sdate,
            'sel_type':seltype,
            'room' : room
        }, 
        success: function(_response)
        {
            var $e = $('#timedata');
            $("#timedata").empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $.each(data,function(key,value)
                {
                    if(sdate > cdate || sdate == cdate && ctime < value.actual_time)
                    {
                        //alert("in If");
                        $e.append($("<button id='"+value.actual_time+"' onclick='morningfn(this.id)' class='btn btn-primary col-sm-3' value='"+value.actual_time+"'>"+value.disp_time+"</button>"));
                    } 
                    else
                    {
                        //alert("in else");
                        $e.append($("<button id='"+value.actual_time+"'disabled  class='btn btn-primary col-sm-3' value='"+value.actual_time+"'>"+value.disp_time+"</button>"));  
                    }
            });
        },
        error: function( _response )
        {
            // Handle error
        }
    });          
});


  $(document).ready(function() {
            $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD',
                minDate: new Date() 
            });
            $('#datetimepicker2').datetimepicker({
                format: 'YYYY-MM-DD',
                minDate: new Date() 
            });
        });
    });
</script>
 <script type="text/javascript">
    $("#filter").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#patient_table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    });

    $("#showlaser").click(function(){
        _this = "Laser";
        // Show only matching TR, hide rest of them
        $.each($("#allapt_table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    }); 
 

    $("#b_time").click(function(e){
        e.preventDefault();
        dateclick1();
        
    });

    $('#PURPOSE').on('change',function(e)
    {
        var name = e.target.value;
        $.ajax({
        type: "GET",
        url: "/fill2select",
        data: 
        {
            'data':name
        }, 
        success: function(_response)
        {
            var $e = $('#SUB-PURPOSE');
            $e.empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $.each(_response, function(key, value) 
            {
                $.each(value,function(key, main)
                {
                    $e.append($("<option></option>").attr("value", main).text(jQuery.parseJSON(JSON.stringify(main))));
                });
            }); 
        },
    });

        $.ajax({
        type: "GET",
        url: "/fillroom",
        data: 
        {
            'data':name
        }, 
        success: function(_response)
        {
            var $e = $('#ROOM');
            $e.empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $.each(_response, function(key, value) 
            {
                $.each(value,function(key, main)
                {
                    $e.append($("<option></option>").attr("value", main).text(jQuery.parseJSON(JSON.stringify(main))));
                });
            }); 
        },
    });
    });

    $('#PURPOSE_1').on('change',function(e)
    {
        var name = e.target.value;
        $.ajax({
        type: "GET",
        url: "/fill2select",
        data: 
        {
            'data':name
        }, 
        success: function(_response)
        {
            var $e = $('#SUB-PURPOSE_1');
            $e.empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $.each(_response, function(key, value) 
            {
                $.each(value,function(key, main)
                    {
                        $e.append($("<option></option>").attr("value", main).text(jQuery.parseJSON(JSON.stringify(main))));
                    });
            }); 

        },
        error: function( _response ){
        // Handle error
    }
    });
        $.ajax({
        type: "GET",
        url: "/fillroom",
        data: 
        {
            'data':name
        }, 
        success: function(_response)
        {
            var $e = $('#ROOM1');
            $e.empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $.each(_response, function(key, value) 
            {
                $.each(value,function(key, main)
                {
                    $e.append($("<option></option>").attr("value", main).text(jQuery.parseJSON(JSON.stringify(main))));
                });
            }); 
        },
    });

     });



$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "/fillselect",
        success: function(_response)
        {
            var $e = $('#PURPOSE');
            $e.empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $e.append($("<option></option>").attr("value","Select an option").text("Select an option"));
            $.each(_response, function(key, value) 
            {     
                $.each(value,function(key, main)
                    {
                        $e.append($("<option></option>").attr("value", main).text(jQuery.parseJSON(JSON.stringify(main))));
                    });
            }); 

        },
        error: function( _response ){
        // Handle error
    }
    });

    $.ajax({
        type: "GET",
        url: "/fillselect",
        success: function(_response)
        {
            var $e = $('#PURPOSE_1');
            $e.empty();
            var data = jQuery.parseJSON(JSON.stringify(_response));
            console.log(data);
            $e.append($("<option></option>").attr("value","Select an option").text("Select an option"));
            $.each(_response, function(key, value) 
            {     
                $.each(value,function(key, main)
                    {
                        $e.append($("<option></option>").attr("value", main).text(jQuery.parseJSON(JSON.stringify(main))));
                    });
            }); 

        },
        error: function( _response ){
        // Handle error
    }
    });
});

</script>
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function dateclick1()
{
            if (($('#PURPOSE').find(":selected").text()=="Select an option") || ($('#SUB-PURPOSE').find(":selected").text()==""))
            {
                alert("Select purpose and sub-purpose first");  
            }
            else
            {
                $("#myModal1").modal();
            }
}

function dateclick2()
{
            if ($('#PURPOSE_1').find(":selected").text()=="Select an option")
            {
                alert("Select an option first");  
            }
}


function logout()
{
    window.location.href='/';
}
function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

/*$('#showlaser').click(function()
{
    var rows=$('table#allapt_table tr');
var laser=rows.filter('.Laser').show();
rows.not( Laser).hide();    
});*/

function fillrow()
        {
            $('td').each(function() 
            {
                var fValue = $(this).text();
                if (fValue == "Laser") 
                {
                    var oTableRow = $(this).parent();
                    oTableRow.css('background-color', '#d9534f');
                    oTableRow.addClass("laserRow");
                }
                if (fValue == "Procedure") 
                {
                    var oTableRow = $(this).parent();
                    oTableRow.css('background-color', '#5bc0de');
                    oTableRow.addClass("procedureRow");
                }
                if (fValue == "Consultation") 
                {
                    var oTableRow = $(this).parent();
                    oTableRow.css('background-color', '#5cb85c');
                    oTableRow.addClass("consultationRow");
                }
                if(fValue == "Follow-up")
                {
                    var oTableRow = $(this).parent();
                    oTableRow.css('background-color', '#f0ad4e');
                    oTableRow.addClass("followupRow");
                }
            });
        }


$("#showLaser").click(function(){
		$(".laserRow").show(300);
    	$(".procedureRow").hide(300);
        $(".consultationRow").hide(300);
            $(".followupRow").hide(300);
});
$("#showProcedure").click(function(){
 $(".laserRow").hide();
        $(".procedureRow").show(300);
            $(".consultationRow").hide(300);
                $(".followupRow").hide(300);
            });
$("#showConsultation").click(function(){
 $(".laserRow").hide(300);
        $(".procedureRow").hide(300);
            $(".consultationRow").show(300);
                $(".followupRow").hide(300);
            });
$("#showFollowup").click(function(){
 $(".laserRow").hide(300);
        $(".procedureRow").hide(300);
            $(".consultationRow").hide(300);
                $(".followupRow").show(300);
            });
$("#showAll").click(function(){
 $(".laserRow").show(300);
        $(".procedureRow").show(300);
            $(".consultationRow").show(300);
                $(".followupRow").show(300);
            });

      $(document).ready(function(){
        $("#errormsg").hide();
     $('#calendar').fullCalendar({
    header: {
      left: 'prev,next,today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    dayClick: function(date, allDay, jsEvent, view) {
        if (allDay) {
            var abc = date.format();
            $("#divmsg").hide();
            $('#txtdate').val(abc);
            // Clicked on the entire day
            $.ajax({
                url: '/getEvents',
                type: 'GET',
                data: {
                    'date_clicked':abc
                }, // Remember that you need to have your csrf token included
                dataType: 'json',
                success: function( _response ){
                    var data = jQuery.parseJSON(JSON.stringify(_response));
                    drawTable(data);
                    if ($.isEmptyObject(data)) 
                    {
                       $("#errormsg").show();
                    } 
                    else
                    {
                        $("#errormsg").hide();
                    }
                                
                },
                error: function( _response ){
                    // Handle error
                }
            });    
        }
      },
      eventConstraint:
      {
                start: moment().format('YYYY-MM-DD'),
                end: '2200-01-01' // hard coded goodness unfortunately
            },
      eventSources:['/displayAppointment'],
      
    //defaultDate: '2016-01-12',
    editable: true,
    eventLimit: true // allow "more" link when too many events
    
});
});
/*$('form').submit(function(event) 
{
    event.preventDefault();
    var date = $("#datetimepicker1").find("input").val();
    var tim = $("#datetimepicker2").find("input").val();
    var data = {};
    data.name = $("#NAME").val();
    data.purpose = $("#PURPOSE").val();
    data.sub_purpose = $("#SUB-PURPOSE").val();
    data.type = $("#TYPE").val();
    data.Other = $("#Other").val();
    data.adate = $("#datetimepicker1").find("input").val();
    data.atime = $("#disptime").val();
    $.ajax({        
        url: '/registration',
        type: 'post',
        dataType: 'json',
        data: data, // Remember that you need to have your csrf token included
        success: function( _response )
        {
            $('#myModal').modal('toggle');
        },
        error: function(xhr, ajaxOptions, thrownError)
        {
            //alert(thrownError);
        },
    });
});*/


$('input#sub').click( function() {
    event.preventDefault();
    //$("#submit-button1").click();
    //validateform1();
    var data = {};
    data.name = $("#NAME").val();
    data.purpose = $("#PURPOSE").val();
    data.sub_purpose = $("#SUB-PURPOSE").val();
    data.type = $("#TYPE").val();
    data.Other = $("#MOBILE_NO").val();
    data.adate = $("#datetimepicker1").find("input").val();
    data.atime = $("#disptime").val();
    data.room = $("#ROOM").val();
    if($("#NAME").val() =="")
    {
        alert("Enter Patient's Name");
        $("#NAME").focus();
    }
    else if($("#disptime").val() == "")
    {
        alert("Select Time");
    }
    else if($("#MOBILE_NO").val() =="")
    {
        alert("Enter Contact Number");
    }
    else
    {
        $.ajax({        
            url: '/registration',
            type: 'post',
            dataType: 'json',
            data: data, // Remember that you need to have your csrf token included
            success: function( _response )
            {
                $('#myModal').modal('toggle');
            },
        /*error: function(xhr, ajaxOptions, thrownError)
        {
            alert(thrownError);
        },*/
        });
    }
});

$('input#sub1').click( function() {
    event.preventDefault();
    //$("#submit-button2").click();
    //validateform2();
    var data = {};
    data.name = $("#NAME_1").val();
    data.purpose = $("#PURPOSE_1").val();
    data.sub_purpose = "-";
    data.type = $("#TYPE_1").val();
    data.Other = $("#MOBILE_1").val();
    data.adate = $("#datetimepicker2").find("input").val();
    data.atime = $("#disptime_1").val();
    data.room = "-";
    if( $("#NAME_1").val() == "")
    {
        alert("Enter Patient's Name");
        $("#NAME_1").focus();
    }
    else if($("#PURPOSE_1").val()== "Select an option")
    {
        alert("Select Purpose and Sub-Purpose");
    }

    else if($("#MOBILE_1").val() =="")
    {
        alert("Enter Contact Number");
    }
    else
    {
        $.ajax({        
            url: '/registration',
            type: 'post',
            dataType: 'json',
            data: data, // Remember that you need to have your csrf token included
            success: function( _response )
            {
                $('#myModal').modal('toggle');
            },
            /*error: function(xhr, ajaxOptions, thrownError)
            {
                alert(thrownError);
            },*/
        });
    }
});

    </script>
    <script type="text/javascript">

    function getLaserCount(){
    document.getElementById("countBox").innerHTML=countLaser;
    $("#countBox").css({'background-color':'red', 'color':'white'});

}
    function getConsultationCount(){
    document.getElementById("countBox").innerHTML=countConsultation;
    $("#countBox").css({'background-color':'green', 'color':'white'});
}
    function getProcedureCount(){
    document.getElementById("countBox").innerHTML=countProcedure;
    $("#countBox").css({'background-color':'deepskyblue', 'color':'white'});

}
    function getFollowupCount(){
    document.getElementById("countBox").innerHTML=countFollowup;
    $("#countBox").css({'background-color':'orange', 'color':'white'});

}
    function getAllCount(){
    document.getElementById("countBox").innerHTML=countFollowup+countLaser+countProcedure+countConsultation;
    $("#countBox").css({'background-color':'white', 'color':'black'});


}
  
    function reloadpage()
    {
        document.location.reload();
    }
    $(document).ready(function()
    {
                $.ajax({        
                    url: '/displaythree',
                    type: 'GET',
                    dataType: 'json',
                    success: function( data ){
                        
                            var data = jQuery.parseJSON(JSON.stringify(data));
                            drawATable(data);

                        },
                        error: function( data ){
                            
                        // Handle error
                    }
                });
            });
    function drawATable(data){
        
            for(var i=0;i<data.length;i++){
                drawARow(data[i]);
            }
        }

        function drawARow(rowdata){        
            var row = $("<tr />");
            $("#appointment_table").append(row);
            row.append($("<td class='col-sm-2 tbl'>" + rowdata.start + "</td>"));
            row.append($("<td class='col-sm-7 tbl'>" + rowdata.id + "</td>"));
            row.append($("<td class='col-sm-1 tbl'>" + rowdata.description + "</td>"));
            row.append($("<td class='col-sm-2 tbl'>" + rowdata.title + "</td>"));
           
            fillrow();
        }
        /*all apointments on current day -right table*/
        $.ajax({        
                    url: '/allappt',
                    type: 'GET',
                    dataType: 'json',
                    success: function( data ){
                            var data = jQuery.parseJSON(JSON.stringify(data));
                            console.log(data);
                            drawapptTable(data);

                        },
                        error: function( data ){
                            
                        // Handle error
                    }
                });
            function drawapptTable(data){
        
            for(var i=0;i<data.length;i++){
                drawapptRow(data[i]);
            }
        }
        var countLaser=1;
        var countProcedure=1;
        var countConsultation=1;
        var countFollowup=1;
        function assignNo(appType){
            //console.log(appType);
            if (appType.localeCompare("Laser")==0)
            {
                return countLaser++;
            }
            else if (appType.localeCompare("Consultation")==0)
            {
                return countConsultation++;
            }
            else if (appType.localeCompare("Procedure")==0)
            {
                return countProcedure++;
            }
            else if (appType.localeCompare("Follow-up")==0)
            {
                return countFollowup++;
            }
        }
        function getCount(){
            return countLaser+countProcedure+countConsultation+countFollowup;
        }
        function drawapptRow(rowdata){
             var row = $("<tr />");
            $("#allapt_table").append(row);
            row.append($("<td class='col-sm-2 tbl' style='color:#fff;'><div>" + assignNo(rowdata.description) + "</div></td>"));
            row.append($("<td class='col-xs-2 tbl' style='color:#fff;'><div>" + rowdata.title + "</div></td>"));
            row.append($("<td class='col-xs-2 tbl' style='color:#fff;'><div>" + rowdata.description + "</div></td>"));
            row.append($("<td class='col-xs-2 tbl' style='color:#fff;'><div>" + rowdata.contactno + "</div></td>"));
            if(rowdata.type =="Call")
            {
                row.append($("<td class='col-xs-2 tbl' style='color:#fff;'><div>" + "<button id='"+rowdata.id+"' onclick='undo(this.id)' class='glyphicon glyphicon-circle-arrow-left'"+ "style='color:black;border: 1px solid black;font-size:15pt;padding: 2pt;background-color:white;'"+"</button>"+"</div></td>"));
            }
            else
            {
                row.append("<td class='col-xs-2 tbl'><div>---</div></td>");
            }
            row.append($("<td class='col-xs-2 tbl' style='color:#fff;'><div>" + "<button id='"+rowdata.id+"' onclick='deletepat(this.id)' class='label-success glyphicon glyphicon-ok'"+ "style='color:white;padding-top:5px;padding-bottom:5px;'"+"</button>"+"</div></td>"));
            fillrow();
        }
        
        /*right table ends here*/

 $(document).ready(function()
 {
        /*left purpose-wise table*/ 
        $(".callapp").click(function () 
        {
            //$('#TYPE').val('Call').trigger('change'); 
            //window.location.href="#services";
            document.getElementById("NAME").focus();

        });
        $(".walkapp").click(function () 
        {
            //$('#TYPE').val('Walk-In').trigger('change');
            //window.location.href="#wappointment";   
            document.getElementById("NAME_1").focus();          
        });
            $.ajax({        
                    url: '/displayalltoday',
                    type: 'GET',
                    dataType: 'json',
                    success: function( data ){
                            var data = jQuery.parseJSON(JSON.stringify(data));
                            if ($.isEmptyObject(data)) 
                            {
                                //alert("In IF(displayalltoday)");
                                fill3rows();
                            } 
                            else 
                            {
                                //alert("In ELSE(displayalltoday)");
                                drawallTable(data);
                            }
                            
                        },
                        error: function( data ){
                            
                        // Handle error
                    }
                });
            });
    function drawallTable(data){
        
            for(var i=0;i<data.length;i++){
                drawallRow(data[i]);
            }
        }

        function drawallRow(rowdata){
                
            var row = $("<tr />");
            if(rowdata.description=="Consultation")
                $("#consul_table").append(row);
            else if(rowdata.description=="Laser")
                $("#laser_table").append(row);
            else if(rowdata.description=="Procedure")
                $("#procedure_table").append(row);
            else if(rowdata.description=="Follow-up")
                $("#follow_table").append(row);
            row.append($("<td class='col-sm-1'>" + rowdata.id + "</td>"));
            row.append($("<td class='col-sm-5'>" + rowdata.title + "</td>"));
            row.append($("<td class='col-sm-2'>" + rowdata.room + "</td>"));
            row.append($("<td class='col-sm-2'>" + rowdata.start + "</td>"));
            row.append($("<td class='col-sm-2'>" + "<button id='"+ rowdata.id +"' onclick='arrived(this.id)' name="+ rowdata.id +" style='background-color:#00BFFF; color:black;'>Yes</button>" + "</td>"));
            fillrow();
        
        }
        function fill3rows()
        {
            //alert("Function fill3rows called");
            $('#consul_table tr:last').after('<tr><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td></tr>');
            $('#laser_table tr:last').after('<tr><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td></tr>');
            $('#procedure_table tr:last').after('<tr><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td></tr>');
            $('#follow_table tr:last').after('<tr><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td></tr>');
        }


        function arrived(x)
        {
            console.log(x);
           $.ajax({        
                    url: '/arrived',
                    type: 'GET',
                    data:{id:x}, 
                    dataType: 'json',
                    success: function(data){
                        document.location.reload();
                        },
                        error: function(data){
                            location.reload();
                        // Handle error
                    }
                });

        }
        function deletepat(x)
        {
            console.log(x);
            if (confirm("Are you sure, you want to send patient for the treatment ?")) 
            {
                $.ajax({
                url: '/deletepat',
                type: 'POST',
                data: {id: x},
                dataType: 'json',
                success: function(data)
                {
                    console.log("Delete Patient done");   
                    document.location.reload(); 
                },
                error: function(data)
                {
                   document.location.reload();
                }
            });
            }
            return false;   
        }

        function removeapp(x)
        {
            console.log(x);
            if (confirm("Are you sure, you want to delete this appointment?")) 
            {
                $.ajax({
                url: '/removeapp',
                type: 'POST',
                data: {id: x},
                dataType: 'json',
                success: function(data)
                {
                    console.log("Delete Patient done");   
                    document.location.reload(); 
                },
                error: function(data)
                {
                   document.location.reload();
                }
            });
            }
            return false;
            
        }

        function undo(x)
        {
            console.log(x);
            if (confirm("Oops, choose the wrong patient ?")) 
            {
                $.ajax({
                url: '/undo',
                type: 'POST',
                data: {id: x},
                dataType: 'json',
                success: function(data)
                {
                    //alert('Patient moved to waiting list');
                    document.location.reload();
                },
                error: function(data)
                {
                    document.location.reload();
                    //console.log(JSON.stringify(data));
                }
            });
            }
            return false;
            
        }

</script>
    <script type="text/javascript">

    $('#ab').click(function(){
        location.reload();
    });

        function drawTable(data){
            $('#patient_table').empty();
            for(var i=0;i<data.length;i++){
                drawRow(data[i]);
            }
        }
        function drawRow(rowdata){
            //if(rowdata.title == "Consultation") bgcolor="#FF0000"{
            var row = $("<tr  />");
            $("#patient_table").append(row);
            row.append($("<td class='col-sm-2'>" + rowdata.start + "</td>"));
            row.append($("<td class='col-sm-1'>" + rowdata.id + "</td>"));
            row.append($("<td class='col-sm-3'>" + rowdata.description + "</td>"));
            row.append($("<td class='col-sm-2'>" + rowdata.title + "</td>"));
            row.append($("<td class='col-sm-2'>" + rowdata.sub + "</td>"));
            row.append($("<td class='col-sm-2'>" + "<button id='"+ rowdata.id +"' onclick='removeapp(this.id)' name="+ rowdata.id +" style='background-color:#00BFFF; color:black;'>Yes</button>" + "</td>"));
            fillrow();
        }

    </script>

    <script>
        $(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});

    </script>
    <!-- jQuery 
    <script src="../jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


    <!-- Plugin JavaScript -->
    <script src="../js/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/agency.min.js"></script>
    <!-- jQuery -->
   
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/fullcalendar/dist/fullcalendar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
<script src="../js/bootstrap-datetimepicker.min.js"></script>

</body>

</html>
