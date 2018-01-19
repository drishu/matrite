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

	public function listUsers(&$service, &$app) {
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

	public function getUser($id, &$service, &$app) {
		if ($stmt = $app->db->prepare("SELECT * FROM users WHERE id = ?")) {
			$stmt->bind_param('i', $id);
	        $stmt->execute();
	        $result = $stmt->get_result();

	        if ($result->num_rows > 0) {
	        	$user = array();

	        	if ($user = $result->fetch_assoc()) {
	        		$service->user = $user;	
	        	}
	        	
	        	$stmt->free_result();
	        	unset($user);
	        }
	    }

	    return FALSE;	
	}

	public function editUser($id, &$request, &$service, &$app) {
		$post = $request->paramsPost();
		$email = $post->email;

		// If no password is set then we leave it be
		if (empty($post->password)) {
			if ($stmt = $app->db->prepare("UPDATE users SET email = ? WHERE id = ?")) {
				$stmt->bind_param('si', $email, $id);
				$stmt->execute();
				$stmt->close();

				return TRUE;
			}
		}
		else {
			$password = md5($post->password);

			if ($stmt = $app->db->prepare("UPDATE users SET email = ?, password = ? WHERE id = ?")) {
				$stmt->bind_param('ssi', $email, $password, $id);
				$stmt->execute();
				$stmt->close();

				return TRUE;
			}
		}

		return FALSE;
	}

	public function addUser(&$request, &$service, &$app) {
		$post = $request->paramsPost();
		$email = $post->email;
		$password = md5($post->password);

		if ($stmt = $app->db->prepare("INSERT INTO users (email, password) VALUES (?, ?)")) {
			$stmt->bind_param('ss', $email, $password);
			$stmt->execute();
			$stmt->close();

			return TRUE;
		}

		return FALSE;
	}

	public function deleteUser($id, &$request, &$service, &$app) {
		if ($stmt = $app->db->prepare("DELETE FROM users WHERE id = ?")) {
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();

			return TRUE;
		}

		return FALSE;
	}
}
