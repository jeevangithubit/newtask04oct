<?php

/**
 *  Model
 */
class MyModel extends CI_Model
{

    public function insert($table, $data)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function update($table, $data, $where)
    {
        $result = $this->db->where($where)->update($table, $data);
        return $result;
    }
   

    public function delete($table, $where)
   {
        
        if( $this->db->delete($table, $where) )
        {
            return "deleted";
        //  echo    $this->db->last_query();die;

        }
        else
        {
            return false;
        }
        
    }

    
    function get_record($table,$data,$order='')
    {
        $this->db->order_by($order);

        // $this->db->limit($limit);
        
        $query = $this->db->get_where($table,$data);
         if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        } else 
        {
            return array();
        }
       
     }

   
       function get_all_record($table,$where="",$order='',$type="",$limit='',$start="")
    {
        if($limit!='' && $start!='' )
        {
            $this->db->limit($limit,$start);
        }
        else if($limit!='' && $start=='')
        {
            $this->db->limit($limit);
        }
        if($where!='')
        {
          $this->db->where($where);
        }
        if($order!='' && $type!='')
        {
          $this->db->order_by($order,$type);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return array();
        }
    }
    function result_getall() {

    $this->db->select('*');
    $this->db->from('category');
   // $this->db->join('blog', 'blog.category_id = category.id'); 
    $query = $this->db->get();
    return $query->result_array();

}
}