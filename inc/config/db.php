<?php
  // DB Params
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "Usacaladpw1991!");
  define("DB_NAME", "designership");

  function getConn() {
    return new PDO("mysql:host=localhost;dbname=designership", 'root', 'Usacaladpw1991!');
  }
  $dbh = getConn();
