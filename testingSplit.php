<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>JavaScript Split a String from Space</title>
</head> 
<body>

<input type="text" id="txtField" onfocusout="forUsername()">

<h1>ABCD</h1>
<p id="tst"></p>
<button onclick="forUsername()">Click</button>

    <!-- <script>
        var myStr = "anas@gmail.com";
        var strArray = myStr.split("@");
        
        // Display array values on page
        for(var i = 0; i < strArray.length; i++){
        	var uName = strArray[0];
        }
         document.write("<p>" + uName + "</p>");

         document.getElementById('tst').innerHTML = uName;
    </script> -->

    <script>
	function forUsername() {
	  var uName = document.getElementById("txtField").value;
	  var strArray = uName.split("@");
	        
	        // Display array values on page
	        for(var i = 0; i < strArray.length; i++){
	        	var uName = strArray[0];
	        }

	        document.getElementById("tst").innerHTML = uName;
	        //document.getElementById("demo").innerHTML
	        //document.getElementById('showUName').innerHTML = inputBox.value;

	}
	</script>
</body>
</html>