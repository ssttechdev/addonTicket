<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addon extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('scanner');
    }
    
    public function check(){
        $chk = "SELECT out_time,wd_time,parking_code FROM parking WHERE parking_code = ?";
        //$check = $this->db->query($chk,array($_POST['credential']));
        $credential = $this->uri->segment(3);
        $check = $this->db->query($chk,array($credential));
        $ret = $check->row();
        if ($ret->out_time == "" && $ret->wd_time == ""){
        $timeOut = strtotime('now');
        $sql = "UPDATE parking SET wd_time = ? WHERE parking_code = ?";
        $query = $this->db->query($sql, array($timeOut,$credential));
        $q_ticket = "SELECT a.parking_code,a.id,b.Total FROM parking as a INNER JOIN ticket as b ON a.id=b.id_parking WHERE parking_code = ? AND type = '1'";
        $dataTicket = $this->db->query($q_ticket,array($credential))->row_array();
        $arr= array();
        if ($query == true){
            $arr['success'] = true;
            $arr['parkingcode'] = $dataTicket['parking_code'];
            $arr['ticketid'] = $dataTicket['id'];
            $arr['amttc'] = $dataTicket['Total'];
            }else{
            $arr['success'] = false;
            }
            echo json_encode($arr);
        }else{
            $arr['success'] = false;
            $arr['uri'] = $credential;
            echo json_encode($arr);
        }
}

    public function wdIn(){
        $dataTicket = array(
            'id_parking' => $this->uri->segment(3),
            'total' => $this->uri->segment(4),
            'created' => strtotime('now'),
        );
        $insert = $this->db->insert('ticket_manipulate', $dataTicket);
        if ($insert){
            echo "TRUE";
        }
    }
    
}