<?php 

class loginmodel extends CI_model
{

	public function isvalidated($username, $password)
	{


	# $q=$this->db->query("select * from users where username=$username and password=$password");
	# if(count($q)->rows()))
    #   {
    #   	return true
   #    }
    # else
    ## {
    # 	return false;
    # }

    $q=$this->db->where(['username'=>$username, 'password'=>$password])
	             ->get('users');
#echo "<pre>";
#	             print_r($q->row());
	            

	 if($q->num_rows())
	 {
	 	return $q->row()->id;

	 }
	 else 
	 {
	 	return False;
	 }

	}

	public function articleList($limit,$offset)
	{
		$id=$this->session->userdata('id');
		$this->db->order_by("id", "asc");
		$q=$this->db->select('',3,3)
				 ->from('articles')
				 ->where(['user_id'=>$id])
				 ->limit($limit,$offset)
				 ->get();
				 return $q->result();

	}

	public function num_rows()
	{
		$id=$this->session->userdata('id');
		$this->db->order_by("id", "asc");
		$q=$this->db->select()  //select('',3,3)
				 ->from('articles')
				 ->where(['user_id'=>$id])
				 ->get();
				 return $q->num_rows();
	}

	public function find_article($articleid)
	{
		$q=$this->db->select(['article_title','article_body','id'])
					->where('id',$articleid)
					->get('articles');
					return $q->row();
	}

	public function saverecords($data)
	{
		$this->db->insert('articles',$data);
		return true;
	}

	public function update_article($articleid, Array $article)
	{

		//$this->db->update('articles',$article,['id'=>3,'']);
		return $this->db->where('id',$articleid)
				        ->update('articles',$article);
		return true;
	}

	public function deleterecords($id)
	{
		return $this->db->delete('articles',['id'=>$id]);
	}

}


?>