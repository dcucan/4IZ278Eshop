<?php

$messages = $_SESSION['flash'] ?? [];

$_SESSION['flash'] = [];

function flash($message, $type = 'primary')
{
   $_SESSION['flash'][] = [
      'message' => $message,
      'type' => $type,
   ];
}

function get($name, $def = '')
{
   return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
}

function console_log($output, $with_script_tags = true)
{
   $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
   if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>' . "\n";
   }
   echo $js_code;
}

function dd($val)
{
   echo ('<pre>');
   var_dump($val);
   echo ('</pre>');
   die();
}

function redirect($to)
{
   header("Location: https://petshobby.cz/4IZ278/public/?page=$to");
   exit;
}

function alert($msg)
{
   echo "<script type='text/javascript'>alert('$msg');</script>";
}

function require_login()
{
   if (isset($_SESSION['user'])) return;

   redirect('signin');
}
function is_admin()
{
   if ($_SESSION['user']['admin'] == 1) {
      return redirect('admin');
   }
}



function price($price)
{
   return number_format($price, 2) . ' Kč';
}

function q($add_to, $rem_from = array(), $clear_all = false)
{
   if ($clear_all) {
      $query_string = array();
   } else {
      parse_str($_SERVER['QUERY_STRING'], $query_string);
   }
   if (!is_array($add_to)) {
      $add_to = array();
   }
   $query_string = array_merge($query_string, $add_to);
   if (!is_array($rem_from)) {
      $rem_from = array($rem_from);
   }
   foreach ($rem_from as $key) {
      unset($query_string[$key]);
   }
   return '?' . http_build_query($query_string);
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
