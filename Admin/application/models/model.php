<?php 

class model extends CI_Model {

	function checkAuthentication($uname,$password)
	{
		$query = $this->db->query("SELECT * FROM admin_user_tbl WHERE Email='$uname' AND Password='$password'");
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
        $data = $this->db->get('admin_user_tbl');

        return $data->result();
	}
	function updateAdmin($data, $emp_ID)
	{
		$this->db->where('Emp_ID', $emp_ID);
		$this->db->update('admin_user_tbl', $data);
	}
	function get_term_recorded($sy, $term)
	{
		$query = $this->db->query("SELECT * FROM sy_tbl WHERE sy='$sy' AND term = '$term'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function set_term($set_term_data)
	{
		$this->db->insert('sy_tbl',$set_term_data);
	}
	function getBooks()
	{
		$this->db->where('archieve !=', 'true');
		$this->db->order_by('ID', 'ACS');
        $query = $this->db->get('books_tbl');
        return $query->result(); 
	}
	function getArchieveBooks()
	{
		$this->db->where('archieve =', 'true');
		$this->db->order_by('ID', 'DESC');
        $query = $this->db->get('books_tbl');
        return $query->result(); 
	}
	function checkAccessionNumber($AccessionNumber)
	{
		$query = $this->db->query("SELECT * FROM books_tbl WHERE accession_no='$AccessionNumber'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function checkBook($AccessionNumber)
	{
		$query1 = $this->db->query("SELECT * FROM books_tbl WHERE accession_no='$AccessionNumber'");
		if($query1->num_rows()==1)
		{
			return $query1->row();
		}
		else
		{
			return false;
		}
	}
	function checkBookID($ID)
	{
		$query1 = $this->db->query("SELECT * FROM books_tbl WHERE ID='$ID'");
		if($query1->num_rows()==1)
		{
			return $query1->row();
		}
		else
		{
			return false;
		}
	}
	function add_book($book_data)
	{
		$this->db->insert('books_tbl',$book_data);
	}
	function Update_book($book_data, $ID)
	{
		$this->db->where('ID', $ID);
		$this->db->update('books_tbl', $book_data);
	}
	function getBookToDelete($ID)
	{
		$this->db->where('ID', $ID);
        $data = $this->db->get('books_tbl');

        return $data->result();
	}
	function archieve_book($ID, $book_data)
	{
		$this->db->where('ID', $ID);
		$this->db->update('books_tbl', $book_data);
	}
	function delete_book($ID)
	{
		$this->db->where('ID', $ID);
		$this->db->delete('books_tbl');
	}
	function getMembers()
	{
		$this->db->order_by('user_ID', 'DESC');
        $query = $this->db->get('users_tbl');
        return $query->result(); 
	}
	function getTotalMembersRows()
	{
        return $this->db->count_all('users_tbl');
    }
	function checkStudentID($Student_ID)
	{
		$query1 = $this->db->query("SELECT * FROM users_tbl WHERE Student_ID='$Student_ID'");
		if($query1->num_rows()==1)
		{
			return $query1->row();
		}
		else
		{
			return false;
		}
	}
	function checkStudentName($Fname, $Lname)
	{
		$query1 = $this->db->query("SELECT * FROM users_tbl WHERE Fname='$Fname' AND Lname='$Lname'");
		if($query1->num_rows()==1)
		{
			return $query1->row();
		}
		else
		{
			return false;
		}
	}
	function add_member($member_data)
	{
		$this->db->insert('users_tbl',$member_data);
	}
	function Update_member($members_data, $Student_ID)
	{
		$this->db->where('Student_ID', $Student_ID);
		$this->db->update('users_tbl', $members_data);
	}
	function delete_member($ID)
	{
		$this->db->where('Student_ID', $ID);
		$this->db->delete('users_tbl');
	}
	function get_search_results($query)
	{
        // Sanitize and search the database
        $this->db->like('title', $query);
			$this->db->group_start();
			$this->db->or_like('author', $query);
			$this->db->or_like('accession_no', $query);
		$this->db->group_end();
        $query = $this->db->get('books_tbl'); 
        return $query->result();
    }
	function getborrowedbooks()
	{
		$this->db->select('borrow_tbl.*, users_tbl.*'); // Select columns from both tables
        $this->db->from('borrow_tbl'); // The first table
        $this->db->join('users_tbl', 'borrow_tbl.student_ID = users_tbl.student_ID'); // Join condition
		$this->db->where('borrow_tbl.Status', 'borrow');
		$this->db->order_by('borrow_tbl.ID', 'DESC');
        $query = $this->db->get(); // Execute the query
        return $query->result(); // Return the result as an array of objects
	}
	function get_borrowed_search_results($query)
	{
		$this->db->select('borrow_tbl.*, users_tbl.*'); // Select columns from both tables
		$this->db->from('borrow_tbl'); // The first table
		$this->db->join('users_tbl', 'borrow_tbl.student_ID = users_tbl.student_ID'); // Join condition
		$this->db->order_by('borrow_tbl.ID', 'DESC');
		$this->db->like('borrow_tbl.student_ID', $query);
		$query = $this->db->get(); // Execute the query
		return $query->result(); // Return the result as an array of objects
	}
	function getresevebooks()
	{
		$this->db->select('reserve_tbl.*, users_tbl.*'); // Select columns from both tables
        $this->db->from('reserve_tbl'); // The first table
        $this->db->join('users_tbl', 'reserve_tbl.student_ID = users_tbl.student_ID'); // Join condition
		$this->db->order_by('reserve_tbl.ID', 'ASC');
        $query = $this->db->get(); // Execute the query
        return $query->result(); // Return the result as an array of objects
	}
	function get_reserved_search_results($query)
	{
		$this->db->select('reserve_tbl.*, users_tbl.*'); // Select columns from both tables
		$this->db->from('reserve_tbl'); // The first table
		$this->db->join('users_tbl', 'reserve_tbl.student_ID = users_tbl.student_ID'); // Join condition
		$this->db->order_by('reserve_tbl.ID', 'DESC');

		$this->db->group_start(); // Start grouping conditions
			$this->db->like('reserve_tbl.student_ID', $query)
					->or_like('reserve_tbl.book_ID', $query)
					->or_like('reserve_tbl.book_title', $query)
					->or_like('reserve_tbl.author', $query)
					->or_like('reserve_tbl.reserve_date', $query)
					->or_like('reserve_tbl.due', $query);
		$this->db->group_end(); // End grouping conditions

		$query = $this->db->get(); // Execute the query
		return $query->result(); // Return the result as an array of objects
	}
	function gettoapprove()
	{
		$this->db->select('borrow_tbl.*, users_tbl.*'); // Select columns from both tables
        $this->db->from('borrow_tbl'); // The first table
        $this->db->join('users_tbl', 'borrow_tbl.student_ID = users_tbl.student_ID'); // Join condition
		$this->db->where('borrow_tbl.Status', 'To Approve');
		$this->db->order_by('borrow_tbl.ID', 'DESC');
        $query = $this->db->get(); // Execute the query
        return $query->result(); // Return the result as an array of objects
	}
	function getRestoreBook($ID)
	{
		$this->db->where('ID', $ID);
        $data = $this->db->get('books_tbl');

        return $data->result();
	}
	function returnBook($transactionID, $book_return)
	{
		$this->db->where('ID', $transactionID);
		$this->db->update('borrow_tbl', $book_return);
	}
	function checkReserve($book_ID)
	{
		$query = $this->db->query("SELECT * FROM reserve_tbl WHERE book_ID='$book_ID'");
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}
	function get_book_to_add($book_ID)
	{
		$this->db->where('ID', $book_ID);
		$query = $this->db->get('books_tbl');
        return $query->result_array(); 
	}
	function update_book_available($book_add_available, $book_ID)
	{
		$this->db->where('ID', $book_ID);
		$this->db->update('books_tbl', $book_add_available);
	}
	function get_reserve_to_approve($book_ID)
	{
		$this->db->where('book_ID', $book_ID);
		$this->db->where('status !=', 'Reserved');
		$query = $this->db->get('reserve_tbl');
        return $query->result_array(); 
	}
	function update_reservation($reservation_to_approve, $ID)
	{
		$this->db->where('ID', $ID);
		$this->db->update('reserve_tbl', $reservation_to_approve);
	}
	function add_notification($book_ID, $student_ID, $notification_data)
	{
        $this->db->insert('notification_tbl', $notification_data);
    }
	function get_reserve_to_release($transactionID)
	{
		$this->db->where('ID', $transactionID);
		$query = $this->db->get('reserve_tbl');
        return $query->result_array(); 
	}
	function add_to_borrow($data)
	{
		$this->db->insert('borrow_tbl', $data);
	}
	function delete_to_reservation($transactionID)
	{
		$this->db->where('ID', $transactionID);
		$this->db->delete('reserve_tbl');
	}
	function get_most_borrowed_books()
	{
        $this->db->select('*, COUNT(book_ID) as borrow_count');
        $this->db->from('borrow_tbl'); // Replace 'your_table_name' with the actual table name
        $this->db->group_by(['book_ID', 'book_title']);
        $this->db->order_by('borrow_count', 'DESC');
        return $this->db->get()->result();
    }
	function get_most_borrower()
	{
        $this->db->select('borrow_tbl.*, 
                       COUNT(borrow_tbl.student_ID) as borrow_count, 
                       users_tbl.Fname, 
                       users_tbl.MI, 
                       users_tbl.Lname, 
                       users_tbl.Suffix'); // Select required columns
		$this->db->from('borrow_tbl');
		$this->db->join('users_tbl', 'borrow_tbl.student_ID = users_tbl.Student_ID'); // Join with users_tbl
		$this->db->group_by(['borrow_tbl.student_ID']); // Group by student ID
		$this->db->order_by('borrow_count', 'DESC');
		return $this->db->get()->result();
    }
	function approve_borrow($transactionID, $book_borrow)
	{
		$this->db->where('ID', $transactionID);
		$this->db->update('borrow_tbl', $book_borrow);
	}
}