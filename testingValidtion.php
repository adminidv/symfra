<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<script type="text/javascript">
  function upper_case(str)
  {
   regexp = /^[a-z]*$/i;
   if (regexp.test(str))
    {
      // console.log("String's first character is uppercase");
      document.write("Is string");
    } 
    else
    {
      // console.log("String's first character is not uppercase");
      document.write("Is not string");
    }
  }
upper_case('Abcd');
upper_case('abc2d');

function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    // return re.test(email);
    if (re.test(email))
    {
      // console.log("String's first character is uppercase");
      document.write("Correct email format");
    } 
    else
    {
      // console.log("String's first character is not uppercase");
      document.write("Wrong email format");
    }
}
validateEmail('anas@anas.com');
</script>

</body>
</html>