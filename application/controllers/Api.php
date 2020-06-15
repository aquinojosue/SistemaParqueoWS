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

    //Obtener un arreglo de ubicaciones o una ubicacion en especifico.
    public function ubicacion_get($id = 0){
        //Treamos el parametro id con get.

        if(empty($id)){
            $data = $this->db->get("ubicacion")->result();
        }else{
            $data = $this->db->get_where("ubicacion",['id_ubicacion'=>$id])->result_array();
        }
        if(!empty($data)){
            $this->response($data, 200);   
        } else{
            $this->response(['mensaje' => 'No se encontro el dato.'],404);
        }
    }

    //Ingresar una nueva ubicacion
    public function ubicacion_post(){
        $input = $this->input->post();
        $this->db->insert('ubicacion',$input);
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
        //$this->db->set($input);
        //$this->db->insert($this->db->dbprefix . 'ubicacion');
    }

    //Actualizar una ubicacion.
    public function ubicacion_put($id_ubicacion){
        $input = $this->put();
        $this->db->update('ubicacion',$input,array('id_ubicacion'=>$id_ubicacion));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    //Eliminar una ubicacion
    public function ubicacion_delete($id_ubicacion){
        $this->db->delete('ubicacion',array('id_ubicacion'=>$id_ubicacion));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    /// FIN DEL BLOQUE DE UBICACION //

    /// INICIO DEL BLOQUE DE PARQUEO ///


    //Obtener un arreglo de parqueos o un parqueo en especifico.
    public function parqueo_get($id_parqueo = 0){
        if(empty($id_parqueo)){
            $data = $this->db->get("parqueo")->result();
        }else{
            $data = $this->db->get_where("parqueo",['id_parqueo'=>$id])->result_array();
        }
        if(!empty($data)){
            $this->response($data, 200);   
        } else{
            $this->response(['mensaje' => 'No se encontro el dato.'],404);
        }
    }

    //Ingresar una nueva ubicacion
    public function parqueo_post(){
        $input = $this->input->post();
        $this->db->insert('parqueo',$input);
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
        //$this->db->set($input);
        //$this->db->insert($this->db->dbprefix . 'ubicacion');
    }

    //Actualizar una ubicacion.
    public function parqueo_put($id_parqueo){
        $input = $this->put();
        $this->db->update('parqueo',$input,array('id_parqueo'=>$id_parqueo));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    //Eliminar una ubicacion
    public function parqueo_delete($id_parqueo){
        $this->db->delete('parqueo',array('id_parqueo'=>$id_parqueo));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }
    /// FIN DEL BLOQUE DE PARQUEO ///
}