<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <title>Mengukur Suhu dan Kelembapan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
    <script type="text/javascript">
        function bacaData(){
           var xmlhttp = new XMLHttpRequest(); 
              xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var data = xmlhttp.response;

                    const arrayData = data.split("#");
                     document.getElementById("nilai_suhu").innerHTML = arrayData[0];
                     document.getElementById("nilai_kelembapan").innerHTML = arrayData[1];
                }
              }
              xmlhttp.open("GET", "../../app/event/esp.php", true);
                xmlhttp.send();
        }

        $(document).ready(function(){
            setInterval(bacaData, 2000);
        });
    </script>

  <body>
    <div class="container" style="text-align: center; margin-top:100px">
        <h2>Monitoring Sensor DHT11 <br> Dengan Socket UDP</h2>
    
    <div style="display: flex; justify-content: center">

  <div class="card style = width:30%; ">
  <div class="card-header" style="font-size:30px; font-weight=bold;background-color:red; color:white">
    Suhu
    </div>
    <div class="card-body">
        <h1>
            <span id="nilai_suhu">0</span>
        </h1>
    </div>
  </div>

  <div class="card style = width:30%; ">
  <div class="card-header" style="font-size:30px; font-weight=bold;background-color:blue; color:white">
    Kelembapan
    </div>
    <div class="card-body">
        <h1>
            <span id="nilai_kelembapan">0</span>
        </h1>
    </div>
  </div>
  </div>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>