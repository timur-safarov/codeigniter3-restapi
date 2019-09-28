<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public $libraries;
	public $books;

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
		$this->load->model('books');
		$this->books = new books;
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{

		$ch = curl_init(base_url('/api/restBooks/'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['books'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		$this->load->view('theme/header');       
		$this->load->view('book/list', $data);
		$this->load->view('theme/footer');
	}


	/**
	* Show Details this method.
	*
	* @return Response
	*/
	public function show($id)
	{

		$ch = curl_init(base_url('/api/restBooks/'.$id));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['book'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		if (count($data['book'][0])<=0) {
			redirect('/book/');
		}

		$this->load->view('theme/header');
		$this->load->view('book/show', $data);
		$this->load->view('theme/footer');
	}


	/**
	* Edit Data from this method.
	*
	* @return Response
	*/
	public function edit($id)
	{
		
		$ch = curl_init(base_url('/api/restBooks/'.$id));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['book'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		if (count($data['book'][0])<=0) {
			redirect('/book/');
		}

		$this->load->view('theme/header');
		$this->load->view('book/edit', $data);
		$this->load->view('theme/footer');
	}



	public function update($id)
	{

		$books = $this->books->get_books();
        $validation = $this->form_validation;
        
       	$validation->set_rules('name', 'Name', 'required|min_length[2]', ['required' => 'Поле Name обязательно к заполннию']);

       	$validation->set_rules('id_lib', 'Id_lib', 'required|integer', ['required' => 'Поле id_lib обязательно к заполннию']);

        if ($validation->run())
        {

        	$username = 'admin';
		    $password = '1234';

		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, base_url()."api/restBooks/$id/format/json");
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

        redirect(base_url('book/edit/'.$id));

	}


	/**
	 * Create from display on this method.
	 *
	 * @return Response
	 */
	public function create()
	{
	  $this->load->view('theme/header');
	  $this->load->view('book/create');
	  $this->load->view('theme/footer');   
	}

	/**
	* Store Data from this method.
	*
	* @return Response
	*/
	public function store()
	{

		$books = $this->books->get_books();
        $validation = $this->form_validation;
        $validation->set_rules($this->books->rules());

        if (!$validation->run())
        {
        	$this->session->set_flashdata('errors', validation_errors());
	        redirect(base_url('book/create'));
        } else{
	       
        	$ch = curl_init(base_url().'api/restBooks/format/json');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->input->post()));

			$response = curl_exec($ch);
			curl_close($ch);

			$result = json_decode($response);
			//print_r($result);

	        redirect(base_url('book/'));
	    }

	}


	/**
	* Delete Data from this method.
	*
	* @return Response
	*/
	public function delete($id)
	{

		$ch = curl_init(base_url('/api/restBooks/'.$id));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$response = curl_exec($ch);
		curl_close($ch);

		$result = json_decode($response);
		//print_r($result);

		redirect(base_url('book/'));
	}



}
