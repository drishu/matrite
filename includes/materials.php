<?php

class Materials {
	public function listMaterials(&$service, &$app) {
		if ($stmt = $app->db->prepare("SELECT * FROM materials")) {
	        $stmt->execute();
	        $result = $stmt->get_result();

	        if ($result->num_rows > 0) {
	        	$list = array();

	        	while ($row = $result->fetch_assoc()) {
	        		$list[] = $row;
        		}

        		$service->materials = $list;
	        	
	        	$stmt->free_result();
	        	unset($list);
	        }
	    }

	    return FALSE;
	}

	public function addMaterial(&$request, &$service, &$app) {
		$post = $request->paramsPost();
		$name = $post->name;

		if ($stmt = $app->db->prepare("INSERT INTO materials (name) VALUES (?)")) {
			$stmt->bind_param('s', $name);
			$stmt->execute();
			$stmt->close();

			return TRUE;
		}

		return FALSE;
	}

	public function getMaterial($id, &$service, &$app) {
		if ($stmt = $app->db->prepare("SELECT * FROM materials WHERE id = ?")) {
			$stmt->bind_param('i', $id);
	        $stmt->execute();
	        $result = $stmt->get_result();

	        if ($result->num_rows > 0) {
	        	$item = array();

	        	if ($item = $result->fetch_assoc()) {
	        		$service->material = $item;	
	        	}
	        	
	        	$stmt->free_result();
	        	unset($item);
	        }
	    }

	    return FALSE;	
	}

	public function editMaterial($id, &$request, &$service, &$app) {
		$post = $request->paramsPost();
		$name = $post->name;

		if ($stmt = $app->db->prepare("UPDATE materials SET name = ? WHERE id = ?")) {
			$stmt->bind_param('sd', $name, $id);
			$stmt->execute();
			$stmt->close();

			return TRUE;
		}

		return FALSE;
	}

	public function deleteMaterial($id, &$request, &$service, &$app) {
		if ($stmt = $app->db->prepare("DELETE FROM materials WHERE id = ?")) {
			$stmt->bind_param('d', $id);
			$stmt->execute();
			$stmt->close();

			return TRUE;
		}

		return FALSE;
	}
}