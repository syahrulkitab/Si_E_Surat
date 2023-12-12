<?php

namespace Master;

use Config\Query_builder;

class Surat_keluar
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('tb_surat_keluar')->get()->resultArray();
        $res = '<a href="?target=tb_surat_keluar&act=tambah_tb_surat_keluar" class="btn btn-info btn-sm">Tambah Surat Keluar</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id Surat Keluar </th>
                    <th>no agenda</th>
                    <th>tanggal surat</th>
                    <th>tujuan surat</th>
                    <th>nomor surat </th>
                    <th>perihal</th>
                    <th>file surat</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="100">'.$r['id_surat_keluar'].'</td>
                <td>'.$r['no_agenda'].'</td>
                <td>'.$r['tanggal_surat'].'</td>
                <td>'.$r['tujuan_surat'].'</td>
                <td>'.$r['nomor_surat'].'</td>
                <td>'.$r['perihal'].'</td>
                <td>'.$r['file_surat'].'</td>
                <td width="150">
                    <a href="?target=tb_surat_keluar&act=edit_tb_surat_keluar&id='.$r['id_surat_keluar'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=tb_surat_keluar&act=delete_tb_surat_keluar&id='.$r['id_surat_keluar'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
        $res .='</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=tb_surat_keluar" class="btn btn-danger btn-sm">kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tb_surat_keluar&act=simpan_tb_surat_keluar">
            <div class="mb-3">
                <label for="id_surat_keluar" class="form-label">id surat masuk</label>
                <input type="text" class="form-control" id="id_surat_keluar" name="id_surat_keluar">
            </div>
            <div class="mb-3">
                <label for="no_agenda" class="form-label">no agenda</label>
                <input type="text" class="form-control" id="no_agenda" name="no_agenda">
            </div>
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">tanggal surat</label>
                <input type="text" class="form-control" id="tanggal_surat" name="tanggal_surat">
            </div>
            <div class="mb-3">
                <label for="tujuan_surat" class="form-label">tujuan surat</label>
                <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat">
            </div>
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">nomor surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal">
            </div>
            <div class="mb-3">
                <label for="file_surat" class="form-label">file surat</label>
                <input type="text" class="form-control" id="file_surat" name="file_surat">
            </div>
        </div><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $id_surat_keluar = $_POST['id_surat_keluar'];
        $no_agenda = $_POST['no_agenda'];
        $tanggal_surat = $_POST['tanggal_surat'];
        $tujuan_surat = $_POST['tujuan_surat'];
        $nomor_surat = $_POST['nomor_surat'];
        $perihal = $_POST['perihal'];
        $file_surat = $_POST['file_surat'];

        $data = array(
            'id_surat_keluar' => $id_surat_keluar,
            'no_agenda' => $no_agenda,
            'tanggal_surat' => $tanggal_surat,
            'tujuan_surat' => $tujuan_surat,
            'nomor_surat' => $nomor_surat,
            'perihal' => $perihal,
            'file_surat' => $file_surat
        );
        return $this->db->table('tb_surat_keluar')->insert($data);
    }
    public function edit($id)
    {
        //get data tb_surat_keluar
        $r = $this->db->table('tb_surat_keluar')->where("id_surat_keluar='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=tb_surat_keluar" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tb_surat_keluar&act=update_tb_surat_keluar">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_surat_keluar'].'">
            
            <div class="mb-3">
                <label for="id_surat_keluar" class="form-label">id_surat_keluar</label>
                <input type="text" class="form-control" id="id_surat_keluar" name="id_surat_keluar" value="'.$r['id_surat_keluar'].'">
            </div>
            <div class="mb-3">
                <label for="no_agenda" class="form-label">No Agenda</label>
                <input type="text" class="form-control" id="no_agenda" name="no_agenda" value="'.$r['no_agenda'].'">
            </div>
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="text" class="form-control" id="tanggal_surat" name="tanggal_surat" value="'.$r['tanggal_surat'].'">
            </div>
            <div class="mb-3">
                <label for="tujuan_surat" class="form-label">tujuan surat</label>
                <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat" value="'.$r['tujuan_surat'].'">
            </div>
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="'.$r['nomor_surat'].'">
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="'.$r['perihal'].'">
            </div>
            <div class="mb-3">
                <label for="file_surat" class="form-label">File_Surat</label>
                <input type="text" class="form-control" id="file_surat" name="file_surat" value="'.$r['file_surat'].'">
            </div>
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
        $id_surat_keluar = $_POST['id_surat_keluar'];
        $no_agenda = $_POST['no_agenda'];
        $tanggal_surat = $_POST['tanggal_surat'];
        $tujuan_surat = $_POST['tujuan_surat'];
        $nomor_surat = $_POST['nomor_surat'];
        $perihal = $_POST['perihal'];
        $file_surat = $_POST['file_surat'];

        $data = array(
            'id_surat_keluar' => $id_surat_keluar,
            'no_agenda' => $no_agenda,
            'tanggal_surat' => $tanggal_surat,
            'tujuan_surat' => $tujuan_surat,
            'nomor_surat' => $nomor_surat,
            'perihal' => $perihal,
            'file_surat' => $file_surat
        );
        return $this->db->table('tb_surat_keluar')->where("id_surat_keluar='$param'")->update($data);
    }

    public function delete($id){
        return $this->db->table(' tb_surat_keluar ')->where("id_surat_keluar='$id' ")->delete();
    }
}


