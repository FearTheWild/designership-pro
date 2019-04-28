<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'on');

  require_once('./inc/config/db.php');
  require_once('./inc/lib/pdo_db.php');
  require_once('./inc/models/Login.php');
  require_once('./inc/models/Session.php');

  require 'header.php';
?>
  
  <main>
    <div class="container">
      
      <h2>Status</h2>
      
      <?php
        if (!Login::checkLoginState($dbh)) {
          if (isset($_POST['email']) && isset($_POST['password'])) {
            $query = "SELECT * FROM customers WHERE email = :email AND password = :password";
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':email' => $email, ':password' => $password));
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row['id'] > 0) {
//               echo Session::createSessionID(64);
              echo 'Logged in';
            }
          } else {
            ?>
            
            Logged Out
            <form action="login.php" method="post">
              <input type="email" name="email" placeholder="Email address">
              <input type="password" name="password" placeholder="Password">
              <button type="submit" name="login-submit">Login</button>
            </form>
            
            <?php
          }
        } else {
          header('Location: index.php');
        }
      ?>
      
    </div>
  </main>
  
  
<?php
  require 'footer.php';
?>
