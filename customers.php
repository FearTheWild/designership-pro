<?php
  require_once('./inc/config/db.php');
  require_once('./inc/lib/pdo_db.php');
  require_once('./inc/models/Customer.php');
  
  // Inst Customer
  $customer = new Customer();
  
  // Get Customer
  $customers = $customer->getCustomers();

  require 'header.php';
?>
  
  <main>
    <div class="container">
          
      <h2>Customers</h2>
      <table>
        <thead>
          <tr>
            <th>Customer Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Password</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($customers as $customer): ?>
            <tr>
              <td><?php echo $customer->id; ?></td>
              <td><?php echo $customer->first_name; ?> <?php echo $customer->last_name; ?></td>
              <td><?php echo $customer->email; ?></td>
              <td><?php echo $customer->created_at; ?></td>
              <td><?php echo $customer->password; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </main>
  
  
<?php
  require 'footer.php';
?>
