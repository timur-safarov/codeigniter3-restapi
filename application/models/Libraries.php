<?php

class Libraries extends CI_Model {

	public $name;
	public $id_user;

	public function rules()
    {
        return [
            [
            	'field' => 'name',
        		'label' => 'Name',
            	'rules' => 'required|min_length[2]',
            	'errors' => ['required' => 'Поле name обязательно к заполннию'],
        	],
        	[
            	'field' => 'id_user',
        		'label' => 'Id_user',
            	'rules' => 'required|integer',
            	'errors' => ['required' => 'Поле id_user обязательно к заполннию'],
        	]

        ];
    }

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_library($id)
	{
		return $this->db->from('libraries')
						->where('id', $id)
						->get()
						->result_array(); 
	}

	public function get_library_by_name($name)
	{
		return $this->db->from('libraries')
						->where('name', $name)
						->get()
						->result_array(); 
	}

	public function get_libraries()
	{
		$query = $this->db->order_by('id', 'desc')->get('libraries');
		return $query->result_array();
	}

	public function get_last_ten_libraries()
	{
		$query = $this->db->get('libraries', 10);
		return $query->result_array();
	}

	public function insert_library($data)
	{
		$this->name    = $data['name'];
		$this->id_user = $data['id_user'];
		return $this->db->insert('libraries', $this);
	}

	public function update_library($id, $data)
	{
		$this->name = $data['name'];
		$this->id_user = $data['id_user'];
		$this->db->update('libraries', $this, array('id' => $id));
	}

	public function delete_library($id)
    {
        return $this->db->delete('libraries', array('id' => $id));
    }

}