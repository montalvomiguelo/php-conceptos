<?php

  /**
   * Este es nuestro FRONTEND CONTROLLER
   * se encarga de realizar las configuraciones necesarias para que
   * nuestra aplicación funcione correctamente.
   * Se encargará de hacer checkeos de seguridad para dejar a los
   * controladores limpios.
   */

  require_once('config.php'); // Settings de la aplicación
  require_once('helpers.php'); // Helpers
  require_once('database.php'); // PDO para conexión a la base de datos

  controller($_GET['url']);
