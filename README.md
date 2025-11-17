# Builderest 2024 – ADT Inspired Redesign

Proyecto PHP listo para Hostinger sin carpeta `public`, inspirado en la estética corporativa de ADT.com. Incluye sitio marketing, blog, portafolio, módulo "Get a Quote" con almacenamiento y panel administrativo modernizado.

## Requisitos
- PHP 8.2+
- MySQL/MariaDB (opcional, el proyecto funciona con almacenamiento JSON cuando no hay base de datos)
- Composer (para instalar PHPMailer)

## Instalación
1. Clona el repositorio en la raíz de tu hosting.
2. Ejecuta `composer install` para obtener PHPMailer. Si no tienes acceso a Composer en el servidor, realiza la instalación local y sube la carpeta `vendor`.
3. Configura las variables de entorno o `.env` con tus credenciales de base de datos y SMTP:
   ```bash
   export DB_HOST=localhost
   export DB_NAME=builderest
   export DB_USER=root
   export DB_PASSWORD=secret
   export SMTP_HOST=smtp.tuempresa.com
   export SMTP_USER=notificaciones@tuempresa.com
   export SMTP_PASS=********
   export SMTP_PORT=587
   export SALES_INBOX=ventas@tuempresa.com
   ```
4. (Opcional) Crea las tablas en MySQL:
   ```sql
   CREATE TABLE services (
       id INT PRIMARY KEY AUTO_INCREMENT,
       name VARCHAR(120),
       summary TEXT,
       description TEXT,
       icon VARCHAR(50),
       badge VARCHAR(50)
   );

   CREATE TABLE quotes (
       id INT PRIMARY KEY AUTO_INCREMENT,
       name VARCHAR(120),
       email VARCHAR(190),
       phone VARCHAR(80),
       service_type VARCHAR(120),
       budget VARCHAR(120),
       message TEXT,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

Si la base de datos no está disponible, los servicios se cargan desde los seeds y las cotizaciones se guardan en `storage/quotes.json`.

## Estructura
```
/assets          -> CSS, JS e imágenes
/app             -> Configuración, modelos y seeds
/admin           -> Panel SaaS (login: admin / builderest)
/index.php       -> Landing hero
/get-quote.php   -> Formulario con PHPMailer y guardado
/...             -> Resto de páginas solicitadas
```

## Panel administrativo
- Ruta: `/admin`
- Usuario: `admin`
- Contraseña: `builderest`
- Módulos: Dashboard, Get a Quote (filtros + exportación), Configuración de color.

## Personalización
- Ajusta la paleta en `storage/theme.json` o desde el panel.
- Coloca tus imágenes en `assets/img` y tus cargas en `uploads/`.

## Créditos
Diseño, UX y estructura inspirados en ADT.com según autorización del cliente.
