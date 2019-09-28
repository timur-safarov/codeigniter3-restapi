<?php

class Users extends CI_Model {

	public $name;
	public $login;
	public $password;
	public $email;

	public function rules()
    {
        return [
            [
            	'field' => 'name',
        		'label' => 'Name',
            	'rules' => 'required|min_length[2]',
            	'errors' => ['required' => 'Поле name обязательно к заполннию']
        	],
        	[
	        	'field' => 'login',
	         	'label' => 'Login',
	         	'rules' => 'required|callback_login_check',
	         	'errors' => ['required' => 'Поле login обязательно к заполннию']
         	],
         	[
         		'field' => 'password',
         		'label' => 'Password',
         		'rules' => 'required|max_length[8]', 
         		'errors' => ['required' => 'Поле password обязательно к заполннию']
         	],
         	[
	        	'field' => 'email',
	         	'label' => 'Email',
	         	'rules' => 'required',
	         	'errors' => ['required' => 'Поле email обязательно к заполннию']
         	],

        ];
    }

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_user($id)
	{
		return $this->db->from('users')
						->where('id', $id)
						->get()
						->result_array(); 
	}

	public function get_user_by_login($login)
	{
		return $this->db->from('users')
						->where('login', $login)
						->get()
						->result_array(); 
	}

	public function get_users()
	{
		$query = $this->db->order_by('id', 'desc')->get('users');
		return $query->result_array();
	}

	public function get_last_ten_users()
	{
		$query = $this->db->get('users', 10);
		return $query->result_array();
	}

	public function insert_user($data)
	{
		$this->name     = $data['name'];
		$this->login    = $data['login'];
		$this->password = $data['password'];
		$this->email    = $data['email'];

		return $this->db->insert('users', $this);
	}

	public function update_user($id, $data)
	{
		$this->name     = $data['name'];
		$this->login    = $data['login'];
		$this->password = $data['password'];
		$this->email    = $data['email'];

		$this->db->update('users', $this, array('id' => $id));
	}

	public function delete_user($id)
    {
        return $this->db->delete('users', array('id' => $id));
    }

}