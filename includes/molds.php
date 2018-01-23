<?php

class Molds
{
    public function addMold(&$request, &$app) 
    {
        $post = $request->paramsPost();
        $denumire_reper = $post->denumire_reper;
        $cod_reper = $post->cod_reper;
        $cantitate = $post->cantitate;
        $cod_matrita = $post->cod_matrita;
        $ciclu_inj = $post->ciclu_inj;

        if ($stmt = $app->db->prepare(
            "INSERT INTO molds 
			(denumire_reper,cod_reper,cantitate,cod_matrita,ciclu_inj)
			VALUES (?,?,?,?,?)
			"
        )
        ) {
            $stmt->bind_param('ssiii', $denumire_reper, $cod_reper, $cantitate, $cod_matrita, $ciclu_inj);
            $stmt->execute();
            $stmt->close();

            return true;
        }

        return false;
    }

    public function listMolds(&$request, &$app) {
        if ($stmt = $app->db->prepare("SELECT * FROM molds")) {
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

        return array();
    }
}