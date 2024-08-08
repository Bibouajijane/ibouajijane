<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Payment</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Payment</a></li>
      <li class="active">Add Payment</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <!-- Flash messages for success or error -->
      <?php if($this->session->flashdata('success')): ?>
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      </div>
      <?php elseif($this->session->flashdata('error')): ?>
      <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Failed!</h4>
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      </div>
      <?php endif;?>

      <!-- Payment Form -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Add Payment</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open('Salary/insert'); ?>
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group">
                <label for="departmentSelect">Group Name</label>
                <select class="form-control" id="departmentSelect" name="slcdepartment" onchange="getstaff(this.value)">
                  <option value="">Select</option>
                  <?php
                  if (isset($departments)) {
                    foreach ($departments as $cnt) {
                      echo "<option value='" . $cnt['id'] . "'>" . $cnt['department_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div id="salarydiv"></div>

          <!-- form end -->
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  // Function to fetch staff data based on department
  function getstaff(dept) {
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Salary/get_salary_list'); ?>",
      data: { dept: dept },
      success: function(data) {
        $('#salarydiv').html(data); // Update the salary table
      }
    });
  }

  // Event handler to calculate total salary when input changes
  $(document).on('keyup', 'input.expenses', function() {
    var $row = $(this).closest('tr');
    var $email = $row.find('input[name="txtemail[]"]');
    var $basic = $row.find('input[name="txtbasic[]"]');
    var $total = $row.find('input[name="txttotal[]"]');

    // Ensure inputs have valid values
    var emailValue = parseFloat($email.val()) || 0;
    var basicValue = parseFloat($basic.val()) || 0;

    // Calculate total as email - basic
    var total = emailValue - basicValue;

    // Update the total field
    $total.val(total);
  });
</script>


