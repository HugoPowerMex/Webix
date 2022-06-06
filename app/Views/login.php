<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Webix CSS -->
   <!-- AQUI SE CARGAN LAS LIBERIAS PARA WEBIX  -->
<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/webix.css')?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/CSS/jquery-ui.min.css')?>">
	
	<script src="<?=base_url('/assets/JS/jquery.min.js')?>"></script>
	<script src="<?=base_url('/assets/webix.js')?>"></script>
	<script src="<?=base_url('/assets/JS/sidebar.js')?>"></script>
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <style>
  @import url(//fonts.googleapis.com/css?family=Arvo);
  .webix_view{
  	font-family:Arvo, serif;
    font-size: 20px;
    text-align:center;   
    border:none;
    
  }
  #data_container1{
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  }
</style>
  <body> 
     
</body>

<div id="data_container1" style="margin:auto"></div>
<a href="<?php echo base_url('/registro'); ?>">REGISTRO</a>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a href="/"> Hugo André</a>
  </div>
  </body>

<script>

	var form1 = {
		width: 700, 
		view:"form", 
    id:"form", 
    scroll:false,
		container:"data_container1",
		padding:120,
      	css: { margin:"auto" },
		rows:[
      { 
      type:"header", 
      template:"Login"
    },
		{ view:"text", value:'', label:"Usuario", id:"username", name:"username", labelPosition:"top",placeholder:"Usuario", required:true},
    { view:"text", type:'password', value:'', label:"Contraseña", id:"password", name:"password",  labelPosition:"top",placeholder:"Contraseña", required:true},
    //AQUI VA EL BOTON DE LOGIN
    { view:"button", value: "Login",css:"webix_primary",width: 150, align: "center",type:"form",click:function(){
      console.log('entre a login');
      var x = $$("form").elements["username"].config.value
      var y = $$("form").elements["password"].config.value
      var form = $$("form"); 
      if (this.getParentView().validate()){ 
        iniciarSesion(x,y);
        }
					else
						webix.message({ type:"error", text:"Campos invalidos" });

    }},
        //AQUI VA EL BOTON DE REGISTRO
    { view:"button", width: 150, align: "center", value:"Registrar", click:function(){
  }}
      
	],
  rules:{
				"username":webix.rules.isNotEmpty,
				"password":webix.rules.isNotEmpty
			},
};

function  iniciarSesion(usuario,contrasena){
  var data = $$("form").getValues();
  var json = '{"username":"admin", "password":"123"}';
	webix.ajax().post('<?= current_url('home/login')?>',json,function(result){
    var resp= json;

        console.log(resp);
        if(resp.status){    
            $$("form").clearValidation();
            $$("form").clear();
        }else webix.alert("Error al iniciar sesión");
    });

}

webix.ui(form1);

</script>    
   
</html>


