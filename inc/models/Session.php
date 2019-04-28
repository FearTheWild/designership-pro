<?php
  class Session {
    
    public static function createSessionID() {
      $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
      $pass = array();
      $alphaLength = strlen($alphabet) - 1;
      for ($i = 0; $i < 12; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
      }
      return implode($pass);
    }
    
  }