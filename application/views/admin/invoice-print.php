<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AN-MA Logistique | System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <?php 
      if(isset($content)):
      $i=1; 
      foreach($content as $cnt): 
    ?>
    <!-- Main content -->
    <section class="invoice" id="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
         Andalouse Manutention System
            <small class="pull-right">Date: <?php echo date('d-m-Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
          <strong>Andalouse</strong><br>
          <strong>Groupe:</strong> <?php echo $cnt['department_name']; ?><br>
            Rue Hamdoune N30 Appt N10 Etage3<br>
            <strong>Website:</strong> www.andalouselogistique.com<br>
            <strong>Email :</strong> contact@andalouselogistique.com  
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong>To</strong>
          <address>
            
            <b><strong>CIN: </strong></b><?php echo $cnt['city']; ?><br>
            <b><strong>Formation: </strong></b><?php echo $cnt['state']; ?><br>
            <strong>Phone:</strong> <?php echo $cnt['mobile']; ?><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Student #00<?php echo $cnt['id']; ?></b><br>
          <?php echo $cnt['staff_name']; ?>
          <br>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     <!-- Table row -->
     <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Prix Formation</th>
              <th>Avance</th>
              
              <th>Rest</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $cnt['email']; ?> DH</td>
                <td><?php echo $cnt['basic_salary']; ?> DH</td>
                <td><?php echo $cnt['total']; ?> DH</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          
          
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"> <strong>Payement Info </strong></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Prix Formation:</th>
                <td><?php echo $cnt['email']; ?> DH</td>
              </tr>
              
              <tr>
                <th>Payed :</th>
                <td><?php echo $cnt['basic_salary']; ?> DH</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <?php 
      $i++;
      endforeach;
      endif; 
    ?>
</div>


<!-- ./wrapper -->
</body>
</html>
