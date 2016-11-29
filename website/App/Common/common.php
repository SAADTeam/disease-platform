<?php

function p ( $array )
{
    dump( $array , 1 , '<pre>' , 0 );
}

function filled_out($form_vars) {
  // test that each variable has a value
  foreach ($form_vars as $key => $value)   {
     if (!isset($key) || ($value === '')) {
        return false;
     }
  }
  return true;
}

function valid_email($address) {
  // check an email address is possibly valid
  if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address))
          return true;
  else
      return false;
}

function getUserLevel( $type )
{
    if( $type == 'superAdminUser' )
        return 5;
    else if( $type == 'adminUser' )
        return 4;
    else if( $type == 'labUser' )
        return 3;
    else if( $type == 'registerUser' )
        return 2;
    else if( $type == 'anonymousUser' )
        return 1;
}

?>

