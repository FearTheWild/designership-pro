<?php
  class Subscription {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addSubscription($data) {
      // Prepare Query
      $this->db->query('INSERT INTO subscriptions (id, customer_id, status) VALUES(:id, :customer_id, :status)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':customer_id', $data['customer_id']);
      $this->db->bind(':status', $data['status']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }