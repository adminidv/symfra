 <!-- valdition submit popup -->
               <div class="modal fade confirmTable-modal" id="submit_Modal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are You Sure You Want to Submit?</p>
                          <button type="submit" name="btnadd">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
               </div>

               <!-- valdition Edit popup -->
               <div class="modal fade confirmTable-modal" id="Edit_Modal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are You Sure You Want to Submit?</p>
                          <button type="submit" name="btnedit1">Yes</button>
                              <button type="button" name="btnDelete_N" data-dismiss="modal" >No</button>

                        </div>
                        <div class="modal-footer">
                          <p>Add Related content if needed</p>
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
               </div>


          <div class="modal fade symfra_popup2" id="popupMEdit4" role="dialog">
            <div class="modal-dialog">
              <!-- ADD Airport Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                <h4 class="modal-title">Add Representative Details</h4>
                        </div>
                        <div class="modal-body">

                           <!-- For Validation Box Red Popup -->
                   <h4><label id="formSummary1" style="color: red;"></label></h4>
                 <p id="V_rep_name" style="color: red;"></p>
                  <p id="V_rep_desg" style="color: red;"></p>
                  <p id="V_rep_email" style="color: red;"></p>
                  <p id="V_rep_office_no" style="color: red;"></p>
                  <p id="V_rep_phone_no" style="color: red;"></p>

                            <div class="input-fields">  
                              <label>Name</label> 
                              <input type="text" name="rep_name" id="rep_name" class="rep_name" maxlength="40" placeholder="Organization Name"><span class="steric">*</span>
                            </div>

                          <div class="input-fields"> 
                            <label>Designation</label> 
                            <input type="text" name="rep_desg" id="rep_desg" maxlength="30" placeholder="Enter Here Sub Party Name!">    
                          </div>

                          <div class="input-fields">  
                            <label>Official #</label> 
                            <input type="text" name="rep_office_no" id="rep_office_no" class="rep_office_no" maxlength="14" placeholder="Office Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Personal #</label> 
                            <input type="text" name="rep_phone_no" id="rep_phone_no" class="rep_phone_no" maxlength="14" placeholder="Personal Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Email</label> 
                            <input type="text" name="rep_email" id="rep_email" class="rep_email" maxlength="50" placeholder="Email">    
                          </div>
                           <div class="input-fields">  
                            <label>Active</label> 
                            <input type="checkbox" name="status" id="status" class="status">    
                          </div>

                          <button type="submit" name="btnadd" onclick="FormValidation2(); return false;">Submit</button>

                        </div>
                      </div>
                    </div>
        </div>

              <!-- Edit Airport Details -->
          <div class="modal fade symfra_popup2" id="btn1" role="dialog">
            <div class="modal-dialog">
              <!-- Edit Airport Details-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Representative Details</h4>
                </div>
                <div class="modal-body">
                  <div class="input-fields hide"> 
                    <label>SrNo</label> 
                    <input type="text" name="SrNoV" id="SrNoV" class="SrNoV">    
                  </div>

                 <div class="modal-body">

                  <<!-- For Validation Box Red Popup -->
                   <h4><label id="formSummary2" style="color: red;"></label></h4>
                  <p id="EV_rep_nameV" style="color: red;"></p>
                  <p id="EV_rep_desgV" style="color: red;"></p>
                  <p id="EV_rep_emailV" style="color: red;"></p>
                  <p id="EV_rep_office_noV" style="color: red;"></p>
                  <p id="EV_rep_phone_noV" style="color: red;"></p>


                            <div class="input-fields">  
                              <label>Name</label> 
                              <input type="text" name="rep_nameV" id="rep_nameV" class="rep_nameV" maxlength="40" placeholder="Organization Name"><span class="steric">*</span>    
                            </div>

                           <div class="input-fields"> 
                            <label>Designation</label> 
                            <input type="text" name="rep_desgV" id="rep_desgV" maxlength="30" placeholder="Enter Here Sub Party Name!">    
                           </div>

                          <div class="input-fields">  
                            <label>Official #</label> 
                            <input type="text" name="rep_office_noV" id="rep_office_noV" class="rep_office_noV" maxlength="14" placeholder="Office Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Personal #</label> 
                            <input type="text" name="rep_phone_noV" id="rep_phone_noV" class="rep_phone_noV" maxlength="14" placeholder="Personal Contact">    
                          </div>
                          <div class="input-fields">  
                            <label>Email</label> 
                            <input type="text" name="rep_emailV" id="rep_emailV" class="rep_emailV" maxlength="50" placeholder="Email">    
                          </div>
                           <div class="input-fields">  
                            <label>Active</label> 
                            <input type="checkbox" name="statusV" id="statusV" class="status">    
                          </div>

                           <button type="submit" name="btnedit2" onclick="FormValidation4(); return false;">Submit</button>

                        </div>
                      </div>
                    </div>
                </div>   
          </div>


<!-- Onclick function call submit btn  -->


<!-- validation on add rep -->
<script type="text/javascript">
   function FormValidation2()
   {

    var regexp4 = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i;
     var regexp3 = /^[a-z, ,a-z]*$/i;
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var rep_name=document.getElementById('rep_name').value;
      var rep_desg=document.getElementById('rep_desg').value;
      var rep_email=document.getElementById('rep_email').value;
      var rep_office_no=document.getElementById('rep_office_no').value;
      var rep_phone_no=document.getElementById('rep_phone_no').value;
     
      var summary = "Summary: ";


      //  if(rep_desg == "")
      // {
      //   document.getElementById('rep_desg').style.borderColor = "red";
      //       missingVal = 1;
      //       // summary += " Contact number required.";
      //       document.getElementById("V_rep_desg").innerHTML = "Designation is required.";
      // }
      if(rep_desg != "")
      {
          document.getElementById('rep_desg').style.borderColor = "white";
          document.getElementById("V_rep_desg").innerHTML = "";

          if (!regexp3.test(rep_desg))
        {
          document.getElementById('rep_desg').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_desg").innerHTML = "Only alphabets are allowed in Designation.";
        }
      }


       if(rep_name == "")
      {
        document.getElementById('rep_name').style.borderColor = "red";
            missingVal = 1;
            // summary += " Contact number required.";
            document.getElementById("V_rep_name").innerHTML = "Name is required.";
      }
       if(rep_name != "")
      {
          document.getElementById('rep_name').style.borderColor = "white";
          document.getElementById("V_rep_name").innerHTML = "";

          if (!regexp.test(rep_name))
        {
          document.getElementById('rep_name').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_name").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

       if(rep_office_no != "")
      {
          document.getElementById('rep_office_no').style.borderColor = "white";
          document.getElementById("V_rep_office_no").innerHTML = "";

          if (!regexp4.test(rep_office_no))
        {
          document.getElementById('rep_office_no').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_office_no").innerHTML = "Only Number are allowed.";
        }
      }

       if(rep_phone_no != "")
      {
          document.getElementById('rep_phone_no').style.borderColor = "white";
          document.getElementById("V_rep_phone_no").innerHTML = "";

          if (!regexp4.test(rep_phone_no))
        {
          document.getElementById('rep_phone_no').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_phone_no").innerHTML = "Only Number are allowed.";
        }
      }

      
      if(rep_email != "")
      {
          document.getElementById('rep_email').style.borderColor = "white";
          document.getElementById("V_rep_email").innerHTML = "";

          if (!re.test(rep_email))
        {
          document.getElementById('rep_email').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("V_rep_email").innerHTML = "Please follow the email format (user@domain.com).";
        }
      }


     

      
      
      if (missingVal != 1)
      {
        document.getElementById('rep_name').style.borderColor = "white";
        document.getElementById('rep_desg').style.borderColor = "white";
        document.getElementById('rep_desg').style.borderColor = "white";
        document.getElementById('rep_office_no').style.borderColor = "white";
        document.getElementById('rep_phone_no').style.borderColor = "white";
       
        $("#submit_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary1").textContent="Error: ";
      }
   }
</script>



<!-- validation on Edit rep -->
<script type="text/javascript">
   function FormValidation4()
   {


    var regexp4 = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i;
    var regexp3 = /^[a-z, ,a-z]*$/i;
    var regexp = /^[a-z]*$/i;
    var regexp2 = /^[0-9]*$/i;
    var re = /\S+@\S+\.\S+/;
      var missingVal = 0;

      var rep_nameV=document.getElementById('rep_nameV').value;
      var rep_desgV=document.getElementById('rep_desgV').value;
      var rep_emailV=document.getElementById('rep_emailV').value;
      var rep_office_noV=document.getElementById('rep_office_noV').value;
      var rep_phone_noV=document.getElementById('rep_phone_noV').value;
     
      var summary = "Summary: ";

      if(rep_desgV != "")
      {
          document.getElementById('rep_desgV').style.borderColor = "white";
          document.getElementById("EV_rep_desgV").innerHTML = "";

          if (!regexp3.test(rep_desgV))
        {
          document.getElementById('rep_desgV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_desgV").innerHTML = "Only alphabets are allowed in Designation.";
        }
      }


      if(rep_nameV == "")
      {
        document.getElementById('rep_nameV').style.borderColor = "red";
            missingVal = 1;
            // summary += " Contact number required.";
            document.getElementById("EV_rep_nameV").innerHTML = "Name is required.";
      }
       if(rep_nameV != "")
      {
          document.getElementById('rep_nameV').style.borderColor = "white";
          document.getElementById("EV_rep_nameV").innerHTML = "";

          if (!regexp.test(rep_nameV))
        {
          document.getElementById('rep_nameV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_nameV").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

      if(rep_office_noV != "")
      {
          document.getElementById('rep_office_noV').style.borderColor = "white";
          document.getElementById("EV_rep_office_noV").innerHTML = "";

          if (!regexp4.test(rep_nameV))
        {
          document.getElementById('rep_office_noV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_office_noV").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

      if(rep_phone_noV != "")
      {
          document.getElementById('rep_phone_noV').style.borderColor = "white";
          document.getElementById("EV_rep_phone_noV").innerHTML = "";

          if (!regexp4.test(rep_nameV))
        {
          document.getElementById('rep_phone_noV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_phone_noV").innerHTML = "Only alphabets are allowed in Name.";
        }
      }

      
      if(rep_emailV != "")
      {
          document.getElementById('rep_emailV').style.borderColor = "white";
          document.getElementById("EV_rep_emailV").innerHTML = "";

          if (!re.test(rep_emailV))
        {
          document.getElementById('rep_emailV').style.borderColor = "red";
            missingVal = 1;
            // summary += "Firstname is required.";
            document.getElementById("EV_rep_emailV").innerHTML = "Please follow the email format (user@domain.com).";
        }
      }


     

      
      
      if (missingVal != 1)
      {
        document.getElementById('rep_nameV').style.borderColor = "white";
        document.getElementById('rep_desgV').style.borderColor = "white";
        document.getElementById('rep_emailV').style.borderColor = "white";
        document.getElementById('rep_office_noV').style.borderColor = "white";
        document.getElementById('rep_phone_noV').style.borderColor = "white";
       
        $("#Edit_Modal").modal();
        
      }

      if (missingVal == 1)
      {
        document.getElementById("formSummary2").textContent="Error: ";
      }
   }
</script>

<script>
 $(document).ready(function(){
  $("#myBtn").click(function(){
    $("#popupMEdit4").modal();
  });
 });
</script>