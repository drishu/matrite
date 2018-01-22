<?php

class Molds {
	public function addMold(&$request, &$service, &$app) {
		$post = $request->paramsPost();
		$denumire_reper = $post->denumire_reper;
		$cod_reper = $post->cod_reper;
		$cantitate = $post->cantitate;
		$cod_matrita = $post->cod_matrita;
		$nr_cuiburi = $post->nr_cuiburi;
		$greutate_culee = $post->greutate_culee;
		$greutate_fara_cule = $post->greutate_fara_cule;
		$dimensiuni_reper = $post->dimensiuni_reper;
		$dim_matrita_h = $post->dim_matrita_h;
		$numar_rezistente = $post->numar_rezistente;
		$dim_matrita_lat = $post->dim_matrita_lat;
		$diametru_inel_centrare = $post->diametru_inel_centrare;
		$dim_matrita_lung = $post->dim_matrita_lung;
		$pregatire_matrita = $post->pregatire_matrita;
		$demontare_matrita_masina = $post->demontare_matrita_masina;
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
		$rezistenta_cuib_tc = $post->rezistenta_cuib_tc;
		$rezistenta_cuib_buc = $post->rezistenta_cuib_buc;
		$rezistenta_centrala_tc = $post->rezistenta_centrala_tc;
		$rezistenta_centrala_buc = $post->rezistenta_centrala_buc;
		$rezistenta_bloc_tc = $post->rezistenta_bloc_tc;
		$rezistenta_bloc_buc = $post->rezistenta_bloc_buc;

		if ($stmt = $app->db->prepare("INSERT INTO molds 
			(denumire_reper,cod_reper,cantitate,cod_matrita,ciclu_inj,nr_cuiburi,greutate_culee,greutate_fara_cule,dimensiuni_reper,dim_matrita_h,dim_matrita_lat,diametru_inel_centrare,dim_matrita_lung,pregatire_matrita,demontare_matrita_masina,cuib1,legaturi_rezistente_a1,legaturi_rezistente_b1,legaturi_sonde_a1,legaturi_sonde_b1,cuib2,legaturi_rezistente_a2,legaturi_rezistente_b2,legaturi_sonde_a2,legaturi_sonde_b2,cuib3,legaturi_rezistente_a3,legaturi_rezistente_b3,legaturi_sonde_a3,legaturi_sonde_b3,cuib4,legaturi_rezistente_a4,legaturi_rezistente_b4,legaturi_sonde_a4,legaturi_sonde_b4,cuib5,legaturi_rezistente_a5,legaturi_rezistente_b5,legaturi_sonde_a5,legaturi_sonde_b5,cuib6,legaturi_rezistente_a6,legaturi_rezistente_b6,legaturi_sonde_a6,legaturi_sonde_b6,cuib7,legaturi_rezistente_a7,legaturi_rezistente_b7,legaturi_sonde_a7,legaturi_sonde_b7,cuib8,legaturi_rezistente_a8,legaturi_rezistente_b8,legaturi_sonde_a8,legaturi_sonde_b8,cuib9,legaturi_rezistente_a9,legaturi_rezistente_b9,legaturi_sonde_a9,legaturi_sonde_b9,cuib10,legaturi_rezistente_a10,legaturi_rezistente_b10,legaturi_sonde_a10,legaturi_sonde_b10,rezistenta_cuib_tc,rezistenta_cuib_buc,rezistenta_centrala_tc,rezistenta_centrala_buc,rezistenta_bloc_tc,rezistenta_bloc_buc)
			VALUES (?,?,?,?,?, ?,?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?)
			")) 
		{
			$stmt->bind_param('ssiii', $denumire_reper,$cod_reper,$cantitate,$cod_matrita,$ciclu_inj);
			$stmt->execute();
			$stmt->close();

            return true;
        }

        return false;
    }
}