<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_model {
	function get_user_by_email($email)
	{
		return $this->db->query("SELECT * FROM students WHERE email = ?", array($email))->row_array();
	}

	function add_user($user)
	{
		$query = "INSERT INTO students (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['password']);
		return $this->db->query($query, $values);
	}
}