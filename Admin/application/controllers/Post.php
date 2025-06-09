<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	function updateAdmin()
    {
        $emp_ID = $this->uri->segment(3);
        if(isset($_POST['submit']))
        {
            if(!empty($_FILES['file-upload']['name'] == "")){
                $fname      = $_POST['fname'];
                $lname      = $_POST['lname'];
                $mi         = $_POST['MI'];
                $Email      = $_POST['email'];
                $Password   = $_POST['password'];

                $data = array(
                    'Fname' => $fname,
                    'Lname' => $lname,
                    'MI' => $mi,
                    'Email' => $Email,
                    'Password' => $Password,
                );

                $this->load->model('model');
                $this->model->updateAdmin($data, $emp_ID);
                redirect(base_url('Auth/logout'));
            }
            else
            {
                $config['allowed_types']  = 'jpg|jpeg|png';
                $config['upload_path']    = './assets/image/uploads/';
                $config['encrypt_name']   = false;
                
                $this->load->library('upload', $config);
                if($this->upload->do_upload('file-upload'))
                {
                    $file_name  = $_FILES['file-upload']['name'];
                    $fname      = $_POST['fname'];
                    $lname      = $_POST['lname'];
                    $mi         = $_POST['MI'];
                    $Email      = $_POST['email'];
                    $Password   = $_POST['password'];
                    
                    $data = array(
                        'profile' => $file_name,
                        'Fname' => $fname,
                        'Lname' => $lname,
                        'MI' => $mi,
                        'Email' => $Email,
                        'Password' => $Password,
                    );
                    $this->load->model('model');
                    $this->model->updateAdmin($data, $emp_ID);
                    redirect(base_url('Auth/logout'));
                }
            }
        }
        else
        {
          echo ("wala na set ang post");
        }
    }
    function update_semister()
    {
        $sy     = $_POST['sy'];
        $term   = $_POST['term'];

		$this->load->model('model');
		$status = $this->model->get_term_recorded($sy, $term);
		if($status!=false)
		{
            $this->session->set_flashdata('error','<i class="fa-solid fa-circle-exclamation"></i> School year and semister existing');
			redirect(base_url('Auth/Set_Sem'));
		}
		else
		{

			$set_term_data = array(
			'sy'	=>$sy,
			'term'	=>$term,
		);

		$this->load->model('model');
		$status = $this->model->set_term($set_term_data);
		redirect(base_url('Auth/Set_Sem'));
		}
    }
    function add_book()
	{
        if(isset($_POST['submit']))
        {
            if(!empty($_FILES['file-upload']['name'] == ""))
            {
                $AccessionNumber    = $_POST['AccessionNumber'];
                $DateReceived       = $_POST['DateReceived'];
                $Classification     = $_POST['Classification'];
                $Pages              = $_POST['Pages'];
                $Author             = $_POST['Author'];
                $Title              = $_POST['Title'];
                $Edition            = $_POST['Edition'];
                $Volumes            = $_POST['Volumes'];
                $Published          = $_POST['Published'];
                $Copies             = $_POST['Copies'];
                $available          = $_POST['avilable'];
                $Sourceoffound      = $_POST['Sourceoffound'];
                $Costprice          = $_POST['Costprice'];
                $Year               = $_POST['Year'];
                $remarks            = $_POST['remarks'];

                $this->load->model('model');
                $status_book = $this->model->checkBook($AccessionNumber);
                if($status_book!=false)
                {
                    $this->session->set_flashdata('error-AccessionNumber','<i class="fa-solid fa-circle-exclamation"></i> Accession number existing');
                    redirect(base_url('Auth/add_book'));
                }
                else
                {
                    if($Copies == "")
                    {
                        $Copies = "0";
                    }
                    if($available == "")
                    {
                        $available = "0";
                    }

                    $book_data = array(
                        'accession_no'	    =>$AccessionNumber,
                        'date_received'	    =>$DateReceived,
                        'classification'    =>$Classification,
                        'author'	        =>nl2br($Author),//convert new line to br
                        'title'     	    =>$Title,
                        'edition'	        =>$Edition,
                        'volume'	        =>$Volumes,
                        'pages'	            =>$Pages,
                        'sourceoffund'	    =>$Sourceoffound,
                        'costprice'	        =>$Costprice,
                        'published'	        =>$Published,
                        'copies'	        =>$Copies,
                        'available'	        =>$available,
                        'year'	            =>$Year,
                        'remarks'	        =>$remarks,
                    );

                    $this->load->model('model');
                    $status = $this->model->add_book($book_data);
                    $this->session->set_flashdata('data-saved','<i class="fa-solid fa-circle-check"></i> Book saved');
                    redirect(base_url('Auth/add_book'));
                }
            }
            else
            {
                $config['allowed_types']  = 'jpg|jpeg|png';
                $config['upload_path']    = './assets/image/uploads/thumbnail';
                $config['encrypt_name']   = false;
                
                $this->load->library('upload', $config);
                if($this->upload->do_upload('file-upload'))
                {
                    $file_name          = $_FILES['file-upload']['name'];
                    $AccessionNumber    = $_POST['AccessionNumber'];
                    $DateReceived       = $_POST['DateReceived'];
                    $Classification     = $_POST['Classification'];
                    $Pages              = $_POST['Pages'];
                    $Author             = $_POST['Author'];
                    $Title              = $_POST['Title'];
                    $Edition            = $_POST['Edition'];
                    $Volumes            = $_POST['Volumes'];
                    $Published          = $_POST['Published'];
                    $Copies             = $_POST['Copies'];
                    $available          = $_POST['avilable'];
                    $Sourceoffound      = $_POST['Sourceoffound'];
                    $Costprice          = $_POST['Costprice'];
                    $Year               = $_POST['Year'];
                    $remarks            = $_POST['remarks'];

                    $this->load->model('model');
                    $status_book = $this->model->checkBook($AccessionNumber, $Title);
                    if($status_book=false)
                    {
                        $this->session->set_flashdata('error-AccessionNumber','<i class="fa-solid fa-circle-exclamation"></i> Accession number existing');
                        redirect(base_url('Auth/add_book'));
                    }
                    else
                    {
                        if($Copies == "")
                        {
                            $Copies = "0";
                        }
                        if($available == "")
                        {
                            $available = "0";
                        }

                        $book_data = array(
                            'thumbnail'         => $file_name,
                            'accession_no'	    =>$AccessionNumber,
                            'date_received'	    =>$DateReceived,
                            'classification'    =>$Classification,
                            'author'	        =>nl2br($Author),//convert new line to br
                            'title'     	    =>$Title,
                            'edition'	        =>$Edition,
                            'volume'	        =>$Volumes,
                            'pages'	            =>$Pages,
                            'sourceoffund'	    =>$Sourceoffound,
                            'costprice'	        =>$Costprice,
                            'published'	        =>$Published,
                            'copies'	        =>$Copies,
                            'available'	        =>$available,
                            'year'	            =>$Year,
                            'remarks'	        =>$remarks,
                        );

                        $this->load->model('model');
                        $status = $this->model->add_book($book_data);
                        $this->session->set_flashdata('data-saved','<i class="fa-solid fa-circle-check"></i> Book saved');
                        redirect(base_url('Auth/add_book'));
                    }
                }
            }
        }
        else
        {
          echo ("wala na set ang post");
        }
	}
    function update_book()
    {
        $ID                 = $_POST['ID'];
        $AccessionNumber    = $_POST['AccessionNumber'];
		$DateReceived       = $_POST['DateReceived'];
		$Classification     = $_POST['Classification'];
		$Pages              = $_POST['Pages'];
		$Author             = $_POST['Author'];
		$Title              = $_POST['Title'];
		$Edition            = $_POST['Edition'];
		$Volumes            = $_POST['Volumes'];
		$Published          = $_POST['Published'];
		$Copies             = $_POST['Copies'];
        $available          = $_POST['Available'];
		$Sourceoffound      = $_POST['Sourceoffound'];
		$Costprice          = $_POST['Costprice'];
		$Year               = $_POST['Year'];
		$remarks            = $_POST['remarks'];

        $this->load->model('model');
        $status_book = $this->model->checkBook($Title);
		if($status_book!=false)
		{
            $this->load->model('model');
            $status_book = $this->model->checkBookID($ID);
            if($status_book!=false)
            {
                $this->load->model('model');
                $status_book = $this->model->checkBook($Title);
                if($status_book!=false)
                {
                    $book_data = array(
                        'accession_no'	    =>$AccessionNumber,
                        'date_received'	    =>$DateReceived,
                        'classification'    =>$Classification,
                        'author'	        =>nl2br($Author),//convert new line to br
                        'title'     	    =>$Title,
                        'edition'	        =>$Edition,
                        'volume'	        =>$Volumes,
                        'pages'	            =>$Pages,
                        'sourceoffund'	    =>$Sourceoffound,
                        'costprice'	        =>$Costprice,
                        'published'	        =>$Published,
                        'copies'	        =>$Copies,
                        'available'	        =>$available,
                        'year'	            =>$Year,
                        'remarks'	        =>$remarks,
                        );
        
                        $this->load->model('model');
                        $status = $this->model->Update_book($book_data, $ID);
                        $this->session->set_flashdata('data-update','<i class="fa-solid fa-circle-check"></i> Book Updated');
                        redirect(base_url('Auth/add_book'));
                }
                
                else
                {
                    $this->session->set_flashdata('error-book','<i class="fa-solid fa-circle-exclamation"></i> Book title existing');
                    redirect(base_url('Auth/update_book'));
                }
            }
		}
		else
		{
			$book_data = array(
            'accession_no'	    =>$AccessionNumber,
            'date_received'	    =>$DateReceived,
            'classification'    =>$Classification,
            'author'	        =>nl2br($Author),//convert new line to br
            'title'     	    =>$Title,
            'edition'	        =>$Edition,
            'volume'	        =>$Volumes,
            'pages'	            =>$Pages,
            'sourceoffund'	    =>$Sourceoffound,
            'costprice'	        =>$Costprice,
            'published'	        =>$Published,
            'copies'	        =>$Copies,
            'available'	        =>$available,
            'year'	            =>$Year,
            'remarks'	        =>$remarks,
            );

            $this->load->model('model');
            $status = $this->model->Update_book($book_data, $ID);
            $this->session->set_flashdata('data-update','<i class="fa-solid fa-circle-check"></i> Book Updated');
            redirect(base_url('Auth/update_book'));
		}
    }
    function archieve_book()
    {
        $ID = $this->uri->segment(3);

        $book_data = array(
            'archieve'	    => 'true',
            );

        $this->load->model('model');
        $this->model->archieve_book($ID, $book_data);
        $this->session->set_flashdata('data-update','<i class="fa-solid fa-circle-check"></i> Book Updated');

		redirect(base_url('Auth/delete_book'));
    }
    function delete_book()
    {
        $ID = $this->uri->segment(3);
        $this->load->model('model');
		$this->model->delete_book($ID);
		redirect(base_url('Auth/archieve_book'));
    }
    function add_member()
	{
		$Student_ID     = $_POST['Student_ID'];
		$Fname          = $_POST['Fname'];
		$Lname          = $_POST['Lname'];
		$MI             = $_POST['MI'];
		$Birthdate      = $_POST['Birthdate'];
		$Email          = $_POST['Email'];
		$Contact_Number = $_POST['Contact_Number'];
		$Year           = $_POST['Year'];
		$Course         = $_POST['Course'];
		$Section        = $_POST['Section'];
		$Address        = $_POST['purok'] . ', ' . $_POST['Barangay'] . ', ' . $_POST['City'] . ', ' . $_POST['Province'] . ', ' . $_POST['Region'];

        $this->load->model('model');
        $status_member = $this->model->checkStudentID($Student_ID);
		if($status_member!=false)
		{
            $this->session->set_flashdata('error-AccessionNumber','<i class="fa-solid fa-circle-exclamation"></i> Student ID existing');
			redirect(base_url('Auth/add_members'));
		}
		else
		{
			$this->load->model('model');
            $status_member = $this->model->checkStudentName($Fname, $Lname);
            if($status_member!=false)
            {
                $this->session->set_flashdata('error-book','<i class="fa-solid fa-circle-exclamation"></i> Student name existing existing');
                redirect(base_url('Auth/add_book'));
            }
            else
            {

                $members_data = array(
                'Student_ID'	    =>$Student_ID,
                'Fname'	            =>$Fname,
                'Lname'             =>$Lname,
                'MI'	            =>$MI,
                'Address'     	    =>$Address,
                'Email'	            =>$Email,
                'Password'	        =>$Birthdate,
                'Contact_Number'	=>$Contact_Number,
                'Year'	            =>$Year,
                'Course'	        =>$Course,
                'Section'	        =>$Section,
                'Birthdate'	        =>$Birthdate,
                'profile'           =>"default.jpg"
                );

                $this->load->model('model');
		        $status = $this->model->add_member($members_data);
		        redirect(base_url('Auth/add_members'));
            }
		}
	}
    function update_member()
    {
        $Student_ID     = $_POST['Student_ID'];
		$Fname          = $_POST['Fname'];
		$Lname          = $_POST['Lname'];
		$MI             = $_POST['MI'];
		$Birthdate      = $_POST['Birthdate'];
		$Email          = $_POST['Email'];
		$Contact_Number = $_POST['Contact_Number'];
		$Year           = $_POST['Year'];
		$Course         = $_POST['Course'];
		$Section        = $_POST['Section'];
		$Address        = $_POST['Address'];

        $members_data = array(
            'Student_ID'	    =>$Student_ID,
            'Fname'	            =>$Fname,
            'Lname'             =>$Lname,
            'MI'	            =>$MI,
            'Address'     	    =>$Address,
            'Email'	            =>$Email,
            'Password'	        =>$Birthdate,
            'Contact_Number'	=>$Contact_Number,
            'Year'	            =>$Year,
            'Course'	        =>$Course,
            'Section'	        =>$Section,
            'Birthdate'	        =>$Birthdate,
            );

        $this->load->model('model');
        $status = $this->model->Update_member($members_data, $Student_ID);
        redirect(base_url('Auth/update_members'));
    }
    function delete_members()
    {
        $ID = $this->uri->segment(3);
        $this->load->model('model');
		$this->model->delete_member($ID);
		redirect(base_url('Auth/delete_members'));
    }
    function searchBook()
    {
		$this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_search_results($search_query);
        $this->load->view('books', $data);
    }
    function searchBooktoUpdate()
    {
		$this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_search_results($search_query);
        $this->load->view('subpage/update_book', $data);
    }
    function searchBooktoDelete()
    {
		$this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_search_results($search_query);
        $this->load->view('subpage/delete_book', $data);
    }
    function searchBookBorrowed()
    {
		$this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_borrowed_search_results($search_query);
        $this->load->view('subpage/borrow', $data);
    }
    function searchBookReserved()
    {
		$this->load->model('model');
        $search_query = $this->input->get('search', TRUE);
        $data['results'] = $this->model->get_reserved_search_results($search_query);
        $this->load->view('subpage/reserve', $data);
    }
    function restore_book()
    {
        $ID = $this->uri->segment(3);

        $book_data = array(
            'archieve'	    => '',
            );

        $this->load->model('model');
        $this->model->archieve_book($ID, $book_data);
        $this->session->set_flashdata('data-update','<i class="fa-solid fa-circle-check"></i> Book Updated');

		redirect(base_url('Auth/archieve_book'));
    }
    function returnBook()
    {
        $transactionID = $this->input->get('transaction_ID');
        $book_ID = $this->input->get('b_ID');

        $book_return = array(
            'Status'	    => "returned",
            );

        $this->load->model('model');
        $this->model->returnBook($transactionID, $book_return);

        $status = $this->model->checkReserve($book_ID);
        if($status==false)
		{
            $data = $this->model->get_book_to_add($book_ID);

            if(!empty($data)){
                $firstRow   = $data[0]; // Get the first row
                $available    = $firstRow['available'];

                $new_available = $available + 1;

                $book_add_available = array(
                    'available' =>$new_available,
                );

                $this->model->update_book_available($book_add_available, $book_ID);
                $this->session->set_flashdata('book-returned','<i class="fa-solid fa-circle-check"></i> Book Returned');
                redirect(base_url('Auth/borrow'));
            }
		}
		else
		{
            $data = $this->model->get_reserve_to_approve($book_ID);

            if(!empty($data)){
                $firstRow       = $data[0]; // Get the first row
                $ID             = $firstRow['ID'];
                $student_ID             = $firstRow['student_ID'];

                $reservation_to_approve = array(
                    'status' => 'Reserved',
                );

                $this->model->update_reservation($reservation_to_approve, $ID);

                $notification_data = [
                    'student_ID'    => $student_ID,
                    'book_ID'       => $book_ID,
                    'message'       => 'Your reservation has been approved.',
                    'notification'  => "Reservation",
                    'status'        => '',
                ];

                $this->model->add_notification($book_ID, $student_ID, $notification_data);
        
                $this->session->set_flashdata('book-returned','<i class="fa-solid fa-circle-check"></i> Book Returned, This book has reservation');
                redirect(base_url('Auth/borrow'));
            }
		}
    }
    function release_Reserved()
    {
        $transactionID = $this->input->get('transaction_ID');

        $this->load->model('model');
        $data = $this->model->get_reserve_to_release($transactionID);

        if(!empty($data)){
            $firstRow       = $data[0]; // Get the first row
            $student_ID     = $firstRow['student_ID'];
            $book_ID        = $firstRow['book_ID'];
            $accession_no   = $firstRow['accession_no'];
            $book_title     = $firstRow['book_title'];
            $author         = $firstRow['author'];
            $edition        = $firstRow['edition'];
            $thumbnail      = $firstRow['thumbnail'];

            $data = array(
                'student_ID'    => $student_ID,
                'book_ID'       => $book_ID,
                'accession_no'  => $accession_no,
                'book_title'    => $book_title,
                'author'        => $author,
                'edition'       => $edition,
                'thumbnail'     => $thumbnail,
                'borrow_date'   => date('m-d-y'),
                'due'           => date('m-d-y', strtotime('+7 days')),
                'Status'        => "Borrow",
            );

            $this->load->model('model');
		    $status = $this->model->add_to_borrow($data);
            $this->model->delete_to_reservation($transactionID);
            $this->session->set_flashdata('book-released','<i class="fa-solid fa-circle-check"></i> Book released');
            redirect(base_url('Auth/reserve'));
        }
    }
    function approve_borrow()
    {
        $transactionID = $this->input->get('transaction_ID');

        $book_borrow = array(
            'borrow_date'	    =>date('m-d-y'),
            'due'	            =>date('m-d-y', strtotime('+7 days')),
            'Status'	    => "Borrow",
            );

        $this->load->model('model');
        $this->model->approve_borrow($transactionID, $book_borrow);
        $this->session->set_flashdata('borrow-approved','<i class="fa-solid fa-circle-check"></i> Book borrowing approved.');
        redirect(base_url('Auth/borrow_approval'));
    }
}
