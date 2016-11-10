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
      	if ($_REQUEST['remember'] == true) {
        	setcookie("cookie_email", $_REQUEST["email"], time() + $term, "/", $_SERVER['HTTP_HOST'], false, true);	
        } else {
        	setcookie("cookie_email", $_REQUEST["email"], 0, "/", $_SERVER['HTTP_HOST'], false, true);	
        }
        
       	header('Location: index.php');

      } else {
        header('Location: login.php?result=' . $result);
      }
      exit; 

    case 'logout':
      logOut();
      exit; 

    case 'reset_password':
      $result = resetPassword($_REQUEST['email']);
      if ($result == 'OK') {
        header('Location: login.php?result=' . $result);
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