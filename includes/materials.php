<?php

class Materials
{
    public function listMaterials(&$service, &$app) 
    {
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

        return false;
    }

    public function addMaterial(&$request, &$service, &$app) 
    {
        $post = $request->paramsPost();
        $name = $post->name;
        $factor = $post->factor;

        if ($stmt = $app->db->prepare("INSERT INTO materials (name,factor) VALUES (?,?)")) {
            $stmt->bind_param('sd', $name, $factor);
            $stmt->execute();
            $stmt->close();

            return true;
        }

        return false;
    }

    public function getMaterial($id, &$service, &$app) 
    {
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

        return false;    
    }

    public function editMaterial($id, &$request, &$service, &$app) 
    {
        $post = $request->paramsPost();
        $name = $post->name;
        $factor = $post->factor;

        if ($stmt = $app->db->prepare("UPDATE materials SET name = ?, factor = ? WHERE id = ?")) {
            $stmt->bind_param('ssi', $name, $factor, $id);
            $stmt->execute();
            $stmt->close();

            return true;
        }

        return false;
    }

    public function deleteMaterial($id, &$request, &$service, &$app) 
    {
        if ($stmt = $app->db->prepare("DELETE FROM materials WHERE id = ?")) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();

            return true;
        }

        return false;
    }
}