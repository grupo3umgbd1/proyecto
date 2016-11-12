<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Tabs - Default functionality</title>
  <link rel="stylesheet" href="style/tabs.css">
  <script src="../Controllers/js/jquery-1.9.1.js"></script>
  <script src="../Controllers/js/jquery-ui-1.10.4.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
</head>
<body>
 
<div id="tabs" style="margin-left:15px; margin-top:10px; width:80%; height:500px;">
  <ul>
    <li><a href="#tabs-1">Mantenimientos</a></li>
    <li><a href="#tabs-2">Consultas</a></li>
  </ul>
  <div id="tabs-1" style="width:95%; height:70%;">
    <iframe id="Body" style="width:95%; height:95%;" name="_parent" src="ESMUS.php" scrolling="auto" frameborder="0" ></iframe>
  </div>
  <div id="tabs-2" style="width:95%; height:95%;">
    <iframe style="width:95%; height:95%;" id="Body" name="Body" src="DesckIcon.php" scrolling="auto" frameborder="0" ></iframe>
  </div>
</div>