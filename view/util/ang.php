<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<script>
var app = angular.module("lista", []); 
app.controller("myCtrl", function($scope) {
    $scope.products = ["leite", "pao", "batata"];
    $scope.removeItem = function (x) {    
        $scope.products.splice(x, 1);
    }
});
</script>

<div ng-app="lista" ng-cloak ng-controller="myCtrl" class="w3-card-2 w3-margin" style="max-width:400px;">
  <header class="w3-container w3-light-grey w3-padding-16">
    <h3>Minha lista de compras</h3>
  </header>
  <ul class="w3-ul">
    <li ng-repeat="x in products" class="w3-padding-16">{{x}}<span ng-click="removeItem($index)" style="cursor:pointer;" class="w3-right w3-margin-right">x</span></li>
  </ul>
</div>

</body>
</html>