


	var menu_data = [
		{id: "recursos_h", icon: "group", value: "Recursos humanos",  data:[
			{ id: "empleados", value: "Empleados", href:"inicio/1"},
			{ id: "nomina", value: "Nomina"},
			{ id: "reloj", value: "Reloj checador"},
			{ id: "seguro", value: "Seguro social"},
			{ id: "expedientes", value: "Expedientes"},			
			{ id: "rh_reportes", value: "Reportes"},
			{ id: "rh_estadisticas", value: "Estadisticas"},
		]},
		{id: "contabilidad", icon: "dollar", value:"Contabilidad", data:[
			{ id: "facturacion", value: "Facturación"},
			{ id: "finanzas", value: "Finanzas"},
			{ id: "pagos", value: "Pagos"},
			{ id: "transferencias", value: "Fransferencias"},
			{ id: "depositos", value: "Depositos"},
			{ id: "deudores", value: "Deudores"},
			{ id: "con_reportes", value: "Reportes"},
			{ id: "con_estadisticas", value: "Estadisticas"},
		]},
		{id: "produccion", icon: "area-chart", value:"Producción", data:[
			{ id: "servicios", value: "Servicios"},
			{ id: "productos", value: "Productos"},
			{ id: "almacen", value: "Almacen"},
			{ id: "p_reportes", value: "Reportes"},
			{ id: "p_estadisticas", value: "Estadisticas"},
		]},
		{id: "recursos_m", icon: "hospital-o", value:"Recursos materiales", data:[
			{ id: "rm_cotizaciones", value: "Cotizaciones"},
			{ id: "ordenes", value: "Ordenes de compra"},
			{ id: "rm_consultar_pagos", value: "Consultar pagos proveedores"},
			{ id: "rm_consultar_facturas", value: "Consultar facturas"},
			{ id: "rm_reportes", value: "Reportes"},
			{ id: "rm_estadisticas", value: "Estadisticas"},
		]},
		{id: "compras", icon: "shopping-cart", value:"Compras", data:[
			{ id: "nueva_compra", value: "Nueva compra"},
			{ id: "com_consultar_compras", value: "Consultar compras"},
			{ id: "com_consultar_facturas", value: "Consultar facturas"},
			{ id: "com_consultar_pagos", value: "Consultar pagos"},
			{ id: "com_reportes", value: "Reportes"},
			{ id: "com_estadisticas", value: "Estadisticas"},
		]},
		{id: "ventas", icon: "line-chart", value:"Ventas",  data:[
			{ id: "nueva_venta", value: "Nueva venta"},
			{ id: "clientes", value: "Clientes"},
			{ id: "pedidos", value: "Pedidos"},
			{ id: "promociones", value: "Promociones"},
			{ id: "cobranza", value: "Cobranza"},
			{ id: "ven_cotizaciones", value: "Cotizaciones"},
			{ id: "logistica", value: "Logística"},
			{ id: "cancelaciones", value: "Cancelaciones"},
			{ id: "consultar_ventas", value: "Consultar ventas"},
			{ id: "ven_reportes", value: "Reportes"},
			{ id: "ven_estadisticas", value: "Estadisticas"},
		]},
		{id: "inventario", icon: "check-square-o", value:"Inventario",  data:[
			{ id: "general", value: "General"},
			{ id: "departamento", value: "Departamento"},
			{ id: "inputs", value: "Inputs"}
		]},
		{id: "sucursales", icon: "building", value:"Sucursales",  data:[
			{ id: "catalogo", value: "Catalogo"},
			{ id: "suc_usuarios", value: "Usuarios"},			
		]},
		
		{id: "configuraciones", icon: "gears", value:"Configuraciones", data:[
			{ id: "conf_usuarios", value: "Usuarios"}, 
			{ id: "permisos", value: "Permisos"}, 
			{ id: "lenguaje", value: "Lenguaje"}, 
			{ id: "manual", value: "Manual de usuario"}, 
		]}
	];

	var nombre = "Adrián González";

	function digiClock ( )
    {
	    var crTime = new Date ( );
	    var crHrs = crTime.getHours ( );
	    var crMns = crTime.getMinutes ( );
	    var crScs = crTime.getSeconds ( );
	    crMns = ( crMns < 10 ? "0" : "" ) + crMns;
	    crScs = ( crScs < 10 ? "0" : "" ) + crScs;
	    var timeOfDay = ( crHrs < 12 ) ? "AM" : "PM";
	    crHrs = ( crHrs > 12 ) ? crHrs - 12 : crHrs;
	    crHrs = ( crHrs == 0 ) ? 12 : crHrs;
	    var crTimeString = crHrs + ":" + crMns + ":" + crScs + " " + timeOfDay;

	    $(".fecha").html(crTimeString);
 	};

	webix.ready(function(){

		setInterval('digiClock()', 1000);

		


		webix.ui({
			rows: [
				{   
					view: "toolbar", 
					padding:3,
					elements: [
					{
						view: "button", type: "icon", icon: "bars",
						width: 37, align: "left", css: "app_button", click: function()
						{
							$$("$sidebar1").toggle();							
						}
					},
					{						
						//view:"button", css:"logo", type: "image", image: "<?= base_url('assets/imgs/logo2.png')?>", width: 50
						template:"<img class='logo' src='assets/imgs/logo_stack.png'>", css: "fondo", width: 40
					},
					{ 	
						view: "label", label: "STACK ERP", width: 150
					},
					{
						view: "label", css: "fecha"
					},
					{},									
					{
						view: "label", label:"Hola "+ nombre+ "!", align: "right"
					},
					{ 
						view: "button", type: "danger", value:"Cerrar sesión", width: 120,  
					}
				]
				},
				{
					cols:[
						{
							view: "sidebar",
							data: menu_data,	
							height: "auto",
							collapsed: false,
							animate: {type:"flip", subtype:"vertical"},

	
							/*on:{
								onAfterSelect: function(id)
								{
									webix.message("Ayy lmao: "+this.getItem(id).value);		
									//$$("$sidebar1").toggle();							
								}
							} */
							on:{
								"onItemClick":function(id)
								{
									var selection = this.getItem(id);	
									if (selection.href) 
									{
										document.location=selection.href;
									}
								}
							}
						},
						{


							rows: [
							{
								view: "template",
								content: "workplace",								
							}, 
							] 
													
						} 
					]
				}
			]
		});
	
		 

	});  // FIN DE WEBIX.READY
