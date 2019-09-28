<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class RestUsers extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    public $users;

    function __construct()
    {

        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['rest_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['rest_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['rest_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('Users');
        $this->users = new Users;
    }

    public function rest_get()
    {

        $users = $this->users->get_users();

        $id = $this->get('id');


        // If the id parameter doesn't exist return all the users

        if ($id === null)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, 200); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No users were found'
                ], 404); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(null, 400); // BAD_REQUEST (400) being the HTTP response code
        }

        $user = $this->users->get_user($id);

        if (count($user)>0)
        {
            $this->set_response($user, 200); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], 404); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function rest_post()
    {
        // $this->some_model->update_user( ... );

        $id = $this->get('id');

        if($id && !empty($this->input->post('name'))) {

            $this->set_response(['message' => 'success'], 201);

            $data = [
                'name' => $this->input->post('name'),
                'login'=> $this->input->post('login'),
                'password'=> $this->input->post('password'),
                'email'=> $this->input->post('email')
            ];

            $this->users->update_user($id, $data);
            $this->set_response(['message' => $id], 201); // update (201) being the HTTP response code

        } else {
            $this->set_response(['message' => 'faild'], 201);
        }

        //Тут можно создать добавление пользователей если отказаться от метода put
    }

    public function rest_delete()
    {
        $id = (int) $this->get('id');

        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(null, 400); // BAD_REQUEST (400) being the HTTP response code
        } else {

            $this->users->delete_user($id);

            // $this->some_model->delete_something($id);
            $message = [
                'id' => $id,
                'message' => 'Deleted the resource'
            ];

            $this->set_response($message, 204); // NO_CONTENT (204) being the HTTP response code
        }


    }


    public function rest_put()
    {   

        $result = $this->users->insert_user([
            'name' => $this->put('name'),
            'login' => $this->put('login'),
            'password' => $this->put('password'),
            'email' => $this->put('email')
        ]);

        return ($result) ? $this->response('success') : $this->response('faild');

    }

}
