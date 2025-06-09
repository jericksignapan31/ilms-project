<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SmsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Telesign');
    }


    public function get_Due_Borrow()
    {
        $this->load->model('borrowdueModel');
        
        // Get expired entities
        $expiredEntities = $this->borrowdueModel->get_due_borrow();
        
        foreach ($expiredEntities as $entity) {

            $borrowerNumber = $this->borrowdueModel->getBorrowerNumber($entity->student_ID);

            foreach($borrowerNumber as $entityNumber){
                $phone_number = $entityNumber->Contact_Number;

                $message = "The book $entity->book_title that you have borrowed was due on $entity->borrow_date. Please return the book to avoid penalties.";

                $response = $this->telesign->send_sms($phone_number, $message);

                if ($response['status'] == 'error') {
                    echo "Error: " . $response['message'];
                } else {
                    echo "Message sent successfully!";
                }
            }
        }
        
        echo json_encode(['status' => 'Message sent successfully!']);
    }
}
