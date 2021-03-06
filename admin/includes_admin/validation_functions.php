<?php 


  // is_blank('abcd')
  // * validate data presence
  // * uses trim() so empty spaces don't count
  // * uses === to avoid false positives
  // * better than empty() which considers "0" to be empty
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }



    // has_presence('abcd')
  // * validate data presence
  // * reverse of is_blank()
  // * I prefer validation names with "has_"
  function has_presence($value) {
    return !is_blank($value);
  }

  // has_length_greater_than('abcd', 3)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  // has_length_less_than('abcd', 5)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  // has_length_exactly('abcd', 4)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  // * validate string length
  // * combines functions_greater_than, _less_than, _exactly
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_inclusion_of( 5, [1,3,5,7,9] )
  // * validate inclusion in a set
  function has_inclusion_of($value, $set) {
    return in_array($value, $set);
  }

  // has_exclusion_of( 5, [1,3,5,7,9] )
  // * validate exclusion from a set
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  // has_string('nobody@nowhere.com', '.com')
  // * validate inclusion of character(s)
  // * strpos returns string start position or false
  // * uses !== to prevent position 0 from being considered false
  // * strpos is faster than preg_match()
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  // has_valid_email_format('nobody@nowhere.com')
  // * validate correct format for email addresses
  // * format: [chars]@[chars].[2+ letters]
  // * preg_match is helpful, uses a regular expression
  //    returns 1 for a match, 0 for no match
  //    http://php.net/manual/en/function.preg-match.php
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }



  /// for file upload for jobseekers only
  function file_upload_resume($value){
    $allowed_exts = array('pdf','docx');
    $ext = strtolower(substr($value, strpos($value, '.') + 1));
    $errors = array();

    if(in_array($ext, $allowed_exts) === false){
        return $value;
    }
  }

  /// for file upload for client only
  function file_upload_man_power_file($value){
    $allowed_exts = array('csv','xlsm','xlsx','xls');
    $ext = strtolower(substr($value, strpos($value, '.') + 1));
    $errors = array();

    if(in_array($ext, $allowed_exts) === false){
        return $value;
    }
  }


  // check to see if time start is less than the time end/// logic error
  function time_start_time_end($start,$end){
    if(($start < $end)){
      return true;
    }
  }


  // check to see if date start is less than the date end/// logic error
  function date_start_date_end($start,$end){
    // if pag !mababa ang 
    if(($start < $end) AND is_blank($end)){
      return true;
    }
  }



  /**
   * @param $number
   *
   * @return bool
   */
  function validatePhoneNumber($number) {
      $formats = [
          '###-###-####', '####-###-###',
          '(###) ###-###', '####-####-####',
          '##-###-####-####', '####-####', '###-###-###',
          '#####-###-###', '##########', '#########',
          '# ### #####', '#-### #####'
      ];

      return in_array(
          trim(preg_replace('/[0-9]/', '#', $number)),
          $formats
      );
  }



  

  // has_unique_username('johnqpublic')
  // * Validates uniqueness of admins.username
  // * For new records, provide only the username.
  // * For existing records, provide current ID as second argument
  //   has_unique_username('johnqpublic', 4)
  function has_unique_username($username, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM tbl_admin ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "AND admin_compo_id != '" . db_escape($db, $current_id) . "'";

    $result = mysqli_query($db, $sql);
    $admin_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $admin_count === 0;
  }

?>