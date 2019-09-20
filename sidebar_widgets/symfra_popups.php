<?php
include('manage/connection.php');
if(isset($_POST['submit']))
{
$fileName = $_FILES['file']['name'];
$file = $_FILES['file']['tmp_name'];

// Getting Extension
$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
$allowedType = array('csv');

if (!in_array($fileExtension, $allowedType))
{
  echo "Invalid Extension";
}

else
{
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
$item1 = $filesop[0];
$item2 = $filesop[1];
$item3 = $filesop[2];
$item4 = $filesop[3];
$item5 = $filesop[4];
$item6 = $filesop[5];
$item7 = $filesop[6];
$item8 = $filesop[7];
$item9 = $filesop[8];
$item10 = $filesop[9];
$item11 = $filesop[10];
$item12 = $filesop[11];
$item13 = $filesop[12];
$item14 = $filesop[13];
$item15 = $filesop[14];
$item16 = $filesop[15];
$item17 = $filesop[16];
$item18 = $filesop[17];
$item19 = $filesop[18];
$item20 = $filesop[19];
$item21 = $filesop[20];
$item22 = $filesop[21];
$item23 = $filesop[22];
$item24 = $filesop[23];
$item25 = $filesop[24];
$item26 = $filesop[25];
$item27 = $filesop[26];
$item28 = $filesop[27];
$item29 = $filesop[28];
$item30 = $filesop[29];
$item31 = $filesop[30];
$item32 = $filesop[31];
$item33 = $filesop[32];


$sql = mysqli_query($con, "INSERT INTO empinfo (cnicNo, ntnNo, empFName, empMName, empLName, empName, empGrdName, empDOB, empCell, empOffice, empHomeNo, empEmergencyNo, emergRel, empMaritalStatus, empSpouseName, empChildren, empDept, empDesig, empGrade, empEntity, lineManager, empCountry, empCity, empAddress, empOrgano, empDOJ, empWorkEmail, empPerEmail, empGender, leavePckg, empType, savedStatus, passportNo) VALUES ('".$item1."', '".$item2."', '".$item3."', '".$item4."', '".$item5."', '".$item6."', '".$item7."', '".$item8."', '".$item9."', '".$item10."', '".$item11."', '".$item12."', '".$item13."', '".$item14."', '".$item15."', '".$item16."', '".$item17."', '".$item18."', '".$item19."', '".$item20."', '".$item21."', '".$item22."', '".$item23."', '".$item24."', '".$item25."', '".$item26."', '".$item27."', '".$item28."', '".$item29."', '".$item30."', '".$item31."', '".$item32."', '".$item33."')");

$c = $c + 1;
}

if($sql){
echo "Your database has imported successfully. You have inserted ". $c ." records";
}else{
echo "Error is: " . mysqli_error($con);
}

} 
}


?>
<!--Employee Import popup-->
<div class="modal fade symfra_popup2" id="popup_2" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Import Options</h4>
                </div>
                <form name="import" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                   <div class="input-fields"> 
                      <label>Import</label>  
                      <select>
                        <option>Employee List</option>
                      </select>   
                      <input type="file" name="file" /><br />
                  <input type="submit" name="submit" value="Submit" />
                  </div>
                  <!-- <input type="file" name="file" /><br />
                  <input type="submit" name="submit" value="Submit" /> -->
                  

                </div>
                <div class="modal-footer">
                  <p><a href="sample_file/Sample HR Info File.csv"> Click here</a> to download the sample file</p>
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
                
              </form>
              </div>
              
            </div>
</div>
