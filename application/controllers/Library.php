<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	public $libraries;
	public $users;

	/**
	* Get All Data from this method.
	*
	* @return Response
	*/
	public function __construct() {

		parent::__construct(); 

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Libraries');
		$this->libraries = new Libraries;
		$this->load->model('Users');
		$this->users = new Users;
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{

		$ch = curl_init(base_url('/api/restLibraries/'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['libraries'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		$this->load->view('theme/header');       
		$this->load->view('library/list', $data);
		$this->load->view('theme/footer');
	}


	/**
	* Show Details this method.
	*
	* @return Response
	*/
	public function show($id)
	{

		$ch = curl_init(base_url('/api/restLibraries/'.$id));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['library'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		if (count($data['library'][0])<=0) {
			redirect('/library/');
		}

		$this->load->view('theme/header');
		$this->load->view('library/show', $data);
		$this->load->view('theme/footer');
	}


	/**
	* Edit Data from this method.
	*
	* @return Response
	*/
	public function edit($id)
	{
		
		$ch = curl_init(base_url('/api/restLibraries/'.$id));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['library'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		if (count($data['library'][0])<=0) {
			redirect('/library/');
		}

		$this->load->view('theme/header');
		$this->load->view('library/edit', $data);
		$this->load->view('theme/footer');
	}



	public function update($id)
	{

		$libraries = $this->libraries->get_libraries();
        $validation = $this->form_validation;
        
       	$validation->set_rules('name', 'Name', 'required|min_length[2]', ['required' => 'Поле Name обязательно к заполннию']);

       	$validation->set_rules('id_user', 'Id_user', 'required|integer', ['required' => 'Поле id_user обязательно к заполннию']);

        if ($validation->run())
        {

        	$username = 'admin';
		    $password = '1234';

		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, base_url()."api/restLibraries/$id/format/json");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_POST, 1);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $this->input->post());
		     
		    // Optional, delete this line if your API is open
		    //curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		     
		    $responce = curl_exec($ch);
		    curl_close($ch);
		     
    		$result = json_decode($responce);

    		//print_r($result);

        } else {
        	$this->session->set_flashdata('errors', validation_errors());
        }

        redirect(base_url('library/edit/'.$id));

	}


	/**
	 * Create from display on this method.
	 *
	 * @return Response
	 */
	public function create()
	{
	  $this->load->view('theme/header');
	  $this->load->view('library/create');
	  $this->load->view('theme/footer');   
	}

	/**
	* Store Data from this method.
	*
	* @return Response
	*/
	public function store()
	{

		$libraries = $this->libraries->get_libraries();
        $validation = $this->form_validation;
        $validation->set_rules($this->libraries->rules());

        if (!$validation->run())
        {
        	$this->session->set_flashdata('errors', validation_errors());
	        redirect(base_url('library/create'));
        } else{
	       
        	$ch = curl_init(base_url().'api/restLibraries/format/json');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->input->post()));

			$response = curl_exec($ch);
			curl_close($ch);

			//$result = json_decode($response);
			//print_r($result);

	        redirect(base_url('library/'));
	    }

	}


	/**
	* Delete Data from this method.
	*
	* @return Response
	*/
	public function delete($id)
	{
		$item = $this->libraries->delete_library($id);
		redirect(base_url('library/'));
	}



}
