<!Doctype html>
<html>
<head>

  <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <script>
  $( function() {
   
  $(".date").datepicker({
    onSelect: function(dateText) {
      display("Selected date: " + dateText + ", Current Selected Value= " + this.value);
      $(this).change();
    }
  }).on("change", function() {
    display("Change event");
  });

  function display(msg) {
    $("<p>").html(msg).appendTo(document.body);
  }
  });
 
  </script>
</head>
<body>
 
Date: <input type='text' class='date' id="datepicker">

</body>
</html>