# Trabajo Práctico Final Coloquio de Programación
Se implementó un sistema de monitoreo de temperatura de sensores de servidores y heladeras.
El sistema está compuesto por:
- Una capa de datos ORM implementada ad-oc con una base de datos MySQL.
- Una capa de negocios implementa en base a controladores.
- Una capa de presentación implementada en base a vistas.

## ORM 
La capa de datos se implemento completamete desde cero utilizando el patrón de diseño DAO. Buscando simplicidad y eficiencia. Donde cada clase representa una tabla de la base de datos.  
Además los campos de las tablas se mapean automaticamente en cuanto se realiza una consulta.
Esto se logra utilizando los metodos mágicos __get y __set, y resguardando los datos en un array privado llamado $fields.
Se provee de una abstracción de la conexión a la base de datos, utilizando el patrón de diseño Singleton. La clase Database se encarga de manejar la conexión a la base de datos.
Ademas se provee de una clase RawQuery que permite ejecutar consultas SQL directamente.

## Controladores
La capa de negocios se implementa utilizando el patrón de diseño MVC sin llegar a ser MVC completamente, en cambio se comporta como un sistema de 3 capas. Donde cada controlador se encarga de una funcionalidad especifica.
Los controladores se encarga de recibir las peticiones de la capa de presentación y devolver las respuestas.
Para la comunicación entre la capa de negocios y la capa de presentación se utilizan las clases Request y Response.
Las clases Request y Response se encarga de recibir y enviar las peticiones y respuestas.

## Vistas
Las vistas se implementan utilizando el patrón de diseño MVC sin llegar a ser MVC completamente, en cambio se comporta como un sistema de 3 capas. Donde cada vista se encarga de una funcionalidad especifica.
Las vistas se encarga de recibir las peticiones de la capa de negocios y devolver las respuestas.
Para ello se implementaron varias clases abstractas donde cada una se encarga de una funcionalidad especifica.
Para finalmente implementar las clases concretas que se encargan de renderizar las vistas.
Existiendo 5 tipos de vistas:
- Una vista para renderizar los menús
- Una vista para renderizar las tablas
     - Derivada de la vista de tablas una vista de tablas que incluye un input de busqueda
- Una vista para renderizar los formularios de la cual deriban:
    - Una vista para renderizar los formularios de creacion
    - Una vista para renderizar los formularios de edicion
    - Una vista para renderizar los formularios de eliminacion

## Autor
Gonzalo Molina