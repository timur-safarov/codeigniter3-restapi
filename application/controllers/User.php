<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('Users');
		$this->users = new Users;
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{

		$ch = curl_init(base_url('/api/restUsers/'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['users'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		$this->load->view('theme/header');       
		$this->load->view('user/list', $data);
		$this->load->view('theme/footer');
	}


	/**
	* Show Details this method.
	*
	* @return Response
	*/
	public function show($id)
	{

		$ch = curl_init(base_url('/api/restUsers/'.$id));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['user'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		if (count($data['user'][0])<=0) {
			redirect('/user/');
		}

		$this->load->view('theme/header');
		$this->load->view('user/show', $data);
		$this->load->view('theme/footer');
	}


	/**
	* Edit Data from this method.
	*
	* @return Response
	*/
	public function edit($id)
	{
		
		$ch = curl_init(base_url('/api/restUsers/'.$id));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data['user'] = json_decode(curl_exec($ch), true);
		curl_close($ch);

		if (count($data['user'][0])<=0) {
			redirect('/user/');
		}

		$this->load->view('theme/header');
		$this->load->view('user/edit', $data);
		$this->load->view('theme/footer');
	}



	public function update($id)
	{

		$users = $this->users->get_users();
        $validation = $this->form_validation;
        
       	$validation->set_rules('name', 'Name', 'required|min_length[2]', ['required' => 'Поле name обязательно к заполннию']);

		$validation->set_rules('login', 'Login', 'required|min_length[3]');

        $validation->set_rules('password', 'Password', 'required|max_length[8]', ['required' => 'Поле password обязательно к заполннию']);

        $validation->set_rules('email', 'Email', 'required', ['required' => 'Поле Email обязательно к заполннию']);


        if ($validation->run())
        {

        	$username = 'admin';
		    $password = '1234';

		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, base_url()."api/restUsers/$id/format/json");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_POST, 1);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $this->input->post());
		     
		    // Optional, delete this line if your API is open
		    //curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		     
		    $responce = curl_exec($ch);
		    curl_close($ch);
		     
    		$result = json_decode($responce);

        } else {
        	$this->session->set_flashdata('errors', validation_errors());
        }

        redirect(base_url('user/edit/'.$id));

	}


	/**
	 * Create from display on this method.
	 *
	 * @return Response
	 */
	public function create()
	{
	  $this->load->view('theme/header');
	  $this->load->view('user/create');
	  $this->load->view('theme/footer');   
	}

	/**
	* Store Data from this method.
	*
	* @return Response
	*/
	public function store()
	{

		$users = $this->users->get_users();
        $validation = $this->form_validation;
        $validation->set_rules($this->users->rules());

        if (!$validation->run())
        {
        	$this->session->set_flashdata('errors', validation_errors());
	        redirect(base_url('user/create'));
        } else{
	       
        	$ch = curl_init(base_url().'api/restUsers/format/json');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->input->post()));

			$response = curl_exec($ch);
			curl_close($ch);

			//$result = json_decode($response);
			//print_r($result);

	        redirect(base_url('user/'));
	    }

	}



    public function login_check($login)
    {

    	$user = $this->users->get_user_by_login($login);

        if (count($user)>0)
        {
            $this->form_validation->set_message('login_check', '{field} уже есть с таким названием - '.$login);
            return false;
        }
        else
        {
            return true;
        }
    }


	/**
	* Delete Data from this method.
	*
	* @return Response
	*/
	public function delete($id)
	{
		$item = $this->users->delete_user($id);
		redirect(base_url('user/'));
	}



}
