*REGISTRO DE CAMBIOS SISTEMA*

	*18-10-2022*
		- Iniciamos con la creacion de actions creamos.
		- Actions creados de AsignarCamion, Camion, Chofer, Usuario.
			- Actualizar.
			- Buscar.
			- Nuevo.
			- Eliminar.
			- Obtener.
		- Actions creados de Autenticacion.
			- CrearTokenAction.
			- LoginAction.

	*13-10-2022*
		- Instalamos sanctum y laravel/ui para el uso de la autenticacion del api.
		- Agregando Actions Para La Facilitacion Del Uso Del Api Con El Front, Se Agregaron Los Siguientes.
			- Autenticacion contiene: CrearTokenAction y LoginAction.
			- Usuario contiene: ActualizarUsuarioAction, BuscarUsuarioAction.
				- EliminarUsuarioAction, NuevoUsuarioAction, ObtenerUsuarioAction.
		- Agregamos El controlador para la autenticacion de usuarios donde los usuarios se pueden logear y obtener el token para el uso de la appweb.
		- Realizamos el Metodo store en el controlador de UsuarioControler para ingresar nuevos Usuarios.
		- A la hora de agregar sanctum se agrega una migracion extra de los tokens generados.
		- Terminamos de agregar los Request para nuestras validaciones de.
			- AsignacionCamion.
			- Camion.
			- CamionPersona.
			- Chofer.
			- Login.
		- Agregamos una carpeta de Utilidades para posibles utilidades.
		- Se agrego un Seed de el usuario inicial que se tendra el el sistema.
		- El api se agregaron las rutas de consultar usuario y Login.
		- Iniciamos Agregando El proyecto del fron de VUEJS.

	*08-10-2022*
		- Agregando varios Request con validaciones de las reglas de ingreso.
		- Agregando sanctum para validacion de api token.
		- agregando una nueva migracion api token.
		- Agregando UML de funciones.

	*06-10-2022*
		- Agregando Vistas al lunacy con estas parece ser suficiente para mostrar un ejemplo de la app.
			- se agregaron vistas de registros que estas mismas se utilizaran si se da el motivo para.
				- Mostrar Informacion Detallada.
				- Editar Informacion.
				- Ingresar Informacion.

	*05-10-2022*
		- Agregando vistas en lunacy de.
			- Registro De Camiones.
			- Registro chofer.
			- Registro Asignacion.
			- Registro Pedidos.
			- Registro Envios.
			- Registro Gas.
			- Registro Usuarios.

	*03-10-2022*
		- Agregamos Mas Plantillas a Lunacy.

	*30-09-2022*
		- Agregamos el menu principal a las plantillas.

	*02-09-2022*
		- Se realizan cambios en la documentacion.
		- Se agregan nuevos cambios de uso.
		- Se agrega el ER a la documentacion.
		- Se subo el proyecto

	*26-08-2022*
	
		- Se realiza la asignacion de la tabla a cada uno de los modelos.
		- Se realiza la asignacion de la llave primaria a cacda uno de los modelos.
		- se realiza la asignacion de los campos a cada uno de los modelos.
		- se realiza la asignacion de las llames foraneas a cada uno de los modelos. 

	*25-08-2022*
	
		- Se Finalizan las Migraciones.
		- Se Realiza el respectivo push de la nueva rama *SistemaBackend2Migraciones*.
		- Se deja inicializado los controladores y los modelos para iniciar con la siguiente rata.
		- Se realiza el Merge al main.

	*24-08-2022*

		- Iniciando con las Migraciones.
		- Se Realizo Las Migraciones de modulos Usuarios y Chofer.
		- Se Testearon cada una de Ellas Demostrando Que Si Corren.
		- Se Sube El Primer Cambio Del Backend Modulo Usuarios y Chofer.

    *23-08-2022*

        - Iniciando El Repositorio.
        - Agregando ER (Imagen y Documento).
        - Agregando Carpeta y Documento de interfaces.
        - Se sube Todo Al Main.
        - Se crea la rama AgregandoSistemaBE (BE = BACKEND).
        - Se inicia el Proyecto de Laravel (php v: 8.1.9 | Laravel v: 9.3.4).
        - Se carga el proyecto a la Rama AgregandoSistemaBE.
        - Se Realiza El Merge al Main.
        - Se Realiza una sub rama de AgregandoSistemaBE llamada *SistemaBackend1Migraciones*.

