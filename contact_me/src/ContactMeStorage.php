<?php

namespace Drupal\contact_me;

class ContactMeStorage {
  
  static function exists($id) {
    $result = db_query('SELECT 1 FROM {contact_me} WHERE id = :id', array(':id' => $id))->fetchField();
    return (bool) $result;
  }

  static function getAll() {
    $result = db_query('SELECT * FROM {contact_me}')->fetchAllAssoc('id');
    return (bool) $result;

  static function add($name, $message) {
    db_insert('contact_me')->fields(array(
    'name' => $name,
    'message' => $message,
    ))->execute();
  }

  static function delete($id) {
    db_delete('contact_me')->condition('id',$id)->execute();
  }

}