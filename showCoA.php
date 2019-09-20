<!DOCTYPE html>
<html>
<head>
  <title></title>

  <style>
    .widget_iner_box-child2 {
    width: 50%;
    margin: 30px 0px;
    float: left;
    padding: 15px 30px;
    background: #f3f3f3;
    border: 1px solid #E2e2e2;
}
.widget_child_title h4 {
    text-decoration: underline;
    font-size: 14px;
    font-weight: 600;
    color: #05417e;
}
.widget_child_title {
    width: 100%;
    float: left;
}
.input-label.chkbxlabl {
    float: left;
    clear: inherit;
}
.input-feild.act_btn_user.chkbxfield {
    width: 25%;
    float: right;
}
.input_text_sec {
    width: 100%;
    float: left;
}
.input_chk_sec {
    width: 30%;
    float: left;
}
  </style>
</head>
<body>

</body>
</html>

<?php

include('manage/dbFinance.php');

$q = intval($_GET['q']);

// echo $q;

$selectCoA = mysqli_query($con, "SELECT * FROM oact WHERE AcctCode = '".$q."' ");

while ($row = mysqli_fetch_array($selectCoA))
{
  $AcctCode = $row['AcctCode'];
  $AcctName = $row['AcctName'];
}

echo '
<div class="widget_child_title"><h4>G/L Account Details</h4></div>

                      <div class="input_chk_sec">
    						  			<div class="input-label chkbxlabl"><label >Title</label></div>
    										<div class="input-feild act_btn_user chkbxfield">
    											<input type="checkbox" required name="" checked id="" disabled/>
    										</div>	
                      </div>

<!--                                     <div class="cls"></div>
 -->
                      <div class="input_chk_sec">
    										<div class="input-label chkbxlabl"><label >Active Account</label></div>
    										<div class="input-feild act_btn_user chkbxfield">
    											<input type="checkbox" required name="" id="" disabled/>
    										</div>
                      </div>

<!--                                     <div class="cls"></div>
 -->
                      <div class="input_text_sec">
    					  				<div class="input-label"><label >G/L Account</label></div>
                                              <div class="input-feild">
                                             		 <input type="text" name="" value="'.$AcctCode.'">
                                              </div>
                      </div>
                     
                      <div class="input_text_sec">

                        <div class="input-label"><label > Name</label></div>	
                        <div class="input-feild">
                                <input  type="text" name="glName" id="glName" placeholder="" value="'.$AcctName.'">
                        </div>
                      </div>

                      <div class="input_text_sec">

                        <div class="input-label"><label>External Code</label></div>	
                       	<div class="input-feild">
                                <input  type="number" name="" placeholder="" disabled>
                        </div>  
                      </div>

                      <div class="input_text_sec">

                        <div class="input-label"><label >Currency</label></div>  

                        <div class="input-feild">
                          <select name="" id="" disabled>
                            <option value="">Select</option>
                            <option>British Pound</option>
                            <option>Danish Krone</option>
                            <option>Euro</option>
                            <option>Swedish Krone</option>
                            <option>US Dollar</option>
                            <option>All Currencies</option>
                          </select>
                        </div> 

                        <div class="input-feild">
                          <button type="submit">Update</button>                        
                        </div>

                      </div>';

?>