<?php

class Model extends Database
{
  public $errors = [];

  public function __construct()
  {
    if (!property_exists($this, 'table')) {

      $this->table = strtolower($this::class) . 's';
    }
  }

  public function findAll()
  {
    $query = "select * from $this->table";
    $result = $this->query($query);

    if ($result) {
      return $result;
    }
    return false;
  }

  public function where($data, $data_not = [])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "select * from $this->table where ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    $query = trim($query, " && ");

    $data = array_merge($data, $data_not);
    $result = $this->query($query, $data);

    if ($result) {
      return $result;
    }
    return false;
  }

  public function first($data, $data_not = [])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "select * from $this->table where ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    $query = trim($query, " && ");

    $data = array_merge($data, $data_not);
    $result = $this->query($query, $data);

    if ($result) {
      return $result[0];
    }
    return false;
  }

  public function insert($data)
  {
    $columns = implode(', ', array_keys($data));
    $values = implode(', :', array_keys($data));
    $query = "insert into $this->table ($columns) values (:$values)";

    $this->query($query, $data);

    return false;
  }

  public function update($id, $data, $column = 'id')
  {
    $keys = array_keys($data);
    $query = "update $this->table set ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . ", ";
    }

    $query = trim($query, ", ");

    $query .= " where $column = :$column";

    $data[$column] = $id;
    $this->query($query, $data);

    return false;
  }

  public function delete($id, $column = 'id')
  {
    $data[$column] = $id;
    $query = "delete from $this->table where $column = :$column";

    $this->query($query, $data);

    return false;
  }

  public function findByRoles(array $roles)
  {
    $rolesPlaceholder = implode(', ', array_fill(0, count($roles), '?'));

    $query = "SELECT * FROM $this->table WHERE role IN ($rolesPlaceholder)";
    $result = $this->query($query, $roles);

    if ($result) {
      return $result;
    }
    return false;
  }

  public function findUsersWithMessages()
  {
      // Construct the SQL query to retrieve users who have sent messages
      $query = "SELECT * FROM $this->table WHERE `message` IS NOT NULL AND `message` <> ''";

      // Execute the query
      $result = $this->query($query);

      // Return the result if successful, otherwise return false
      return $result !== false ? $result : false;
  }
  public function findByID($id)
  {
    $query = "SELECT * FROM $this->table WHERE admin_id = :id";
    $result = $this->query($query, ['id' => $id]);

    if ($result) {
        return $result[0]; // Return the first row
    }
    return false;
  }
  public function search($column, $searchTerm)
  {
    // Prepare the SQL query to search for records based on the specified column
    $query = "SELECT * FROM $this->table WHERE $column LIKE :searchTerm";
    
    // Bind the search term with wildcard characters
    $searchTerm = '%' . $searchTerm . '%';
    
    // Execute the query with the search term
    $result = $this->query($query, ['searchTerm' => $searchTerm]);
    
    // Return the result if successful, otherwise return false
    return $result !== false ? $result : false;
  }

}