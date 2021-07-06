
import angular from "angular";
const $ = require('jquery');
global.$ = global.jQuery = $;

let app = angular.module('myApp', [
    require('angular-route')
]);

app
    //Interpolation
    .config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('//').endSymbol('//');
}])
    //Routing
    .config(['$routeProvider', function($routeProvider){
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
    /*.directive('linkdesacrouting', ['$rootScope', function($rootScope){
        $rootScope.header = false;
        return {
            compile: function(element, attrs){
                element.on("click", function(event){
                    $rootScope.header = !$rootScope.header;
                    if($rootScope.header === true){
                        try {
                            $(".mm-close")[0].click()
                        }catch (e) {
                            console.log("Ok")
                        }
                    }
                });
            }
        }
    }])*/
    .controller('homeCtrl', ['$scope', '$route', '$rootScope', '$location', function($scope, $route, $rootScope, $location){

        //Panel important information
        $scope.panelPosition = 0;
        $scope.panel = function(var1){
            $scope.panelPosition = var1;
        };

        //Ouverture et fermetture des accordeons
        $scope.openAccordeon = function(element){
            //Liste de éléments de l'accordean
            let accList = Object.values( $(".my-acc") );
            //On retire les deux derniers elements car ils sont inutiles
            accList.pop();
            accList.pop();
            //On retire les classes de tout les elements
            (accList).forEach(
                x => /*console.log(x)*/ x.classList.remove("tt-item__open")
            )
            //On ajoute la classe sur l'élément sur lequel on a cliqué
            element.classList.add("tt-item__open");
        }

    }])

    .controller('tarifsCtrl', ['$scope', '$route', function($scope, $route){

    }]);