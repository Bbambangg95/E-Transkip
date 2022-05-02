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
 $connect = mysqli_connect("localhost", "root", "", "db_transkip");  
 $output = ''; 
 $sql = "SELECT * FROM transkip_akhir WHERE id_nisn='".$_POST["nisn"]."'";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive"> 
           <table class="table table-vcenter card-table">  
                <tr>  
                     <th style="text-align: center; vertical-align: middle;" width="10pt">No</th>  
                     <th style="text-align: center; vertical-align: middle;" width="40%">Nama & NISN</th> 
                     <th style="text-align: center; vertical-align: middle;" width="10pt">Id</th> 
                     <th style="text-align: center; vertical-align: middle;" width="40%">Mata Pelajaran</th> 
                     <th style="text-align: center; vertical-align: top;" width="10pt">KKM</th> 
                     <th style="text-align: center; vertical-align: middle;" width="10pt">Semester 1</th> 
                     <th style="text-align: center; vertical-align: middle;" width="10%">Semester 2</th> 
                     <th style="text-align: center; vertical-align: middle;" width="10%">Semester 3</th>
                     <th style="text-align: center; vertical-align: middle;" width="10%">Semester 4</th>   
                     <th style="text-align: center; vertical-align: middle;" width="10%">Semester 5</th>   
                     <th style="text-align: center; vertical-align: middle;" width="10%">Semester 6</th>    
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
                <tr>  
                     <td style="text-align: center; vertical-align: middle;">'.$row["id"].'</td>  
                     <td>
                         <div class="d-flex py-1 align-items-center">
                         <div class="flex-fill">
                         <div class="nama font-weight-medium" data-id2="'.$row["id"].'" >
                         '.$row["nama"].'
                         </div>
                         <div class="id_nisn text-muted" data-id1="'.$row["id"].'">
                         '.$row["id_nisn"].'
                         </div>
                         </div>
                         </div>
                     </td>  
                     <td class="id_mapel " data-id3="'.$row["id"].'" style="text-align: center; vertical-align: middle;">'.$row["id_mapel"].'</td>  
                     <td class="nama_mapel" data-id4="'.$row["id"].'" style="text-align: left; vertical-align: middle;">'.$row["nama_mapel"].'</td>  
                     <td class="kkm" data-id5="'.$row["id"].'" style="text-align: center; vertical-align: middle;" contenteditable>'.$row["kkm"].'</td>  
                     <td class="nilai1" data-id6="'.$row["id"].'" style="text-align: center; vertical-align: middle;" contenteditable>'.$row["nilai1"].'</td>  
                     <td class="nilai2" data-id7="'.$row["id"].'" style="text-align: center; vertical-align: middle;" contenteditable>'.$row["nilai2"].'</td>  
                     <td class="nilai3" data-id8="'.$row["id"].'" style="text-align: center; vertical-align: middle;" contenteditable>'.$row["nilai3"].'</td>  
                     <td class="nilai4" data-id9="'.$row["id"].'" style="text-align: center; vertical-align: middle;" contenteditable>'.$row["nilai4"].'</td>  
                     <td class="nilai5" data-id10="'.$row["id"].'" style="text-align: center; vertical-align: middle;" contenteditable>'.$row["nilai5"].'</td> 
                     <td class="nilai6" data-id11="'.$row["id"].'" style="text-align: center; vertical-align: middle;" contenteditable>'.$row["nilai6"].'</td>   
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="id_nisn" contenteditable></td>  
                <td id="nama" contenteditable></td>  
                <td id="id_mapel" contenteditable></td>  
                <td id="nama_mapel" contenteditable></td>  
                <td id="kkm" contenteditable></td>  
                <td id="nilai1" contenteditable></td>  
                <td id="nilai2" contenteditable></td>  
                <td id="nilai3" contenteditable></td>  
                <td id="nilai4" contenteditable></td>  
                <td id="nilai5" contenteditable></td>  
                <td id="nilai6" contenteditable></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>