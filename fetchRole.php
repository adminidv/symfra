<?php

include('manage/connection.php');
include("manage/session.php");

$userID = $_GET['userID'];

$selectAuthID = mysqli_query($con, "SELECT * FROM users WHERE user_ID = '$userID' ") or die(mysqli_error($con));
// echo $reg_code;
while ($rowAuthID = mysqli_fetch_array($selectAuthID))
{
	$authID = $rowAuthID["Auth_ID"];
   	$desigID = $rowAuthID['desig_ID'];
   	$departID = $rowAuthID['dept_ID'];
}

$selectDesig = mysqli_query($con, "SELECT * from designation WHERE Desig_ID='$desigID' ");
while ($rowDesig = mysqli_fetch_array($selectDesig))
{
	$userDesig = $rowDesig['Desig_name'];
}

$selectDepart = mysqli_query($con, "SELECT * from department WHERE dept_ID='$departID' ");
while ($rowDepart = mysqli_fetch_array($selectDepart))
{
	$userDepart = $rowDepart['dept_name'];
}

// Fetching Authorization details
$selectAuth = mysqli_query($con, "SELECT * FROM authdetails WHERE SrNo='$authID' ");
while ($rowAuth = mysqli_fetch_array($selectAuth))
{
	$auth_Name = $rowAuth['auth_Name'];
	$add_U = $rowAuth['add_U'];
	$update_U = $rowAuth['update_U'];
	$delete_U = $rowAuth['delete_U'];
	$view_U = $rowAuth['view_U'];

	$deptView = $rowAuth['deptView'];
	$deptAdd = $rowAuth['deptAdd'];
	$deptDelete = $rowAuth['deptDelete'];
	$deptEdit = $rowAuth['deptEdit'];
	$desigView = $rowAuth['desigView'];
	$desigAdd = $rowAuth['desigAdd'];
	$desigDelete = $rowAuth['desigDelete'];
	$desigEdit = $rowAuth['desigEdit'];
	$roleView = $rowAuth['roleView'];
	$roleAdd = $rowAuth['roleAdd'];
	$roleDelete = $rowAuth['roleDelete'];
	$roleEdit = $rowAuth['roleEdit'];
	$empView = $rowAuth['empView'];
	$empAdd = $rowAuth['empAdd'];
	$empDelete = $rowAuth['empDelete'];
	$empEdit = $rowAuth['empEdit'];
	$leaveView = $rowAuth['leaveView'];
	$leaveAdd = $rowAuth['leaveAdd'];
	$leaveDelete = $rowAuth['leaveDelete'];
	$leaveEdit = $rowAuth['leaveEdit'];
	$siView = $rowAuth['siView'];
	$siAdd = $rowAuth['siAdd'];
	$siEdit = $rowAuth['siEdit'];
	$siDelete = $rowAuth['siDelete'];

	$seView = $rowAuth['seView'];
	$seAdd = $rowAuth['seAdd'];
	$seEdit = $rowAuth['empDelete'];
	$seDelete = $rowAuth['seDelete'];
	$aiView = $rowAuth['aiView'];
	$aiAdd = $rowAuth['aiAdd'];
	$aiEdit = $rowAuth['aiEdit'];
	$aiDelete = $rowAuth['aiDelete'];
	$aeView = $rowAuth['aeView'];
	$aeAdd = $rowAuth['aeAdd'];
	$aeEdit = $rowAuth['aeEdit'];
	$aeDelete = $rowAuth['aeDelete'];

	$custView = $rowAuth['custView'];
	$custAdd = $rowAuth['custAdd'];
	$custEdit = $rowAuth['custEdit'];
	$custDelete = $rowAuth['custDelete'];
	$vendorView = $rowAuth['vendorView'];
	$vendorAdd = $rowAuth['vendorAdd'];
	$vendorEdit = $rowAuth['vendorEdit'];
	$vendorDelete = $rowAuth['vendorDelete'];
	$bpView = $rowAuth['bpView'];
	$bpAdd = $rowAuth['bpAdd'];
	$bpEdit = $rowAuth['bpEdit'];
	$bpDelete = $rowAuth['bpDelete'];

	$airportView = $rowAuth['airportView'];
	$airportAdd = $rowAuth['airportAdd'];
	$airportEdit = $rowAuth['airportEdit'];
	$airportDelete = $rowAuth['airportDelete'];
	$airlineView = $rowAuth['airlineView'];
	$airlineAdd = $rowAuth['airlineAdd'];
	$airlineEdit = $rowAuth['airlineEdit'];
	$airlineDelete = $rowAuth['airlineDelete'];
	$businessView = $rowAuth['businessView'];
	$businessAdd = $rowAuth['businessAdd'];
	$businessEdit = $rowAuth['businessEdit'];
	$businessDelete = $rowAuth['businessDelete'];
	$cityView = $rowAuth['cityView'];
	$cityAdd = $rowAuth['cityAdd'];
	$cityEdit = $rowAuth['cityEdit'];
	$cityDelete = $rowAuth['cityDelete'];
	$commodityView = $rowAuth['commodityView'];
	$commodityAdd = $rowAuth['commodityAdd'];
	$commodityEdit = $rowAuth['commodityEdit'];
	$commodityDelete = $rowAuth['commodityDelete'];
	$countryView = $rowAuth['countryView'];
	$countryAdd = $rowAuth['countryAdd'];
	$countryEdit = $rowAuth['countryEdit'];
	$countryDelete = $rowAuth['countryDelete'];
	$currencyView = $rowAuth['currencyView'];
	$currencyAdd = $rowAuth['currencyAdd'];
	$currencyEdit = $rowAuth['currencyEdit'];
	$currencyDelete = $rowAuth['currencyDelete'];
	$destinationView = $rowAuth['destinationView'];
	$destinationAdd = $rowAuth['destinationAdd'];
	$destinationEdit = $rowAuth['destinationEdit'];
	$destinationDelete = $rowAuth['destinationDelete'];
	$mopView = $rowAuth['mopView'];
	$mopAdd = $rowAuth['mopAdd'];
	$mopEdit = $rowAuth['mopEdit'];
	$mopDelete = $rowAuth['mopDelete'];
	$regionView = $rowAuth['regionView'];
	$regionAdd = $rowAuth['regionAdd'];
	$regionEdit = $rowAuth['regionEdit'];
	$regionDelete = $rowAuth['regionDelete'];
	$sectorView = $rowAuth['sectorView'];
	$sectorAdd = $rowAuth['sectorAdd'];
	$sectorEdit = $rowAuth['sectorEdit'];
	$sectorDelete = $rowAuth['sectorDelete'];
	$slView = $rowAuth['slView'];
	$slAdd = $rowAuth['slAdd'];
	$slEdit = $rowAuth['slEdit'];
	$slDelete = $rowAuth['slDelete'];
	$spoView = $rowAuth['spoView'];
	$spoAdd = $rowAuth['spoAdd'];
	$spoEdit = $rowAuth['spoEdit'];
	$spoDelete = $rowAuth['spoDelete'];
}

$output = '<table  id="authtable" class="display nowrap no-footer" style="width:100%">
                                  <thead>
                                            <tr colspan="">
                                              <th></th>
                                              <th>View</th>
                                              <th>Add</th>
                                              <th>Edit</th>
                                              <th>Delete</th>
                                            </tr>
                                  </thead>
                                  <tbody>
                                             <!-- authrow title_row -->
                                             <tr class="authtable_subhdingnRow">
                                                <th rowspan="">Sale Orders</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>

                                             <tr>
                                                <td>Sea Import</td>';


if ($siView == '1')
{
$output .= '<td><input type="checkbox" disabled name="siView" id="siView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="siView" id="siView"></td>';
}

if ($siAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="siAdd" id="siAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="siAdd" id="siAdd"></td>';
}


if ($siEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="siEdit" id="siEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="siEdit" id="siEdit"></td>';
}

if ($siDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="siDelete" id="siDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="siDelete" id="siDelete"></td>';
}

                                                
$output .= '</tr>

<tr>
<td>Sea Export</td>';

if ($seView == '1')
{
$output .= '<td><input type="checkbox" disabled name="seView" id="seView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="seView" id="seView"></td>';
}

if ($seAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="seAdd" id="seAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="seAdd" id="seAdd"></td>';
}

if ($seEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="seEdit" id="seEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="seEdit" id="seEdit"></td>';
}

if ($seDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="seDelete" id="seDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="seDelete" id="seDelete"></td>';
}


$output .= '</tr>

<tr>
<td>Air Import</td>';

if ($aiView == '1')
{
$output .= '<td><input type="checkbox" disabled name="aiView" id="aiView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aiView" id="aiView"></td>';
}

if ($aiAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="aiAdd" id="aiAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aiAdd" id="aiAdd"></td>';
}

if ($aiEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="aiEdit" id="aiEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aiEdit" id="aiEdit"></td>';
}

if ($aiDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="aiDelete" id="aiDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aiDelete" id="aiDelete"></td>';
}


$output .= '</tr>

<tr>
<td>Air Export</td>';

if ($aeView == '1')
{
$output .= '<td><input type="checkbox" disabled name="aeView" id="aeView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aeView" id="aeView"></td>';
}

if ($aeAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="aeAdd" id="aeAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aeAdd" id="aeAdd"></td>';
}

if ($aeEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="aeEdit" id="aeEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aeEdit" id="aeEdit"></td>';
}

if ($aeDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="aeDelete" id="aeDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="aeDelete" id="aeDelete"></td>';
}


$output .= '</tr>

<tr class="authtable_subhdingnRow">
<th rowspan="">Human Resources</th>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>Employee</td>';

if ($empView == '1')
{
$output .= '<td><input type="checkbox" disabled name="empView" id="empView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="empView" id="empView"></td>';
}

if ($empAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="empAdd" id="empAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="empAdd" id="empAdd"></td>';
}

if ($empEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="empEdit" id="empEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="empEdit" id="empEdit"></td>';
}

if ($empDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="empDelete" id="empDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="empDelete" id="empDelete"></td>';
}


$output .= '</tr>

<tr>
<td>Leaves</td>';

if ($leaveView == '1')
{
$output .= '<td><input type="checkbox" disabled name="leaveView" id="leaveView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="leaveView" id="leaveView"></td>';
}

if ($leaveAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="leaveAdd" id="leaveAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="leaveAdd" id="leaveAdd"></td>';
}

if ($leaveEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="leaveEdit" id="leaveEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="leaveEdit" id="leaveEdit"></td>';
}

if ($leaveDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="leaveDelete" id="leaveDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="leaveDelete" id="leaveDelete"></td>';
}

$output .= '</tr>

<tr class="authtable_subhdingnRow">
<th rowspan="">User Management</th>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>User</td>';

if ($view_U == '1')
{
$output .= '<td><input type="checkbox" disabled name="view_U" id="view_U" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="view_U" id="view_U"></td>';
}

if ($add_U == '1')
{
$output .= '<td><input type="checkbox" disabled name="add_U" id="add_U" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="add_U" id="add_U"></td>';
}

if ($update_U == '1')
{
$output .= '<td><input type="checkbox" disabled name="update_U" id="update_U" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="update_U" id="update_U"></td>';
}

if ($delete_U == '1')
{
$output .= '<td><input type="checkbox" disabled name="delete_U" id="delete_U" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="delete_U" id="delete_U"></td>';
}


$output .= '</tr>

<tr>
<td>Deparment</td>';

if ($deptView == '1')
{
$output .= '<td><input type="checkbox" disabled name="deptView" id="deptView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="deptView" id="deptView"></td>';
}

if ($deptAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="deptAdd" id="deptAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="deptAdd" id="deptAdd"></td>';
}

if ($deptEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="deptEdit" id="deptEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="deptEdit" id="deptEdit"></td>';
}

if ($deptDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="deptDelete" id="deptDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="deptDelete" id="deptDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Designation</td>';

if ($desigView == '1')
{
$output .= '<td><input type="checkbox" disabled name="desigView" id="desigView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="desigView" id="desigView"></td>';
}

if ($desigAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="desigAdd" id="desigAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="desigAdd" id="desigAdd"></td>';
}

if ($desigEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="desigEdit" id="desigEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="desigEdit" id="desigEdit"></td>';
}

if ($desigDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="desigDelete" id="desigDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox"disabled name="desigDelete" id="desigDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Roles</td>';

if ($desigDelete == '1')
{
$output .= '<td><input type="checkbox"disabled name="roleView" id="roleView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox"disabled name="roleView" id="roleView"></td>';
}

if ($desigDelete == '1')
{
$output .= '<td><input type="checkbox"disabled name="roleAdd" id="roleAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox"disabled name="roleAdd" id="roleAdd"></td>';
}

if ($desigDelete == '1')
{
$output .= '<td><input type="checkbox"disabled name="roleEdit" id="roleEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox"disabled name="roleEdit" id="roleEdit"></td>';
}

if ($desigDelete == '1')
{
$output .= '<td><input type="checkbox"disabled name="roleDelete" id="roleDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox"disabled name="roleDelete" id="roleDelete"></td>';
}


$output .= '</tr>

<tr class="authtable_subhdingnRow">
<th rowspan="">CRM</th>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>Customers</td>';

if ($custView == '1')
{
$output .= '<td><input type="checkbox"disabled name="custView" id="custView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox"disabled name="custView" id="custView"></td>';
}

if ($custAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="custAdd" id="custAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="custAdd" id="custAdd"></td>';
}

if ($custEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="custEdit" id="custEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="custEdit" id="custEdit"></td>';
}

if ($custDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="custDelete" id="custDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="custDelete" id="custDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Vendors</td>';

if ($vendorView == '1')
{
$output .= '<td><input type="checkbox" disabled name="vendorView" id="vendorView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="vendorView" id="vendorView"></td>';
}

if ($vendorAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="vendorAdd" id="vendorAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="vendorAdd" id="vendorAdd"></td>';
}

if ($vendorEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="vendorEdit" id="vendorEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="vendorEdit" id="vendorEdit"></td>';
}

if ($vendorDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="vendorDelete" id="vendorDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="vendorDelete" id="vendorDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Business Partners</td>';

if ($bpView == '1')
{
$output .= '<td><input type="checkbox" disabled name="bpView" id="bpView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="bpView" id="bpView"></td>';
}

if ($bpAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="bpAdd" id="bpAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="bpAdd" id="bpAdd"></td>';
}

if ($bpEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="bpEdit" id="bpEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="bpEdit" id="bpEdit"></td>';
}

if ($bpDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="bpDelete" id="bpDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="bpDelete" id="bpDelete"></td>';
}

$output .= '</tr>

<tr class="authtable_subhdingnRow">
<th rowspan="">Setups</th>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>Airport</td>';

if ($airportView == '1')
{
$output .= '<td><input type="checkbox" disabled name="airportView" id="airportView" checked ></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airportView" id="airportView"></td>';
}

if ($airportAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="airportAdd" id="airportAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airportAdd" id="airportAdd"></td>';
}

if ($airportEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="airportEdit" id="airportEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airportEdit" id="airportEdit"></td>';
}

if ($airportDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="airportDelete" id="airportDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airportDelete" id="airportDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Airline</td>';

if ($airlineView == '1')
{
$output .= '<td><input type="checkbox" disabled name="airlineView" id="airlineView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airlineView" id="airlineView"></td>';
}

if ($airlineAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="airlineAdd" id="airlineAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airlineAdd" id="airlineAdd"></td>';
}

if ($airlineEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="airlineEdit" id="airlineEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airlineEdit" id="airlineEdit"></td>';
}

if ($airlineDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="airlineDelete" id="airlineDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="airlineDelete" id="airlineDelete"></td>';
}


$output .= '</tr>

<tr>
<td>Business</td>';

if ($businessView == '1')
{
$output .= '<td><input type="checkbox" disabled name="businessView" id="businessView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="businessView" id="businessView"></td>';
}

if ($businessAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="businessAdd" id="businessAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="businessAdd" id="businessAdd"></td>';
}

if ($businessEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="businessEdit" id="businessEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="businessEdit" id="businessEdit"></td>';
}

if ($businessDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="businessDelete" id="businessDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="businessDelete" id="businessDelete"></td>';
}


$output .= '</tr>

<tr>
<td>City</td>';

if ($cityView == '1')
{
$output .= '<td><input type="checkbox" disabled name="cityView" id="cityView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="cityView" id="cityView"></td>';
}

if ($cityAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="cityAdd" id="cityAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="cityAdd" id="cityAdd"></td>';
}

if ($cityEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="cityEdit" id="cityEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="cityEdit" id="cityEdit"></td>';
}

if ($cityDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="cityDelete" id="cityDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="cityDelete" id="cityDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Commodity</td>';

if ($commodityView == '1')
{
$output .= '<td><input type="checkbox" disabled name="commodityView" id="commodityView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="commodityView" id="commodityView"></td>';
}

if ($commodityAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="commodityAdd" id="commodityAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="commodityAdd" id="commodityAdd"></td>';
}

if ($commodityEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="commodityEdit" id="commodityEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="commodityEdit" id="commodityEdit"></td>';
}

if ($airlineDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="commodityDelete" id="commodityDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="commodityDelete" id="commodityDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Country</td>';

if ($countryView == '1')
{
$output .= '<td><input type="checkbox" disabled name="countryView" id="countryView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="countryView" id="countryView"></td>';
}

if ($countryAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="countryAdd" id="countryAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="countryAdd" id="countryAdd"></td>';
}

if ($countryEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="countryEdit" id="countryEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="countryEdit" id="countryEdit"></td>';
}

if ($countryDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="countryDelete" id="countryDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="countryDelete" id="countryDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Currency</td>';

if ($currencyView == '1')
{
$output .= '<td><input type="checkbox" disabled name="currencyView" id="currencyView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="currencyView" id="currencyView"></td>';
}

if ($currencyAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="currencyAdd" id="currencyAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="currencyAdd" id="currencyAdd"></td>';
}

if ($currencyEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="currencyEdit" id="currencyEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="currencyEdit" id="currencyEdit"></td>';
}

if ($currencyDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="currencyDelete" id="currencyDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="currencyDelete" id="currencyDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Destination</td>';

if ($destinationView == '1')
{
$output .= '<td><input type="checkbox" disabled name="destinationView" id="destinationView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="destinationView" id="destinationView"></td>';
}

if ($destinationAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="destinationAdd" id="destinationAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="destinationAdd" id="destinationAdd"></td>';
}

if ($destinationEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="destinationEdit" id="destinationEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="destinationEdit" id="destinationEdit"></td>';
}

if ($destinationDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="destinationDelete" id="destinationDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="destinationDelete" id="destinationDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Modes of Payment</td>';

if ($mopView == '1')
{
$output .= '<td><input type="checkbox" disabled name="mopView" id="mopView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="mopView" id="mopView"></td>';
}

if ($mopAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="mopAdd" id="mopAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="mopAdd" id="mopAdd"></td>';
}

if ($mopEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="mopEdit" id="mopEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="mopEdit" id="mopEdit"></td>';
}

if ($mopDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="mopDelete" id="mopDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="mopDelete" id="mopDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Region</td>';

if ($regionView == '1')
{
$output .= '<td><input type="checkbox" disabled name="regionView" id="regionView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="regionView" id="regionView"></td>';
}

if ($regionAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="regionAdd" id="regionAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="regionAdd" id="regionAdd"></td>';
}

if ($regionEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="regionEdit" id="regionEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="regionEdit" id="regionEdit"></td>';
}

if ($regionDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="regionDelete" id="regionDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="regionDelete" id="regionDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Sector</td>';

if ($sectorView == '1')
{
$output .= '<td><input type="checkbox" disabled name="sectorView" id="sectorView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="sectorView" id="sectorView"></td>';
}

if ($sectorAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="sectorAdd" id="sectorAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="sectorAdd" id="sectorAdd"></td>';
}

if ($sectorEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="sectorEdit" id="sectorEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="sectorEdit" id="sectorEdit"></td>';
}

if ($sectorDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="sectorDelete" id="sectorDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="sectorDelete" id="sectorDelete"></td>';
}

$output .= '</tr>

<tr>
<td>Shipping Line</td>';

if ($slView == '1')
{
$output .= '<td><input type="checkbox" disabled name="slView" id="slView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="slView" id="slView"></td>';
}

if ($slAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="slAdd" id="slAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="slAdd" id="slAdd"></td>';
}

if ($slEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="slEdit" id="slEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="slEdit" id="slEdit"></td>';
}

if ($slDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="slDelete" id="slDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="slDelete" id="slDelete"></td>';
}

$output .= '</tr>
<tr>
<td>SPO</td>';

if ($spoView == '1')
{
$output .= '<td><input type="checkbox" disabled name="spoView" id="spoView" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="spoView" id="spoView"></td>';
}

if ($spoAdd == '1')
{
$output .= '<td><input type="checkbox" disabled name="spoAdd" id="spoAdd" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="spoAdd" id="spoAdd"></td>';
}

if ($spoEdit == '1')
{
$output .= '<td><input type="checkbox" disabled name="spoEdit" id="spoEdit" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="spoEdit" id="spoEdit"></td>';
}

if ($spoDelete == '1')
{
$output .= '<td><input type="checkbox" disabled name="spoDelete" id="spoDelete" checked></td>';
}
else
{
$output .= '<td><input type="checkbox" disabled name="spoDelete" id="spoDelete"></td>';
}


$output .= '</tr>
</tbody>
</table>';

echo $output;

?>