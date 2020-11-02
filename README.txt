- Instrucciones de deploy
Previamente tienen que existir dos bases de datos con los siguientes nombres:
* categoria
* producto
Se debe ejecutar el archivo Glamit\deploy.php
Este proceso se fijará si ya se realizó algun deploy anterior, avisa si es el caso. 
Si no hay uno previo crea las tablas correspondientes con los datos de productos y categorias.

Luego se podrán correr los GET y POST:
HEADER: debe tener como valor TOKEN = "UwzuzCyq"
* GET -> Trae categorias:
http://localhost/Glamit/api/categoria/?pag=1&reg=3
Los parámetros agregados son "pag" indica el número de página que desea mostrar 
y "reg"= indica la cantidad de registros de esa página que se requieren mostrar. 
Si alguno de estos dos datos no se envía el valor predeterminado será 1. Ej.: pag 1, reg 1.

* GET -> Trae productos:
http://localhost/Glamit/api/producto/?pag=1&reg=3
http://localhost/Glamit/api/producto/?pag=1&sku=111aaa
En este caso los GET se llamarán con los fitros "pag" y "reg" al igual que en categorías, pero existe la posibilidad de filtrar por un SKU unico.
Si lo que se requiere es eso, no se deberá usar el filtro reg (pondrá por default 1) y el SKU como filtro agregado. Ej. Pag 1, SKU 111aaa

* POST -> Guarda un producto nuevo.
Se requiere enviar los parámetros 'nombre', 'precio', 'url_imagen', 'sku', 'categoria_id' por método POST.

- Patrones de diseño utilizados
middleware

- Notas relevantes o aclaratorias del sistema
No aplica
- Mencionar alguna librería, en caso de usarse.
Ninguna
