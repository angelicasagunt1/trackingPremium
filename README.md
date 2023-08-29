# trackingPremium

1. 😀 Clona este Repositorio! 

2. Ve a la carpet  `/docker` dentro del proyecto y corre el comando `docker compose up -d` para inicializar los containers!

3. Dentro del contenedor de `php` corre el comando `composer install` para instalar las dependencias

4. Recuerda correr el archivo SQL dentro de la base de datos app_db para crear la tabla tracking !

5. Crear la tabla USER:

    `CREATE TABLE user (
    id INT AUTO_INCREMENT NOT NULL,
    email VARCHAR(180) UNIQUE NOT NULL,
    roles JSON NOT NULL,
    password VARCHAR NOT NULL,
    PRIMARY KEY(id)
    );
    `
6. Dentro del contenedor de `php` correr el comando para crear un usuario de prueba:
`php bin/console doctrine:fixtures:load`

Listo! 

Podras acceder a la url: localhost/prepack/list

te pedira Autenticación:

usuario: admin@trackingPremium.com
contraseña: contraseña

