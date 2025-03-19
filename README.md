# Página Web para Configuración de un Servidor Web de Transmisión de Videos en Directo

## Descripción

Este proyecto consiste en una página web que permite la configuración y gestión de un servidor web para la transmisión de videos en directo. La plataforma está diseñada para ser utilizada por varios usuarios, quienes pueden interactuar con el servidor para realizar transmisiones de video en vivo.

La aplicación se conecta a una base de datos para guardar los logs de los usuarios, los cuales son visibles para todos los usuarios del sistema. Los logs incluyen información relevante sobre las actividades de los usuarios, como el acceso al sistema, las transmisiones realizadas y otros eventos importantes, permitiendo una administración más eficiente de las transmisiones.

## Características Principales

- **Transmisión de Videos en Directo**: Los usuarios pueden transmitir videos en vivo a través del servidor web configurado.
- **Gestión de Usuarios**: Diferentes usuarios pueden acceder a la plataforma y realizar sus respectivas transmisiones.
- **Conexión con Base de Datos**: Se utiliza una base de datos para almacenar los logs de los usuarios y las interacciones realizadas en el sistema.
- **Visualización de Logs**: Los logs de los usuarios son accesibles por todos, permitiendo un seguimiento transparente de las actividades en la plataforma.

## Estructura del Proyecto

El proyecto está compuesto por los siguientes archivos principales:

- **`auth.php`**: Script para la autenticación de usuarios.
- **`dashboard.php`**: Interfaz donde los usuarios pueden ver sus actividades y las transmisiones en curso.
- **`form_bdatos.php`**: Formulario para gestionar la base de datos.
- **`index.php`**: Página principal de la aplicación.
- **`log_bdatos.php`**: Visualización de los logs almacenados en la base de datos.
- **`login.php`**: Página de inicio de sesión para los usuarios.
- **`logo.png`**: Logo de la aplicación.
- **`logout.php`**: Script para cerrar sesión.
- **`recoge.php`**: Script que recoge los datos necesarios para las transmisiones.
- **`stream.php`**: Página de configuración de las transmisiones en vivo.
- **`style.css`**: Estilos para la interfaz de usuario.
- **`verlog.php`**: Página donde se visualizan los logs de los usuarios.

## Instalación

Para poder ejecutar este proyecto, necesitas tener un servidor web con soporte para PHP y una base de datos MySQL. Aquí están los pasos básicos para la instalación:

1. **Clona el repositorio** en tu servidor:
   ```bash
   git clone https://github.com/apavalc3108/proyecto_final.git
