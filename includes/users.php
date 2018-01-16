<?php

class Users {
	public function login(&$request, &$app) {
		$post = $request->paramsPost();
		$email = $post->email;
		$password = md5($post->password);

		if ($stmt = $app->db->prepare("SELECT id FROM users WHERE email = ? and password = ? LIMIT 1")) {
			$stmt->bind_param('ss', $email, $password);
	        $stmt->execute();
	        $stmt->store_result();

	        // get variables from result.
	        $stmt->bind_result($id);
	        $stmt->fetch();

	        if ($stmt->num_rows == 1) {
	        	$_SESSION['user_id'] = $id;

	        	return TRUE;
	        }
		}

		return FALSE;
	}
	
	public function logout() {
		unset($_SESSION['user_id']);
	}

	public function list_users(&$service, &$app) {
		if ($stmt = $app->db->prepare("SELECT * FROM users")) {
	        $stmt->execute();
	        $result = $stmt->get_result();

	        if ($result->num_rows > 0) {
	        	$user_list = array();

	        	while ($row = $result->fetch_assoc()) {
	        		$user_list[] = $row;
        		}

        		$service->users = $user_list;
	        	
	        	$stmt->free_result();
	        	unset($users);
	        }
	    }

	    return FALSE;
	}
}
