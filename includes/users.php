<?php

class Users {
	public function login(&$request, &$app) {
		$post = $request->paramsPost();
		$email = $post->email;
		$password = md5($post->password);

		if ($stmt = $app->db->prepare("SELECT id FROM users WHERE email = ? and password = ? LIMIT 1")) {
			$stmt->bind_param('ss', $email, $password);
	        $user = $stmt->execute();
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
}
