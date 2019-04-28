<?php
  // DB Params
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "pass");
  define("DB_NAME", "designership");

  function getConn() {
    return new PDO("mysql:host=localhost;dbname=designership", 'root', 'pass');
  }
  $dbh = getConn();
