<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Pos no me sirvio composer tons aqui se va a ir xd
require(APPPATH.'/libraries/RestController.php');
require(APPPATH.'/libraries/Format.php');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
    }
    /// INICIO BLOQUE UBICACION ///
    public function ubicacion_get(){
        //Treamos el parametro id con get.
        $id = $this->get('id');

        if($id === null){
            $data = $this->db->get("ubicacion")->result();
        }else{
            $data = $this->db->get_where("ubicacion",['id_ubicacion'=>$id])->row_array();
        }

        $this->response($data, 200);
    }

    public function ubicacion_post(){
        $input = $this->input->post();
        $this->db->insert('ubicacion',$input);
        //$this->db->set($input);
        //$this->db->insert($this->db->dbprefix . 'ubicacion');
        $this->response(['resultado' => '1'], 200);
    }

    public function ubicacion_put($id_ubicacion){
        $input = $this->put();
        $this->db->update('ubicacion',$input,array('id_ubicacion'=>$id_ubicacion));
        $this->response(['resultado' => '1'], 200);
    }

    public function ubicacion_delete($id_ubicacion){
        $this->db->delete('ubicacion',array('id_ubicacion'=>$id_ubicacion));
        $this->response(['resultado' => '1'], 200);
    }

    /// FIN DEL BLOQUE DE UBICACION //
}