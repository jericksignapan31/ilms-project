<?php
class DuedateModel extends CI_Model {

    public function get_expired_entities() {
        $currentDate = date('m-d-y');
        return $this->db
            ->where('due <', $currentDate)
            ->get('reserve_tbl')
            ->result();
    }

    public function add_notification($student_ID, $book_ID) {
        $data = [
            'student_ID'    => $student_ID,
            'book_ID'       => $book_ID,
            'message'       => 'Your reservation was removed due to expiration.',
            'notification'  => "Reservation",
            'status'        => '',
        ];
        $this->db->insert('notification_tbl', $data);
    }

    public function delete_entity($ID) {
        $this->db->where('ID', $ID);
		$this->db->delete('reserve_tbl');
    }

    public function get_expired_approval_entities() {
        $currentDate = date('m-d-y');
        return $this->db
            ->where('borrow_date <', $currentDate)
            ->where('Status', 'To Approve')
            ->get('borrow_tbl')
            ->result();
    }

    public function add_notification_for_approval($student_ID, $book_ID) {
        $data = [
            'student_ID'    => $student_ID,
            'book_ID'       => $book_ID,
            'message'       => 'Book borrowing approval was due.',
            'notification'  => "Book borrowing",
            'status'        => '',
        ];
        $this->db->insert('notification_tbl', $data);
    }

    public function delete_expired_approval($ID) {
        $this->db->where('ID', $ID);
		$this->db->delete('borrow_tbl');
    }
}