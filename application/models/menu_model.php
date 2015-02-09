<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Abdul Gofur
  Email  : abdul.createit@gmail.com
  @2015

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */

class Menu_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_header_menu($group_id){
		$this->db->select('*, um.description as deskripsi')
                ->from('user_menu_access uma')
				->join('user_group ug', 'ug.user_group_id = uma.id_user_group')
				->join('user_menu um', 'um.user_menu_id = uma.id_user_menu')
                ->where('um.position', 'HEADER')
				->where('uma.id_user_group', $group_id)
				->where('uma.menu_access', '1')
				->where('um.state', '1');
        $query = $this->db->get();
        $res = $query->result();
		//echo $this->db->last_query(); 
        return $res;
	}
	
	function get_sub_header_menu($user_menu_id, $user_group_id){
		$this->db->select('*, um.description as deskripsi')
                ->from('user_menu_access uma')
				->join('user_menu um', 'uma.id_user_menu = um.user_menu_id')
				->join('user_group ug', 'ug.user_group_id = uma.id_user_group')
                ->where('um.position', 'HEADER_SUB_MENU')
				->where('um.parent_id', $user_menu_id)
				->where('ug.user_group_id', $user_group_id)
				->where('uma.menu_access', '1')
				->where('um.state', '1');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
	}
	
	function get_list_group(){
		$this->db->select('*')
                ->from('user_group ug');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
	}
	
	function get_list_menu(){
		$this->db->select('*')
                ->from('user_menu um')
				->where('um.state', '1');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
	}
	
	function get_list_menu_access(){
		$this->db->select('*')
                ->from('user_menu_access uma')
				->where('uma.menu_access', '1');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
	}
	
	function get_list_previllages(){
		$this->db->select('*')
                ->from('user_menu_access uma');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
	}
	
	function update($data, $group_id, $menu_id, $table)
	{
		$group_id = (int) $group_id;
		$menu_id = (int) $menu_id;
		$this->db->where('id_user_group', $group_id);
		$this->db->where('id_user_menu', $menu_id);
		$this->db->update($table, $data);
	}
	
	function get_btn_list($group_id){
		$this->db->select('um.url, um.button_id')
                ->from('user_menu_access uma')
				->join('user_menu um','um.user_menu_id = uma.id_user_menu')
				->where('um.position', 'BUTTON')
				->where('uma.id_user_group', $group_id)
				->where('uma.menu_access', '1');
        $query = $this->db->get();
        $res = $query->result();
		//echo $this->db->last_query(); 
        return $res;
	}
	
    /* Function for Initializing Menu - End */
}
