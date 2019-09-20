<?php

include('manage/connection.php');

$LeavePckg = $_POST["LeavePckg"];

$casualDays = $_POST["casualDays"];
$Casual = $_POST["Casual"];
$CasualLapse = 0;

$SickDays = $_POST["SickDays"];
$Sick = $_POST["Sick"];
$SickLapse = 0;

$AnnualDays = $_POST["AnnualDays"];
$Annual = $_POST["Annual"];
$AnnualLapse = 0;

$PaternityDays = $_POST["PaternityDays"];
$Paternity = $_POST["Paternity"];
$PaternityLapse = 0;

$MaternityDays = $_POST["MaternityDays"];
$Maternity = $_POST["Maternity"];
$MaternityLapse = 0;

$BereavementDays = $_POST["BereavementDays"];
$Bereavement = $_POST["Bereavement"];
$BereavementLapse = 0;

$OthersDays = $_POST["OthersDays"];
$Others = $_POST["Others"];
$OthersLapse = 0;


//echo $casualDays;
echo $Casual;
//echo $CasualLapse;

if ($casualDays != '')
{
  if ($Casual == 'None')
  {
    $carryForward_CL = 0;
    $encashement_CL = 0;
    $lapseYears_CL = 0;
  }
  else if ($Casual == 'Encashment')
  {
    $carryForward_CL = 0;
    $encashement_CL = 1;
    $lapseYears_CL = 0;
  }
  else if ($Casual == 'Carry Forward')
  {
    $carryForward_CL = 1;
    $encashement_CL = 0;
    if ($CasualLapse == '')
    {
      $lapseYears_CL = 0;
    }
    else
    {
      $lapseYears_CL = $CasualLapse;
    }

  }

  mysqli_query($con, "INSERT INTO leavesetup (leavePckg, leaveType, leaveDays, carryForward, encashement, lapseYears) VALUES ('".$LeavePckg."', 'Casual', '".$casualDays."', '".$carryForward_CL."', '".$encashement_CL."', '".$lapseYears_CL."') ");
}

else
{
  echo '<br>Casual days not given';
}

if ($SickDays != '')
{
  if ($Sick == 'None')
  {
    $carryForward_SL = 0;
    $encashement_SL = 0;
    $lapseYears_SL = 0;
  }
  else if ($Sick == 'Encashment')
  {
    $carryForward_SL = 0;
    $encashement_SL = 1;
    $lapseYears_SL = 0;
  }
  else if ($Sick == 'Carry Forward')
  {
    $carryForward_SL = 1;
    $encashement_SL = 0;
    if ($SickLapse == '')
    {
      $lapseYears_SL = 0;
    }
    else
    {
      $lapseYears_SL = $SickLapse;
    }

  }

  mysqli_query($con, "INSERT INTO leavesetup (leavePckg, leaveType, leaveDays, carryForward, encashement, lapseYears) VALUES ('".$LeavePckg."', 'Sick', '".$SickDays."', '".$carryForward_SL."', '".$encashement_SL."', '".$lapseYears_SL."') ");
}

else
{
  echo '<br>Sick days not given';
}

if ($AnnualDays != '')
{
  if ($Annual == 'None')
  {
    $carryForward_AL = 0;
    $encashement_AL = 0;
    $lapseYears_AL = 0;
  }
  else if ($Annual == 'Encashment')
  {
    $carryForward_AL = 0;
    $encashement_AL = 1;
    $lapseYears_AL = 0;
  }
  else if ($Annual == 'Carry Forward')
  {
    $carryForward_AL = 1;
    $encashement_AL = 0;
    if ($AnnualLapse == '')
    {
      $lapseYears_AL = 0;
    }
    else
    {
      $lapseYears_AL = $AnnualLapse;
    }

  }

  mysqli_query($con, "INSERT INTO leavesetup (leavePckg, leaveType, leaveDays, carryForward, encashement, lapseYears) VALUES ('".$LeavePckg."', 'Annual', '".$AnnualDays."', '".$carryForward_AL."', '".$encashement_AL."', '".$lapseYears_AL."') ");
}

else
{
  echo '<br>Annual days not given';
}

if ($PaternityDays != '')
{
  if ($Paternity == 'None')
  {
    $carryForward_PL = 0;
    $encashement_PL = 0;
    $lapseYears_PL = 0;
  }
  else if ($Paternity == 'Encashment')
  {
    $carryForward_PL = 0;
    $encashement_PL = 1;
    $lapseYears_PL = 0;
  }
  else if ($Paternity == 'Carry Forward')
  {
    $carryForward_PL = 1;
    $encashement_PL = 0;
    if ($PaternityLapse == '')
    {
      $lapseYears_PL = 0;
    }
    else
    {
      $lapseYears_PL = $PaternityLapse;
    }

  }

  mysqli_query($con, "INSERT INTO leavesetup (leavePckg, leaveType, leaveDays, carryForward, encashement, lapseYears) VALUES ('".$LeavePckg."', 'Paternity', '".$PaternityDays."', '".$carryForward_PL."', '".$encashement_PL."', '".$lapseYears_PL."') ");
}

else
{
  echo '<br>Paternity days not given';
}

if ($MaternityDays != '')
{
  if ($Maternity == 'None')
  {
    $carryForward_ML = 0;
    $encashement_ML = 0;
    $lapseYears_ML = 0;
  }
  else if ($Maternity == 'Encashment')
  {
    $carryForward_ML = 0;
    $encashement_ML = 1;
    $lapseYears_ML = 0;
  }
  else if ($Maternity == 'Carry Forward')
  {
    $carryForward_ML = 1;
    $encashement_ML = 0;
    if ($MaternityLapse == '')
    {
      $lapseYears_ML = 0;
    }
    else
    {
      $lapseYears_ML = $MaternityLapse;
    }

  }

  mysqli_query($con, "INSERT INTO leavesetup (leavePckg, leaveType, leaveDays, carryForward, encashement, lapseYears) VALUES ('".$LeavePckg."', 'Maternity', '".$MaternityDays."', '".$carryForward_ML."', '".$encashement_ML."', '".$lapseYears_ML."') ");
}

else
{
  echo '<br>Maternity days not given';
}

if ($BereavementDays != '')
{
  if ($Bereavement == 'None')
  {
    $carryForward_BL = 0;
    $encashement_BL = 0;
    $lapseYears_BL = 0;
  }
  else if ($Bereavement == 'Encashment')
  {
    $carryForward_BL = 0;
    $encashement_BL = 1;
    $lapseYears_BL = 0;
  }
  else if ($Bereavement == 'Carry Forward')
  {
    $carryForward_BL = 1;
    $encashement_BL = 0;
    if ($BereavementLapse == '')
    {
      $lapseYears_BL = 0;
    }
    else
    {
      $lapseYears_BL = $BereavementLapse;
    }

  }

  mysqli_query($con, "INSERT INTO leavesetup (leavePckg, leaveType, leaveDays, carryForward, encashement, lapseYears) VALUES ('".$LeavePckg."', 'Bereavement', '".$BereavementDays."', '".$carryForward_BL."', '".$encashement_BL."', '".$lapseYears_BL."') ");
}

else
{
  echo '<br>Bereavement days not given';
}

if ($OthersDays != '')
{
  if ($Others == 'None')
  {
    $carryForward_OL = 0;
    $encashement_OL = 0;
    $lapseYears_OL = 0;
  }
  else if ($Others == 'Encashment')
  {
    $carryForward_OL = 0;
    $encashement_OL = 1;
    $lapseYears_OL = 0;
  }
  else if ($Others == 'Carry Forward')
  {
    $carryForward_OL = 1;
    $encashement_OL = 0;
    if ($OthersLapse == '')
    {
      $lapseYears_OL = 0;
    }
    else
    {
      $lapseYears_OL = $OthersLapse;
    }

  }

  mysqli_query($con, "INSERT INTO leavesetup (leavePckg, leaveType, leaveDays, carryForward, encashement, lapseYears) VALUES ('".$LeavePckg."', 'Others', '".$OthersDays."', '".$carryForward_OL."', '".$encashement_OL."', '".$lapseYears_OL."') ");
}

else
{
  echo '<br>Others days not given';
}

header("Location: emp_leave_manage_setup.php");

?>