<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$result['data'] = $this->model->getUsername($email);
				$this->load->view('home', $result);
			}
			else
			{
				$this->load->view('index');
			}
		}
		else
		{
			$this->load->view('index');
		}
	}
	function login_page()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$result['data'] = $this->model->getUsername($email);
				$this->load->view('home', $result);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Welcome/index'));
	}
	function home()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$result['data'] = $this->model->getUsername($email);
				
				$data = $this->model->get_user($email);

				if (!empty($data)) {
					$firstRow       = $data[0]; // Get the first row
					$student_ID   	= $firstRow['Student_ID']; // column name
					$result['notification'] = $this->model->get_all_notification($student_ID);
					$this->load->view('home', $result);
				}
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function notification()
	{
		$email = $_SESSION['user_Email'];
		$this->load->model('model');
		$data = $this->model->get_user($email);

		if (!empty($data)) {
			$firstRow       = $data[0]; // Get the first row
			$student_ID   = $firstRow['Student_ID']; // column name

			$result['notification'] = $this->model->get_notification($student_ID);
			$this->load->view('subpage/notification/notification', $result);
		}
	}
	function view_notification()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$book_ID = $this->uri->segment(3);
				$notification_ID = $this->uri->segment(4);
				$email = $_SESSION['user_Email'];
				$this->load->model('model');

				$data = array(
					'status'             => 'read',
				);

				$this->model->updateNotification($notification_ID, $data);
				$result['data'] = $this->model->getUsername($email);
				$result['notification_view'] = $this->model->get_book_expired($book_ID);

				$data = $this->model->get_user($email);

				if (!empty($data)) {
					$firstRow       = $data[0]; // Get the first row
					$student_ID   = $firstRow['Student_ID']; // column name

					$result['notification'] = $this->model->get_all_notification($student_ID);
					$this->load->view('subpage/notification/notification', $result);
				}

				$this->load->view('home', $result);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function library($page = 1)
	{
		$limit = 10;  // Number of records per page
        $offset = ($page - 1) * $limit;  // Offset for the query

		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];

				$this->load->model('model');
				$data['results'] = $this->model->getBooks($limit, $offset);
				$data['total_rows'] = $this->model->getTotalRows();
				$data['page'] = $page;
        		$data['limit'] = $limit;
				$data['result'] = $this->model->getBooks2($limit, $offset);
				$data['data'] = $this->model->getUsername($email);

				// Load the view
				$this->load->view('subpage/library', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	
	function ebooks()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['ebooks'] = $this->model->getActiveEbooks();
				$data['data'] = $this->model->getUsername($email);

				$this->load->view('subpage/ebooks', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	
	function show_all_borrowable_books()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['results'] = $this->model->get_all_available_books();
				$data['data'] = $this->model->getUsername($email);

				$this->load->view('subpage/all_borrowable', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function borrowing()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$student_ID = $this->uri->segment(3);
				$this->load->model('model');
				$data['result'] = $this->model->getUsername($email);
				$data['results'] = $this->model->getBorrowed($student_ID);
				$data['reserve'] = $this->model->getReserved($student_ID);
				$this->load->view('subpage/borrowing', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function show_all_books()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$student_ID = $this->uri->segment(4);
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['total_borrowed'] = $this->model->getTotalBorrowed($student_ID);
				$data['results'] = $this->model->get_all_books();
				$data['data'] = $this->model->getUsername($email);

				$this->load->view('subpage/all_books', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function view_book($page = 1)
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$book_ID    = $this->uri->segment(3);
			$student_ID = $this->uri->segment(4);
			$status 	= $_SESSION['Portal_login_Status'];
			$limit = 10;  // Number of records per page
        	$offset = ($page - 1) * $limit;  // Offset for the query
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['results'] = $this->model->view_book($book_ID);
				$data['total_borrowed'] = $this->model->getTotalBorrowed($student_ID);
				$data['total_rows'] = $this->model->getTotalRows();
				$data['page'] = $page;
        		$data['limit'] = $limit;
				$data['result'] = $this->model->view_book2($book_ID, $limit, $offset);
				$data['data'] = $this->model->getUsername($email);

				$this->load->view('subpage/view-book/view-book', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	
	function view_ebook()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$ebook_ID   = $this->uri->segment(3);
			$student_ID = $this->uri->segment(4);
			$status 	= $_SESSION['Portal_login_Status'];
			
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['ebook'] = $this->model->get_ebook($ebook_ID);
				$data['data'] = $this->model->getUsername($email);
				
				// Increment view count
				$this->model->increment_ebook_views($ebook_ID);

				$this->load->view('subpage/view_ebook', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	
	function view_book_all_books($page = 1)
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$book_ID    = $this->uri->segment(3);
			$student_ID = $this->uri->segment(4);
			$status 	= $_SESSION['Portal_login_Status'];
			$limit = 10;  // Number of records per page
        	$offset = ($page - 1) * $limit;  // Offset for the query
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['results'] = $this->model->view_book($book_ID);
				$data['total_borrowed'] = $this->model->getTotalBorrowed($student_ID);
				$data['total_rows'] = $this->model->getTotalRows();
				$data['page'] = $page;
        		$data['limit'] = $limit;
				$data['result'] = $this->model->view_book_all($book_ID, $limit, $offset);
				$data['data'] = $this->model->getUsername($email);

				$this->load->view('subpage/view-book/view-book-all-books', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function getToBorrow($page = 1)
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$book_ID    = $this->uri->segment(3);
			$student_ID = $this->uri->segment(4);
			$status 	= $_SESSION['Portal_login_Status'];
			$limit = 10;  // Number of records per page
        	$offset = ($page - 1) * $limit;  // Offset for the query
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['results'] = $this->model->view_book($book_ID);
				$data['total_borrowed'] = $this->model->getTotalBorrowed($student_ID);
				$data['total_rows'] = $this->model->getTotalRows();
				$data['page'] = $page;
        		$data['limit'] = $limit;
				$data['result'] = $this->model->view_book2($book_ID, $limit, $offset);
				$data['data'] = $this->model->getUsername($email);
				$data['toBorrow'] = $this->model->view_book($book_ID);

				$this->load->view('subpage/view-book/view-book', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function getToRead($page = 1)
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$book_ID    = $this->uri->segment(3);
			$student_ID = $this->uri->segment(4);
			$status 	= $_SESSION['Portal_login_Status'];
			$limit = 10;  // Number of records per page
        	$offset = ($page - 1) * $limit;  // Offset for the query
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['results'] = $this->model->view_book($book_ID);
				$data['total_borrowed'] = $this->model->getTotalBorrowed($student_ID);
				$data['total_rows'] = $this->model->getTotalRows();
				$data['page'] = $page;
        		$data['limit'] = $limit;
				$data['result'] = $this->model->get_all_books($book_ID, $limit, $offset);
				$data['data'] = $this->model->getUsername($email);
				$data['toRead'] = $this->model->view_book($book_ID);

				$this->load->view('subpage/view-book/view-book-all-books', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function getToReserve($page = 1)
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$book_ID    = $this->uri->segment(3);
			$student_ID = $this->uri->segment(4);
			$status 	= $_SESSION['Portal_login_Status'];
			$limit = 10;  // Number of records per page
        	$offset = ($page - 1) * $limit;  // Offset for the query
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['results'] = $this->model->view_book($book_ID);
				$data['total_borrowed'] = $this->model->getTotalBorrowed($student_ID);
				$data['total_rows'] = $this->model->getTotalRows();
				$data['page'] = $page;
        		$data['limit'] = $limit;
				$data['result'] = $this->model->get_all_books($book_ID, $limit, $offset);
				$data['data'] = $this->model->getUsername($email);
				$data['toReserve'] = $this->model->view_book($book_ID);

				$this->load->view('subpage/view-book/view-book-all-books', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
    function cancel_reservation()
    {
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
			$email = $_SESSION['user_Email'];
			$student_ID = $this->uri->segment(3);
			$book_ID 	= $this->uri->segment(4);
			$this->load->model('model');
			$data['result'] = $this->model->getUsername($email);
			$data['results'] = $this->model->getBorrowed($student_ID);
			$data['reserve'] = $this->model->getReserved($student_ID);
			$data['toCancel'] = $this->model->view_toCancelReserve($book_ID);
			$this->load->view('subpage/borrowing', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
    }
	function profile()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$this->load->model('model');
				$data['data'] = $this->model->getUsername($email);

				$this->load->view('subpage/profile', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
	function virtual_ID()
	{
		if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['user_Email'];
				$student_ID = $this->uri->segment(3);
				$this->load->model('model');
				$data['data'] = $this->model->getUsername($email);
				$this->load->view('subpage/virtual_ID', $data);
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}
}
