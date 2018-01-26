<?php

class Molds {
	/**
	 * Add mold data.
	 */
	public function addMold(&$request, &$app) {
		$post = $request->paramsPost();
		$denumire_reper = $post->denumire_reper;
		$material = $post->material;
		$cod_reper = $post->cod_reper;
		$cantitate = $post->cantitate;
		$cod_matrita = $post->cod_matrita;
		$ciclu_inj = $post->ciclu_inj;
		$nr_cuiburi = $post->nr_cuiburi;
		$greutate_culee = $post->greutate_culee;
		$greutate_fara_cule = $post->greutate_fara_cule;
		$dimensiuni_reper = $post->dimensiuni_reper;
		$dim_matrita_h = $post->dim_matrita_h;
		$numar_rezistente = $post->numar_rezistente;
		$dim_matrita_lat = $post->dim_matrita_lat;
		$diametru_inel_centrare = $post->diametru_inel_centrare;
		$dim_matrita_lung = $post->dim_matrita_lung;
		$observatii = $post->observatii;
		$pregatire_matrita = NULL;
		if (!empty($post->pregatire_matrita)) {
			$pregatire_matrita = implode('|', $post->pregatire_matrita);
		}
		$demontare_matrita_masina = NULL;
		if (!empty($post->demontare_matrita_masina)) {
			$demontare_matrita_masina = implode('|', $post->demontare_matrita_masina);	
		}
		$cuib1 = $post->cuib1;
		$legaturi_rezistente_a1 = $post->legaturi_rezistente_a1;
		$legaturi_rezistente_b1 = $post->legaturi_rezistente_b1;
		$legaturi_sonde_a1 = $post->legaturi_sonde_a1;
		$legaturi_sonde_b1 = $post->legaturi_sonde_b1;
		$cuib2 = $post->cuib2;
		$legaturi_rezistente_a2 = $post->legaturi_rezistente_a2;
		$legaturi_rezistente_b2 = $post->legaturi_rezistente_b2;
		$legaturi_sonde_a2 = $post->legaturi_sonde_a2;
		$legaturi_sonde_b2 = $post->legaturi_sonde_b2;
		$cuib3 = $post->cuib3;
		$legaturi_rezistente_a3 = $post->legaturi_rezistente_a3;
		$legaturi_rezistente_b3 = $post->legaturi_rezistente_b3;
		$legaturi_sonde_a3 = $post->legaturi_sonde_a3;
		$legaturi_sonde_b3 = $post->legaturi_sonde_b3;
		$cuib4 = $post->cuib4;
		$legaturi_rezistente_a4 = $post->legaturi_rezistente_a4;
		$legaturi_rezistente_b4 = $post->legaturi_rezistente_b4;
		$legaturi_sonde_a4 = $post->legaturi_sonde_a4;
		$legaturi_sonde_b4 = $post->legaturi_sonde_b4;
		$cuib5 = $post->cuib5;
		$legaturi_rezistente_a5 = $post->legaturi_rezistente_a5;
		$legaturi_rezistente_b5 = $post->legaturi_rezistente_b5;
		$legaturi_sonde_a5 = $post->legaturi_sonde_a5;
		$legaturi_sonde_b5 = $post->legaturi_sonde_b5;
		$cuib6 = $post->cuib6;
		$legaturi_rezistente_a6 = $post->legaturi_rezistente_a6;
		$legaturi_rezistente_b6 = $post->legaturi_rezistente_b6;
		$legaturi_sonde_a6 = $post->legaturi_sonde_a6;
		$legaturi_sonde_b6 = $post->legaturi_sonde_b6;
		$cuib7 = $post->cuib7;
		$legaturi_rezistente_a7 = $post->legaturi_rezistente_a7;
		$legaturi_rezistente_b7 = $post->legaturi_rezistente_b7;
		$legaturi_sonde_a7 = $post->legaturi_sonde_a7;
		$legaturi_sonde_b7 = $post->legaturi_sonde_b7;
		$cuib8 = $post->cuib8;
		$legaturi_rezistente_a8 = $post->legaturi_rezistente_a8;
		$legaturi_rezistente_b8 = $post->legaturi_rezistente_b8;
		$legaturi_sonde_a8 = $post->legaturi_sonde_a8;
		$legaturi_sonde_b8 = $post->legaturi_sonde_b8;
		$cuib9 = $post->cuib9;
		$legaturi_rezistente_a9 = $post->legaturi_rezistente_a9;
		$legaturi_rezistente_b9 = $post->legaturi_rezistente_b9;
		$legaturi_sonde_a9 = $post->legaturi_sonde_a9;
		$legaturi_sonde_b9 = $post->legaturi_sonde_b9;
		$cuib10 = $post->cuib10;
		$legaturi_rezistente_a10 = $post->legaturi_rezistente_a10;
		$legaturi_rezistente_b10 = $post->legaturi_rezistente_b10;
		$legaturi_sonde_a10 = $post->legaturi_sonde_a10;
		$legaturi_sonde_b10 = $post->legaturi_sonde_b10;
		$component_name = $post->component_name;
		$component_tc = $post->component_tc;
		$component_buc = $post->component_buc;

		if ($stmt = $app->db->prepare("INSERT INTO molds 
			(denumire_reper,material,cod_reper,cantitate,cod_matrita,ciclu_inj,nr_cuiburi,greutate_culee,greutate_fara_cule,dimensiuni_reper,dim_matrita_h,numar_rezistente,dim_matrita_lat,diametru_inel_centrare,dim_matrita_lung,observatii,pregatire_matrita,demontare_matrita_masina,cuib1,legaturi_rezistente_a1,legaturi_rezistente_b1,legaturi_sonde_a1,legaturi_sonde_b1,cuib2,legaturi_rezistente_a2,legaturi_rezistente_b2,legaturi_sonde_a2,legaturi_sonde_b2,cuib3,legaturi_rezistente_a3,legaturi_rezistente_b3,legaturi_sonde_a3,legaturi_sonde_b3,cuib4,legaturi_rezistente_a4,legaturi_rezistente_b4,legaturi_sonde_a4,legaturi_sonde_b4,cuib5,legaturi_rezistente_a5,legaturi_rezistente_b5,legaturi_sonde_a5,legaturi_sonde_b5,cuib6,legaturi_rezistente_a6,legaturi_rezistente_b6,legaturi_sonde_a6,legaturi_sonde_b6,cuib7,legaturi_rezistente_a7,legaturi_rezistente_b7,legaturi_sonde_a7,legaturi_sonde_b7,cuib8,legaturi_rezistente_a8,legaturi_rezistente_b8,legaturi_sonde_a8,legaturi_sonde_b8,cuib9,legaturi_rezistente_a9,legaturi_rezistente_b9,legaturi_sonde_a9,legaturi_sonde_b9,cuib10,legaturi_rezistente_a10,legaturi_rezistente_b10,legaturi_sonde_a10,legaturi_sonde_b10)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
			")) 
		{
			$cast = 'sisisiiddsiiidisssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';
			$stmt->bind_param($cast, $denumire_reper, $material, $cod_reper, $cantitate, $cod_matrita, $ciclu_inj, $nr_cuiburi, $greutate_culee, $greutate_fara_cule, $dimensiuni_reper, $dim_matrita_h, $numar_rezistente, $dim_matrita_lat, $diametru_inel_centrare, $dim_matrita_lung, $observatii, $pregatire_matrita, $demontare_matrita_masina, $cuib1, $legaturi_rezistente_a1, $legaturi_rezistente_b1, $legaturi_sonde_a1, $legaturi_sonde_b1, $cuib2, $legaturi_rezistente_a2, $legaturi_rezistente_b2, $legaturi_sonde_a2, $legaturi_sonde_b2, $cuib3, $legaturi_rezistente_a3, $legaturi_rezistente_b3, $legaturi_sonde_a3, $legaturi_sonde_b3, $cuib4, $legaturi_rezistente_a4, $legaturi_rezistente_b4, $legaturi_sonde_a4, $legaturi_sonde_b4, $cuib5, $legaturi_rezistente_a5, $legaturi_rezistente_b5, $legaturi_sonde_a5, $legaturi_sonde_b5, $cuib6, $legaturi_rezistente_a6, $legaturi_rezistente_b6, $legaturi_sonde_a6, $legaturi_sonde_b6, $cuib7, $legaturi_rezistente_a7, $legaturi_rezistente_b7, $legaturi_sonde_a7, $legaturi_sonde_b7, $cuib8, $legaturi_rezistente_a8, $legaturi_rezistente_b8, $legaturi_sonde_a8, $legaturi_sonde_b8, $cuib9, $legaturi_rezistente_a9, $legaturi_rezistente_b9, $legaturi_sonde_a9, $legaturi_sonde_b9, $cuib10, $legaturi_rezistente_a10, $legaturi_rezistente_b10, $legaturi_sonde_a10, $legaturi_sonde_b10);
			$stmt->execute();
			$id = $stmt->insert_id;
			$stmt->close();

			// Insert components.
			foreach ($component_name as $key => $name) {
				if ($stmt = $app->db->prepare("INSERT INTO components
					(mold_id, name, tc, buc) 
					VALUES (?, ?, ?, ?)
				")) {
					$stmt->bind_param('issi', $id, $name, $component_tc[$key], $component_buc[$key]);
		            $stmt->execute();
		            $stmt->close();
				}
			}

            return true;
        }

        return false;
    }

    /**
     * List all molds.
     */
    public function listMolds(&$controller, &$request, &$app) {
        if ($stmt = $app->db->prepare("SELECT * FROM molds")) {
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $list = array();
                $materials = $controller->listMaterials($app);

                while ($row = $result->fetch_assoc()) {
                	$row['material'] = $controller->getMaterial($row['material'], $app);
                	$row['greutate'] = 0;

                	if ($row['material']) {
                		$row['greutate'] = $row['greutate_fara_cule'] * $row['cantitate'];
                		$row['greutate'] = round($row['greutate'] / 1000);
                	}
                	
                	$row['materials'] = array();
                	
                	// Business logic.
                	if ($materials && $row['cantitate'] > 0) {
            			foreach ($materials as $material) {
            				$kgmc = $row['greutate'] * $material['factor'];
            				$gbuc = ($kgmc / $row['cantitate']) * 1000;
            				$row['materials'][$material['name']] = array(
            					'kgmc' => $this->_formatNumber($kgmc),
            					'gbuc' => $this->_formatNumber($gbuc),
            				);
            			}
                	} else {
                		// Prevent undefined index in case cantitate is not set.
                		foreach ($materials as $material) {
            				$row['materials'][$material['name']] = array(
            					'kgmc' => 0,
            					'gbuc' => 0,
            				);
            			}
                	}

                    $list[] = $row;
                }
                
                $stmt->free_result();
                
                return $list;
            }
        }

        return array();
    }

    private function _formatNumber($decimal) {
        $d = sprintf("%0.3f", $decimal);
        // Round up the decimals.
        $d = round($d * 100) / 100;
        return $d;
    }

    /**
     * Get data for mold by its id.
     */
    public function getMold($id, &$app) {
    	if ($stmt = $app->db->prepare("SELECT * FROM molds WHERE id = ?")) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $item = array();

                if ($item = $result->fetch_assoc()) {
                	$item['pregatire_matrita'] = explode('|', $item['pregatire_matrita']);
        			$item['demontare_matrita_masina'] = explode('|', $item['demontare_matrita_masina']);
        			$item['components'] = $this->_getComponents($id, $app);

                    return $item;
                }
                
                $stmt->free_result();
            }
        }

        return false; 
    }

    private function _getComponents($mold_id, &$app) {
    	$list = array();

    	if ($stmt = $app->db->prepare("SELECT * FROM components WHERE mold_id = ?")) {
            $stmt->bind_param('i', $mold_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $item = array();

                while ($item = $result->fetch_assoc()) {
                    $list[] = $item;
                }
                
                $stmt->free_result();
            }
        }

        return $list;
    }

    /**
	 * Update mold data.
	 */
	public function updateMold($id, &$request, &$service, &$app) {
		$post = $request->paramsPost();
		$denumire_reper = $post->denumire_reper;
		$material = $post->material;
		$cod_reper = $post->cod_reper;
		$cantitate = $post->cantitate;
		$cod_matrita = $post->cod_matrita;
		$ciclu_inj = $post->ciclu_inj;
		$nr_cuiburi = $post->nr_cuiburi;
		$greutate_culee = $post->greutate_culee;
		$greutate_fara_cule = $post->greutate_fara_cule;
		$dimensiuni_reper = $post->dimensiuni_reper;
		$dim_matrita_h = $post->dim_matrita_h;
		$numar_rezistente = $post->numar_rezistente;
		$dim_matrita_lat = $post->dim_matrita_lat;
		$diametru_inel_centrare = $post->diametru_inel_centrare;
		$dim_matrita_lung = $post->dim_matrita_lung;
		$observatii = $post->observatii;
		$pregatire_matrita = NULL;
		if (!empty($post->pregatire_matrita)) {
			$pregatire_matrita = implode('|', $post->pregatire_matrita);
		}
		$demontare_matrita_masina = NULL;
		if (!empty($post->demontare_matrita_masina)) {
			$demontare_matrita_masina = implode('|', $post->demontare_matrita_masina);	
		}
		$cuib1 = $post->cuib1;
		$legaturi_rezistente_a1 = $post->legaturi_rezistente_a1;
		$legaturi_rezistente_b1 = $post->legaturi_rezistente_b1;
		$legaturi_sonde_a1 = $post->legaturi_sonde_a1;
		$legaturi_sonde_b1 = $post->legaturi_sonde_b1;
		$cuib2 = $post->cuib2;
		$legaturi_rezistente_a2 = $post->legaturi_rezistente_a2;
		$legaturi_rezistente_b2 = $post->legaturi_rezistente_b2;
		$legaturi_sonde_a2 = $post->legaturi_sonde_a2;
		$legaturi_sonde_b2 = $post->legaturi_sonde_b2;
		$cuib3 = $post->cuib3;
		$legaturi_rezistente_a3 = $post->legaturi_rezistente_a3;
		$legaturi_rezistente_b3 = $post->legaturi_rezistente_b3;
		$legaturi_sonde_a3 = $post->legaturi_sonde_a3;
		$legaturi_sonde_b3 = $post->legaturi_sonde_b3;
		$cuib4 = $post->cuib4;
		$legaturi_rezistente_a4 = $post->legaturi_rezistente_a4;
		$legaturi_rezistente_b4 = $post->legaturi_rezistente_b4;
		$legaturi_sonde_a4 = $post->legaturi_sonde_a4;
		$legaturi_sonde_b4 = $post->legaturi_sonde_b4;
		$cuib5 = $post->cuib5;
		$legaturi_rezistente_a5 = $post->legaturi_rezistente_a5;
		$legaturi_rezistente_b5 = $post->legaturi_rezistente_b5;
		$legaturi_sonde_a5 = $post->legaturi_sonde_a5;
		$legaturi_sonde_b5 = $post->legaturi_sonde_b5;
		$cuib6 = $post->cuib6;
		$legaturi_rezistente_a6 = $post->legaturi_rezistente_a6;
		$legaturi_rezistente_b6 = $post->legaturi_rezistente_b6;
		$legaturi_sonde_a6 = $post->legaturi_sonde_a6;
		$legaturi_sonde_b6 = $post->legaturi_sonde_b6;
		$cuib7 = $post->cuib7;
		$legaturi_rezistente_a7 = $post->legaturi_rezistente_a7;
		$legaturi_rezistente_b7 = $post->legaturi_rezistente_b7;
		$legaturi_sonde_a7 = $post->legaturi_sonde_a7;
		$legaturi_sonde_b7 = $post->legaturi_sonde_b7;
		$cuib8 = $post->cuib8;
		$legaturi_rezistente_a8 = $post->legaturi_rezistente_a8;
		$legaturi_rezistente_b8 = $post->legaturi_rezistente_b8;
		$legaturi_sonde_a8 = $post->legaturi_sonde_a8;
		$legaturi_sonde_b8 = $post->legaturi_sonde_b8;
		$cuib9 = $post->cuib9;
		$legaturi_rezistente_a9 = $post->legaturi_rezistente_a9;
		$legaturi_rezistente_b9 = $post->legaturi_rezistente_b9;
		$legaturi_sonde_a9 = $post->legaturi_sonde_a9;
		$legaturi_sonde_b9 = $post->legaturi_sonde_b9;
		$cuib10 = $post->cuib10;
		$legaturi_rezistente_a10 = $post->legaturi_rezistente_a10;
		$legaturi_rezistente_b10 = $post->legaturi_rezistente_b10;
		$legaturi_sonde_a10 = $post->legaturi_sonde_a10;
		$legaturi_sonde_b10 = $post->legaturi_sonde_b10;
		$component_name = $post->component_name;
		$component_tc = $post->component_tc;
		$component_buc = $post->component_buc;

		if ($stmt = $app->db->prepare("UPDATE molds SET
			denumire_reper = ?,
			material = ?,
			cod_reper = ?,
			cantitate = ?,
			cod_matrita = ?,
			ciclu_inj = ?,
			nr_cuiburi = ?,
			greutate_culee = ?,
			greutate_fara_cule = ?,
			dimensiuni_reper = ?,
			dim_matrita_h = ?,
			numar_rezistente = ?,
			dim_matrita_lat = ?,
			diametru_inel_centrare = ?,
			dim_matrita_lung = ?,
			observatii = ?,
			pregatire_matrita = ?,
			demontare_matrita_masina = ?,
			cuib1 = ?,
			legaturi_rezistente_a1 = ?,
			legaturi_rezistente_b1 = ?,
			legaturi_sonde_a1 = ?,
			legaturi_sonde_b1 = ?,
			cuib2 = ?,
			legaturi_rezistente_a2 = ?,
			legaturi_rezistente_b2 = ?,
			legaturi_sonde_a2 = ?,
			legaturi_sonde_b2 = ?,
			cuib3 = ?,
			legaturi_rezistente_a3 = ?,
			legaturi_rezistente_b3 = ?,
			legaturi_sonde_a3 = ?,
			legaturi_sonde_b3 = ?,
			cuib4 = ?,
			legaturi_rezistente_a4 = ?,
			legaturi_rezistente_b4 = ?,
			legaturi_sonde_a4 = ?,
			legaturi_sonde_b4 = ?,
			cuib5 = ?,
			legaturi_rezistente_a5 = ?,
			legaturi_rezistente_b5 = ?,
			legaturi_sonde_a5 = ?,
			legaturi_sonde_b5 = ?,
			cuib6 = ?,
			legaturi_rezistente_a6 = ?,
			legaturi_rezistente_b6 = ?,
			legaturi_sonde_a6 = ?,
			legaturi_sonde_b6 = ?,
			cuib7 = ?,
			legaturi_rezistente_a7 = ?,
			legaturi_rezistente_b7 = ?,
			legaturi_sonde_a7 = ?,
			legaturi_sonde_b7 = ?,
			cuib8 = ?,
			legaturi_rezistente_a8 = ?,
			legaturi_rezistente_b8 = ?,
			legaturi_sonde_a8 = ?,
			legaturi_sonde_b8 = ?,
			cuib9 = ?,
			legaturi_rezistente_a9 = ?,
			legaturi_rezistente_b9 = ?,
			legaturi_sonde_a9 = ?,
			legaturi_sonde_b9 = ?,
			cuib10 = ?,
			legaturi_rezistente_a10 = ?,
			legaturi_rezistente_b10 = ?,
			legaturi_sonde_a10 = ?,
			legaturi_sonde_b10 = ?
			WHERE id = ?
			"))
		{
			$cast = 'sisisiiddsiiidisssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';
			$stmt->bind_param($cast, $denumire_reper, $material, $cod_reper, $cantitate, $cod_matrita, $ciclu_inj, $nr_cuiburi, $greutate_culee, $greutate_fara_cule, $dimensiuni_reper, $dim_matrita_h, $numar_rezistente, $dim_matrita_lat, $diametru_inel_centrare, $dim_matrita_lung, $observatii, $pregatire_matrita, $demontare_matrita_masina, $cuib1, $legaturi_rezistente_a1, $legaturi_rezistente_b1, $legaturi_sonde_a1, $legaturi_sonde_b1, $cuib2, $legaturi_rezistente_a2, $legaturi_rezistente_b2, $legaturi_sonde_a2, $legaturi_sonde_b2, $cuib3, $legaturi_rezistente_a3, $legaturi_rezistente_b3, $legaturi_sonde_a3, $legaturi_sonde_b3, $cuib4, $legaturi_rezistente_a4, $legaturi_rezistente_b4, $legaturi_sonde_a4, $legaturi_sonde_b4, $cuib5, $legaturi_rezistente_a5, $legaturi_rezistente_b5, $legaturi_sonde_a5, $legaturi_sonde_b5, $cuib6, $legaturi_rezistente_a6, $legaturi_rezistente_b6, $legaturi_sonde_a6, $legaturi_sonde_b6, $cuib7, $legaturi_rezistente_a7, $legaturi_rezistente_b7, $legaturi_sonde_a7, $legaturi_sonde_b7, $cuib8, $legaturi_rezistente_a8, $legaturi_rezistente_b8, $legaturi_sonde_a8, $legaturi_sonde_b8, $cuib9, $legaturi_rezistente_a9, $legaturi_rezistente_b9, $legaturi_sonde_a9, $legaturi_sonde_b9, $cuib10, $legaturi_rezistente_a10, $legaturi_rezistente_b10, $legaturi_sonde_a10, $legaturi_sonde_b10, $id);
			$stmt->execute();
			$stmt->close();

			// Prepare insertion of new items.
			if ($stmt = $app->db->prepare("DELETE FROM components WHERE mold_id = ?")) {
				$stmt->bind_param('i', $id);
	            $stmt->execute();
	            $stmt->close();
			}

			// Insert components.
			foreach ($component_name as $key => $name) {
				if ($stmt = $app->db->prepare("INSERT INTO components
					(mold_id, name, tc, buc) 
					VALUES (?, ?, ?, ?)
				")) {
					$stmt->bind_param('issi', $id, $name, $component_tc[$key], $component_buc[$key]);
		            $stmt->execute();
		            $stmt->close();
				}
			}

			// Handle fielupload.
			if ($this->handleFileupload($id, $service)) {
				// update mold.
			}

            return true;
        }

        return false;
    }

    private function handleFileupload($id, &$service) {
		// Check if image file is a actual image or fake image
		if(isset($_FILES['moldFile']['tmp_name']) && !empty($_FILES['moldFile']['tmp_name'])) {
			$uploadOk = TRUE;
			$imageFileType = strtolower(pathinfo(basename($_FILES['moldFile']['name']), PATHINFO_EXTENSION));
			$target_file = __DIR__ . "/uploads/{$id}.{$imageFileType}";

			// Allow certain file formats
			$allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

			if(!in_array($imageFileType, $allowed)) {
			    $service->flash("doar formatele JPG, JPEG, PNG & GIF sunt permise.", 'alert-danger');
			    $uploadOk = FALSE;
			}

			// Check if $uploadOk is set to 0 by an error
		    if ($uploadOk && move_uploaded_file($_FILES['moldFile']['tmp_name'], $target_file)) {
		        $service->flash("The file ". basename($_FILES['moldFile']['name']). " has been uploaded.", 'alert-success');
		    } else {
		        $service->flash('Fisierul nu a putut fi incarcat, probabil legat de permisiuni.', 'alert-danger');
		    }
		}
    }

	public function order(&$app) {
		$denumire_reper = "%mas%";
        if ($stmt = $app->db->prepare("SELECT * FROM molds WHERE denumire_reper LIKE ? ORDER BY cod_reper ASC")) {
            $stmt->bind_param('s', $denumire_reper);
			$stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $list = array();

                while ($row = $result->fetch_assoc()) {
                    $list[] = $row;
                }

                $stmt->free_result();
                
				return $list;
            }
        }

        return false;
	}
}