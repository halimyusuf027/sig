<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_user extends CI_Controller {

	 public function __construct(){
        parent::__construct();
		if ($this->session->userdata('logged_in')!="Sudah Loggin") {
			redirect('login');
		}else{
			if($this->session->userdata('level')!="0"){
				redirect("dashboard","refresh");
			}
		}
		$this->load->helper('text');
        $this->load->model('Model_user');
    }
	public function index(){
		

		$data['page'] = "lokasi_user";
		$data['menu'] = "Lokasi User";
		$data['icon'] = "glyphicon glyphicon-map-marker";
		$data['content'] = "form_edit";

		
	    $query = $this->db->get_where('t_penjahit',array('user_id'=>$this->session->userdata('user_id')));
		$rowx = $query->row();
		$data['id']			= $rowx->id;
	   	$data['nama']		= $rowx->nama;
	   	$data['alamat']		= $rowx->alamat;
	   	$data['foto']		= $rowx->foto;
	   	$data['latitude']	= $rowx->latitude;
	   	$data['longitude']	= $rowx->longitude;
	   	$data['status_penjahit']		= $rowx->status_penjahit;



		$this->load->view('dashboard/view_dashboard',$data);
	}
	
	public function detail_penjahit($id){


		$data['page'] = "lokasi_user";
		$data['menu'] = "Lokasi User";
		$data['icon'] = "glyphicon glyphicon-map-marker";
		$data['content'] = "content_detail";

		
	    $query = $this->db->get_where('t_penjahit',array('user_id'=>$this->session->userdata('user_id')));
		$rowx = $query->row();
		$data['id']			= $rowx->id;
	   	$data['nama']		= $rowx->nama;
	   	$data['alamat']		= $rowx->alamat;
	   	$data['foto']		= $rowx->foto;
	   	$data['latitude']	= $rowx->latitude;
	   	$data['longitude']	= $rowx->longitude;
	   	$data['status_penjahit']		= $rowx->status_penjahit;



		$this->load->view('dashboard/view_dashboard',$data);
	}
	public function update_data(){
		
		$nama_foto 					= "foto_".time(); 
        $config['upload_path'] 		= './assets/foto/'; 
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] 		= '2048'; 
        $config['max_width']  		= '1288'; 
        $config['max_height']  		= '768'; 
        $config['file_name'] 		= $nama_foto;
 
        $this->upload->initialize($config);
        if (empty($_FILES['foto']['name'])){
          
                $data = array(
			   		'nama'		=> $this->input->post('nama'),
					'alamat'	=> $this->input->post('alamat'),
					'latitude'	=> $this->input->post('latitude'),
					'longitude'	=> $this->input->post('longitude'),
					'status_user'   =>1,
					'status_penjahit'	=> 1
			   	);
			   $where = array(
			   		'id' =>$this->input->post('id'),
			   	);
			   $res = $this->Model_user->Update('t_penjahit',$data,$where);
			   if ($res > 0) {
			   		redirect('lokasi_user','refresh');
			   }
        }else{
        	if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();


                $data = array(
			   		'nama'		=> $this->input->post('nama'),
					'alamat'	=> $this->input->post('alamat'),
					'foto' 		=> $gbr['file_name'],
					'latitude'	=> $this->input->post('latitude'),
					'longitude'	=> $this->input->post('longitude'),
					'status_user'   =>1,
					'status_penjahit'	=> 1
			   	);
			   $where = array(
			   		'id' =>$this->input->post('id'),
			   	);
			   $res = $this->Model_user->Update('t_penjahit',$data,$where);
			   if ($res > 0) {
			   		redirect('lokasi_user','refresh');
			   }
            }else{
            	echo "<script>alert('File yang di uplaod harus berformat gif|jpg|png|jpeg|bmp!');history.go(-1);</script>";
               	
            }
        }
	}
	


}
