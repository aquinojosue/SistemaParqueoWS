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
        $this->load->helper('url');
        $this->load->helper("file");
        $this->load->database();
    }
    public function alldata_get(){
        $all_data = [
            "ubicacion" =>  $this->db->get("ubicacion")->result(),
            "parqueo" =>  $this->db->get("parqueo")->result(),
            "usuario" =>  $this->db->get("usuario")->result(),
            "comentario" =>  $this->db->get("comentario")->result(),
            "calificacion" =>  $this->db->get("calificacion")->result(),
            "imagen" => $this->db->get("imagen")->result()
        ];
        $this->response($all_data, 200);

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
            $data = $this->db->get_where("parqueo",['id_parqueo'=>$id_parqueo])->result_array();
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

    /// INICIO BLOQUE DE COMENTARIO ///
    //Obtener un arreglo de parqueos o un parqueo en especifico.
    public function comentario_get($id_comentario = 0){
        if(empty($id_comentario)){
            $data = $this->db->get("comentario")->result();
        }else{
            $data = $this->db->get_where("comentario",['id_comentario'=>$id_comentario])->result_array();
        }
        if(!empty($data)){
            $this->response($data, 200);   
        } else{
            $this->response(['mensaje' => 'No se encontro el dato.'],404);
        }
    }

    //Ingresar una nueva ubicacion
    public function comentario_post(){
        $input = $this->input->post();
        $this->db->insert('comentario',$input);
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1', 'id_comentario' => $this->db->insert_id()], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
        //$this->db->set($input);
        //$this->db->insert($this->db->dbprefix . 'ubicacion');
    }

    //Actualizar una ubicacion.
    public function comentario_put($id_comentario){
        $input = $this->put();
        $this->db->update('comentario',$input,array('id_comentario'=>$id_comentario));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    //Eliminar una ubicacion
    public function comentario_delete($id_comentario){
        $this->db->delete('comentario',array('id_comentario'=>$id_comentario));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    /// FIN DEL BLOQUE DE COMENTARIO ///
    /// INICIO DEL BLOQUE DE CALIFICACION ///
    public function calificacion_get($id_calificacion = 0){
        if(empty($id_calificacion)){
            $data = $this->db->get("calificacion")->result();
        }else{
            $data = $this->db->get_where("calificion",['id_calificacion'=>$id_calificacion])->result_array();
        }
        if(!empty($data)){
            $this->response($data, 200);   
        } else{
            $this->response(['mensaje' => 'No se encontro el dato.'],404);
        }
    }

    //Ingresar una nueva ubicacion
    public function calificacion_post(){
        $input = $this->input->post();
        $this->db->insert('calificacion',$input);
        if($this->db->affected_rows() > 0)
        {
            $q = $this->db->get_where("calificacion",['id_calificacion'=>$this->db->insert_id()]);
            $this->response(['resultado' => '1','insertado' => $q->row()], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
        //$this->db->set($input);
        //$this->db->insert($this->db->dbprefix . 'ubicacion');
    }

    //Actualizar una ubicacion.
    public function calificacion_put($id_calificacion){
        $input = $this->put();
        $this->db->update('calificacion',$input,array('id_calificacion'=>$id_calificacion));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    //Eliminar una ubicacion
    public function calificacion_delete($id_calificacion){
        $this->db->delete('calificacion',array('id_calificacion'=>$id_calificacion));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }
    /// FIN DEL BLOQUE DE CALIFICACION ///
    /// INICIO DEL BLOQUE DE USUARIO ///
    public function usuario_get($usuario = 0){
        if(empty($usuario)){
            $data = $this->db->get("usuario")->result();
        }else{
            $data = $this->db->get_where("usuario",['usuario'=>$usuario])->result_array();
        }
        if(!empty($data)){
            $this->response($data, 200);   
        } else{
            $this->response(['mensaje' => 'No se encontro el dato.'],404);
        }
    }

    //Ingresar una nueva ubicacion
    public function usuario_post(){
        $input = $this->input->post();
        $this->db->insert('usuario',$input);
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
    public function usuario_put($usuario){
        $input = $this->put();
        $this->db->update('usuario',$input,array('usuario'=>$usuario));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    //Eliminar una ubicacion
    public function usuario_delete($usuario){
        $this->db->delete('usuario',array('usuario'=>$usuario));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }
    /// FIN DEL BLOQUE DE USUARIO ///
    /// INICIO DEL BLOQUE DE IMAGEN ///
    public function imagen_get($id_imagen = 0){
        if(empty($id_imagen)){
            $data = $this->db->get("imagen")->result();
        }else{
            $data = $this->db->get_where("imagen",['id_imagen'=>$id_imagen])->result_array();
        }
        if(!empty($data)){
            $this->response($data, 200);   
        } else{
            $this->response(['mensaje' => 'No se encontro el dato.'],404);
        }
    }

    //Ingresar una nueva ubicacion
    public function imagen_post(){
        $input = $this->input->post();
        $this->db->insert('imagen',$input);
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
    public function imagen_put($id_imagen){
        $input = $this->put();
        $this->db->update('imagen',$input,array('id_imagen'=>$id_imagen));
        if($this->db->affected_rows() > 0)
        {
            $this->response(['resultado' => '1'], 200);
        }else{
            $this->response(['resultado' => '0'], 200);
        }
    }

    //Eliminar una ubicacion
    public function imagen_delete($id_imagen){
        //Primero obtendre los datos de la imagen, para poder borrarla de los archivos.
        $resultado = array('resultado' => 0);        
        $data = $this->db->get_where("imagen",['id_imagen'=>$id_imagen])->result_array();
        if(!empty($data)){
            $archivo = FCPATH . "assets/" . $data[0]['filename'];
            $path = realpath($archivo);
            unlink($path);
            $this->db->delete('imagen',array('id_imagen'=>$id_imagen));
            if($this->db->affected_rows() > 0){
                $resultado = array('resultado' => 1);
            }
        }
        $this->response($resultado, 200);
    }

    public function imagenupload_put(){
        $resultado = array('resultado' => 0);   
        //Valores esperados = base64

        $input = $this->put();
        if(array_key_exists('id_ubicacion',$input)){
            $imagen = base64_decode($input['base64']);
            $image_name = md5(uniqid(rand(), true));
            $filename = $image_name . '.' . $input['extension'];
            $path = FCPATH . "assets/";
            file_put_contents($path . $filename, $imagen);
            $date = date('Y-m-d H:i:s');
            $valores_insertar = array(
                'fecha_imagen' => $date,
                'filename' => $filename,
                'id_ubicacion' => $input['id_ubicacion'],
                'es_galeria' => $input['es_galeria']);
            $this->db->insert("imagen",$valores_insertar);
            if($this->db->affected_rows() > 0)
            {
                $q = $this->db->get_where("imagen",['id_imagen'=>$this->db->insert_id()]);
                $resultado = array('resultado' => 1, 'imagen_insertada' => $q->row());
            }
        }
        $this->response($resultado, 200);
    }
    /// FIN DEL BLOQUE DE IMAGEN ///
}
