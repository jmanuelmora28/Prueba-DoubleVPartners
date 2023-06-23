### Información General
***
Prueba Tecnica Desarrollador Full-Stack PHP para la empresa Double V Partners

## Especificaciones
***
Pruebas realizadas

1. **Prueba Front End # 1 Carpeta(prueba-frontend)**

La aplicación consiste en consumir la API Rest pública de GITHUB mostrando información de una lista de usuarios, esta fue desarrollada en Laravel 8 + Bootstrap 4 _italic words_. 

2. **Prueba Back End # 2 Carpeta(prueba-backend)**

Servicio API RESTFUL desarrollado en PHP manejando patron de diseño MVC para gestionar tickets con sus diferentes metodos para crear, eliminar, editar y recuperar información, la base de datos esta creada en mysql y adjunta en la carpeta del proyecto como bd_tickets.sql

* Crear: Metodo POST que recibe los parametros usuario, status y retorna el id del ticket creado
* Recuperar: Metodo GET que recibe el parametro id(opcional) para listar todos o por un ticket en especifico
* Actualizar: Metodo PUT que recibe el id(obligatorio) del ticket y los parametros usuario y/o status, retorna un 'ok' si fue exitoso el proceso o un 'fail' si fallo la actualización
* Delete: Metodo DELETE que recibe el id(obligatorio) del ticket, retorna un 'ok' si fue exitoso el proceso o un 'fail' si fallo la eliminación del registro.


