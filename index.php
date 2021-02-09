<?php
$city = ""; 
$result = "";
if ($_GET) {
  $city = $_GET['city'];
  $url = "https://www.weather-forecast.com/locations/$city/forecasts/latest";
  $headers = @get_headers($url);

    if(!strpos($headers[0], '404')){
      $weather = file_get_contents("https://www.weather-forecast.com/locations/$city/forecasts/latest");
      $res = (explode('ash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">', $weather));
      $data = (explode('</span></p></td>',$res[1]));
    $result = '<div id="result" class="alert alert-success mt-3" role="alert ">' . $data[0] . '</div>';
  }
    else{
      $result = '<div id="result" class="alert alert-danger mt-3" role="alert ">City not found. Try again!</div>';
    }
  }
?>
<!doctype html>
<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body {
      background: none;
    }

    .container {
      padding: 7em;
      text-align: center;
    }

    #btn {
      width: 7em;
      margin: 2px;
    }

    h1 {
      font-size: 3em;
    }

    p {
      font-size: 20px;
      margin-bottom: 5px;
    }

    html {
      background: url(bg-image.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  </style>
  <title>Weather Forecast!</title>
</head>

<body>
  <div class="container">
    <h1>What's the weather?</h1>
    <p>Enter the name of the city:</p>
    <form action="index.php" method="get">
      <input type="text" id="city" class="form-control w-25 mb-1" name="city" value="<?php echo $city; ?>">
      <button id="btn" class="btn btn-primary">Submit</button>
      
        <?php echo $result;?>
      
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>