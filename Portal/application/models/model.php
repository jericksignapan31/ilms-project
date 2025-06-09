<?php 

class model extends CI_Model {

	function checkAuthentication($uname,$password)
	{
		$query = $this->db->query("SELECT * FROM users_tbl WHERE Email='$uname' AND Password='$password'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getUsername($email)
	{
		$this->db->where('Email', $email);
        $data = $this->db->get('users_tbl');

        return $data->result();
	}
	function get_user($email)
	{
		$this->db->where('Email', $email);
		$query = $this->db->get('users_tbl');
        return $query->result_array(); 
	}
	function get_notification($student_ID)
	{
		$this->db->where('student_ID', $student_ID);
		$this->db->where('status', "");
        $data = $this->db->get('notification_tbl');
		return $data->result(); 
	}
	function get_all_notification($student_ID)
	{
		$this->db->where('student_ID', $student_ID);
        $this->db->order_by('id', 'Desc');
        $data = $this->db->get('notification_tbl');
		return $data->result(); 
	}
	function get_book($book_ID)
	{
		$this->db->where('archieve !=', 'true');
		$this->db->where('ID', $book_ID);
		$query = $this->db->get('books_tbl');
        return $query->result_array(); 
	}
	function get_book_expired($book_ID)
	{
		$this->db->where('ID', $book_ID);
		$query = $this->db->get('books_tbl');
        return $query->result();  
	}
	function getBooks($limit, $offset)
	{
		$this->db->select('*');
        $this->db->from('books_tbl');
		$this->db->where('archieve !=', 'true');
        $this->db->where('available !=', '');
        $this->db->where('available >', '0');
        $this->db->where('costprice <=', 4000);
        $this->db->order_by('id', 'ASC');
		$this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result(); 
	}
	public function getTotalRows()
	{
        return $this->db->count_all('books_tbl');
    }
	function getBooks2($limit, $offset)
	{
		$this->db->select('*');
        $this->db->from('books_tbl');
		$this->db->where('archieve !=', 'true');
        $this->db->where('available !=', '');
        $this->db->where('available !=', '0');
        $this->db->where('costprice >', 4000);
        $this->db->order_by('id', 'ASC');
		$this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result(); 
	}
	public function getTotalBorrowed($student_ID)
	{
		$this->db->from('borrow_tbl');
        $this->db->where('student_ID', $student_ID);
        $this->db->where('Status =', "Borrow");
        return $this->db->count_all_results();
    }
	function borrow($borrowing_data)
	{
		$this->db->insert('borrow_tbl',$borrowing_data);
	}
	function reserve($borrowing_data)
	{
		$this->db->insert('reserve_tbl',$borrowing_data);
	}
	function getBorrowed($student_ID)
	{
		$this->db->where('student_ID', $student_ID);
		$this->db->where('Status !=', 'returned');
		$this->db->where('Status !=', 'To Approve');
		$query = $this->db->get('borrow_tbl');
		return $query->result();
	}
	function getReserved($student_ID)
	{
		$this->db->where('student_ID', $student_ID);
		$query = $this->db->get('reserve_tbl');
		return $query->result();
	}
	function get_all_available_books()
	{
		$this->db->select('*');
        $this->db->from('books_tbl');
		$this->db->where('archieve !=', 'true');
        $this->db->where('available !=', '');
        $this->db->where('available !=', '0');
        $this->db->where('costprice <=', 4000);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result(); 
	}
	function get_book_to_borrow($book_ID)
	{
		$this->db->where('ID', $book_ID);
		$query = $this->db->get('books_tbl');
        return $query->result_array(); 
	}
	function update_book_available($data, $book_ID)
	{
		$this->db->where('ID', $book_ID);
		$this->db->update('books_tbl', $data);
	}
	function get_all_books()
	{
		$this->db->where('archieve !=', 'true');
		$query = $this->db->get('books_tbl');
        return $query->result(); 
	}
	function view_book($book_ID)
	{
		$this->db->where('ID', $book_ID);
        $data = $this->db->get('books_tbl');

        return $data->result();
	}
	function view_book2($book_ID, $limit, $offset)
	{
		$this->db->select('*');
        $this->db->from('books_tbl');
		$this->db->where('archieve !=', 'true');
        $this->db->where('ID !=', $book_ID);
        $this->db->where('available !=', '');
        $this->db->where('available !=', '0');
        $this->db->where('costprice <=', 4000);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result(); 
	}
	function view_book_all($book_ID, $limit, $offset)
	{
		$this->db->select('*');
        $this->db->from('books_tbl');
		$this->db->where('archieve !=', 'true');
        $this->db->where('ID !=', $book_ID);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result(); 
	}
	function get_search_results($query)
	{
        // Sanitize and search the database
		$this->db->where('archieve !=', 'true');
		$this->db->group_start();
			$this->db->like('title', $query);
			$this->db->or_like('author', $query);
			$this->db->group_end();
        $query = $this->db->get('books_tbl'); 
        return $query->result();
    }
	function get_search_all_borrowable_results($query)
	{
        // Sanitize and search the database
        $this->db->select('*');
        $this->db->from('books_tbl');
		
		$this->db->where('archieve !=', 'true');

        // Check if 'available' is not empty
        $this->db->where('available !=', '');

        // Cost price condition
        $this->db->where('costprice <=', 4000);

        // Conditional search logic
        $this->db->group_start();
            $this->db->group_start()
                     ->where('author IS NOT NULL')
                     ->like('author', $query)
                     ->group_end();
            $this->db->or_group_start()
                     ->where('title IS NOT NULL')
                     ->like('title', $query)
                     ->group_end();
            $this->db->or_group_start()
                     ->where('accession_no IS NOT NULL')
                     ->like('accession_no', $query)
                     ->group_end();
        $this->db->group_end();

        // Execute the query
        $query = $this->db->get();
        return $query->result();
    }
	function update_user($data, $student_ID)
	{
		$this->db->where('Student_ID', $student_ID);
		$this->db->update('users_tbl', $data);
	}
	function view_toCancelReserve($book_ID)
	{
		$this->db->where('ID', $book_ID);
        $data = $this->db->get('reserve_tbl');

        return $data->result();
	}
	function cancel_reservation($ID)
	{
		$this->db->where('ID', $ID);
		$this->db->delete('reserve_tbl');
	}
	function updateNotification($notification_ID, $data)
	{
		$this->db->where('ID', $notification_ID);
		$this->db->update('notification_tbl', $data);
	}
	function checkBorrowed($book_ID,$student_ID)
	{
		$query = $this->db->query("SELECT * FROM borrow_tbl WHERE student_ID='$student_ID' AND book_ID='$book_ID'");
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
}