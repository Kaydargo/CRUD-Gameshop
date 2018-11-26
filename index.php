<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/controller.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kays Games</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
    <script src="js/wow.min_.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>new WOW().init();</script>
    
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
  </head>

  <body>

    <?php include_once'includes/header.php' ?>


      <div id="flip"><h1 class="my-4 text-center wow bounceIn" title="Click here">About Us!</h1></div>
      <div id="panel"><p>Here at Kay's Games we buy and sell second-hand games with the best prices in the market so you don't have to look around for better prices. <br>We are located in Marshes Shopping centre, Dundalk, Co.Louth so drop in if you see something you like.
          </p>
          <p>Interested in buying a game but afraid it could get sold out? Just send us an email and we can reserve it for you! <br>
              If you're interested in selling a game all you have to do is email and we'll be in touch.</p></div>

    <!-- Page Content -->
    
    <div class="container">

        <h1 class="my-4 text-center text-lg-left wow bounceInUp">Game Library</h1>

      <div class="row text-center text-lg-left">
<?php 
require_once('database.php');   
$queryProducts = "SELECT * FROM game";
    $statement3 = $db->prepare($queryProducts);
    $statement3->execute();
    $games = $statement3->fetchAll();
    $statement3->closeCursor();
    
    ?>
                     				
                    		
            <div class="parabox">   

        <!-- Start of Col Div -->
        <div class="col-md-12">
            <!--/.Panel -->
            </br> 
            <div class="panel panel-default">            
                  <div class="panel-body">
                    <div class="row">
                <!--/.row1 -->          
                <!-- Display each by id -->
                <?php foreach($games as $game): ?>
                        </br> 
                        <div class="col-md-3">  
                            <a href="trailers.php" ><?= ($game['picture'] <> " " ? "<img style='width:210px; height:300px; padding-top:40px' src='images/{$game['picture']}'/>" : "") ?>          </a>          
                            
                            <div class="game-title">
                                <?= ($game['name'] <> "" ? $game['name'] : "\t") ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <?php echo"&euro;" ?> <?= ($game['salePrice'] <> " " ? $game['salePrice'] : "") ?>
                            </div>                       
                       </div>       
            <!-- End of Foreach Statement -->
            <?php endforeach; ?>
        </div>
       </div>
     </div>
     <!--/.row1-collapse -->  
   </div>
  <!-- /.container -->
  </div>
        

      </div>
    </div>
    <br>
    
    
    
    <div class="contact-container">
  <h2>Feel free to get in touch.</h2>
  <ul class="actions">
    <li><a href="#" id="contact" class="button big">Contact Us</a></li>
  </ul>
</div>

<div class="cd-popup contact" role="alert">
  <form method="POST" name="contactform" id="contactform" class="contact-form">
    <div class="cd-popup-container" style="">
      <p style="">
        <a href="" class="cd-popup-close cd-close-button">
          <i class="fa fa-times" style="pointer-events:none;"></i>
        </a><strong>Request: </strong>If there are any games not in stock feel free to request them and I will get back to you when they are available.<br>
          <strong>To Sell: </strong>Please reference the name of the game and its condition and I will get back to you with an offer. 
      </p>

      <div class="name">
        <label for="name">Name: </label>
        <input data-progression type="text" id="name" name="name" />
      </div>
      <div class="email">
        <label for="email">Email: </label>
        <input data-progression type="text" id="email" name="email" />
      </div>
      <div class="message">
        <label for="message">Message: </label>
        <textarea data-progression name="message" id="message" name="message"></textarea>
      </div>
      <br>
      <div style="text-align:left">
        <input data-progression type="checkbox" id="human" name="human" />
        <label for="human">I am a human and not a robot.</label>
      </div>
      <br>
      <div class="submit">
        <input type="submit" name="submit" id="submit" value="Send" />
      </div>
    </div>
  </form>
</div>

<div class="cd-popup notification" role="alert">
  <div class="cd-popup-container">
    <a href="" class="cd-popup-close cd-close-button"><i class="fa fa-times" style="pointer-events:none;"></i></a>
    <p>
      <h3 id="notification-text" >Thanks for getting in touch!</h3>
    </p>
  </div>
</div>
    
    <br>
      <script>function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function closeForm() {
  document.contactform.name.value = '';
  document.contactform.email.value = '';
  document.contactform.message.value = '';

  $('.email').removeClass('typing');
  $('.name').removeClass('typing');
  $('.message').removeClass('typing');

  $('.cd-popup').removeClass('is-visible');
  $('.notification').addClass('is-visible');
  $('#notification-text').html("Thanks for contacting us, we'll be in touch!");
}

$(document).ready(function($) {

  $('#contact').on('click', function(event) {
    event.preventDefault();

    $('#contactblurb').html('Questions, suggestions, and general comments are all welcome!');
    $('.contact').addClass('is-visible');

    if ($('#name').val().length != 0) {
      $('.name').addClass('typing');
    }
    if ($('#email').val().length != 0) {
      $('.email').addClass('typing');
    }
    if ($('#message').val().length != 0) {
      $('.message').addClass('typing');
    }
  });

  //close popup when clicking x or off popup
  $('.cd-popup').on('click', function(event) {
    if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });

  $(document).keyup(function(event) {
    if (event.which == '27') {
      $('.cd-popup').removeClass('is-visible');
    }
  });

  $('#name').keyup(function() {
    $('.name').addClass('typing');
    if ($(this).val().length == 0) {
      $('.name').removeClass('typing');
    }
  });
  $('#email').keyup(function() {
    $('.email').addClass('typing');
    if ($(this).val().length == 0) {
      $('.email').removeClass('typing');
    }
  });
  $('#message').keyup(function() {
    $('.message').addClass('typing');
    if ($(this).val().length == 0) {
      $('.message').removeClass('typing');
    }
  });

  $('#contactform').submit(function() {
    var name = $('#name').val();
    var email = $('#email').val();
    var message = $('#message').val();
    var human = $('#human:checked').val();

    if (human) {
      if (validateEmail(email)) {
        if (name) {
          if (message) {          
            closeForm();

          } else {
            $('#notification-text').html("<strong>Please let us know what you're thinking!</strong>");
            $('.notification').addClass('is-visible');
          }
        } else {
          $('#notification-text').html('<strong>Please provide a name.</strong>');
          $('.notification').addClass('is-visible');
        }
      } else {
        $('#notification-text').html('<strong>Please use a valid email address.</strong>');
        $('.notification').addClass('is-visible');
      }
    } else {
      $('#notification-text').html('<h3><strong><em>Warning: Please prove you are a human and not a robot.</em></strong></h3>');
      $('.notification').addClass('is-visible');
    }

    return false;
  });
});</script>
 <?php include_once 'includes/footer.php' ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>