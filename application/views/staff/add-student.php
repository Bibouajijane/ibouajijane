  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Student Management</a></li>
        <li class="active">Add Student</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

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
              <h3 class="box-title">Add Student</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Staff/insert');?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="txtname" class="form-control" placeholder="Full Name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Groupe</label>
                    <select class="form-control" name="slcdepartment">
                      <option value="">Select</option>
                      <?php
                      if(isset($department))
                      {
                        foreach($department as $cnt)
                        {
                          print "<option value='".$cnt['id']."'>".$cnt['department_name']."</option>";
                        }
                      } 
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="slcgender">
                      <option value="">Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Prix Formation</label>
                    <input type="number" name="txtemail" class="form-control" placeholder="Prix">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" name="txtmobile" class="form-control" placeholder="Mobile">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="filephoto" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="txtdob" class="form-control" placeholder="DOB">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date of Joining</label>
                    <input type="date" name="txtdoj" class="form-control" placeholder="DOJ">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>CIN</label>
                    <input type="text" name="txtcity" class="form-control" placeholder="CIN">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Formation</label>
                    <input type="text" name="txtstate" class="form-control" placeholder="Formation">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Mode</label>
                    <select class="form-control" name="slccountry">
                      <option value="">Select</option>
                      <?php
                        if(isset($country))
                        {
                          foreach ($country as $cnt1)
                          {
                            print "<option value='".$cnt1['country_name']."'>".$cnt1['country_name']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Avance</label>
                    <textarea class="form-control" name="txtaddress" placeholder="Avance"></textarea>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
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