<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  }

  function has_valid_phone($phonenumber) {
    // if (preg_match('/^\d{3}\-\d{3}-\d{4}$/', $phonenumber))
    if (preg_match('/^[0-9 ()-]+$/', $phonenumber)) {
      return true;
    } else {
      return false;
    }
  }

  function has_valid_username($username) {
    if (preg_match('/^[A-Za-z][A-Za-z0-9]+$/', $username)) {
      return true;
    } else {
      return false;
    }
  }

  function has_valid_place_name($placeName) {
    if (preg_match("/^[A-Za-z \-]+$/", $placeName)) {
      return true;
    } else {
      return false;
    }
  }

  function has_valid_state_code($code) {
    if (preg_match('/^[A-Za-z]+$/', $code)) {
      return true;
    } else {
      return false;
    }
  }

  function is_number($value) {
    if (preg_match('/^[0-9]+$/', $value)) {
      return true;
    } else {
      return false;
    }
  }

  function is_capitalized($value) {
    if (preg_match('/^[A-Z]+$/', $value)) {
      return true;
    } else {
      return false;
    }
  }

?>
