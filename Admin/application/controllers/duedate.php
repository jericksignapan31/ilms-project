<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Duedate extends CI_Controller {

    public function check_due_dates() {
        $this->load->model('DuedateModel');
        
        // Get expired entities
        $expiredEntities = $this->DuedateModel->get_expired_entities();

        foreach ($expiredEntities as $entity) {
            // Add notification
            $this->DuedateModel->add_notification($entity->student_ID, $entity->book_ID);

            // Delete expired entity
            $this->DuedateModel->delete_entity($entity->ID);
        }

        // Return success response
        echo json_encode(['status' => 'success']);
    }

    public function check_due_approval_dates() {
        $this->load->model('DuedateModel');
        
        // Get expired entities
        $expiredEntities = $this->DuedateModel->get_expired_approval_entities();

        foreach ($expiredEntities as $entity) {
            // Add notification
            $this->DuedateModel->add_notification_for_approval($entity->student_ID, $entity->book_ID);
            
            // Delete expired approval
            $this->DuedateModel->delete_expired_approval($entity->ID);
        }

        // Return success response
        echo json_encode(['status' => 'success']);
    }
	
}
