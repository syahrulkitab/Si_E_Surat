<?php

namespace Master;

use Config\Query_builder;

class Pengguna
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('tb_pengguna')->get()->resultArray();
        $res = '<a href="?target=tb_pengguna&act=tambah_tb_pengguna" class="btn btn-info btn-sm">Tambah Pengguna</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Id Pengguna</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="100">'.$r['id_pengguna'].'</td>
                <td>'.$r['username'].'</td>
                <td width="10">'.$r['password'].'</td>
                <td width="150">
                    <a href="?target=tb_pengguna&act=edit_tb_pengguna&id='.$r['id_pengguna'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=tb_pengguna&act=delete_tb_pengguna&id='.$r['id_pengguna'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
        $res .='</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=tb_pengguna" class="btn btn-danger btn-sm">kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tb_pengguna&act=simpan_tb_pengguna">
            <div class="mb-3">
                <label for="id_pengguna" class="form-label">id_pengguna</label>
                <input type="text" class="form-control" id="id_pengguna" name="id_pengguna">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>
        </div><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $id_pengguna = $_POST['id_pengguna'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = array(
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'password' => $password
        );
        return $this->db->table('tb_pengguna')->insert($data);
    }
    public function edit($id)
    {
        //get data tb_pengguna
        $r = $this->db->table('tb_pengguna')->where("id_pengguna='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=tb_pengguna" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tb_pengguna&act=update_tb_pengguna">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_pengguna'].'">
            
            <div class="mb-3">
                <label for="id_pengguna" class="form-label">id_pengguna</label>
                <input type="text" class="form-control" id="id_pengguna" name="id_pengguna" value="'.$r['id_pengguna'].'">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" value="'.$r['username'].'">
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="text" class="form-control" id="password" name="password" value="'.$r['password'].'">
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
        $id_pengguna = $_POST['id_pengguna'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = array(
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'password' => $password
        );
        return $this->db->table('tb_pengguna')->where("id_pengguna='$param'")->update($data);
    }

    public function delete($id){
        return $this->db->table(' tb_pengguna ')->where(" id_pengguna='$id' ")->delete();
    }
}


