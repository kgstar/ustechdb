<?php 
	function logIn ($email, $password) {
		$sql = "SELECT COUNT(*) AS cnt FROM accounts WHERE email = :email AND password = :password"; 
	    	$stmt = query($sql, array(':email' => $email, ':password' => $password));
	    	
	    	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	    	if ($row['cnt'] > 0) {
	   		return 'OK';
	    	} else {
	    		return 'BAD';
	    	}
	}

	function resetPassword ($email) {
		$password = 'qwer1234';
		$title = 'Password is created!';
		$message = 'The new password is "'.$password.'".';
		mail($email, $title, $message);
		return 'OK';
	}

	function isLoggedIn () {
		if (isset($_COOKIE['cookie_email'])) {
			return true;
		} else {
			return false;
		}
		return true;
	}

	function logOut () {
		unset($_COOKIE['cookie_email']);
		setcookie("cookie_email", "", time() - 3600);
		header('Location: login.php');
	}

	function getProfiles ($pageNum = 1, $keyword = '') {
		$where = "";
    	if ($keyword != '') {
    		$where = " WHERE full_name LIKE :q";
    		$where .= " OR email LIKE :q";
    		$where .= " OR phone LIKE :q";
    		$where .= " OR location LIKE :q";
    		$where .= " OR country LIKE :q";
    	}
    	$rowCount = 10;
    	$sql = "
		SELECT * FROM (
			SELECT id, full_name, email, phone, location, country, source, DATE(created_at) AS created_at, uploaded_by  
			FROM profiles 
			" . $where . " 
			ORDER BY full_name 
			LIMIT ".(($pageNum * 1 - 1) * $rowCount).", ".$rowCount." 
		) AS A 
		LEFT OUTER JOIN (SELECT full_name as full_user_name, id AS user_id FROM users) AS B ON A.uploaded_by=B.user_id 
		"; 

    	$stmt = query($sql, array(':q' => '%'.$keyword.'%'));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	function getProfile ($profileId) {
		$sql = "
			SELECT * FROM (
				SELECT id, full_name, email, phone, location, country, resume_body, uploaded_by, source, DATE(created_at) as created_at 
				FROM profiles 
				WHERE id = :id
			) AS A
			LEFT OUTER JOIN (
				SELECT id AS attachment_id, profile_id 
				FROM attachments 
			) AS B ON A.id=B.profile_id
			LEFT OUTER JOIN (
				SELECT id AS user_id, full_name AS download_by  
				FROM users 
			) AS C ON A.uploaded_by=C.user_id
		"; 

    	$stmt = query($sql, array(':id' => $profileId));
		return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getAllProfileCount ($keyword = '') {
		$where = "";
    	if ($keyword != '') {
    		$where = " WHERE full_name LIKE :q";
    		$where .= " OR email LIKE :q";
    		$where .= " OR phone LIKE :q";
    		$where .= " OR location LIKE :q";
    		$where .= " OR country LIKE :q";
    	}
    	$sql = "
			SELECT COUNT(*) AS cnt
			FROM profiles 
			" . $where . "
		"; 

    	$stmt = query($sql, array(':q' => '%'.$keyword.'%'));
    	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    	return $row['cnt'];
    }

    function addAccount ($fullName, $email, $status, $password) {
    	$sql = "
			SELECT COUNT(*) AS cnt 
			FROM accounts 
			WHERE email = :email
		"; 
    	$stmt = query($sql, array(':email' => $email));
    	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($row['cnt'] > 0) {
    		return 'BAD';
    	} else {
	    	$sql = "
				INSERT INTO accounts (`full_name`, `email`, `status`, `password`) 
	    	 	VALUES (:full_name, :email, :status, :password);
			";
	    	query($sql, array(
	    		':full_name' => $fullName,
	    		':email' 	=> $email,
	    		':status' 	=> $status,
	    		':password' => $password
			));
	    	return 'OK';
    	}

    	
    }

    function deleteAccount ($userId) {
    	$sql = "DELETE FROM accounts WHERE id='".$userId."';";
    	query($sql);
    	return 'OK';
    }

    function getAccounts () {
    	$sql = "
			SELECT id, full_name, email, status 
			FROM accounts 
			ORDER BY full_name 
		"; 

    	$stmt = query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function addNotification ($email) {
    	$sql = "
			SELECT COUNT(*) AS cnt
			FROM notifications 
			WHERE email = :email
		"; 

    	$stmt = query($sql, array(':email' => $email));
    	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($row['cnt'] > 0) {
    		return 'BAD';
    	} else {
	    	$sql = "
				INSERT INTO notifications (`email`) 
	    	 	VALUES (:email);
			";
	    	query($sql, array(':email' 	=> $email));
	    	return 'OK';
    	}

    }

    function deleteNotification ($userId) {
    	$sql = "DELETE FROM notifications WHERE id='".$userId."';";
    	query($sql);
    	return 'OK';
    }

    function getNotifications () {
    	$sql = "
			SELECT id, email 
			FROM notifications 
			ORDER BY email 
		"; 

    	$stmt = query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function downloadResume ($attachmentId) {
    	$sql = "
			SELECT id, profile_id, data, mime, file_name
			FROM attachments 
			WHERE id = :id 
		"; 

    	$stmt = query($sql, array(':id' => $attachmentId));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if (sizeof($row)) {
			header("Pragma: public"); 
		    header("Expires: 0");
		    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		    header("Cache-Control: private",false); 
		    header("Content-Type: " . $row['mime']);
		    header("Content-Disposition: attachment; filename=\"".$row['file_name']."\";" );
		    header("Content-Transfer-Encoding: binary");
		    
			echo $row['data'];
		} else {

		}
		return 1;
    }
?>