<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gamestalker extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->model('gs_model');

		
	}
	

	public function index()
	{
			$data['message']="";
			$result=$this->gs_model->get_contents();

			foreach ($result as $res) {
				if($res->C_type==1){
					$nid=$res->C_id;
					break;	
				}			
			}
			$newspic=$this->gs_model->get_latest_article_picture($nid);
			$news=$this->gs_model->get_content_by_id($nid);

			foreach ($result as $res) {
				if($res->C_type==2){
					$rid=$res->C_id;
					break;	
				}			
			}
			$revpic=$this->gs_model->get_latest_article_picture($rid);
			$rev=$this->gs_model->get_content_by_id($rid);

			foreach ($result as $res) {
				if($res->C_type==3){
					$wid=$res->C_id;
					break;	
				}			
			}
			$walkpic=$this->gs_model->get_latest_article_picture($wid);
			$walk=$this->gs_model->get_content_by_id($wid);

			$data['news']=$news;
			$data['newspic']=$newspic;
			$data['review']=$rev;
			$data['revpic']=$revpic;
			$data['walk']=$walk;
			$data['walkpic']=$walkpic;

			$this->load->view('homepage',$data);
		}
		 
	

	public function adm_login()
	{
		if(!$this->session->userdata('username')){
		$data['message']='';
		$this->load->view('admloginpage',$data);
		}
		else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}	
	}

	public function adm_home()
	{
		if($this->session->userdata("email")){
			$this->load->view('admhomepage');
		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}
		

	}



	public function login()
    {
    	
    	$data['message'] = '';	
		if($this->session->userdata('email')){
			 redirect('gamestalker/index');
		
		}else if(!$this->session->userdata('email') && $this->input->post('email')){
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass'));
			$result = $this->gs_model->login_check($email,$pass);
			
			if(!empty($result)){
				
				
				//$this->session->set_userdata('ID',$result['ID']);

				if($result['U_status']==0){
					$result['U_type']==2;
					$this->session->set_flashdata('msg','This account is blocked. All priveleges on your account has been disabled.');
				}

				if($result['U_status']==1 || $result['U_status']==2){
					$this->session->set_userdata('email',$result['U_email']);
					$this->session->set_userdata('usertype',$result['U_type']);
					$this->session->set_userdata('username',$result['U_username']);
					$this->session->set_userdata('password',$result['U_password']);
					$this->session->set_userdata('userstatus',$result['U_status']);

					if($result['U_type']==0){
						$this->session->set_userdata('0',$result['U_type']);
						redirect('gamestalker/index');
					}
					if($result['U_type']==1){
						$this->session->set_userdata('1',$result['U_type']);
						redirect('gamestalker/index');
					}
					if($result['U_type']==2){
						$this->session->set_userdata('2',$result['U_type']);
						redirect('gamestalker/index');
					}

				}else{
					$this->session->set_userdata('2',$result['U_type']);
					redirect('gamestalker/index');
				}
			
			}else{
			
				$this->session->set_flashdata('msg', 'Username/Password is incorrect!');
				redirect('gamestalker/index');
			}
		}	
	}

	public function logout(){
		if($this->session->userdata('email')){
			$this->session->sess_destroy();
			redirect('gamestalker/index');
	    }else{
	 		echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}
    }

	public function adm_view_content()
	{
		if($this->session->userdata("email")){
			$data['info']=$this->gs_model->get_contents();
			$this->load->view('adm_content',$data);

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}
	}

	public function adm_view_content_data()
	{
		if($this->session->userdata("email")){
			
			$id=$this->uri->segment(3);
			$data['info']=$this->gs_model->get_content_by_id($id);
			$data['picture']=$this->gs_model->get_content_pictures_by_id($id);
			$this->load->view('adm_content_data',$data);

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}


	}

	public function view_content_data()
	{

		$id=$this->uri->segment(3);
		
		

		$data['info']=$this->gs_model->get_content_by_id($id);
		$data['picture']=$this->gs_model->get_content_pictures_by_id($id);
		
		$this->load->view('content_data',$data);
		
	}

	public function view_news()
	{
		$data['info']=$this->gs_model->get_contents();
		$this->load->view('news',$data);

	}

	public function view_walkthroughs()
	{
		$data['info']=$this->gs_model->get_contents();
		$this->load->view('walkthroughs',$data);
	}

	public function view_reviews()
	{
		$data['info']=$this->gs_model->get_contents();
		$this->load->view('reviews',$data);
	}

	public function view_users()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<1&&$this->session->userdata('userstatus')==1){
			$username = $this->session->userdata('username');
			$data['username'] = $username;	
			$id = $this->session->userdata('ID');
	     	$data['ID'] = $id;
			
	    	$data['info'] = $this->gs_model->get_users();
	    	//$data['information'] = $this->gs_model->get_student_data($id);
	    	$this->load->view('viewusers',$data);

        }else{
			echo "<script>alert('Restricted Access.');</script>";
		    echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}
	}

	public function user_registration()
	{
		$this->load->view('registration');
	}

	public function adm_user_registration()
	{
		$data['message']="";
		$this->load->view('adm_registration',$data);

	}

	public function register_user()
	{

		$data['message']="";
			
		$data = array(
				  'U_username'=>$this->input->post("uname"),
				  'U_password'=>md5($this->input->post("password")),
				  'U_type'=>$this->input->post("usertype"),
				  'U_email'=>$this->input->post("email"),
				  'U_status'=>$this->input->post("userstatus")
				);	
			
		$chk = $this->gs_model->check_user($data);
		$lchk= $this->gs_model->check_userEmail($data);
			
		if($chk==0&&$lchk==0){
			$this->gs_model->insert_user($data);
			$data['message']="User successfully registered!";
			
		}else{
			$data['message']="The username/email already exists!";
			
		}
			$this->session->set_flashdata('msg',$data['message']);
			redirect('gamestalker/index');
		 

	}


	public function adm_register_user()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<2&&$this->session->userdata('userstatus')==1){
			$data['message']="";
			
			$data = array(
				   'U_username'=>$this->input->post("uname"),
				   'U_password'=>md5($this->input->post("password")),
				   'U_type'=>$this->input->post("utype"),
				   'U_email'=>$this->input->post("email"),
				   'U_status'=>$this->input->post("ustatus")
					);	
			
			$chk = $this->gs_model->check_user($data);
			$lchk= $this->gs_model->check_userEmail($data);
			
			if($chk==0&&$lchk==0){
				$this->gs_model->insert_user($data);
				$data['message']="User successfully registered!";
				$this->load->view('adm_registration',$data);
			}else{
				$data['message']="The username/email already exists!";
				$this->load->view('adm_registration',$data);
			}
			
		}else{	 		
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}

	}

	public function edit_user()
	{   
		$data['message']="";
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<1&&$this->session->userdata('userstatus')==1){
			$username=$this->uri->segment(3);
			$data['info']=$this->gs_model->get_user_by_username($username);
			$this->load->view('adm_update_registration',$data);
		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}	


	}

	public function edit_user_dash()
	{   
		$data['message']="";
		
			$username=$this->uri->segment(3);
			$data['info']=$this->gs_model->get_user_by_username($username);
			$user=$data['info'];
			foreach ($user as $user ) {
				$type=$user->U_type;
			}
			$this->session->set_userdata('usertype',$type);
			if($this->session->userdata('usertype')==2){
				$this->load->view('update_normal',$data);
			}else{
				$this->load->view('update_power',$data);
			}
			// $this->load->view('adm_update_registration',$data);
		
			
			


	}

	public function edit_user_by_email()
	{   
		$data['message']="";
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<3&&$this->session->userdata('userstatus')==1){
			$email=$this->uri->segment(3);
			$data['info']=$this->gs_model->get_user_by_email($username);
			
			if($this->session->userdata('usertype')==2){
				$this->load->view('update_normal',$data);
			}else{
				$this->load->view('update_power',$data);
			}
			// $this->load->view('adm_update_registration',$data);
		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}	


	}

	public function edit_user_status()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<1&&$this->session->userdata('userstatus')==1){

			$username=$this->uri->segment(3);
			$status=$this->uri->segment(4);
			
			if($status==0){
				$status=1;
			}else{
				$status=0;
			}

			$result=$this->gs_model->get_user_by_username($username);
			foreach($result as $a){
				 $joined=$a->U_dateRegistered;
			}
			$data = array(
				   'U_status'=>$status,
				   'U_dateRegistered'=>$joined
					);
			$this->gs_model->update_status($username,$data);
			redirect('gamestalker/view_users');

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}


	}


	public function edit_user_conreq()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<1&&$this->session->userdata('userstatus')==1){

			$username=$this->uri->segment(3);
			$reply=$this->uri->segment(4);
			$status=1;

			if($reply=='approve'){
				$type=1;	
			}else{
				$type=2;
			}

			$result=$this->gs_model->get_user_by_username($username);
			foreach($result as $a){
				 $joined=$a->U_dateRegistered;
			}
			$data = array(
				   'U_type'=>$type,
				   'U_status'=>$status,
				   'U_dateRegistered'=>$joined
					);
			$this->gs_model->update_status($username,$data);
			redirect('gamestalker/view_users');

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}


	}


	public function edit_content()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<2&&$this->session->userdata('userstatus')==1){
			$data['message']="";
			$id = $this->uri->segment(3);
			$data['info']=$this->gs_model->get_content_by_id($id);
			$this->load->view('edit_content',$data);
		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}


	}



	public function deleteComment(){
		$this->gs_model->delete_Comment($this->uri->segment(3));
	
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
		
		
	}

	public function editComment(){
		
		$id=$this->uri->segment(3);
		$retVal=$this->gs_model->getComment($id);
		$this->gs_model->delete_Comment($id);
		$ret ="";
		foreach ($retVal as $c){
			$ret=$c->Co_content;
		}
		
		
		echo $ret;
	}


	public function delete_content()
	{

		if($this->session->userdata("email")){

			$id=$this->uri->segment(3);
			
			$this->gs_model->delete_content($id);
			$this->gs_model->delete_content_picture($id);
			redirect('gamestalker/adm_view_content');

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}

	}


	public function create_article_page()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<2&&$this->session->userdata('userstatus')==1){
			$data['message']="";
			$this->load->view('add_article',$data);

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}

	}

	public function storeComment(){

if($this->session->userdata('email')&&$this->session->userdata('usertype')<=2&&$this->session->userdata('userstatus')==1){
			$data['message']="";

		$db_data = array(
								
				   				 'Co_content'=>$this->input->post("body"),
				   				 'U_username'=>$this->session->userdata("username"),
				  				  'C_id'=>$this->uri->segment(3)
				  				 
								 );
		if(!empty($db_data['Co_content'])){

		$this->gs_model->insertComment($db_data);
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
		//$this->load->view("view_content_data/".$this->uri->segment(3).".php");
	}
}else{
	$data['message']="Please log in to comment";
	
}
	}

	public function create_article()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<2&&$this->session->userdata('userstatus')==1){
			$data['message']="";

			$title=$this->input->post("atitle");
			$titleCheck=$this->gs_model->check_articleTitle($title);
			if($titleCheck==0){

				$db_data = array(
								 'C_title'=>$this->input->post("atitle"),
				   				 'C_type'=>$this->input->post("atype"),
				  				 'C_description'=>$this->input->post("adesc"),
				  				 'U_username'=>$this->session->userdata("username")
								 );

				$ret=$this->gs_model->insert_article($db_data);
				$coninfo=$this->gs_model->get_content_by_title($title);
					
				foreach ($coninfo as $con) {
					$id=$con->C_id;
				}
				
				if(!empty($_FILES['userfile']['name'][0])){
				
					$files=$_FILES['userfile'];

					$uploaded=Array();
					$failed=Array();
					$allowed=Array('jpg','png');

					foreach ($files['name'] as $position => $file_name) {
						$file_tmp=$files['tmp_name'][$position];
						$file_size=$files['size'][$position];
						$file_error=$files['error'][$position];
					
						$file_ext=explode('.',$file_name);
						$file_ext=strtolower(end($file_ext));
					
						if(in_array($file_ext,$allowed)){

							if($file_error===0){
								if($file_size <= 2097152){
								
									$file_name_new=$this->input->post("atitle").uniqid('',true).'.'.$file_ext;
									$file_destination='assets/images/uploads'.$file_name_new;

									if(move_uploaded_file($file_tmp,$file_destination)){
										$uploaded[$position]=$file_destination;
										$picture_data=array(
														'CP_filename'=>$file_name_new,
														'CP_dir'=>$uploaded[$position],
														'C_id'=>$id
														);
										$this->gs_model->insert_article_picture($picture_data);
									}else{
										$failed[$position]="[{$file_name}] failed to upload. Error code {$file_error}";
									}
								}else{
									$failed[$position]="[{$filename}] exceeds specified limit.";
								}

							}else{
								$failed[$position]="[{$file_name}] failed to upload. Error code {$file_error}";	 
							}

						}else{
							$failed[$position]="[{$file_name}] file extension '{$file_ext}' is not allowed";
						}
					}

					#if(!empty($uploaded)){
					#	print_r($uploaded);
					#}


					#if(!empty($failed)){
					#	print_r($failed);
					#}

				}else{

				}


				



			

			if($ret){
				$data['message']="Article submission successful.";
				$this->load->view('add_article',$data,array('error' => ' ' ));
			}

			}else{
				$data['message']="The article title already exists. Please try again.";
				$this->load->view('add_article',$data);
			}
			

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}


	}

	public function add_comment()
	{
		if($this->session->userdata('email')&&$this->session->userdata('usertype')<2&&$this->session->userdata('userstatus')==1){
			$data['message']="";

				$db_data = array(
								 
				   				 'U_username'=>$this->input->post("atype"),
				  				 'Co_content'=>$this->input->post("cdesc"),
				  				 'Co_date'=>$this->session->userdata("username"),
				  				 'C_id'=>$this->uri->segment(3)
								 );

			}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}


	}


	public function update_user()
	{

		if($this->session->userdata('usertype')<3){
			$username=$this->uri->segment(3);
			$res=$this->gs_model->get_user_by_username($username);
			
			foreach ($res as $res) {
				$joined=$res->U_dateRegistered;
				$type=$res->U_type;
				$status=$res->U_status;
				$dbusername=$res->U_username;
				$dbemail=$res->U_email;
				
			}
			$data['U_username']=$username;
			$data['U_email']=$this->input->post("email");
			$check=$this->gs_model->check_user($data);
			$echeck=$this->gs_model->check_userEmail($data);
			
			$data = array(
						'U_username'=>$this->input->post("uname"),
				   		
				   		'U_type'=>$this->input->post("utype"),
				   		'U_email'=>$this->input->post("email"),
				   		'U_status'=>$this->input->post("ustatus"),
				   		'U_dateRegistered'=>$joined
						);
			
			$doto = array(
						'U_username'=>$this->input->post("uname")

						);
		

			if(($check<2&&$echeck<2)||($type!=$this->input->post("utype"))){
				$this->gs_model->updateComments($username,$doto);
				$this->gs_model->update_status($username,$data);
				$this->session->set_flashdata('msg','User successfully updated.');
				$this->session->set_userdata('username',$doto['U_username']);
				redirect("gamestalker/index");
			}else{
				 $this->session->set_flashdata('msg','Username/Email already exists.');
				 redirect("gamestalker/index");
				 
			}
			
			// if($this->session->userdata('usertype')>1){
			// 	redirect("gamestalker/index");
			// }else{
			// 	redirect("gamestalker/view_users");
			// }
			
			
			

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";	
		}

	}

	public function update_user_view(){
		if($this->session->userdata('email')){
			$this->load->view("user_update_info");
		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";	
		}
	}

	

	public function update_article()
	{

		if($this->session->userdata("email")){
			$id=$this->uri->segment(3);
			$result=$this->gs_model->get_content_by_id($id);
			foreach ($result as $result) {
				$date=$result->C_date;;
			}
			$data = array(
						  'C_id'=>$id,
						  'C_title'=>$this->input->post("atitle"),
				   		  'C_type'=>$this->input->post("atype"),
				   		  'C_description'=>$this->input->post("adesc"),
				   		  'C_date'=>$date
						);
			$this->gs_model->update_content($id,$data);
			redirect('gamestalker/adm_view_content');

		}else{
			echo "<script>alert('Login is required.');</script>";
			echo "<meta http-equiv=Refresh content=0;url=../gamestalker/index>";
		}

	}

	

		

	

	public function send_mail()
	{
		
    	$config = Array(
  				'protocol' => 'smtp',
  				'smtp_host' => 'ssl://smtp.googlemail.com',
  				'smtp_port' => 465,
  				'smtp_user' => 'gamestalker.mailer@gmail.com', // change it to yours
  				'smtp_pass' => 'gsmailer', // change it to yours
  				'mailtype' => 'html',
  				'charset' => 'iso-8859-1',
  				'wordwrap' => TRUE
                );

		

      $message = 'http://localhost/gs/index';
      $this->load->library('email', $config);
      $email=$this->input->post("email");
      $result=$this->gs_model->email_check($email);
      $user=$this->gs_model->get_user_by_email($email); 
    
      if(!empty($user)){
      foreach ($user as $user) {
      	$username=$user->U_username;
      	echo "It went here";
      }
	  }else{
	  	
     		$data['message']="We're having a little problem sending your info reset link. Please try again later.";
     		
     		
	  }

      if(!empty($result)){
     	
      	$message="Click this link to update your account http://localhost/gs/gamestalker/edit_user_dash/".$username;
      	$this->email->set_newline("\r\n");
     	$this->email->from('gamestalker.mailer@gmail.com'); // change it to yours
      	$this->email->to($email);// change it to yours
      	$this->email->subject('You must update your account information.');
      	$this->email->message($message);
      
      	

        if($this->email->send()){
      		$data['message']="Info reset link sent. Please check your mail.";
     	}else{
     		show_error($this->email->print_debugger());
     		$data['message']="We're having a little problem sending your info reset link. Please try again later.";
    	}

      }else{
      
      	$data['message']="Email doesn't exist.";
      	
      }

      $this->session->set_flashdata('msg',$data['message']);
      redirect('gamestalker/index');
	}

}