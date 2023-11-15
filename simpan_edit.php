<?php
include('koneksi.php');

$nomor_surat = $_GET['nomor_surat'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];

$direktori = "berkas/";
$file_name = $_FILES['NamaFileEdit']['name'];
move_uploaded_file($_FILES['NamaFileEdit']['tmp_name'],$direktori.$file_name);

$action = $_POST['action'];

function edit_data($koneksi, $nmr, $ktgr, $jdl, $flnm){
    $upd = "UPDATE arsip
            SET     kategori = '$ktgr',
                    judul = '$jdl',
                    file = '$flnm'
            WHERE   nomor_surat = '$nmr' ";
    return $koneksi->query($upd);
}

function edit_data_kosong($koneksi, $nmr, $ktgr, $jdl){
    $upd = "UPDATE arsip
            SET     kategori = '$ktgr',
                    judul = '$jdl'
            WHERE   nomor_surat = '$nmr' ";
    return $koneksi->query($upd);
}

if(strtolower($action) == 'edit'){
    
    if(!empty($file_name)){
        $check = edit_data($koneksi, $nomor_surat, $kategori, $judul, $file_name);
        if($check){
            echo 'Data berhasil diedit';
        }
        else{
            echo 'Data gagal diedit';
            echo mysqli_error($koneksi);
        }    
    } else {
        $check = edit_data_kosong($koneksi, $nomor_surat, $kategori, $judul);
        if($check){
            echo 'Data berhasil diedit';
        }
        else{
            echo 'Data gagal diedit';
            echo mysqli_error($koneksi);
        }    
    }
}
?>

<a href="index.php"> Kembali </a>