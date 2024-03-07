<?php

class Image extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Gambar');
    }

    public function index()
    {
        $user = $this->session->userdata('Username');
        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();
        $data = [
            'title' => 'Tambah',
            'albums' => $this->Model_Gambar->Albums($akun['UserID'])->result(),
        ];

        $this->load->view('add_photo', $data);
    }

    public function Album()
    {
        $this->load->view('add_album');
    }

    public function comment($FotoID)
    {
        $data = [
            'title' => 'Tambah',
            'images' => $this->Model_Gambar->ImagesByID($FotoID),
            'comments' => $this->Model_Gambar->getKomenByFotoID($FotoID)
        ];

        $this->load->view('detail', $data);
    }


    public function tambah_gambar()
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10000000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('LokasiFile')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('Image');
        } else {
            $user = $this->input->post('UserID');
            $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();
            $data = array(
                'JudulFoto' => $this->input->post('nama_gambar'),
                'LokasiFile' => $this->upload->data('file_name'),
                'TanggalUnggah' => $this->input->post('TanggalUnggah'),
                'AlbumID' => $this->input->post('AlbumID'),
                'UserID' => $akun['UserID'],

            );

            $this->Model_Gambar->tambah_gambar($data);
            $this->session->set_flashdata('success', 'Gambar berhasil ditambahkan');
            redirect('Welcome');
        }
    }

    public function deleteImage($FotoID)
    {
        $this->db->query("DELETE FROM foto Where FotoID = $FotoID");
        redirect('Welcome');
    }
    public function EditImage($FotoID)
    {
        $user = $this->session->userdata('Username');
        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

        $data = [
            'title' => 'Tambah',
            'albums' => $this->Model_Gambar->Albums($akun['UserID'])->result(),
            'foto' => $this->Model_Gambar->ImagesByID($FotoID)
        ];
        // Load view untuk menampilkan halaman edit
        $this->load->view('edit.php', $data);
    }

    public function ubahImage($FotoID)
    {
        $judul = $this->input->post('JudulFoto');
        $deskrpisi = $this->input->post('DeskripsiFoto');
        $tanggal = $this->input->post('TanggalUnggah');
        $album = $this->input->post('album');
        $user = $this->input->post('user');

        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'png|jpg|webp|gif|jpeg';
        $config['max_size'] = 1000048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('LokasiFile')) {
            // Jika upload gagal, tampilkan pesan kesalahan
            $data = [
                'title' => 'Tambah',
                'albums' => $this->Model_Gambar->Albums($akun['UserID'])->result(),
                'foto' => $this->Model_Gambar->ImagesByID($FotoID),
                'error' => $this->upload->display_errors()
            ];
            $this->load->view('edit.php', $data);
        } else {
            // Jika upload berhasil, lakukan sesuatu (simpan data ke database, dll.)
            $gambar = $this->upload->data();
            $data = [
                'JudulFoto' => $judul,
                'DeskripsiFoto' => $deskrpisi,
                'TanggalUnggah' => $tanggal,
                'LokasiFile' => $gambar['file_name'],
                'AlbumID' => $album,
                'UserID' => $akun['UserID'],
            ];

            $this->Model_Gambar->ubahImage($data, 'foto', $FotoID);
            redirect('Welcome');
        }
    }

    public function tambah_album()
    {
        $config['upload_path'] = './album/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 100000000;

        $user = $this->input->post('user');

        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('album')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('Image/Album');
        } else {
            $data = array(
                'NamaAlbum' => $this->input->post('NamaAlbum'),
                'GambarAlbum' => $this->upload->data('file_name'),
                'TanggalDibuat' => $this->input->post('TanggalDibuat'),
                'Deskripsi' => $this->input->post('Deskripsi'),
                'UserID'  => $akun['UserID'],
            );

            $this->Model_Gambar->tambah_album($data);
            $this->session->set_flashdata('success', 'Gambar berhasil ditambahkan');
            redirect('Welcome');
        }
    }
    public function deleteAlbum($AlbumID)
    {
        $this->db->query("DELETE FROM album Where AlbumID = $AlbumID");
        redirect('Welcome');
    }

    public function like()
    {
        $photoId = $this->input->post('photoId');
        $userId = $this->input->post('userId');
        $tanggal = $this->input->post('tanggal');

        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($userId)])->row_array();

        $like = $this->db->get_where('likefoto', [
            'UserID' => $akun['UserID'],
            'FotoID' => $photoId,
        ])->row_array();


        if ($like) {
            $dataToBeDeleted = array(
                'FotoID' => $photoId,
                'UserID' => $akun['UserID']
            );

            $this->Model_Gambar->hapusLike($dataToBeDeleted['UserID'], $dataToBeDeleted['FotoID']);

            $likesData = $this->Model_Gambar->getLikesByFotoID($photoId);

            $likeAkun = $this->Model_Gambar->getLikesByUserID($akun['UserID'], $photoId);

            // Berikan respons (response) ke klien (browser)
            $response = array(
                'status' => 'success',
                'message' => 'Photo liked deleted',
                'likes' => count($likesData),
                'likeAkun' => $likeAkun
            );

            echo json_encode($response);
        } else {
            $data = [
                'FotoID' => $photoId,
                'UserID' => $akun['UserID'],
                'TanggalLike' => $tanggal
            ];

            //menambahkan like dari user ke database
            $this->Model_Gambar->tambahLike($data, 'likefoto');

            $likesData = $this->Model_Gambar->getLikesByFotoID($photoId);
            $likeAkun = $this->Model_Gambar->getLikesByUserID($akun['UserID'], $photoId);

            // Berikan respons (response) ke klien (browser)
            $response = array(
                'status' => 'success',
                'message' => 'Photo liked successfully',
                'likes' => count($likesData),
                'likeAkun' => $likeAkun
            );

            echo json_encode($response);
        }
    }
    public function komen()
    {
        $photoId = $this->input->post('FotoID');
        $user = $this->input->post('UserID');
        $tanggal = $this->input->post('TanggalKomentar');
        $comentar = $this->input->post('IsiKomentar');

        $akun = $this->db->get_where('user', ['Username' => $user])->row_array();
        if (!$comentar) {
            //nothing
        } else {
            $data = [
                'FotoID' => $photoId,
                'UserID' => $akun['UserID'],
                'IsiKomentar' => $comentar,
                'TanggalKomentar' => $tanggal,

            ];

            $this->Model_Gambar->tambahKomen($data, 'komentarfoto');
            redirect('Image/comment/' . $photoId);
        }
    }

    public function komentar()
    {
        $fotoID = $this->input->get('FotoID');
        // Lakukan query untuk mendapatkan komentar berdasarkan FotoID
        $komentarData = $this->Model_Gambar->getKomenByFotoID($fotoID);

        $response = array(
            'komentar' => $komentarData
        );

        // Kembalikan data dalam format JSON
        echo json_encode($response);
    }
}
