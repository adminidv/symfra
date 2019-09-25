

 onchange="checkCities();"

<script type="text/javascript">
    function checkCities()
    {
      var bpCountry = document.getElementById("cmpCountryC").value;

      $.ajax({
         url:"checkCities.php",  
                method:"GET",  
                data:{bpCountry:bpCountry}, 
                dataType:"text", 
         success: function(data) {
             $('#cmpCityC').html(data);
         }
      });
    }
    </script>