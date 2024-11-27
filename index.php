<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ANTRIAN POLI</title>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="assets/js/angular.min.js"></script>
    </head>

    <body>
        <div class="container-xxl">
            <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">ANTRIAN POLI RAWAT JALAN RUMAH SAKIT ISLAM YATOFA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>
            </nav>
        </div>
        <div class="container-xxl">
            <table class="table" ng-app="myApp" ng-controller="customersCtrl">
                <thead class="table-dark" >
                    <tr>
                        <th scope="col" ng-repeat="x in antrian_poli">
                            {{ x.nm_poli }} <br>
                            {{ x.nm_dokter }}
                        </th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td ng-repeat="x in registrasi" class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            {{ x.nm_pasien }} : {{ x.no_reg }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            var app = angular.module('myApp', []);
            app.controller('customersCtrl', function ($scope, $http, $interval) {
                $scope.fetchData = function () {
                    $http.get("jadwaldokter.php")
                            .then(function (response) {
                                $scope.antrian_poli = response.data.records;
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
                    $scope.regPeriksa()();
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
