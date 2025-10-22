<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

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
				'user_Email'=>$uname,
				'Password'=>$password,
				'Portal_login_Status' => "logged",
			);
	
	
			$this->session->set_userdata($session_data);
			redirect(base_url('Auth/home'));
		}
		else
		{
			$this->session->set_flashdata('error','<i class="fa-solid fa-circle-exclamation"></i> Username or password incorrect.');
			redirect(base_url('Auth/login_page'));
		}
    }
    function borrow()
    {
        $student_ID = $this->uri->segment(3);
        $book_ID    = $this->uri->segment(4);

        if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
                $this->load->model('model');
                $status = $this->model->checkBorrowed($book_ID,$student_ID);
                if($status!=false)
                {
                    $this->session->set_flashdata('borrowError','<i class="fa-solid fa-circle-exclamation"></i> You already borrowed a copy of this book.');
			        redirect(base_url('Auth/view_book'));
                }
                else
                {
                    $this->load->model('model');
                    $data = $this->model->get_book($book_ID);

                    if (!empty($data)) {
                        $firstRow       = $data[0]; // Get the first row
                        $accession_no   = $firstRow['accession_no']; // column name
                        $title          = $firstRow['title']; // column name
                        $author         = $firstRow['author']; // column name
                        $edition        = $firstRow['edition']; // column name
                        $thumbnail      = $firstRow['thumbnail']; // column name
            
                        $borrowing_data = array(
                            'student_ID'	    =>$student_ID,
                            'book_ID'	        =>$book_ID,
                            'accession_no'	    =>$accession_no,
                            'book_title'	    =>$title,
                            'author'            =>$author,
                            'edition'	        =>$edition,
                            'thumbnail'	        =>$thumbnail,
                            'borrow_date'	    =>date('m-d-y'),
                            'due'	            =>"",
                            'Status'            =>"To Approve"
                        );

                        $this->model->borrow($borrowing_data);
                        $data = $this->model->get_book_to_borrow($book_ID);

                        if(!empty($data)){
                            $firstRow   = $data[0]; // Get the first row
                            $available    = $firstRow['available'];

                            $new_available = $available - 1;

                            $data = array(
                                'available' =>$new_available,
                            );

                            $this->model->update_book_available($data, $book_ID);
                        }


                        redirect(base_url('Auth/view_book'));
                    }
                    else {
                        echo "No data found.";
                    }
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
    function read()
    {
        $student_ID = $this->uri->segment(3);
        $book_ID    = $this->uri->segment(4);

        if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
                $this->load->model('model');
				$data = $this->model->get_book($book_ID);

                if (!empty($data)) {
                    $firstRow   = $data[0]; // Get the first row
                    $title      = $firstRow['title']; // column name
                    $author     = $firstRow['author']; // column name
                    $edition    = $firstRow['edition']; // column name
                    $thumbnail  = $firstRow['thumbnail']; // column name
        
                    $borrowing_data = array(
                        'student_ID'	    =>$student_ID,
                        'book_title'	    =>$title,
                        'author'            =>$author,
                        'edition'	        =>$edition,
                        'thumbnail'	        =>$thumbnail,
                        'borrow_date'	    =>date('m-d-y'),
                        'due'	            =>date('m-d-y', strtotime('+7 days')),
                        'Status'            =>"Read"
                    );

                    $this->model->borrow($borrowing_data);
                    $data = $this->model->get_book_to_borrow($book_ID);

                    if(!empty($data)){
                        $firstRow   = $data[0]; // Get the first row
                        $available    = $firstRow['available'];

                        $new_available = $available - 1;

                        $data = array(
                            'available' =>$new_available,
                        );

                        $this->model->update_book_available($data, $book_ID);
                    }


                   redirect(base_url('Auth/view_book'));
                } else {
                    echo "No data found.";
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
    function reserve()
    {
        $student_ID = $this->uri->segment(3);
        $book_ID    = $this->uri->segment(4);

        if(isset($_SESSION['Portal_login_Status']))
		{
			$status = $_SESSION['Portal_login_Status'];
			if($status == "logged")
			{
                $this->load->model('model');
				$data = $this->model->get_book($book_ID);

                if (!empty($data)) {
                    $firstRow       = $data[0]; // Get the first row
                    $accession_no   = $firstRow['accession_no']; // column name
                    $title          = $firstRow['title']; // column name
                    $author         = $firstRow['author']; // column name
                    $edition        = $firstRow['edition']; // column name
                    $thumbnail      = $firstRow['thumbnail']; // column name
        
                    $borrowing_data = array(
                        'book_ID'	        =>$book_ID,
                        'student_ID'	    =>$student_ID,
                        'accession_no'	    =>$accession_no,
                        'book_title'	    =>$title,
                        'author'            =>$author,
                        'edition'	        =>$edition,
                        'thumbnail'	        =>$thumbnail,
                        'reserve_date'	    =>date('m-d-y'),
                        'due'	            =>date('m-d-y', strtotime('+7 days')),
                        'status'	        =>"Waiting"
                    );

                    $this->model->reserve($borrowing_data);
                    redirect(base_url('Auth/show_all_books'));
                }
                else
                {
                    echo "No data found.";
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
    function search()
    {
        $email = $_SESSION['user_Email'];
        $this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_search_results($search_query);
        $data['data'] = $this->model->getUsername($email);
        $this->load->view('subpage/all_books', $data);
    }
    function searchBorrowable()
    {
        $email = $_SESSION['user_Email'];
        $this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_search_all_borrowable_results($search_query);
        $data['data'] = $this->model->getUsername($email);
        $this->load->view('subpage/all_borrowable', $data);

    }
    function update_user()
    {
        $student_ID         = $this->uri->segment(3);
        $file_name          = $_FILES['file-upload']['name'];
        $lname              = $this->input->post('lname');
		$fname              = $this->input->post('fname');
        $suffix             = $this->input->post('suffix');
		$MI                 = $this->input->post('MI');
        $address            = $this->input->post('address');
		$contact_Number     = $this->input->post('contact_Number');
        $course             = $this->input->post('course');
		$year               = $this->input->post('year');
        $section            = $this->input->post('section');
		$birthdate          = $this->input->post('birthdate');
        $email              = $this->input->post('email');
		$password           = $this->input->post('password');

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && substr($email, -10) === '@gmail.com')
        {
            if(isset($_POST['submit']))
            {
                // Check if file was uploaded
                if(empty($_FILES['file-upload']['name']))
                {
                    // No file uploaded - update without profile image
                    $data = array(
                        'Fname'             => $fname,
                        'Lname'             => $lname,
                        'Suffix'            => $suffix,
                        'MI'                => $MI,
                        'Address'           => $address,
                        'Email'             => $email,
                        'Password'          => $password,
                        'Contact_Number'    => $contact_Number,
                        'Year'              => $year,
                        'Course'            => $course,
                        'Section'           => $section,
                        'Birthdate'         => $birthdate,
                    );

                    $this->load->model('model');
                    $this->model->update_user($data, $student_ID);
                    redirect(base_url('Auth/logout'));
                }
                else
                {
                    // File uploaded - process upload
                    $config['allowed_types']  = 'jpg|jpeg|png';
                    $config['upload_path']    = './assets/image/uploads/';
                    $config['encrypt_name']   = false;
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('file-upload'))
                    {
                        $data = array(
                            'profile'           => $file_name,
                            'Fname'             => $fname,
                            'Lname'             => $lname,
                            'Suffix'            => $suffix,
                            'MI'                => $MI,
                            'Address'           => $address,
                            'Email'             => $email,
                            'Password'          => $password,
                            'Contact_Number'    => $contact_Number,
                            'Year'              => $year,
                            'Course'            => $course,
                            'Section'           => $section,
                            'Birthdate'         => $birthdate,
                        );
                        $this->load->model('model');
                        $this->model->update_user($data, $student_ID);
                        redirect(base_url('Auth/logout'));
                    }
                    else
                    {
                        // Upload failed
                        $this->session->set_flashdata('erroremail', '<i class="fa-solid fa-circle-exclamation"></i> ' . $this->upload->display_errors());
                        redirect(base_url('Auth/profile'));
                    }
                }
            }
            else
            {
                echo ("wala na set ang post");
            }
        }
        else
        {
            $this->session->set_flashdata('erroremail','<i class="fa-solid fa-circle-exclamation"></i> The email must be a Gmail address (e.g., example@gmail.com).');
			redirect(base_url('Auth/profile'));
        }
    }
    function searchToReserve()
    {
        $email = $_SESSION['user_Email'];
        $this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_search_results($search_query);
        $data['result'] = $this->model->getUsername($email);
        $this->load->view('subpage/reservation', $data);
    }
    function cancel_reservation()
    {
        $ID = $this->uri->segment(3);
        $this->load->model('model');
		$this->model->cancel_reservation($ID);
		redirect(base_url('Auth/borrowing'));
    }

	function increment_ebook_download($ID)
	{
		$this->load->model('model');
		$this->model->increment_ebook_downloads($ID);
		
		// Return success response
		echo json_encode(['status' => 'success']);
	}
}
