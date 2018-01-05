<?php
// you have to configure database from config/database.php
	class Games_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		
		public function create_game($img){
		//	$slug = url_title($this->input->post('title'));// i keep it to learn how to use variable
			$data = array(
			    'link'   => $this->input->post('link'),
			    'name'   => $this->input->post('name'),
			    'url'    => url_title($this->input->post('name')),
			    'img' => $img

			//	'slug' => $slug, // i keep it to learn how to use variable
			//	'user_id' => $this->session->userdata('user_id'), // i will use it later
			//	'post_image' => $post_image // use this to add file later
			);
			return $this->db->insert('games', $data);
		}
		
		public function create_first_keyword($g_id){
			$data = array(
			    'g_id'     => $g_id,
			    'keyword'   => $this->input->post('name'),
			    'url_title' => url_title($this->input->post('name')),
			    'level' => 1
			);
			return $this->db->insert('keywords', $data);
		}
		
		public function create_category($g_id){
			$data = array(
			    'g_id'     => $g_id,
			    'keyword'   => $this->input->post('category'),
			    'url_title' => url_title($this->input->post('url')),
			    'level' => 3
			);
			return $this->db->insert('keywords', $data);
		}
		
		public function create_more_category($g_id,$url_title,$name){
			$data = array(
			    'g_id'     => $g_id,
			    'keyword'   => $name,
			    'url_title' => $url_title,
			    'level' => 3
			);
			return $this->db->insert('keywords', $data);
		}
		
		public function create_keyword($g_id,$level){
			$data = array(
			    'g_id'     => $g_id,
			    'keyword'   => $this->input->post('keyword'),
			    'url_title' => url_title($this->input->post('name')),
			    'level' => $level
			);
			return $this->db->insert('keywords', $data);
		}
		


		public function get_games(){
				$this->db->order_by('gameid', 'DESC');  
				$this->db->select('*');
	     		$this->db->join('keywords', 'keywords.g_id = gameid', 'left'); // https://stackoverflow.com/questions/28589529/why-mysqls-left-join-is-returning-null-records-when-with-where-clause
	     		$this->db->group_by('keywords.g_id');// add group_by
				$query = $this->db->get('games');
				return $query->result_array();
	
		}
		
		public function get_game($id = FALSE){
				
			$this->db->select('*');
	     		$this->db->join('keywords', 'keywords.g_id = gameid', 'left');
			$query = $this->db->get_where('games', array('gameid' => $id));
			return $query->row_array();
	
		}
		
		public function get_game_byname($name = FALSE){
				
			$this->db->select('*');
	     		$this->db->join('keywords', 'keywords.g_id = gameid', 'left');
	     		
			$query = $this->db->get_where('games', array('url_title' => $name , 'level' => 1));
			return $query->row_array();
	
		}
		
		public function get_game_by_keyword($key = FALSE){
				
			$this->db->select('*');
	     		$this->db->join('keywords', 'keywords.g_id = gameid', 'left');
	     		
			$query = $this->db->get_where('games', array('url_title' => $key , 'level' => 2));
			return $query->row_array();
	
		}
		
		public function get_keywords2($post_idw){
			$query = $this->db->get_where('keywords', array('g_id' => $post_idw));
			return $query->result_array();
		}
		//keywords3
		public function get_category($post_idw){
			$query = $this->db->get_where('keywords', array('keyid' => $post_idw));
			return $query->row_array();
		}
		
		public function get_categories(){
			$this->db->select('*');
	     	//$this->db->join('keywords', 'keywords.g_id = gameid', 'left');
	     	$this->db->group_by('keyword');
			$query = $this->db->get_where('keywords', array('level' => 3));
			//$query = $this->db->get('games');
			return $query->result_array();
		}
		
		public function get_games_in_categor($key = FALSE){
			$this->db->select('*');
	     	$this->db->join('keywords', 'keywords.g_id = gameid', 'left');
	     	$this->db->group_by('name');
			$query = $this->db->get_where('games', array('url_title' => $key , 'level' => 3));
		
			return $query->result_array();
		}
		
		public function get_files($post_idw){
			$query = $this->db->get_where('games', array('gameid' => $post_idw));
			return $query->result_array();
		}

		public function delete_game($id){
			// $image_file_name = $this->db->select('img')->get_where('games', array('gameid' => $id))->row()->img;
			// $cwd = getcwd(); // save the current working directory
			// $image_file_path = $cwd."\\assets\\images\\games\\";
			// chdir($image_file_path);
			// unlink($image_file_name);
			// chdir($cwd); // Restore the previous working directory
			
			//	$this->db->select('*');
	     //	$this->db->join('keywords', 'keywords.g_id = gameid', 'left');
			$this->db->where('gameid', $id);
			$this->db->delete('games');
			$this->db->where('g_id', $id);
			$this->db->delete('keywords');
			return true;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function get_files1($post_idw){
			$query = $this->db->get_where('files', array('worker_id' => $post_idw));
			return $query->result_array();
		}
		public function get_file($post_idw){
			$query = $this->db->get_where('files', array('worker_id' => $post_idw));
			return $query->row_array(0);
		}
		
		public function delete_worker($id){
			$this->db->where('id', $id);
			$this->db->delete('worker');
			$this->db->where('worker_id', $id);
			$this->db->delete('files');
			
			return true;
		}
		
		
		public function get_worker_toDeleteFile($post_id){
			$query = $this->db->get_where('files', array('f_id' => $post_id));
			return $query->row();
		}
		
		
		
	
		public function delete_file($id){
			$this->db->where('f_id', $id);
			$this->db->delete('files');
			return true;
		}
		
	    public function update_file($id,$name,$default){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
	
			$data = array(
			    'file' => $name,
			    'default' => $default
			);
			$this->db->where('f_id', $id);
			return $this->db->update('files', $data);
		}
		
		
		
	
		
		public function update_worker(){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
		//	$slug = url_title($this->input->post('title'));
			$data = array(
			    'name'     => $this->input->post('name'),
			    'mobile'   => $this->input->post('mobile'),
			    'workerID' => $this->input->post('workerID'),
			    'idDate'   => $this->input->post('idDate'),
				'passport_no'   => $this->input->post('passport_no'),
			    'passport_date'   => $this->input->post('passport_date'),
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('worker', $data);
		}
		
		
		
		public function get_property($id = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){
				$this->db->order_by('property.id', 'DESC'); // there is an `id` in both tables (posts & categories) so we have to define wich table -- so we add posts.id 
				$this->db->select('*, property.id AS p_id');
				$this->db->select('files.id AS f_id');
	     		$this->db->join('files', 'files.property_id = property.id', 'left'); // https://stackoverflow.com/questions/28589529/why-mysqls-left-join-is-returning-null-records-when-with-where-clause
	     		$this->db->group_by('files.property_id');// add group_by
				$query = $this->db->get('property');
				return $query->result_array();
			}

				$this->db->select('*, property.id AS p_id');
				$this->db->select('files.id AS f_id');
	     		$this->db->join('files', 'files.property_id = property.id', 'left'); 
		//	$query = $this->db->get_where('property', array('property.id' => $id));
			$query = $this->db->get_where('property', array('property_id' => $id));
			return $query->row_array();
		}
		
		public function delete_property($id){
			$this->db->where('id', $id);
			$this->db->delete('property');
			$this->db->where('property_id', $id);
			$this->db->delete('files');
			$this->db->where('post_id', $id);
			$this->db->delete('comments');
			return true;
		}
		
	
	
	}