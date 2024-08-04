  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payement
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Payement</a></li>
        <li class="active">Add Payement</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Payement</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('Salary/insert'); ?>
              <div class="box-body">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Groupe Name</label>
                    <select class="form-control" name="slcdepartment" onchange="getstaff(this.value)">
                      <option value="">Select</option>
                        <?php
                          if(isset($departments))
                          {
                            foreach($departments as $cnt)
                            {
                              print "<option value='".$cnt['id']."'>".$cnt['department_name']."</option>";
                            }
                          } 
                        ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div id="salarydiv">
              </div>
              
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
    function getstaff(dept) {
            $.ajax({
                type: "POST",
                url:  "<?php echo site_url('Salary/get_salary_list'); ?>",
                data: 'dept='+dept,
                success: function(data){
                    $('#salarydiv').html(data);
                }
            });
        }
  </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Assuming you have a function to calculate the total when basic or allowance fields change
    document.querySelectorAll('.expenses').forEach(function(element) {
        element.addEventListener('input', function() {
            var row = this.closest('tr');
            var email = parseFloat(row.querySelector('input[name="txtemail[]"]').value) || 0;
            var basic = parseFloat(row.querySelector('input[name="txtbasic[]"]').value) || 0;
            var total = email - basic;
            row.querySelector('input[name="txttotal[]"]').value = total.toFixed(2);
        });
    });
});
</script>
