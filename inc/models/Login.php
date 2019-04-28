<?php
  class Login {
    
    public static function checkLoginState($dbh) {
      
      if (!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID'])) {
        session_start();
      }
      if (isset($_COOKIE['id']) && isset($_COOKIE['token']) &&  isset($_COOKIE['serial'])) {
        
        // Prepare Query
        $query = "SELECT * FROM sessions WHERE sessions_id = :id AND sessions_token = :token AND sessions_serial = :serial;";
        
        $id = $_COOKIE['id'];
        $token = $_COOKIE['token'];
        $serial = $_COOKIE['serial'];
        
        $stmt = $dbh->prepare($query);
        $stmt->execute(array(':id' => $id, ':token' => $token, 'serial' => $serial));
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row['sessions_id'] > 0) {
          if (
              $row['sessions_id'] == $_COOKIE['id'] && 
              $row['sessions_token'] == $_COOKIE['token'] && 
              $row['sessions_serial'] == $_COOKIE['serial']
              )
            {
              if (
              $row['sessions_id'] == $_SESSION['id'] && 
              $row['sessions_token'] == $_SESSION['token'] && 
              $row['sessions_serial'] == $_SESSION['serial']
              )
              {
                return true;
              }
            }
        }
      }
      
    }
    
  }