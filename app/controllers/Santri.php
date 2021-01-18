<?php

class Santri extends Controller {
    public function index(){

        $data['judul'] = 'Santri';
        $data['santri'] = $this->model('Santri_model')->getAllSantri();
        $this->view('templates/header', $data);
        $this->view('santri/index', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if($this->model('Santri_model')->tambahSantri($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'primary');
            header('Location: '.BASEURL.'/Santri');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/Santri');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('Santri_model')->hapusSantri($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'primary');
            header('Location: '.BASEURL.'/Santri');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/Santri');
            exit;
        }
    }

    public function getubah(){
        echo json_encode($this->model('Santri_model')->getSantriById($_POST['id']));
    }

    public function edit(){
        if($this->model('Santri_model')->editSantri($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diedit', 'primary');
            header('Location: '.BASEURL.'/Santri');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diedit', 'danger');
            header('Location: '.BASEURL.'/Santri');
            exit;
        }
    }



}