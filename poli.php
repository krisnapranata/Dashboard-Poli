<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ANTRIAN POLI</title>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Site Icons -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Pogo Slider CSS -->
        <link rel="stylesheet" href="css/pogo-slider.min.css">
        <!-- Site CSS -->
        <link rel="stylesheet" href="css/style.css">    
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">

        <!--[if lt IE 9]>-->
          <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
          <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->

        <!--<![endif]-->
        <script src="assets/js/angular.min.js"></script>
    </head>

    <body class="text-bg-primary">


<!--<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="assets/images/icon/kop.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>


<form class="d-flex" role="search">

	<img src="">
        </form>


      </div>



    </div>
  </nav>-->


<header class="top-header">
            <nav class="navbar header-nav navbar-expand-md ">
                <!--<div class="container">-->
                <a class="navbar-brand" href="index.html"><img src="images/yatofa-logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link" href=""><img src="images/bpjskes1.jpg" alt="image"></a></li>
                        <li><a class="nav-link" href=""><img src="images/bpjsket1.jpg" alt="image"></a></li>
                        <li><a class="nav-link" href=""><img src="images/jasaraharja1.jpg" alt="image"></a></li>                            
                    </ul>
                </div>
                <!--</div>-->
            </nav>
        </header>

        <div class="container">


        </div>

                    <hr class="featurette-divider">

        <div class="container-fluid" ng-app="myApp" ng-controller="customersCtrl">
            <!-- Three columns of text below the carousel -->
            <div class="row align-items-top justify-content-center"  >
                <div class="col-lg-2 text-bg-primary" ng-repeat="x in dokter">
                    <!--<svg class="bd-placeholder-img rounded-circle" width="80" height="80" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>-->
                    <img ng-src="assets/images/dokter/{{x.kd_dokter}}.png" 
                         class="rounded-circle" width="150" height="150">
                    <h6><span class="badge bg-black bg-gradient text-white fs-3">{{ x.nm_dokter}}</span></h6>
                    <h6><span class="badge bg-black bg-gradient text-white fs-3">{{ x.nm_poli}}</span></h6>
                    <hr class="featurette-divider">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-gradient text-white"><p class="fs-3">Antri</p></th>
                                <th scope="col" class="bg-gradient text-white"><p class="fs-3">Pasien</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="y in registrasi" ng-if="y.kd_dokter == x.kd_dokter" >
                                <td class="bg-gradient text-white"><span class="fs-3">{{ y.no_reg}}</span></td>
                                <td class="bg-gradient text-white"><span class="fs-3">{{ y.nm_pasien}}</span></td>
                            </tr>
                        </tbody>
                    </table>

                </div><!-- /.col-lg-4 -->

            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">



            <!-- /END THE FEATURETTES -->

        </div>

        <script>
            var app = angular.module('myApp', []);
            app.controller('customersCtrl', function ($scope, $http, $interval) {
                $scope.fetchData = function () {
                    $http.get("jadwaldokter.php")
                            .then(function (response) {
                                $scope.dokter = response.data.records;
                        
                            });
                }
                $interval(function () {
                    $scope.fetchData();
                }, 1000);

                $scope.regPeriksa = function () {
                    $http.get("registrasi.php")
                            .then(function (response) {
                                $scope.registrasi = response.data.records;
                            });
                }
                $interval(function () {
                    $scope.regPeriksa();
                }, 1000);
            });
        </script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
<!--<html >
    <script src="assets/js/angular.min.js"></script>
    <body>

        <div ng-app="myApp" ng-controller="customersCtrl">

            <table>
                <thead></thead>
                <tr ng-repeat="x in kd_dokter">
                    <td>{{ x.kd_dokter}}</td>
                </tr>
            </table>

        </div>-->


<!--
    </body>
</html>-->
