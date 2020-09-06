<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>WEBSITE KELURAHAN</title>
        <link href="{{asset('assets_fasi/style.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <!-- <script src="bootstrap.min.js"></script> -->
      <!-- <link href="bootstrap.min.css" rel="stylesheet"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- Font Awesome CSS -->



</head>
<body>
      <div class="wrapper">
              <header>

                    <nav>


                          <div class="menu-icon">
                                <i class="fa fa-bars fa-2x"></i>
                          </div>

                          <div class="logo">
                            <!-- <img src="img/logoo.png" > -->
                          </div>


                          <div class="menu">
                          <ul>
                                <li>
                                    <a href="/beranda">BERANDA</a>
                                </li>
                                <li>
                                    <a href="/berita">BERITA</a>
                                </li>
                                <li>
                                    <a href="/kependudukan">FASILITAS</a>
                                </li>
                                <li>
                                    <a href="/galery">GALERI</a>
                                </li>
                                <li>
                                    <a href="/destinasi">DESTINASI</a>
                                </li>
                                <li>
                                    <a href="/inputkrisar">KRITIK & SARAN</a>
                                </li>
                                <li>
                                    <a href="/kontak">KONTAK</a>
                                </li>
                                <li>
                                </ul>
                                <div class="line"></div>
                          </div>
                          <!-- <hr style= "border: 0;  height: 1px; background-image: linear-gradient(to right, #000,#fff, #000);opacity:0.4;"> -->

                    </nav>

              </header>

              @yield('content')



      <div style="background-color:black;height:100px;padding: 40px;
      text-align: center;
      color: white;">
        <div class="col-md-12">
            
                <h3>Websie Kelurahan <a href="/beranda">
                Ranotana Weru</a>.</h3>        </div>
      </div>