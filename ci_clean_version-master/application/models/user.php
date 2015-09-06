<?php
class user extends CI_Model
{
	public function add($info)
	{
		var_dump($info);
		$query='INSERT INTO users(email, password, alias, first_name, last_name) VALUES (?,?,?,?,?)';
		$values=array($info['email'], md5($info['password']), $info['alias'], $info['first_name'], $info['last_name']);
		$this->db->query($query, $values);
		$this->session->set_flashdata('sucess', 'you have been sucessfully registered please signin');
		redirect('/books/registermessage');
	}
	public function getdata($info)
	{
		return $this->db->query('SELECT users.id, users.alias FROM users WHERE email = ? AND password = ?', array($info['email'], md5($info['password'])))->result_array();
	}
	public function addbook($info)
	{
		$id=$this->session->userdata('info');
		$query = 'INSERT INTO books(name, author, users_id) VALUES (?,?,?)';
		$values= array($info['title'], $info['author'], $id[0]['id']);
		return $this->db->query($query, $values);
	}
	public function bookid($info)
	{
		return $this->db->query('SELECT books.id FROM books WHERE name=? AND author =?', array($info['title'], $info['author']))->row_array();
	}
	public function addreview($bookid, $info)
	{	
		$userid=$this->session->userdata('info');
		$query = 'INSERT INTO reviews(review, rating, created_at, users_id, books_id) VALUES (?,?,NOW(),?,?)';
		$values= array($info['review'], $info['rating'], $userid[0]['id'], $bookid['id']);
		return $this->db->query($query, $values);
	}
	public function allauthors()
	{
		return $this->db->query('SELECT books.author FROM books')->result_array();
	}
	public function allbooks()
	{
		return $this->db->query('SELECT books.name, books.author, books.id FROM books')->result_array();
	}
	public function getmaxid()
	{
		return $this->db->query('SELECT MAX(id) FROM books')->row_array();
	}
	public function lastthree($id)
	{
		
		$query = 'SELECT books.id, books.name, books.author, reviews.review, reviews.rating, reviews.created_at, users.alias
				  FROM users
				  LEFT JOIN books
				  ON users.id = books.users_id
				  LEFT JOIN reviews
				  ON books.id = reviews.books_id
				  WHERE books.id = ?
				  OR books.id = ?
				  OR books.id = ?';
		$values = array( ($id['MAX(id)']-2),($id['MAX(id)']-1),$id['MAX(id)']);		
		return $this->db->query($query, $values)->result_array();  
	}
	public function getreview($id)
	{
		return $this->db->query('SELECT reviews.review, reviews.rating, reviews.created_at, users.alias, users.id FROM reviews LEFT JOIN users ON users.id = reviews.users_id WHERE books_id = ?', array($id))->result_array();

	}
	public function userinfo($id)
	{
		return $this->db->query('SELECT users.alias, users.first_name, users.last_name, users.email FROM users  WHERE users.id = ?' , array($id))->result_array();
	}
	public function totalreviews($id)
	{
		return $this->db->query('SELECT COUNT(review) FROM reviews WHERE reviews.users_id= ?', array($id))->row_array();
	}
	public function getreviewbyuser($id)
	{
		return $this->db->query('SELECT reviews.review FROM reviews WHERE reviews.users_id = ?', array($id))->result_array();
	}
}

?>