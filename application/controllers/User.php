<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	

	public function __construct()
    {
        parent::__construct();
        // load Pagination library
        $this->load->library('pagination');
        // load URL helper
        $this->load->helper('url');
        $this->load->database();
        // Your own constructor code
    }
	
	public function index()
	{
		$this->load->model('Users');
         // init params
        $params = array();
        $limit_per_page = 2;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Users->get_total();
 		$data = array();
        if ($total_records > 0) 
        {
            // get current page records
            $data["users"] = $this->Users->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'index.php/user/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
           	$this->pagination->initialize($config);
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $this->load->view('user/index', $data);
	}

    public function add(){
        if($this->input->method() == 'post') {
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			//$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
			//$this->form_validation->set_rules('country', 'Country', 'trim|required');
			if ($this->form_validation->run() == TRUE)
            {	
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$filename = $_FILES['picture']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$config['file_name'] = time(). '.'.$ext;
				$config['max_size'] = 100;
				$config['max_width'] = 1024;
				$config['max_height'] = 768;
				$this->load->library('upload', $config);
                if ($this->upload->do_upload('picture'))
                {
                    $fileData = $this->upload->data();	
					$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
				    'gender' => $this->input->post('gender'),
					'country_id' => implode(',', $this->input->post('country')),
					'picture' => $fileData['file_name']
				   );
				   if($this->db->insert('users', $data)){
					   redirect('/user');
				   }else{
				   }
				}
                else
                {
					$error = array('error' => $this->upload->display_errors());
                }
            }
		          
        }
        $this->load->view('user/add');
    }
	public function delete_user($id){
		$this->db->delete('users', array('id' => $id));
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
		{
			return redirect($this->agent->referrer());
		}else{
			return redirect('/user');
			}
		//
	}

}
