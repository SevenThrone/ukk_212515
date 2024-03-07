<?php

class Model_Gambar extends CI_Model {

    public function tambah_gambar($data) {
        $this->db->insert('foto', $data);
        return $this->db->insert_id();
    }

    function Image($Album) {
        return $this->db->query("SELECT * FROM foto WHERE AlbumID = '$Album'");
    }
    function Albums() {
        return $this->db->get('album');
    }

    public function tambah_album($data) {
        $this->db->insert('album', $data);
        return $this->db->insert_id();
    }

    function ubahImage($data, $table, $FotoID){
        $this->db->where('FotoID', $FotoID);
        $this->db->update($table, $data);
    }
    function MyAlbums($user){
        return $this->db->query("SELECT * FROM album WHERE UserID = '$user'");
    }

        function Images(){
            return $this->db->query("SELECT foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, foto.AlbumID, foto.UserID AS FotoUserID, user.UserID AS UserUserID, user.Username, user.Email, user.NamaLengkap, user.Alamat FROM foto INNER JOIN user ON foto.UserID = user.UserID;");
        }
        function ImagesByID($FotoID){
            $this->db->select('foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, foto.AlbumID, foto.UserID AS FotoUserID, user.UserID AS UserUserID, user.Username, user.Email, user.NamaLengkap, user.Alamat');
            $this->db->from('foto');
            $this->db->where('foto.FotoID', $FotoID);
            $this->db->join('user', 'foto.UserID = user.UserID');
            return $this->db->get()->result();
        }
        function MyAlbumsByID($AlbumID){
            return $this->db->query("SELECT * FROM album WHERE AlbumID = '$AlbumID'");
        }
        public function getLikesByFotoID($fotoID) {
            return $this->db->where('FotoID', $fotoID)->get('likefoto')->result();
        }
        function tambahLike($data, $table){
			$this->db->insert($table, $data);
		}
        function hapusLike($user, $foto){
			$this->db->query("DELETE FROM likefoto WHERE `likefoto`.`UserID` = $user AND `likefoto`.`FotoID` = $foto");
		}   
        public function getLikesByUserID($UserID, $FotoID) {
            return $this->db->get_where('likefoto', ['UserID' => $UserID, 'FotoID' => $FotoID])->result();
        }

        function getKomenByFotoID($FotoID) {
        // Lakukan query untuk mendapatkan komentar berdasarkan FotoID
        $query = $this->db->query("SELECT komentarfoto.Isikomentar, komentarfoto.TanggalKomentar, user.Username FROM komentarfoto INNER JOIN user ON komentarfoto.UserID = user.UserID WHERE FotoID = '$FotoID'");

        // Periksa apakah query berhasil
        if ($query) {
            // Kembalikan hasil query dalam bentuk array
            return $query->result_array();
        } else {
            // Jika query gagal, kembalikan array kosong atau nilai yang sesuai
            return array();
        }
    }
    function tambahKomen($data, $table){
        $this->db->insert($table, $data);
    }
}

