<?php

  
// Use echo keyword to display result


namespace App\Controllers;
use App\Models\Usuarios;

class Home extends BaseController
{
    
    
    public function index()
    {
     
        $mensaje = session('mensaje');
        return view('login', ["mensaje" => $mensaje]);

    }

    public function registro()
    {
        return view('registro');
    }

    public function inicio()
    {
        return view('inicio');
    }

    public function save(){
		$data =  $this->input->post();
		$tabla = $data['tabla'];
		unset($data['tabla']);
		$respuesta = $this->Produccion_m->guardar($data,$tabla);
		$this->json($respuesta);
	}


	function json($data){
		header("Content-type: application/json; charset-utf-8");
		echo json_encode($data);
	}

    public function login(){
        echo "Open console and check";
  
echo '<script>console.log("Welcome to GeeksforGeeks!"); </script>';


   
   
        $usuario= $this-> request->getPost('username');
        $password= $this-> request->getPost('password');

        $Usuario = new Usuarios();

		$datosUsuario = $Usuario->obtenerUsuario(['usuario' => $usuario]);

        if (count($datosUsuario) > 0 && 
        password_verify($password, $datosUsuario[0]['password'])) {

        $data = [
                    "usuario" => $datosUsuario[0]['usuario'], 
                    "type" => $datosUsuario[0]['type']
                ];

        $session = session();
        $session->set($data);

        return redirect()->to(base_url('/inicio'))->with('mensaje','1');

    } else {
        return redirect()->to(base_url('/'))->with('mensaje','0');
    }




    }
}
