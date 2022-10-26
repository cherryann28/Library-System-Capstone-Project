<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Model
{
    /*
		* DOCU: This function is to get all the users where user level is faculty.
		* Owned by Cherry Ann
	*/
    public function get_all_users_by_faculty()
	{
		return $this->db->query("SELECT * FROM users WHERE user_level = 'faculty'")->row_array();
	}

    public function count_all_messages()
    {
        $school_id = $this->session->userdata('school_id');

        return $this->db->query("SELECT COUNT(id) as number FROM messages WHERE school_id = $school_id ")->row_array();
    }

    public function count_book_by_1()
	{
		$id = $this->session->userdata('school_id');
        $query = "SELECT COUNT(records.id) as count_id
                    FROM books
                    LEFT JOIN records
                        ON books.id = records.book_id
                    LEFT JOIN users
                        ON users.school_id = records.school_id
                    WHERE records.book_id = books.id AND records.school_id = ? AND records.date_of_issue IS NULL AND records.date_of_return IS NULL";
        return $this->db->query($query, $id)->row_array();
	}

    public function count_renew_book_by_1()
	{
		$id = $this->session->userdata('school_id');
        $query = "SELECT COUNT(records.id) as count_id
                    FROM books
                    LEFT JOIN records
                        ON books.id = records.book_id
                    LEFT JOIN users
                        ON users.school_id = records.school_id
                    WHERE records.book_id = books.id AND records.school_id = ? AND records.date_of_issue IS NULL AND records.date_of_return IS NULL";
        return $this->db->query($query, $id)->row_array();
	}

    /*
		* DOCU: This function is to get all the books info from the database books table.
		* Owned by Cherry Ann
	*/
    public function get_all_books()
	{
		return $this->db->query("SELECT * FROM books")->result_array();
	}

    /*
		* DOCU: This function is to select all the info from the database books table where the conditions are met.
		* Owned by Cherry Ann
	*/
    public function search_book($book)
	{
		return $this->db->query("SELECT * FROM books WHERE accesion LIKE '%$book%' OR title LIKE '%$book%' OR publisher LIKE '%$book%' ")->result_array();
	}

    /*
		* DOCU: This function insert data into database records
		* Owned by Cherry Ann
	*/
    public function borrow_book($book_id)
    {
        $query = "INSERT INTO records (school_id, book_id, created_at, updated_at)
                    VALUES (?, ?, NOW(), NOW())";

        $values = array(
            $this->session->userdata('school_id'),
            $this->security->xss_clean($book_id)
        );

        return $this->db->query($query, $values);
    }

    /*
		* DOCU: This function is to select all the info of currently borrowed books from the database records table.
		* Owned by Cherry Ann
	*/
    public function currently_borrowed_books()
    {
        $id = $this->session->userdata('school_id');
        $query = "SELECT books.id as book_id, books.accesion, books.title, records.date_of_issue, records.due_date, records.renewals_left
                    FROM records
                    INNER JOIN users
						ON users.school_id = records.school_id
					INNER JOIN books
						ON books.id = records.book_id
                    WHERE users.school_id = $id AND records.date_of_return IS NULL AND date_of_issue IS NOT NULL
                    ORDER BY records.date_of_issue DESC";

        return $this->db->query($query, $id)->result_array();
    }

    /*
		* DOCU: This function is to select all the info of previously borrowed books from the database records table.
		* Owned by Cherry Ann
	*/
    public function previously_borrowed_books()
    {
        $id = $this->session->userdata('school_id');
        $query = "SELECT books.accesion, books.title, records.date_of_issue, records.date_of_return
                    FROM records
                    INNER JOIN users
						ON users.school_id = records.school_id
					INNER JOIN books
						ON books.id = records.book_id
                    WHERE users.school_id = ? AND date_of_issue IS NOT NULL AND date_of_return IS NOT NULL AND books.id = records.book_id
                    ORDER BY records.date_of_return DESC";

        return $this->db->query($query, $id)->result_array();
    }
    
    /*
		* DOCU: This function is to insert the data of renew book into renew table from the database.
		* Owned by Cherry Ann
	*/
    public function renew_book($book_id)
    {
        $query = "INSERT INTO renew (school_id, book_id, created_at, updated_at)
                    VALUES (?, ?, NOW(), NOW())";

        $values = array(
            $this->session->userdata('school_id'),
            $this->security->xss_clean($book_id)
        );

        return $this->db->query($query, $values);
    }

    /*
		* DOCU: This function is to insert the data of return book into return table from the database.
		* Owned by Cherry Ann
	*/
    public function  return_book($book_id)
    {
        $query = "INSERT INTO returns (school_id, book_id, created_at, updated_at)
                    VALUES (?, ?, NOW(), NOW())";

        $values = array(
            $this->session->userdata('school_id'),
            $this->security->xss_clean($book_id)
        );

        return $this->db->query($query, $values);
    }

    /*
		* DOCU: This function is to select all the info from the database messages table.
		* Owned by Cherry Ann
	*/
    public function message()
    {
        $school_id = $this->session->userdata('school_id');

        return $this->db->query("SELECT * FROM messages WHERE school_id = $school_id ORDER BY created_at DESC")->result_array();
    }
   

    /* logic for 5books/week */
    public function count_borrow_books()
    { 
        $id = $this->session->userdata('school_id');
        $query = "SELECT COUNT(records.school_id) as school_id
                    FROM books
                    LEFT JOIN records
                        ON books.id = records.book_id
                    LEFT JOIN users
                        ON users.school_id = records.school_id
                    WHERE users.school_id = ? AND books.id = records.book_id AND records.date_of_return IS NULL";
        
        return $this->db->query($query, $id)->row_array();
    }
}

?>