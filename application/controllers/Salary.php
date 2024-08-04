<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $data['departments']=$this->Department_model->select_departments();
        $this->load->view('admin/header');
        $this->load->view('admin/add-salary',$data);
        $this->load->view('admin/footer');
    }

    public function invoice($id)
    {
        $data['content']=$this->Salary_model->select_salary_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/salary-invoice',$data);
        $this->load->view('admin/footer');
    }

    public function invoicestaff($id)
    {
        $data['content']=$this->Salary_model->select_salary_byID($id);
        $this->load->view('staff/header');
        $this->load->view('staff/salaryinvoice',$data);
        $this->load->view('staff/footer');
    }

    public function invoice_print($id)
    {
        $data['content']=$this->Salary_model->select_salary_byID($id);
        $this->load->view('admin/invoice-print',$data);
    }

    public function manage()
    {
        $data['content']=$this->Salary_model->select_salary();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-salary',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $staff=$this->session->userdata('userid');
        $data['content']=$this->Salary_model->select_salary_byStaffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/view-salary',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $id = $this->input->post('txtid');
        $email = $this->input->post('txtemail');
        $basic = $this->input->post('txtbasic');
        $allowance = $this->input->post('txtallowance');
        $added = $this->session->userdata('userid');
    
        for ($i = 0; $i < count($id); $i++) 
        {
            $total = $basic[$i] + $allowance[$i]; // Calculate total salary
    
            if ($total > 0)
            {
                $data = array(
                    'staff_id' => $id[$i],
                    'email' => $email[$i],
                    'basic_salary' => $basic[$i],
                    'allowance' => $allowance[$i], // Assuming you also want to store allowance
                    'total' => $total,
                    'added_by' => $added
                );
                $this->Salary_model->insert_salary($data);
            }
        }
        
        if ($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Payment Added Successfully"); 
        } 
        else 
        {
            $this->session->set_flashdata('error', "Sorry, Payment Adding Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    


    public function update()
    {
        $id=$this->input->post('txtid');
        $department=$this->input->post('txtdepartment');
        $data=$this->Department_model->update_department(array('department_name'=>$department),$id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Payement Updated Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Payement Update Failed.");
        }
        redirect(base_url()."department/manage_department");
    }


    function edit($id)
    {
        $data['content']=$this->Department_model->select_department_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-department',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $data=$this->Salary_model->delete_salary($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Payement Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Payement Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function get_salary_list()
    {
        $dept = $_POST['dept'];
        $data=$this->Staff_model->select_staff_byDept($dept);
        if(isset($data)){
            print '<div class="box-body">
            <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <thead>
                  <tr>
                    <th>Student</th>
                    <th>Prix (DH)</th>
                    <th>Avance (DH)</th>
                    <th>Total (DH)</th>
                  </tr>
                  </thead>
                  <tbody>';

            foreach($data as $d)
            {
                print '<tr>
                <td>'.$d["staff_name"].'</td>
                 <td><input type="text" name="txtemail[]" class="form-control expenses" value="'.$d["email"].'" readonly>
                <td><input type="hidden" name="txtid[]" value="'.$d["id"].'">
                    <input type="text" name="txtbasic[]" class="form-control expenses">
                </td>
                <td><input type="text" id="total" name="txttotal[]" class="form-control" readonly></td>
                </tr>';
            }
            print '</tbody>
            </table>
            </div>
            </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
              </div>';
            // print '<div class="col-md-12">
            //       <div class="form-group">
            //         <label for="exampleInputPassword1">Department Name</label>
            //         <select class="form-control" name="slcdepartment" onchange="getstaff(this.value)">
            //           <option value="">Select</option>
                        
            //         </select>
            //       </div>
            //     </div>';
        }
        
        

    }



}
