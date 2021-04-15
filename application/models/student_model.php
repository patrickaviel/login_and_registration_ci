<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student_model extends CI_Model{
    function get_student_by_email($email) 
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $values = array($email);     
        return $this->db->query($query,$values)->row_array();
    }
    function add_student($student)
    {
        $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array(
                        $student['first_name'],
                        $student['last_name'],
                        $student['email'],
                        $student['password'],
                        date("Y-m-d, H:i:s"),
                        date("Y-m-d, H:i:s")
                    );
        return $this->db->query($query,$values);
    }
}