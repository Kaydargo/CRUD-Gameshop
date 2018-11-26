<html>
    <head>
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
     <link href="css/animate.css" rel="stylesheet" type="text/css"/>
     <script src="js/wow.min_.js"></script>
     <script>new WOW().init();</script>
        <title>Trailers</title>  
    </head>
        <?php include_once 'includes/header.php' ?>
        
</head>
<body>

<div class="container">
    <h1 class="my-4 text-center text-lg-left wow bounceInUp">Game Trailers</h1>
    <p>Not sure what game to buy? Here you can watch trailers of all our in-stock games so you can be sure you're getting a game that suits you.</p><br>
    
    <p><iframe width="700" height="400" src="https://www.youtube.com/embed/deGwykkr2z8" allowfullscreen name="frame_a" id="video"></iframe> <br>
        <br>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Game Trailers
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li class="dropdown-header">Action</li>
      <li><a href="https://www.youtube.com/embed/deGwykkr2z8" target="frame_a" >Halo 4</a></li>
      <li><a href="https://www.youtube.com/embed/AfMSCAU0ybo" target="frame_a">Gears of War</a></li>
      <li><a href="https://www.youtube.com/embed/x3tedlWs1XY" target="frame_a">Black Ops 2</a></li>
      <li><a href="https://www.youtube.com/embed/5TW0wJTFLiw" target="frame_a">Borderlands 2</a></li>
      <li><a href="https://www.youtube.com/embed/Ge3PQ2nQM4Q" target="frame_a">Crackdown 3</a></li>
      <li><a href="https://www.youtube.com/embed/XjxMuMOH08s" target="frame_a">Armageddon</a></li>
      <li><a href="https://www.youtube.com/embed/QpvM9uwOcUc" target="frame_a">GTA 5</a></li>
      
      <li class="divider"></li>
      <li class="dropdown-header">Adventure</li>
      <li><a href="https://www.youtube.com/embed/zPt08UYmyMo" target="frame_a">Fallout 3</a></li>
      <li><a href="https://www.youtube.com/embed/c0i88t0Kacs" target="frame_a">Witcher 3</a></li>
      <li><a href="https://www.youtube.com/embed/zzNs4-kRLaE" target="frame_a">Tomb Raider</a></li>
      <li><a href="https://www.youtube.com/embed/WQSKncDUhXw" target="frame_a">Brotherhood</a></li>
      <li><a href="https://www.youtube.com/embed/Awaa0OhDNj4" target="frame_a">Fable</a></li>
      <li><a href="https://www.youtube.com/embed/QpvM9uwOcUc" target="frame_a">Skyrim</a></li>
      
      <li class="divider"></li>
      <li class="dropdown-header">Child</li>
      <li><a href="https://www.youtube.com/embed/FaMTedT6P0I" target="frame_a">Minecraft</a></li>
      <li><a href="https://www.youtube.com/embed/bKbyKtFhDzE" target="frame_a">LEGO StarWars</a></li>
      <li class="divider"></li>
      <li class="dropdown-header">Sport</li>
      <li><a href="https://www.youtube.com/embed/TnTYVT6lwBc" target="frame_a">Fifa 15</a></li>
    </ul>
  </div>
</div>
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>
 
<br><br>
    </body>
    <?php include_once 'includes/footer.php' ?>
</html>
