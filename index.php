<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="DOLT Mathias">

    <title>TWEB - Lab01 - A first look at JS</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      html {
        min-height: 100%;
        position: relative;
      }
      body {
        margin-bottom: 60px;
      }
      .footer {
        background-color: #f5f5f5;
        bottom: 0;
        height: 60px;
        position: absolute;
        width: 100%;
      }
      body > .container {
        padding: 60px 15px 0;
      }
      .container .text-muted {
        margin: 20px 0;
      }
      .footer > .container {
        padding-left: 15px;
        padding-right: 15px;
      }
      code {
        font-size: 80%;
      }
    </style>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>A first look at JS</h1>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <ul>
            <li>When you move the mouse, the coordinates should be displayed in the sticky footer.</li>
            <li>When you move the mouse, a person should be created with random attributes.</li>
            <li>The current time should be displayed in the Clock panel.</li>
            <li>When you click on the "Show alert" button, a dialog should appear.</li>
            <li>When you click on the "Toggle student" button, the panel should be hidden/shown.</li>
          </ul>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body panel-person">
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body panel-json alert-info">
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Clock</h3>
        </div>
        <div class="panel-body panel-body-clock">
        </div>
      </div>
      <button type="button" class="btn btn-primary show-alert">Show alert</button>
      <button class="btn btn-default toggle-student" type="submit">Toggle student</button>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"></p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="chance.min.js"></script>

    <script>
      $(document).mousemove(function(){
        var gender = chance.gender();
        var person = chance.name({ gender: gender });
        $('.panel-person').text('Hello ' + person + " (" + gender + ")");
		if(gender == 'Male') {
			$('.panel-person').removeClass('alert-danger');
			$('.panel-person').addClass('alert-info');
		} else {
			$('.panel-person').removeClass('alert-info');
			$('.panel-person').addClass('alert-danger');
		}
      });
	  
	  $('.panel-json').text('Insert rooms here:');
	  $.getJSON('data.json', function(data){
		$.each(data, function(key, value){
			var arr = (value+'').split(',');
			$('.panel-json').append('<br>' + arr[0] + ': ' + arr[1] + ", " + arr[2]);
		});
	  });

      $(document).ready(function(){
        setInterval(function(){
          $('.panel-body-clock').text(new Date());
        }, 1000);
      });

      $('.show-alert').click(function(){
        alert("hello");
      });

      $('.toggle-student').click(function(){
        $('.panel-person').toggle();
      });

      $(document).mousemove(function(e) {
        $('.footer .text-muted').text(e.pageX + ", " + e.pageY);
      });
    </script>
  </body>
</html>
