base wordpress
=
this project aims to build wordpress projects like churros

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
