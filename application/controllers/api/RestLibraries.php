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
class RestLibraries extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    public $libraries;

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

        $this->load->model('Libraries');
        $this->libraries = new Libraries;
    }

    public function rest_get()
    {

        $libraries = $this->libraries->get_libraries();

        $id = $this->get('id');


        // If the id parameter doesn't exist return all the users

        if ($id === null)
        {
            // Check if the libraries data store contains libraries (in case the database result returns NULL)
            if ($libraries)
            {
                // Set the response and exit
                $this->response($libraries, 200); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No libraries were found'
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

        $library = $this->libraries->get_library($id);

        if (count($library)>0)
        {
            $this->set_response($library, 200); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => false,
                'message' => 'Library could not be found'
            ], 404); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function rest_post()
    {
        // $this->some_model->update_user( ... );

        $id = $this->get('id');

        if($id && !empty($this->input->post('name'))) {

            $data = [
                'name' => $this->input->post('name'),
                'id_user' => $this->input->post('id_user')
            ];

            $this->libraries->update_library($id, $data);
            $this->set_response(['message' => 'Success'], 201); // update (201) being the HTTP response code

        } else {
            $this->set_response(['message' => 'faild'], 201);
        }

        //Тут можно создать добавление библиотек если отказаться от метода put
    }

    public function rest_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(null, 400); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, 204); // NO_CONTENT (204) being the HTTP response code
    }


    public function rest_put()
    {   

        $result = $this->libraries->insert_library([
            'name' => $this->put('name'),
            'id_user' => $this->put('id_user')
        ]);

        return ($result) ? $this->response('success') : $this->response('faild');

    }

}
