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
    <title>Registro</title>
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
<a href="<?php echo base_url('/index'); ?>">LOGIN</a>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a href="/"> Hugo André</a>
  </div>
<script>
	var form1 = {
		width: 700, 
		view:"form",
    id:'frm',
    scroll:false,
		container:"data_container1",
		padding:120,
      	css: { margin:"auto" },
		rows:[
      { 
      type:"header", 
      template:"Registro"
    },
	{ view:"text", value:'', label:"Ingresa tu nombre de usuario", name: "usuario", labelPosition:"top",placeholder:"Usuario", required:true},
    { view:"text", type:'password', value:'', label:"Ingresa tu contraseña", name: "contrasena", labelPosition:"top",placeholder:"Contraseña", required:true},
    { view:"button", value: "Registrar",css:"webix_primary",width: 150, align: "center",click:function(){
      //FUNCTION
      if (this.getParentView().validate()){ //validate form
            guardar();
        }
					else
						webix.message({ type:"error", text:"Campos invalidos" });

    }},
    { view:"button", width: 150, align: "center",type:"form", value:"Regresar", click:function(){

    }}
      
	],
  rules:{
				"usuario":webix.rules.isNotEmpty,
				"contrasena":webix.rules.isNotEmpty
			},
};

function guardar(){
	var data = $$("frm").getValues();
  data.tabla = 't_usuario';
	webix.ajax().post('<?= current_url('home/save')?>',data,function(result){
        var resp  = JSON.parse(result)
        if(resp.status){    
            webix.message("Guardado");
            $$("frm").clearValidation();
            $$("frm").clear();
        }else webix.alert("Error al guardar");
    });
}

	webix.ui(form1);

</script>    
   
</html>