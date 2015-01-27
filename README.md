[Comunidad de software y hardware libre](http://cshluesocc.org/)
==================================

#Codeigniter Simple Login

Código fuente de ejemplo para registro y logueo de usuarios con codeigniter framework.

##Prerrequisitos:

* Apache y/o nginx
* PHP >= 5.1.6
* MariaDB/MySQL v4.1+
* php5-mcrypt
* [Git](http://git-scm.com/book/en/v2/Getting-Started-Installing-Git) (opcional) 

Para apache, mysql y php ver este [link](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-debian)

Installar php5-mcrypt:

```shell
$ sudo apt-get install php5-mcrypt
```

##Configurando el entorno

Vamos a necesitar que apache permita sobreescribir las urls para que sean más amigables, para eso necesitamos activar el modulo mod_rewrite:

```shell
$ sudo a2enmod rewrite
```

**Opcional**: Configurar un virtual host en apache, ver el siguiente [link](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-debian-7)

##Frameworks y librerias utilizadas

###Back-end:
* [Codeigniter 2.x](http://www.codeigniter.com/)

###Front-end
* [jQuery](http://jquery.com/)
* [Twitter Bootstrap](http://getbootstrap.com/)
* [Material design theme for Bootstrap 3](https://github.com/FezVrasta/bootstrap-material-design)
* [Ionicons](https://github.com/driftyco/ionicons)
* [Angular.js](https://angularjs.org/)

##Instalando y configurando codeigniter framework

#####1. Descargar codeigniter [ver acá](http://www.codeigniter.com/download)
#####2. Instalar y configurar codeigniter 
Para Instalar codeigniter extraemos los archivos descargados de la página oficial en nuestro directorio de apache.

Codeigniter posee una estructura de archivos y carpetas, ver el siguiente [enlace](http://andresoller.es/blog/tutorial-basico-codeigniter-ii-estructura-de-carpetas-archivos-de-configuracion-y-urls-amigables/) para un poco de información.

La configuración inicial de codeigniter requiere editar los archivos:

**application/config/config.php**

Agregar un Encryption Key en la linea donde aparece lo siguiente:

```php
$config['encryption_key'] = '';
```

Codeigniter usa el Encryption key para prevenir manipulación de los datos de session y también por la clase Encryption para los algoritmos de encriptación, ver [acá](http://www.codeigniter.com/user_guide/libraries/sessions.html) y [acá](http://www.codeigniter.com/user_guide/libraries/encryption.html).

Se recomienda usar una frase de 32 caracteres, en nuestro caso usamos la siguiente:
```php
$config['encryption_key'] = '2b8d2907ad8f7c467350bc39095fe555';
```

**application/config/database.php**

Para registrar y consultar los usuarios necesitamos aceder a los registros de la base de datos, para ello necesitamos especificar la configuración de nuestro servidor de base de datos. Codeigniter ofrece una forma sencilla de especificar los parametros de conexión a las base de datos. Ver la [documentación oficial](http://www.codeigniter.com/user_guide/database/configuration.html) para más info.

Ya que estamos usando MariaDB/MySQL, lo único que debemos especificar es lo siguiente:

```php
...
$db['default']['hostname'] = 'localhost'; //dominio del servidor
$db['default']['username'] = 'root'; //el usuario que usara la db
$db['default']['password'] = 'adminadmin'; //el password del usuario
$db['default']['database'] = 'simplelogin'; //la base de datos que usara la aplicación
$db['default']['dbdriver'] = 'mysqli'; //el driver 
...
```

**Configuración extra:**

Vamos a editar el archivo **application/config/autoload.php** para la carga automatica recursos, recursos como librerias, plugins, etc. 

Vamos a usar las librerias database y session para manipular la base de datos y para las sessiones, así que vamos a editar el archivo modificando las siguientes lineas:

```php
$autoload['libraries'] = array('database', 'session');
```

En el código fuente veremos constamentente el uso de una función global ```base_url()``` que devuelve la url base del sitio web. Para usar esta función necesitamos cargar un archivo auxiliar(helper) llamado url. el código a continuación muestra como cargar los hepers:

```php
$autoload['helper'] = array('url');
```

Para usar los archivos estaticos como .js, fonts, .css, imagenes, etc. Vamos a crear una carpeta en la raíz de nuestro proyecto con la siguiente estructura:

	...
	├── static/
    │   ├── css/
    │   ├── js/
    │   ├── imgs/
    │   ├── fonts/
	...

Dentro de cada carpeta irán los archivos estáticos de la web. Para acceder a ellos desde cualquier parte de nuestra aplicación lo haremos de la forma siguiente:

Ejemplos:
```html
...
<!-- cargando styles -->
<link rel="stylesheet" href="<?base_url()?>static/css/ionicons.css" />

<!-- cargando scripts -->
<script src="<?=base_url()?>static/js/init.js"></script>
...
```

##Como usar el código de este repositorio
Este repositorio contiene el código fuente funcional para registrar y loguear un usuario, una vez configurado y funcionando codeigniter, necesitamos crear la base de datos:

```sql
> CREATE DATABASE simplelogin;
> USE simplelogin;
> CREATE TABLE users (email varchar(35) NOT NULL, password varchar(32) NOT NULL, name varchar(50) DEFAULT NULL, PRIMARY KEY (email))
```

Crear una copia local del repositorio:
```shell
$ git clone https://github.com/csluesocc/codeigniterSimpleLogin.git
$ cd codeigniterSimpleLogin
```
El repositorio consta de una serie de tags que van desde v1.0 hasta v5.1, cada uno de estos tags representa el avance del código, desde la primera configuración [v1.0](https://github.com/csluesocc/codeigniterSimpleLogin/releases/tag/v1.0) hasta el sistema simple y funcional de registro y logueo [v5.1](https://github.com/csluesocc/codeigniterSimpleLogin/releases/tag/v5.1), para moverse entre los tags con git haz lo siguiente:

```shell
listar los tags
$ git tag -l
moverse entre tags
$ git checkout <tag name>
```

Para un mejor detalle de los cambios hechos en los archivos, se puede ver el registro de los commits en github [aquí](https://github.com/csluesocc/codeigniterSimpleLogin/commits/master).

##Dudas o bugs en el código

Crea un [issue](https://github.com/csluesocc/codeigniterSimpleLogin/issues) con el titulo y descripción de la duda o bug que encuentres en el código.

##Contribuir

Si deseas mejorar y/o cambiar el código a tu gusto, haz un [fork](https://help.github.com/articles/fork-a-repo/) del mismo, si quieres enviar mejoras a este repositorio, has un [pull request](https://help.github.com/articles/using-pull-requests/) a esta repo y si todo va bien haremos el [merge](https://help.github.com/articles/merging-a-pull-request/) correspondiente.


