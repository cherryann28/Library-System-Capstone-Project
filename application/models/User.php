<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    /*
		* DOCU: This function is to retrieves user filtered by email
		* Owned by Cherry Ann
	*/
    public function get_users_by_email($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }

    /*
		* DOCU: This function is to get all the users info from the database users table.
		* Owned by Cherry Ann
	*/
    public function get_all_user()
    {
        return $this->db->query("SELECT * FROM users")->result_array();
    }
    /*
		* DOCU: This function is to create user account
		* Owned by Cherry Ann
	*/
    public function create_account($user)
    {
        if($this->get_all_user() == null)
        {
            $query = "INSERT INTO users (school_id, name, contact_number, email, password, user_level, created_at)
                         VALUES (?,?,?,?,?,?,NOW())";
            $values = array($user['school_id'], 
                            $user['name'], $user['contact_number'], $user['email'], 
                            md5($user['password']),'user_level' => 'admin');
        }
        else
        {
            $query = "INSERT INTO users (school_id, name, contact_number, email, password, user_level, created_at)
                         VALUES (?,?,?,?,?,?,NOW())";
            $values = array($user['school_id'], 
                        $user['name'], $user['contact_number'], $user['email'], 
                        md5($user['password']), $user['user_level']);
        }
        
        return $this->db->query($query,$values);
    }

    /*
		* DOCU: This function is to validate create account.
		* Owned by Cherry Ann
	*/
    public function validate_create_account()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('school_id', 'School ID', 'required|numeric');
        $this->form_validation->set_rules("name", "Name", "trim|required|min_length[2]"); 
        $this->form_validation->set_rules("contact_number", "Contact number", "trim|required|exact_length[11]|numeric|is_unique[users.contact_number]|regex_match['^09.{9}$']");        
        $this->form_validation->set_rules("user_level", "Select option", "required");
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        if(!$this->form_validation->run())
        {
            return array(validation_errors());
        }
        return "valid";  
    }

    /*
		* DOCU: This function is to validate login form
		* Owned by Cherry Ann
	*/
    public function validate_login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
       
        if(!$this->form_validation->run())
        {
            return array(validation_errors());
        }
        return 'success';
        
    }

    /*
		* DOCU: This function is checking if password matches or password doesn't matches
		* Owned by Cherry Ann
	*/
    public function validate_login_match($user, $password)
    {
        $hash_password = md5($password);
        if($user && $user['password'] == $hash_password)
        {
            return 'success';
        }
        else
        {
            return 'Incorrect email/pasword';
        }
    }

    /*
		* DOCU: This function is to count all the books from the database books table.
		* Owned by Cherry Ann
	*/
    public function count_all_books()
	{
		return $this->db->query("SELECT SUM(availability) as availability FROM books")->row_array();
	}

    /*
		* DOCU: This function is to count all the issued books from the database records table.
		* Owned by Cherry Ann
	*/
    public function total_issued_books()
    {
        $query = "SELECT COUNT(id) as id 
                    FROM records 
                    WHERE date_of_issue IS NOT NULL AND due_date IS NOT NULL AND date_of_return IS NULL";

		return $this->db->query($query)->row_array();
    }

    /*
		* DOCU: This function is to count all the return books from the database return table.
		* Owned by Cherry Ann
	*/
    public function total_returned_books()
    {
        return $this->db->query("SELECT COUNT(id) as id FROM returns")->row_array();
    }
}

?>