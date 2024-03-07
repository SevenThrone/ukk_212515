<?php
defined('BASEPATH') or exit('No direct script access allowed');

class League extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Gambar');
	}

	public function index($AlbumID)
	{
		$username = $this->session->userdata('Username');
		$akun = $this->db->get_where('user', ['Username' => $username])->row_array();
		$this->session->set_userdata('previous_page', current_url());
		$Album = $this->Model_Gambar->MyAlbumsByID($AlbumID)->row_array();

		$data = [
			'Image' => $this->Model_Gambar->Image($AlbumID)->result(),
			'album' => $Album['NamaAlbum']
		];

		$this->load->view('Page/Gallery.php', $data);
	}
	public function back()
	{
		// Ambil URL halaman sebelumnya dari session
		$previous_page = $this->session->userdata('previous_page');

		// Jika ada URL sebelumnya, redirect ke sana
		if ($previous_page) {
			redirect($previous_page);
		} else {
			// Jika tidak ada URL sebelumnya, redirect ke halaman default
			redirect('Image');
		}
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

			$this->Galeri->hapusLike($dataToBeDeleted['UserID'], $dataToBeDeleted['FotoID']);

			$likesData = $this->Galeri->getLikesByFotoID($photoId);

			$likeAkun = $this->Galeri->getLikesByUserID($akun['UserID'], $photoId);

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
			$this->Galeri->tambahLike($data, 'likefoto');

			$likesData = $this->Galeri->getLikesByFotoID($photoId);
			$likeAkun = $this->Galeri->getLikesByUserID($akun['UserID'], $photoId);

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
}
