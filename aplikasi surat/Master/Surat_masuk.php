<?php

namespace Master;

use Config\Query_builder;

class Surat_masuk
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('tb_surat_masuk')->get()->resultArray();
        $res = '<a href="?target=tb_surat_masuk&act=tambah_tb_surat_masuk" class="btn btn-info btn-sm">Tambah Surat Masuk</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id surat masuk</th>
                    <th>no agenda</th>
                    <th>nomor surat</th>
                    <th>tanggal surat</th>
                    <th>asal surat</th>
                    <th>perihal</th>
                    <th>file surat</th>
                    <th>penerima</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="100">'.$r['id_surat_masuk'].'</td>
                <td>'.$r['no_agenda'].'</td>
                <td>'.$r['nomor_surat'].'</td>
                <td>'.$r['tanggal_surat'].'</td>
                <td>'.$r['asal_surat'].'</td>
                <td>'.$r['perihal'].'</td>
                <td>'.$r['file_surat'].'</td>
                <td>'.$r['penerima'].'</td>
                <td width="150">
                    <a href="?target=tb_surat_masuk&act=edit_tb_surat_masuk&id='.$r['id_surat_masuk'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=tb_surat_masuk&act=delete_tb_surat_masuk&id='.$r['id_surat_masuk'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
        $res .='</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=tb_surat_masuk" class="btn btn-danger btn-sm">kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tb_surat_masuk&act=simpan_tb_surat_masuk">
            <div class="mb-3">
                <label for="id_surat_masuk" class="form-label">id_surat_masuk</label>
                <input type="text" class="form-control" id="id_surat_masuk" name="id_surat_masuk">
            </div>
            <div class="mb-3">
                <label for="no_agenda" class="form-label">no_agenda</label>
                <input type="text" class="form-control" id="no_agenda" name="no_agenda">
            </div>
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">nomor_surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
            </div>
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">tanggal_surat</label>
                <input type="text" class="form-control" id="tanggal_surat" name="tanggal_surat">
            </div>
            <div class="mb-3">
                <label for="asal_surat" class="form-label">asal_surat</label>
                <input type="text" class="form-control" id="asal_surat" name="asal_surat">
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal">
            </div>
            <div class="mb-3">
                <label for="file_surat" class="form-label">file_surat</label>
                <input type="text" class="form-control" id="file_surat" name="file_surat">
            </div>
            <div class="mb-3">
                <label for="penerima" class="form-label">penerima</label>
                <input type="text" class="form-control" id="penerima" name="penerima">
            </div>
        </div><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $id_surat_masuk = $_POST['id_surat_masuk'];
        $no_agenda = $_POST['no_agenda'];
        $nomor_surat = $_POST['nomor_surat'];
        $tanggal_surat = $_POST['tanggal_surat'];
        $asal_surat = $_POST['asal_surat'];
        $perihal = $_POST['perihal'];
        $file_surat = $_POST['file_surat'];
        $penerima = $_POST['penerima'];

        $data = array(
            'id_surat_masuk' => $id_surat_masuk,
            'no_agenda' => $no_agenda,
            'nomor_surat' => $nomor_surat,
            'tanggal_surat' => $tanggal_surat,
            'asal_surat' => $asal_surat,
            'perihal' => $perihal,
            'file_surat' => $file_surat,
            'penerima' => $penerima
        );
        return $this->db->table('tb_surat_masuk')->insert($data);
    }
    public function edit($id)
    {
        //get data tb_surat_masuk
        $r = $this->db->table('tb_surat_masuk')->where("id_surat_masuk='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=tb_surat_masuk" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tb_surat_masuk&act=update_tb_surat_masuk">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_surat_masuk'].'">
            
            <div class="mb-3">
                <label for="id_surat_masuk" class="form-label">id_surat_masuk</label>
                <input type="text" class="form-control" id="id_surat_masuk" name="id_surat_masuk" value="'.$r['id_surat_masuk'].'">
            </div>
            <div class="mb-3">
                <label for="no_agenda" class="form-label">no_agenda</label>
                <input type="text" class="form-control" id="no_agenda" name="no_agenda" value="'.$r['no_agenda'].'">
            </div>
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">nomor_surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="'.$r['nomor_surat'].'">
            </div>
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">tanggal_surat</label>
                <input type="text" class="form-control" id="tanggal_surat" name="tanggal_surat" value="'.$r['tanggal_surat'].'">
            </div>
            <div class="mb-3">
                <label for="asal_surat" class="form-label">asal_surat</label>
                <input type="text" class="form-control" id="asal_surat" name="asal_surat" value="'.$r['asal_surat'].'">
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="'.$r['perihal'].'">
            </div>
            <div class="mb-3">
                <label for="file_surat" class="form-label">file_surat</label>
                <input type="text" class="form-control" id="file_surat" name="file_surat" value="'.$r['file_surat'].'">
            </div>
            <div class="mb-3">
                <label for="penerima" class="form-label">penerima</label>
                <input type="text" class="form-control" id="penerima" name="penerima" value="'.$r['penerima'].'">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;
    }

    public function cekRadio($val, $val2){
        if($val==$val2){
            return "checked";
        }
        return "";
    }

    public function update(){
        $param = $_POST['param'];
        $id_surat_masuk = $_POST['id_surat_masuk'];
        $no_agenda = $_POST['no_agenda'];
        $nomor_surat = $_POST['nomor_surat'];
        $tanggal_surat = $_POST['tanggal_surat'];
        $asal_surat = $_POST['asal_surat'];
        $perihal = $_POST['perihal'];
        $file_surat = $_POST['file_surat'];
        $penerima = $_POST['penerima'];

        $data = array(
            'id_surat_masuk' => $id_surat_masuk,
            'no_agenda' => $no_agenda,
            'nomor_surat' => $nomor_surat,
            'tanggal_surat' => $tanggal_surat,
            'asal_surat' => $asal_surat,
            'perihal' => $perihal,
            'file_surat' => $file_surat,
            'penerima' => $penerima
        );
        return $this->db->table('tb_surat_masuk')->where("id_surat_masuk='$param'")->update($data);
    }

    public function delete($id){
        return $this->db->table(' tb_surat_masuk ')->where(" id_surat_masuk='$id' ")->delete();
    }
}


