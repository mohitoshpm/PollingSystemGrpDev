<?php
 class User {
  // Properties
  public $id;
  public $name;
 
  // Methods
  function set_id($id) {
    echo "Call";
    $this->id = $id;
  }
  function get_name() {
    return $this->name;

  }

  function get_id() {
    return $this->id;
  }
  function set_name($name) {
    $this->name = $name;
  }

}

?>