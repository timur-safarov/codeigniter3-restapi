<?php

class Books extends CI_Model {

	public $name;
	public $id_lib;

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
            	'field' => 'id_lib',
        		'label' => 'Id_lib',
            	'rules' => 'required|integer',
            	'errors' => ['required' => 'Поле Id_lib обязательно к заполннию'],
        	]

        ];
    }

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_book($id)
	{
		return $this->db->from('books')
						->where('id', $id)
						->get()
						->result_array(); 
	}

	public function get_book_by_name($name)
	{
		return $this->db->from('books')
						->where('name', $name)
						->get()
						->result_array(); 
	}

	public function get_books()
	{
		$query = $this->db->order_by('id', 'desc')->get('books');
		return $query->result_array();
	}

	public function get_last_ten_books()
	{
		$query = $this->db->get('books', 10);
		return $query->result_array();
	}

	public function insert_book($data)
	{
		$this->name    = $data['name'];
		$this->id_lib = $data['id_lib'];
		return $this->db->insert('books', $this);
	}

	public function update_book($id, $data)
	{
		$this->name = $data['name'];
		$this->id_lib = $data['id_lib'];
		$this->db->update('books', $this, array('id' => $id));
	}

	public function delete_book($id)
    {
        return $this->db->delete('books', array('id' => $id));
    }

}