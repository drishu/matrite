<?php

class Molds {
	public function addMold(&$request, &$service, &$app) {
		$post = $request->paramsPost();
		$denumire_reper = $post->denumire_reper;
		$cod_reper = $post->cod_reper;
		$cantitate = $post->cantitate;
		$cod_matrita = $post->cod_matrita;
		$ciclu_inj = $post->ciclu_inj;

		if ($stmt = $app->db->prepare("INSERT INTO molds 
			(denumire_reper,cod_reper,cantitate,cod_matrita,ciclu_inj)
			VALUES (?,?,?,?,?)
			")) 
		{
			$stmt->bind_param('ssiii', $denumire_reper,$cod_reper,$cantitate,$cod_matrita,$ciclu_inj);
			$stmt->execute();
			$stmt->close();

			return TRUE;
		}

		return FALSE;
	}
}