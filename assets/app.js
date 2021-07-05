
import angular from "angular";
const $ = require('jquery');
global.$ = global.jQuery = $;

let app = angular.module('myApp', [
    require('angular-route')
]);

app.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('//').endSymbol('//');
}]).config(['$routeProvider', function($routeProvider){
    $routeProvider
        .when("/home", {
            templateUrl: "views/home.html",
            controller: "homeCtrl"
        })
        .when("/tarifs", {
            templateUrl: "views/tarifs.html",
            controller: "tarifsCtrl"
        })
        .when("/faq", {
            templateUrl: "views/faq.html"
        })
        .when("/contacts", {
            templateUrl: "views/contacts.html"
        })
        .otherwise({ redirectTo: '/home' });
}])


//Fonctionnalité permettant de controller l'ouverture et la fermetture de l'appel
.directive('linkdesacrouting', ['$rootScope', function($rootScope){
    $rootScope.header = false;
    return {
        compile: function(element, attrs){
            element.on("click", function(event){
                $rootScope.header = !$rootScope.header;
                if($rootScope.header){
                    //console.log("Panel ouvert, on ferme");
                    $(".mm-close")[0].click()
                }
            });
        }
    }
}])

.controller('homeCtrl', ['$scope', '$route', function($scope, $route){

    $scope.panelPosition = 0;
    $scope.panel = function(var1){
        $scope.panelPosition = var1;
    };

}])

.controller('tarifsCtrl', ['$scope', '$route', function($scope, $route){

}]);