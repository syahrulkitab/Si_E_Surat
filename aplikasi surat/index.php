<?php

include('autoload.php');
include('Config/Database.php');

use Master\Surat_masuk;
use Master\Menu;
use Master\Surat_keluar;
use Master\Pengguna;

$menu = new Menu();
$tb_surat_keluar = new Surat_keluar($datakoneksi);
$tb_surat_masuk = new Surat_masuk($datakoneksi);
$tb_pengguna = new Pengguna($datakoneksi);
// $surat_keluar->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Surat</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">E-SURAT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['Link']; ?>" class="nav-link">
                                    <?php echo $r['Text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat datang di beranda";
                // ======= start kontent surat_keluar =====
            } elseif ($target == "tb_surat_keluar") {
                if ($act == "tambah_tb_surat_keluar") {
                    echo $tb_surat_keluar->tambah();
                } elseif ($act == "simpan_tb_surat_keluar") {
                    if ($tb_surat_keluar->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=tb_surat_keluar';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=tb_surat_keluar';
                            </script>";
                    }
                } elseif ($act == "edit_tb_surat_keluar") {
                    $id = $_GET['id'];
                    echo $tb_surat_keluar->edit($id);
                } elseif ($act == "update_tb_surat_keluar") {
                    if ($tb_surat_keluar->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=tb_surat_keluar';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=tb_surat_keluar';
                            </script>";
                    }
                } elseif ($act == "delete_tb_surat_keluar") {
                    $id = $_GET['id'];
                    if ($tb_surat_keluar->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=tb_surat_keluar';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=tb_surat_keluar';
                            </script>";
                    }
                } else {
                    echo $tb_surat_keluar->index();
                }
                // ====== end konten mahasiswa ======
                // dosen
            } elseif ($target == "tb_surat_masuk") {
                if ($act == "tambah_tb_surat_masuk") {
                    echo $tb_surat_masuk->tambah();
                } elseif ($act == "simpan_tb_surat_masuk") {
                    if ($tb_surat_masuk->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=tb_surat_masuk';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=tb_surat_masuk';
                            </script>";
                    }
                } elseif ($act == "edit_tb_surat_masuk") {
                    $id = $_GET['id'];
                    echo $tb_surat_masuk->edit($id);
                } elseif ($act == "update_tb_surat_masuk") {
                    if ($tb_surat_masuk->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=tb_surat_masuk';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=tb_surat_masuk';
                            </script>";
                    }
                } elseif ($act == "delete_tb_surat_masuk") {
                    $id = $_GET['id'];
                    if ($tb_surat_masuk->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=tb_surat_masuk';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=tb_surat_masuk';
                            </script>";
                    }
                } else {
                    echo $tb_surat_masuk->index();
                }
                //prodi
            } elseif ($target == "tb_pengguna") {
                if ($act == "tambah_tb_pengguna") {
                    echo $tb_pengguna->tambah();
                } elseif ($act == "simpan_tb_pengguna") {
                    if ($tb_pengguna->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=tb_pengguna';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=tb_pengguna';
                            </script>";
                    }
                } elseif ($act == "edit_tb_pengguna") {
                    $id = $_GET['id'];
                    echo $tb_pengguna->edit($id);
                } elseif ($act == "update_tb_pengguna") {
                    if ($tb_pengguna->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=tb_pengguna';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=tb_pengguna';
                            </script>";
                    }
                } elseif ($act == "delete_tb_pengguna") {
                    $id = $_GET['id'];
                    if ($tb_pengguna->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=tb_pengguna';
                            </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=tb_pengguna';
                            </script>";
                    }
                } else {
                    echo $tb_pengguna->index();
                }

                //no page
            } else {
                echo "page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>

</html>