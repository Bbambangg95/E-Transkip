<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title> TRANSKIP NILAI RAPOR SMAS PLUS BAHRUL ULUM SUNGAILIAT </title>
    <style type="text/css">
       
    </style>
    <link href="pdf_viewers.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div style="height: 1247px;
      width: 795px;
      margin-left: auto;
      margin-right: auto;">
<div class="container-sm">
    <div>
        <p class="lh-sm text-center">
            <span class="fs-6">PEMERINTAH PROVINSI KEPULAUAN BANGKA BELITUNG</span><br/>
            <span class="fs-6 fw-bold">DINAS PENDIDIKAN</span><br/>
            PELAKSANA TEKNIS DINAS SATUAN PENDIDIKAN<br/>
            SMAS PLUS BAHRUL ULUM SUNGAILIAT<br/>
            <label class="lh-sm text-center text-muted" style='font-size:10px'>
            Jl. Matras Lama Sinar Jaya Jelutung Sungailiat - Bangka 33211<br/>
            Email : info@bahrululumic.org Call Centre : 081392952965</label>
        </p>
        <hr class="border-top border-5 border-dark"/>
        <p class="fw-bold text-center" style='font-size:14px'>TRANSKIP NILAI RAPOR SEMESTER 1-6</p>
        <?php
            if (isset($_GET['nisn'])) {
                $nisn = $_GET['nisn'];
                $sql = mysqli_query($koneksi, "SELECT * FROM transkip_akhir WHERE id_nisn='$nisn' AND id_mapel IN (1,2,3,4,5,6)") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    if($data = mysqli_fetch_assoc($sql)){?>
        <p class="fw-bold" style='font-size:11px'>
        Nama&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:&ensp;<?php echo $data['nama']; ?></br>
        Nomor Induk Siswa (NIS)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&ensp;<?php echo $data['id_nisn']; ?></br>
        Nomor Induk Siswa Nasional (NISN)&emsp;&emsp;&emsp;:&ensp;<?php echo $data['id_nisn']; ?></br>
            </pre>
        </p>
        <?php
                    } 
        }?>
    </div>
    <div>
        <table class="table table-bordered fs-sm p-3 text-center" id="table1" style="font-size:10px;">
		<thead class="border-bottom" >
            <tr class="border-2  fw-bold" >
                <td class="border-2 align-middle" rowspan="3" >NO</td>
                <td class="border-2 align-middle" width="700px" rowspan="3" style="padding:0rem;">MATA PELAJARAN</td>
                <td class="border-2 align-middle" rowspan="3">KKM</td>
                <td class="border-2" colspan="6" style="padding:5px 5px;">CATATAN SEMESTER</td>
                <td class="border-2 align-middle " rowspan="3 " >Rata-rata/Mata Pelajaran</td>
            </tr>
            <tr class="border-2  fw-bold">
                <td colspan="2" style="padding:1px 5px;">KELAS X</td>
                <td colspan="2" style="padding:0rem 5px;">KELAS XI</td>
                <td colspan="2" style="padding:0rem 5px;">KELAS XII</td>
            </tr>
            <tr class="border-2  fw-bold" >
                <td width="10px" style="padding:0rem 5px;">Semester 1</td>
                <td width="10px" style="padding:0rem 5px;">Semester 2</td>
                <td width="10px" style="padding:0rem 5px;">Semester 3</td>
                <td width="10px" style="padding:0rem 5px;">Semester 4</td>
                <td width="10px" style="padding:0rem 5px;">Semester 5</td>
                <td width="10px" style="padding:0rem 5px;">Semester 6</td>
            </tr>
        </thead>

        <tbody>
            <tr class="table table-bordered"> 
            <td class="border-top text-start fw-bold" colspan="12">Kelompok A</td>
            </tr>
                
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM transkip_akhir_rata WHERE id_nisn='$nisn' AND id_mapel IN (1,2,3,4,5,6)") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    while($data = mysqli_fetch_assoc($sql)){ 
                        echo '
                        <tr >
                            <td style="padding:5px 5px">'.$data['id_mapel'].'</td>
                            <td class="text-start" style="padding:5px 5px">'.$data['nama_mapel'].'</td>
                            <td style="padding:5px 5px">'.$data['kkm'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai1'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai2'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai3'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai4'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai5'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai6'].'</td>
                            <td style="padding:5px 5px">'.round($data['rata_rata']).'</td>
                        </tr>
                        ';
                    }
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tr> 
            <td class="border-top text-start fw-bold" colspan="12">Kelompok B</td>
            </tr>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM transkip_akhir_rata WHERE id_nisn='$nisn' AND id_mapel IN (7,8,9,10)") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    while($data = mysqli_fetch_assoc($sql)){
                        echo '
                        <tr>
                            <td style="padding:5px 5px">'.$data['id_mapel'].'</td>
                            <td class="text-start" style="padding:5px 5px">'.$data['nama_mapel'].'</td>
                            <td style="padding:5px 5px">'.$data['kkm'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai1'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai2'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai3'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai4'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai5'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai6'].'</td>
                            <td style="padding:5px 5px">'.round($data['rata_rata']).'</td>
                        </tr>
                        ';
                    }
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tr> 
            <td class="border-top text-start fw-bold" colspan="12">Kelompok C</td>
            </tr>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM transkip_akhir_rata WHERE id_nisn='$nisn' AND id_mapel IN (11,12,13,14,15,16)") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    while($data = mysqli_fetch_assoc($sql)){
                        echo '
                        <tr>
                            <td style="padding:5px 5px">'.$data['id_mapel'].'</td>
                            <td class="text-start" style="padding:5px 5px">'.$data['nama_mapel'].'</td>
                            <td style="padding:5px 5px">'.$data['kkm'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai1'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai2'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai3'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai4'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai5'].'</td>
                            <td style="padding:5px 5px">'.$data['nilai6'].'</td>
                            <td style="padding:5px 5px">'.round($data['rata_rata']).'</td>
                        </tr>
                        ';
                    }
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
        <tbody>
		</table>
    </div>
</div>
<?php }?>
<div class="container"> 
<div class="row">
 <div class="col">
    </div>
    <div class="col">
    </div>
<div class="col">
<p class="text-center fw-bold" style='font-size:13px'>Kepala Sekolah,</br></br></br></br></br>Farizal, S.E.</br><label calas="text-muted">NIP............</label>
</div>
</div>
</div>

</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>