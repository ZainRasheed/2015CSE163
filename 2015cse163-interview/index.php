<?php
$datas=file_get_contents("https://s3.amazonaws.com/roomie.fame.com/data.json");
$datas=json_decode($datas);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div style="background-color:grey" class="col-12">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Logo for this</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <form action="index.php" method="post" class="form-inline my-2 my-lg-0">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="...Try Avatar(Case sensitive)" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search Movies</button>
              </form>
            </div>
          </nav>
        </div>
      </div>
      <div style="padding:5%" class="row">
        <div class="col-12">
          <center><h1>The Booking website :P</h1></center>
        </div>
        <div style="margin-bottom:5%" class="col-md-12">
          <center>
            <div style="margin:10px" class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="index.php?fil=Action" class="dropdown-item" href="#">Action</a>
                <a href="index.php?fil=Animation" class="dropdown-item" href="#">Animaton</a>
                <a href="index.php?fil=Fantasy" class="dropdown-item" href="#">Fantasy</a>
              </div>
            </div>
            <button style="margin:10px" class="btn btn-secondary" type="button" name="button">filter1</button>
            <button style="margin:10px" class="btn btn-secondary" type="button" name="button">filter2</button>
            <button style="margin:10px" class="btn btn-secondary" type="button" name="button">filter3</button>

            <button style="margin:10px" class="btn btn-secondary" type="button" name="button">filter4</button>

          </center>
        </div>

        <div style="background-color:grey;padding:3%;" class="container-fluid">
            <div class="row">

              <?php
              foreach ($datas as $data) {
                if (isset($_POST['search'])) {
                  $var=$data->movie_title;
                  $var1=$_POST['search'];
                  // $var=trim($var);
                  if (!preg_match("/$var1/i",$var)) {
                    continue;
                  }//                     if (strpos($a, 'are') !== false) {
//     echo 'true';
// }
               }
               if (isset($_GET['fil'])) {
                 $var=$data->genres;
                 if (!strpos($var,$_GET['fil'])) {
                   continue;
                 }
               }
                ?>
                <div class="col-md-4">
                  <div class="card" style="width: 30rem;margin-top:1%;margin-bottom:1%">
                    <img style="height:30vh;"class="card-img-top" src="images.jpeg" alt="Card image cap">
                    <div class="card-body">
                      <b><h5 class="card-title"><?php echo $data->movie_title; ?></h5></b>

                      <p class="card-text">Director: <?php echo $data->director_name; ?> <br>
                      Actors: <?php echo $data->actor_1_name; ?><?php echo ", ".$data->actor_2_name; ?> <br>
                       Genere: <?php echo $data->genres; ?> <br>
                       Language: <?php echo $data->language; ?> <br>
                       Country: <?php echo $data->country; ?> <br>
                       Rating: <?php echo $data->content_rating; ?> <br>
                       Budget:<?php echo $data->budget; ?> <br>
                       Year: <?php echo $data->title_year; ?>
                      </p>
                      <a href="<?php echo $data->movie_imdb_link; ?>" class="btn btn-primary">IMDB</a>
                    </div>
                  </div>
                </div>
                <?php
                  }
               ?>
<!-- "movie_title": "The Princess and the Frog ",
"director_name": "Ron Clements",
"actor_1_name": "Oprah Winfrey",
"actor_2_name": "Jenifer Lewis",
"genres": "Animation|Family|Fantasy|Musical|Romance",
"language": "English",
"country": "USA",
"content_rating": "G",
"budget": "105000000",
"title_year": "2009",
"plot_keywords": "amphibian|dream|frog|frog prince|waitress",
"movie_imdb_link": "http://www.imdb.com/title/tt0780521/?ref_=fn_tt_tt_1" -->
            </div>
        </div>

      </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
