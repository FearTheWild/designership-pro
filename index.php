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
      
      <h2>Signup</h2>
      <?php
        function randomPassword() {
          $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
          $pass = array();
          $alphaLength = strlen($alphabet) - 1;
          for ($i = 0; $i < 12; $i++) {
              $n = rand(0, $alphaLength);
              $pass[] = $alphabet[$n];
          }
          return implode($pass);
        }
        
/*
        if (Login::checkLoginState($dbh)) {
          echo 'Welcome';
        } else {
          header('location:login.php');
        }
*/
      ?>
      
      <form autocomplete="off" action="./inc/charge.php" method="post" id="payment-form">
        <div class="form-row">
          <input type="text" name="first_name" class="StripeElement StripeElement--empty" placeholder="First name">
          <input type="text" name="last_name" class="StripeElement StripeElement--empty" placeholder="Last name">
          <input type="email" name="email" class="StripeElement StripeElement--empty" placeholder="Email address">
          <input type="password" name="password" autocomplete="new-password" class="StripeElement StripeElement--empty" value="<?php echo randomPassword(); ?>">
          <div id="card-element"></div>
      
          <div id="card-errors" role="alert"></div>
        </div>
      
        <button>Submit Payment</button>
      </form>
      
    </div>
  </main>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/charge.js"></script>
<?php
  require 'footer.php';
?>
