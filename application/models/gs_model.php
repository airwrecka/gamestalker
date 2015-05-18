
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GS_model extends CI_Model
{
	function __construct() 
	{
	  parent::__construct();
	}

	function insert_user($data)
	{
		$ival=$this->db->insert('user',$data);

		if($ival>0){
			return 1;
		}else{
			return 0;
		}
	}

	function delete_Comment($comId){
		$this->db->where('Co_id',$comId);
		$this->db->delete('comment');

	}

	function insert_article($data)
	{
		$ival=$this->db->insert('content',$data);

		if($ival>0){
			return 1;
		}else{
			return 0;
		}
	}

	function insert_article_picture($data)
	{
		$ival=$this->db->insert('content_picture',$data);

		if($ival>0){
			return 1;
		}else{
			return 0;
		}
	}
	function insertComment($data){

		if(!empty($_POST)){

			
			$this->db->insert('comment',$data);
		}else{

			echo 'comment is empty';
		}

	}

	function getComments($id){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('C_id',$id);
		$this->db->order_by('Co_date','desc');
		$info = $this->db->get();

		return $info->result();
	}

	function getComment($id){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('Co_id',$id);
		$info = $this->db->get();

		return $info->result();
	}


	function get_users()  
	{
		$this->db->select('*');
		$this->db->from('user');

        $info = $this->db->get();

		return $info->result();
	}

	function get_contents()
	{
		$this->db->select('*');
		$this->db->from('content');
		$this->db->order_by("C_date","desc");
        $info = $this->db->get();

		return $info->result();
	}


	function get_latest_article_picture($id)
	{
		$this->db->select('*')->from('content_picture')->where("C_id",$id)->limit(1);
		$info=$this->db->get();
		return $info->result();
	}



	function get_content_pictures()
	{
		$this->db->select('*');
		$this->db->from('content_picture');
        $info = $this->db->get();

		return $info->result();
	}

	function get_content_pictures_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('content_picture');
		$this->db->where('C_id',$id);
        $info = $this->db->get();

		return $info->result();
	}

	function get_content_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where('C_id',$id);
		$coninfo=$this->db->get();
		return $coninfo->result();
	}

	function get_content_by_title($title)
	{
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where('C_title',$title);
		$coninfo=$this->db->get();
		return $coninfo->result();
	}

	function get_user_by_username($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('U_username',$username);
		$uinfo=$this->db->get();
		return $uinfo->result();
	}

	function get_user_by_email($email)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('U_email',$email);
		$uinfo=$this->db->get();
		return $uinfo->result();
	}

	public function check_user($data){
		
		$this->db->where(array('U_username'=>$data['U_username']));
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return 1;
		}
		else{
			return 0;

	}
}

	public function check_userEmail($data){
		$this->db->where(array('U_email'=>$data['U_email']));
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return 1;
		}
		else{

			return 0;
		}
	}

	public function check_articleTitle($title){
		$this->db->where('C_title',$title);
		$query = $this->db->get('content');
		if($query->num_rows()>0){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function login_check($email,$pass)
	{
		$this->db->where('U_email',$email);
		$this->db->where('U_password',$pass);
		$res = $this->db->get('user');
		return $res->row_array();
	}

	public function email_check($email)
	{
		$this->db->where('U_email',$email);
		$res = $this->db->get('user');
		return $res->row_array();
	}

	public function retrieve_user($email)
	{

		$sqlquery="SELECT U_username FROM users WHERE email='".$email."'LIMIT 1";
		$result=$this->db->query($sqlquery);
		return $row=$result->row;

	}

	public function update_content($id,$data)
	{

	   $this->db->where('C_id',$id);
   	   $this->db->update('content',$data);

	}

	public function update_status($username,$data)
	{

	   $this->db->where('U_username',$username);
   	   $this->db->update('user',$data);



	}

	public function updateComments($username,$doto)
	{
	
	   $this->db->where('U_username',$username);
   	   $this->db->update('comment',$doto);
	}

	public function delete_content($id)
	{
		$this->db->where('C_id',$id);
		$this->db->delete('content');

	}
	public function delete_content_picture($id)
	{
		$this->db->where('C_id',$id);
		$this->db->delete('content_picture');

	}

}

	
