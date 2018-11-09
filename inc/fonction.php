<?php

function debug($a)
{
  echo '<pre>';
  print_r($a);
  echo '</pre>';
}

function validationText($error,$data,$min,$max,$key,$empty = true)
{
  if(!empty($data)) {
      if(strlen($data) <$min) {
        $error[$key] = 'min '.$min.' caracteres';
      }elseif(strlen($data) >$max) {
        $error[$key] = 'max '.$max.' caracteres';
      }
  } else {
    if($empty) {
      $error[$key] = 'veuillez renseigner ce champ';
    }

  }

  return $error;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isLogged()
{
    if(!empty($_SESSION['user']) && !empty($_SESSION['user']['id']) && !empty($_SESSION['user']['pseudo']) && !empty($_SESSION['user']['email']) && !empty($_SESSION['user']['role']) && !empty($_SESSION['user']['ip'])) {
      if($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
        return true;
      }
    }
   return false;
}

function isAdmin()
{
      if(isLogged())
      {
        if($_SESSION['user']['role'] == 'admin') {
          return true;
        }
      }
      return false;
}
