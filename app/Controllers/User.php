<?php namespace App\Controllers;

use App\Models\Usermodel;

class User extends BaseController
{

    /**
     * function to load the form
     *
     * @return void
     * @author Harpreet 
     */
    public function add()
    {
        helper("form");
        echo view("User/add");
    }

    /**
     * function to save data
     *
     * @return void
     * @author Harpreet
     */
    public function save()
    {
        /* setup the validation rules for the request data */
        $validationRules = [
            'name' => 'required|alpha_space|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|min_length[6]|max_length[90]',
        ];

        /* check if data is not valid */
        if (!$this->validate($validationRules))
        {
            /* reload the view */
            $this->add();
        }
        else
        {
            /* all is got, get the values */
            $email = $this->request->getPost('email');
            $name = $this->request->getPost('name');

            /* get model instance */
            $userModel = new Usermodel();

            /* using try catch to handle any errors */

            try {

                /*
                function SAVE() is the magic function provided by core model from CodeIgniter4,
                simply pass the data and you are ready
                 */
                $userModel->save([
                    'user_display_name' => $name,
                    'user_email' => $email,
                ]);

                /* when saved redirect to list page */
                redirect()->to("user/list");
            }
            catch (\Exception $e)
            {
                /* a way to show error, you can customise this */
                throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
            }

        }
    }

    /**
     * function to list users
     *
     * @return void
     * @author Harpreet 
     */
    function list()
    {
        $userModel = new Usermodel();

        /* getting all records from database
        call this function magical, we did not define it, yet we can use it.
         */
        try {
            $users = $userModel->findAll();
            echo view("User/list", ['users' => $users]);
        }
        catch (\Exception $e)
        {
            /* a way to show error, you can customise this */
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
