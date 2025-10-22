<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function login()
	{
		$uname = $this->input->post('Email');
		$password = $this->input->post('Password');
	
		$this->load->model('model');
		$status = $this->model->checkAuthentication($uname,$password);
		if($status!=false)
		{
			$usename = $status->username;
			$pass = $status-> email;
	
			$session_data = array(
				'Email'=>$uname,
				'Password'=>$password,
				'login_Status' => "logged",
			);
	
	
			$this->session->set_userdata($session_data);
			redirect(base_url('Auth/home'));
		}
		else
		{
			$this->session->set_flashdata('error','<i class="fa-solid fa-circle-exclamation"></i> Username or password incorrect.');
			redirect(base_url('Welcome/index'));
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Welcome/index'));
	}
	function backToHome()
	{
		$this->load->view('home');
	}
	function home()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$email = $_SESSION['Email'];
				$this->load->model('model');
			    $result['data'] = $this->model->getUsername($email);
				$this->load->view('home',$result);
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
	function settings()
	{	
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$emp_ID = $_SESSION['Email'];
				$this->load->model('model');
				$result['data'] = $this->model->getUsername($emp_ID);
				$this->load->view('settings', $result);
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
	function Set_Sem()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->view('Set_Semister');
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
	function books()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getBooks();
				// Load the view
				$this->load->view('books', $data);
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
	function archieve_book()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getArchieveBooks();
				
				// Load the view
				$this->load->view('subpage/archieve_book', $data);
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
	function add_book( )
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
			// Fetch data from model
			$data['results'] = $this->model->getBooks();
			
			// Load the view
			$this->load->view('subpage/add_book', $data);
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
	function update_book()
	{
        if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getBooks();
				
				// Load the view
				$this->load->view('subpage/update_book', $data);
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
	function delete_book()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getBooks();
				
				// Load the view
				$this->load->view('subpage/delete_book', $data);
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
	function getBookToDelete()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getArchieveBooks();
				$data['toDelete'] = $this->model->getBookToDelete($this->uri->segment(3));
		
				// Load the view
				$this->load->view('subpage/archieve_book', $data);
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
	function getBookToArchieve()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getBooks();
				$data['toDelete'] = $this->model->getBookToDelete($this->uri->segment(3));
		
				// Load the view
				$this->load->view('subpage/delete_book', $data);
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
	function members()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getMembers();
				
				// Load the view
				$this->load->view('members', $data);
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
	function add_members()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getMembers();
				
				// Load the view
				$this->load->view('subpage/add_member', $data);
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
	function update_members()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getMembers();
				
				// Load the view
				$this->load->view('subpage/update_member', $data);
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
	function delete_members()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getMembers();
				
				// Load the view
				$this->load->view('subpage/delete_member', $data);
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
	function borrow()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getborrowedbooks();
				
				// Load the view
				$this->load->view('subpage/borrow', $data);
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
	function reserve()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getresevebooks();
				
				// Load the view
				$this->load->view('subpage/reserve', $data);
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
	
	function borrow_approval()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->gettoapprove();
				
				// Load the view
				$this->load->view('subpage/borrow_approval', $data);
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
	function getBookToRestore()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				// Fetch data from model
				$data['results'] = $this->model->getArchieveBooks();
				$data['toRestore'] = $this->model->getRestoreBook($this->uri->segment(3));
		
				// Load the view
				$this->load->view('subpage/archieve_book', $data);
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
	function most_borrowed_books() {
		$this->load->model('model');
        $data['most_borrowed_books'] = $this->model->get_most_borrowed_books();
        $this->load->view('reports_most_borrowed', $data);
    }
	function most_borrower() {
		$this->load->model('model');
		$data['most_borrowers'] = $this->model->get_most_borrower();
		$this->load->view('reports_most_borrower', $data);
    }

	// E-BOOK MANAGEMENT FUNCTIONS
	function ebooks()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				$data['results'] = $this->model->getEbooks();
				$this->load->view('ebooks', $data);
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

	function add_ebook()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				$data['results'] = $this->model->getEbooks();
				$this->load->view('subpage/add_ebook', $data);
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

	function update_ebook()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				$data['results'] = $this->model->getEbooks();
				$this->load->view('subpage/update_ebook', $data);
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

	function delete_ebook()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				$data['results'] = $this->model->getEbooks();
				$this->load->view('subpage/delete_ebook', $data);
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

	function archive_ebook()
	{
		if(isset($_SESSION['login_Status']))
		{
			$status = $_SESSION['login_Status'];
			if($status == "logged")
			{
				$this->load->model('model');
				$data['results'] = $this->model->getArchivedEbooks();
				$this->load->view('subpage/archive_ebook', $data);
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
}
