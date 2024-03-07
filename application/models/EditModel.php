<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditModel extends CI_Model {

    public function getImage($FotoID) {
        // Fetch data from database based on FotoID
        // Example:
        $query = $this->db->get_where('foto', array('FotoID' => $FotoID));
        return $query->row();
    }

    public function updateImage($data) {
        // Update the data in the database
        // Example:
        $this->db->where('FotoID', $data['FotoID']);
        unset($data['FotoID']); // Remove FotoID from data array as it's not needed for update
        $this->db->update('foto', $data);
    }

}
