<?php
	class Games extends CI_Controller{


	    public function mainpage(){	
			$data['title'] = 'games';
			$data['games'] = $this->games_model->get_games() ;
			$data['categories'] = $this->games_model->get_categories() ;

			$this->load->view('templates/header', $data);
			$this->load->view('showGames', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function gamepage($slug = NULL){	
			$data['categories'] = $this->games_model->get_categories() ;
			$data['post'] = $this->games_model->get_game_byname($slug);
		//	print_r($data['post']);die();
			$post_id = $data['post']['gameid'];
			$level = $data['post']['level'];
			//	echo url_title($slug) ;die();
			if($level != 1){
				redirect('games/showgame2/'.$slug);
			}
			$data['keywords'] = $this->games_model->get_keywords2($post_id);
		
		//	print_r($data['files']);die();
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post 1');
				redirect('games/mainpage');
			}
			//$data['title'] = $data['post']['name'];
			$data['title'] = $slug;
			$this->load->view('templates/header', $data);
			$this->load->view('showGame', $data);
			$this->load->view('templates/footer');
			
		}
		public function showgame2($slug = NULL){
				//Check login
			 //echo ("$slug");
			 //die();
			$data['post'] = $this->games_model->get_game_by_keyword($slug);
				$post_id = $data['post']['gameid'];
			$data['keywords2'] = $this->games_model->get_keywords2($post_id);
		
		//	print_r($data['files']);die();
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post 2');
				redirect('games/mainpage');
			}
			//$data['title'] = $data['post']['name'];
			$data['title'] = $slug;
			$this->load->view('templates/header', $data);
			$this->load->view('showGame', $data);
			$this->load->view('templates/footer');
		}
		
		public function category_games($cat = NULL){	
				//Check login
		
			$data['title'] = ' games';
			$data['games'] = $this->games_model->get_games_in_categor($cat) ;
		//	print_r($data['games']);die();
			$data['cat'] = $cat;
			$this->load->view('templates/header', $data);
			$this->load->view('viewgames', $data);
			$this->load->view('templates/footer');
		}
		

	public function add(){	
			//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
			$data['categories'] = $this->games_model->get_categories() ;
			$data['title'] = 'Add New Game' ;
			//$data['file']  = $this->property_model->get_files();
	     	//to check if get from database working ---- you can use print_r($data['posts']);
			$this->load->view('templates/header', $data);
			$this->load->view('add', $data);
			$this->load->view('templates/footer');
		}
	
	public function create(){
//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
	        $data['title'] = ' add game';
	        $data['categories'] = $this->games_model->get_categories() ;
	  //      $this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[30]|is_unique[games.name]');
			$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|prep_url');
			$this->form_validation->set_rules('category','Category','trim|required|min_length[1]|max_length[30]');
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('add', $data);
				$this->load->view('templates/footer');
			}else {
    
		         	// Upload Image
						$config['upload_path'] = './assets/images/games';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size'] = '20480';// 20 MB
						$config['max_width'] = '9000';
						$config['max_height'] = '9000';
						$this->load->library('upload', $config);
						
						if($this->upload->do_upload('f1')  ){
							$data = array('upload_data' => $this->upload->data());
							$post_image =$this->upload->data('file_name');
							
						}
					
							
						$this->games_model->create_game($post_image);
						$g_id =	$this->db->insert_id('gameid');
						$this->games_model->create_first_keyword($g_id);
						
						$id =	$this->input->post('category');
						$data['key'] = $this->games_model->get_category($id);
					
						$url_title	= $data['key']['url_title'];
						$name		= $data['key']['keyword'];
						$this->games_model->create_more_category($g_id,$url_title,$name);
						
						// Set message
					    $this->session->set_flashdata('success', 'Added successfuly');
					  
						redirect('games/add');
					}
				}
				
		public function admin(){	
				//Check login
		if(!$this->session->userdata('logged_in_1')){
				redirect('log/login');
			}
			$data['title'] = 'games';
			$data['games'] = $this->games_model->get_games() ;
			$data['categories'] = $this->games_model->get_categories() ;

			$this->load->view('templates/header', $data);
			$this->load->view('view', $data);
			$this->load->view('templates/footer');
		}
		
	
	
		public function view_id($id = NULL ,$slug = NULL){
				//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
			$data['post'] = $this->games_model->get_game($id);
				$post_id = $data['post']['gameid'];
			$data['keywords2'] = $this->games_model->get_keywords2($post_id);
		
		//	print_r($data['files']);die();
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post');//post_updated is an id for the message
				redirect('games/admin');
			}
			//$data['title'] = $data['post']['name'];
			$data['title'] = $slug;
			$this->load->view('templates/header', $data);
			$this->load->view('viewone', $data);
			$this->load->view('templates/footer');
		}
	
		public function view($slug = NULL){
				//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
			$data['categories'] = $this->games_model->get_categories() ;
			$data['post'] = $this->games_model->get_game_byname($slug);
			$post_id = $data['post']['gameid'];
			$level = $data['post']['level'];
			//	echo url_title($slug) ;die();
			if($level != 1){
				redirect('games/view3/'.$slug);
			}
			$data['keywords'] = $this->games_model->get_keywords2($post_id);
		
		//	print_r($data['files']);die();
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post');
				redirect('games/admin');
			}
			//$data['title'] = $data['post']['name'];
			$data['title'] = $slug;
			$this->load->view('templates/header', $data);
			$this->load->view('viewone', $data);
			$this->load->view('templates/footer');
		}
		
		public function view3($slug = NULL){
			//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
			 
			$data['post'] = $this->games_model->get_game_by_keyword($slug);
				$post_id = $data['post']['gameid'];
			$data['keywords2'] = $this->games_model->get_keywords2($post_id);
		
		//	print_r($data['files']);die();
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post');
				redirect('games/admin');
			}
			//$data['title'] = $data['post']['name'];
			$data['title'] = $slug;
			$this->load->view('templates/header', $data);
			$this->load->view('viewone', $data);
			$this->load->view('templates/footer');
		}
		
		
		public function addkeyword(){
//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
	        $data['title'] = ' add keyword';
	  //      $this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('keyword', 'Name', 'required');
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('add', $data);
				$this->load->view('templates/footer');
			}else {
				$g_id =	$this->input->post('gameid');
				$this->games_model->create_keyword($g_id,$level="2");
				// Set message
			    
			    $this->session->set_flashdata('success', 'Added successfuly');
			    $url =	$this->input->post('url');
					redirect($url);
				   }
				}
				
			public function addcategory(){
//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
	        $data['title'] = 'add category';
	 // echo "a"; die();
			//$this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[1]|max_length[30]');
			//$this->form_validation->set_rules('url', 'Url', 'trim|required|min_length[1]|max_length[30]|is_unique[keywords.url_title]');
			$this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[1]|max_length[30]');
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('view', $data);
				$this->load->view('templates/footer');
			}else {
			//	$g_id =	$this->input->post('gameid');
			if($this->input->post('gameid') == null){
				$this->games_model->create_category($g_id = 0);
			}else{
				$this->games_model->create_category($g_id = $this->input->post('gameid'));
			}
				
				
				
				// Set message
			    
			    $this->session->set_flashdata('success', 'Added successfuly');
			  //  $url =	$this->input->post('url');
					redirect('games/admin');
				   }
				}
				
				
			public function add_more_category(){
//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
	        $data['title'] = 'add more category';
	 // echo "a"; die();
	 		$id =	$this->input->post('category');
$data['key'] = $this->games_model->get_category($id);
				$g_id		= $this->input->post('gameid');
				$url_title	= $data['key']['url_title'];
				$name		= $data['key']['keyword'];
		// echo $g_id;
		// echo $url_title;
		// echo $name;
		// echo $id;
		// die();
			
			$this->form_validation->set_rules('category','Category','trim|required|min_length[1]|max_length[30]');
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('add', $data);
				$this->load->view('templates/footer');
			}else {
					$this->games_model->create_more_category($g_id,$url_title,$name);
		
				
				// Set message
			    
			    $this->session->set_flashdata('success', 'Added successfuly');
			  //  $url =	$this->input->post('url');
					redirect('games/admin');
				   }
				}	
				
			public function delete($p_id){
			//Check login
		    if(!$this->session->userdata('logged_in_1')){redirect('log/login');}
		
				$files = $this->games_model->get_files($p_id);
				foreach($files as $file) : 
					 $path_to_file = './assets/images/games/'.$file['img'] ;
					 if($file['img'] != 'noimage.jpg'){
					 	unlink($path_to_file);
					 }
					 	
				endforeach; 
				
				
				$delete = $this->games_model->delete_game($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('success', 'تم الحذف بنجاح');
					redirect('games/admin');
			 	}else{
			 		$this->session->set_flashdata('danger', 'خطأ ! لم يتم الحذف');
				//	redirect('pages/workerviewone/'.$p_id);
						redirect('games/admin');
			 	}
			 
		}
		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
		public function delete1($p_id){
				//Check login
				if(!$this->session->userdata('logged_in_1')){
					$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
					redirect('users/login');
				}
				if($_SESSION['isadmin'] != 1){
					$this->session->set_flashdata('danger', 'خطأ');
					redirect('worker/view/'.$p_id);
				}
				$files = $this->worker_model->get_files($p_id);
				foreach($files as $file) : 
					 $path_to_file = './assets/images/posts/'.$file['file'] ;
					 if($file['file'] != 'noimage.jpg'){
					 	unlink($path_to_file);
					 }
				endforeach; 
				$delete = $this->worker_model->delete_worker($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('success', 'تم الحذف بنجاح');
					redirect('worker/view/'.$p_id);
			 	}else{
			 		$this->session->set_flashdata('danger', 'خطأ ! لم يتم الحذف');
					redirect('pages/workerviewone/'.$p_id);
			 	}
			 
		}
		
		public function edit($id){
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 1){
				$this->session->set_flashdata('danger', 'خطأ');
				redirect('worker/view/'.$id);
			}
			$data['post'] = $this->worker_model->get_worker($id);

			//Check user
			// if($this->session->userdata('user_id') !=  $this->post_model->get_posts_by_id($id)['posts_user_id']){
			// 	redirect('posts');
			// }
		
			$data['files'] = $this->worker_model->get_files($id);
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = 'تعديل البيانات';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/workeredit', $data);
			$this->load->view('templates/footer');
		}
		
		public function update(){
			
			//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 1){
				$this->session->set_flashdata('danger', 'خطأ');
				redirect('/');
			}
		
			$post_id = $this->input->post('id');
			
				$this->worker_model->update_worker();
	            $this->session->set_flashdata('success', 'تم تحديث البيانات بنجاح');//post_updated is an id for the message
				redirect('worker/view/'.$post_id);
			
		}
	
	
		public function add_file(){
				$post_id = $this->input->post('id');
				
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '20480';
				$config['max_width'] = '9000';
				$config['max_height'] = '9000';
				$this->load->library('upload', $config);
				
					$files = $this->worker_model->get_files($post_id);
				if(count($files) > 5){
			 		$this->session->set_flashdata('danger', 'لا يمكنك إضافة المزيد');//post_updated is an id for the message
					redirect('worker/edit/'.$post_id);
			 	}
			 	
				if($this->upload->do_upload('morefile')  ){
					
					$data = array('upload_data' => $this->upload->data());
					$post_image = $this->upload->data('file_name');
					$default = 'notdef';
					$this->worker_model->create_file($post_image,$post_id,$default);
				
				//to delete the name of noimage.jpg after adding file
				 if( $this->worker_model->get_file($post_id)['file'] == 'noimage.jpg'){
				 		$file = $this->worker_model->get_file($post_id);
				 		$fid = $file['f_id'];
				 		$this->worker_model->delete_file($fid);
				 	}
				 	
					$this->session->set_flashdata('success', 'تمت الإضافة بنجاح');//post_updated is an id for the message
					redirect('worker/edit/'.$post_id);
				}else{
					 $error = array('error' => $this->upload->display_errors());
					 $this->session->set_flashdata('danger',$error['error']);//post_updated is an id for the message
					redirect('worker/edit/'.$post_id);
				}
	   //         $this->session->set_flashdata('post_updated', 'Your post has been added');//post_updated is an id for the message
				// redirect('property/view/'.$post_id);
		}
		
		
		
		public function delete_file($id){
			$post_id = $this->worker_model->get_worker_toDeleteFile($id)->worker_id;
			$file_name = $this->worker_model->get_worker_toDeleteFile($id)->file;
			$file_default = $this->worker_model->get_worker_toDeleteFile($id)->default;
			 if( $file_name == "noimage.jpg"){
					$this->session->set_flashdata('danger', 'can not delete this image you can only Add New');
					redirect('worker/edit/'.$post_id);
			 }else{
			 	$files = $this->worker_model->get_files($post_id);
			 	if(count($files) > 1){
			 		$path_to_file = './assets/images/posts/'.$file_name ;
					unlink($path_to_file);
					$this->worker_model->delete_file($id);
			 	}
			 	if(count($files) == 1){
			 		
			 		$file = $this->worker_model->get_file($post_id);
			 		$fid = $file['f_id'];
			 		$fname =  "noimage.jpg";
			 		$default = "noimg";
			 	
			 		$this->worker_model->update_file($fid,$fname,$default);
			 		$path_to_file = './assets/images/posts/'.$file_name ;
					unlink($path_to_file);
			 	}
			 	$this->session->set_flashdata('success', 'تم حذف الصورة بنجاح');
					redirect('worker/edit/'.$post_id);
			 }
		}
	   
		
	}