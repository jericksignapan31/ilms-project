<?php 

class borrowdueModel extends CI_Model {

    function get_due_borrow()
    {
        $currentDate = date('m-d-y');
        return $this->db
            ->where('due <', $currentDate)
            ->get('borrow_tbl')
            ->result();
    }
    function getBorrowerNumber($student_ID)
    {
        return $this->db
            ->where('Student_ID', $student_ID)
            ->get('users_tbl')
            ->result();
    }

}