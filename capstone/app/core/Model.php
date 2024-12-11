<?php

class Model extends Database
{
    public $errors = [];
    protected $db;

    public function __construct()
    {
        // Ensure the database connection is initialized
        $this->db = $this->connect();
        
        if (!property_exists($this, 'table')) {
            $this->table = strtolower($this::class) . 's'; // Set table name dynamically
        }
    }

    public function query($query, $data = [])
    {
        $stm = $this->db->prepare($query);
        $check = $stm->execute($data);

        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);

            if (is_array($result) && count($result) > 0) {
                return $result;
            }
        }
        return false;
    }

    public function findAll()
    {
        $query = "SELECT * FROM $this->table";
        return $this->query($query);
    }

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = trim($query, " AND ");
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = trim($query, " AND ");
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);

        if ($result) {
            return $result[0]; // Return the first row if found
        }
        return false;
    }

    public function insert($data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));
        $query = "INSERT INTO $this->table ($columns) VALUES (:$values)";

        $this->query($query, $data);
    }

    public function update($id, $data, $column = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }

        $query = trim($query, ", ");
        $query .= " WHERE $column = :$column";

        $data[$column] = $id;
        $this->query($query, $data);
    }

    public function delete($id, $column = 'id')
    {
        $data[$column] = $id;
        $query = "DELETE FROM $this->table WHERE $column = :$column";
        $this->query($query, $data);
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