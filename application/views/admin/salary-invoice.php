  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student
        <small>#00<?php echo rand(1000,100)?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Payement Management</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

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
              
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $cnt['email']; ?> DH</td>
                <td><?php echo $cnt['basic_salary']; ?> DH</td>
                <td><?php echo $cnt['allowance']; ?> DH</td>
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
                <th style="width:50%">Prix Total:</th>
                <td><?php echo $cnt['email']; ?> DH</td>
              </tr>
              
              <tr>
                <th>Payed:</th>
                <td><?php echo $cnt['total']; ?> DH</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo base_url(); ?>print-invoice/<?php echo $cnt['id']; ?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button> -->
          
      </div>
    </section>
    <!-- /.content -->

    <?php 
      $i++;
      endforeach;
      endif; 
    ?>

    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->



  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
  <script>
  $(document).ready(function() {
      var doc = new jsPDF("l", "pt", "letter");
      $('#cmd').click(function () {
        let doc = new jsPDF('p','pt','a4');
        doc.addHTML($('#invoice'),function() {
            doc.save('invoice.pdf');
        }); 
      });
  });
  </script>