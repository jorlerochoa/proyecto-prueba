# proyecto-prueba
presentacion proyecto php

Este es un proyecto de prueba a modo de presentación de los conocimientos en php
Prerrequisitos:
1.	Se debe tener conexión a internet en el PC donde se requiere configurar el servidor y desplegar la aplicación.
2.	Tener instalado el software de control de versiones git

A continuación se especificara un checklist con los pasos necesarios para desplegar la aplicación en un servidor local:

1.	Se requiere instalar la distribución de apache así como los sistemas relacionales de administración de bases de datos MySQL y MariaDB. Para ello se puede instalar el paquete     de software libre XAMPP la cual se puede descargar en la siguiente ruta: https://www.apachefriends.org/es/index.html según el sistema operativo. El xampp se instalara por       defecto en la ruta C:// aunque se puede elegir la ruta que más convenga.

2.	Una vez instalado el XAMPP se requiere abrir el programa e iniciar los servicios de apache y de Mysql, los puertos utilizados por el apache y mysql son el puerto 80 y el         3306 respectivamente por lo que habría que revisar que otra aplicación están usando esos puertos para así mismo cambiarlos.

3.	Al instalarse el gestor de base de datos relacional mysql se crea un usuario de nombre root el cual no tiene contraseña por defecto, para efecto de pruebas lo dejaremos sin       contraseña para este caso.

4.	Una vez instalado el xampp se puede proceder a descargar el proyecto con los archivos de la aplicación que se encuentran en github, para ello se accede a la ruta:               https://github.com/jorlerochoa/proyecto-prueba 

5.	Una vez en la ruta del github se procede a clonar los archivos de código del repositorio por medio del botón clonar de la pagina de github el cual entrega la ruta con el         cual clonar el proyecto en una ruta del servidor local

6.	Una vez obtenida la ruta para clonar el proyecto, se procede clonar el proyecto dentro de la carpeta htdocs de la carpeta xampp (xampp/htdocs), de esta forma los archivos       del proyecto pueden ser abiertos desde el servidor local.

7.	Dentro de la carpeta “proyecto” donde se encuentran los archivos del proyecto de la prueba se encuentra la carpeta “base de datos” la cual contiene el archivo bd_prueba.sql     el cual contiene la base de datos del proyecto, para ser utilizada se debe  importar al administrador de base de datos mysql por medio del comando: 
    mysql –u root bd_prueba > ruta donde se clono la carpeta del proyecto/bd_prueba.sql el comando debe ejecutarse en la ruta xampp/mysql/bin/

8.	Ya una vez con la base de datos importada y los archivos en la carpeta htdocs de xampp se puede abrir la aplicación por medio de la ruta:                     http://localhost/proyecto/vista/index.php en donde se debera hacer el registro del cliente.

