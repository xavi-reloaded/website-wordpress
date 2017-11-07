base wordpress
=
this project aims to build wordpress projects like churros

quick init
-

* cd docker
* docker-compose up -d
* docker exec -it <container_id> bash
* /var/www/html/scripts/lleidajobs.sh
* abrir browser, http://localhost
* añadir tema jobify
* ir a localhost/themes.php?page=jobify-setup
* cargar contenido demo

adaptar theme jobify
-

en carpeta:

**src\wp-content\themes\jobify\inc\setup\import-content\extended**

se encuentran los archivos que se utilizan para cargar contenido demo
modificar estos archivos para cambiar el contenido y adaptarlo a "lleidajobs"

estructura
-
el código fuente modificable está en:

````
- /src/wp-content/plugins/
- /src/wp-content/themes/
- /scripts/
````

ejecutar
-
en carpeta docker: 

```` 
docker-compose up 
docker-compose down 
````

entrar en servidor wordpress para ejecutar  scripts
-

```` 
docker exec -it <container_id> bash
/var/www/html/scripts/<some_script.sh>
````
