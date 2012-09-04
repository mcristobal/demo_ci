<?php   
class Page extends Model
{
	function Page()
	{	
		parent::Model();	
	}
	
	function getList()
	{
            $this->db->select("link_id, link_name");
            $query = $this->db->get('wp_links');
            return $query->result();			
	}
}
?>