<?php 
  require_once('config.php');  
  require_once('functions.php'); 
  require_once('model.php'); 

  if (!isset($_REQUEST['flag'])) $_REQUEST['flag'] = '';

  switch ($_REQUEST['flag']) {
    case 'login':
      $result = logIn($_REQUEST['email'], $_REQUEST['password']);
      if ($result == 'OK') {
        $term = 86400 * 365;
        setcookie('email', $_REQUEST['email'], time() + $term, "/");
        setcookie('pwd', $_REQUEST['password'], time() + $term, "/");

        header('Location: index.php');

      } else if ($result == 'BAD_EMAIL' || $result == 'BAD_PWD') {
        header('Location: login.php?email=' . $_REQUEST['email'] . '&password=' . $_REQUEST['password'] . '&result=' . $result);
      } else {

      }
      exit; 

    case 'logout':
      logOut();
      exit; 

    case 'reset_password':
      $result = resetPassword($_REQUEST['email']);
      if ($result == 'OK') {
        header('Location: login.php?email=' . $_REQUEST['email'] . '&password=' . $_REQUEST['password'] . '&result=' . $result);
      } else {
        header('Location: reset.php');
      }
      exit ($result); 
      
    case 'add_account':
      $result = addAccount($_REQUEST['full_name'], $_REQUEST['email'], $_REQUEST['status'], $_REQUEST['password']);
      $url = 'users.php?result=' . $result;
      $url .= '&full_name=' . $_REQUEST['full_name'];
      $url .= '&email=' . $_REQUEST['email'];
      header('Location: ' . $url);
      exit; 

    case 'delete_account':
      deleteAccount($_REQUEST['account_id']);
      header('Location: users.php');
      exit;

    case 'add_notification':
      $result = addNotification($_REQUEST['email']);
      header('Location: notification.php?result=' . $result);
      exit;

    case 'delete_notification':
      deleteNotification($_REQUEST['notification_id']);
      header('Location: notification.php');
      exit;

    case 'download_resume':
      $result = downloadResume($_REQUEST['attachment_id']);
      exit ($result);

    default:
  		# code...
  		break;
  }
?>