
import './styles/style.css';
require("animate.css");

import angular from "angular";
const $ = require('jquery');
global.$ = global.jQuery = $;

let app = angular.module('myApp', [
    require('angular-route'),
    require('angular-filter')
]);

let myRouterLoader = function($q, $timeout, $rootScope){
    let loader = document.getElementById("loader");
    let delay = $q.defer();
    $timeout(delay.resolve, 2000);
    loader.classList.remove("animate__infinite");
    loader.classList.add("animate__fadeOutDown");
    loader.classList.add("animate__slower");
    return delay.promise;
};

myRouterLoader.$inject = ['$q', '$timeout', '$rootScope'];

app
    //Interpolation
    .config(['$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('//').endSymbol('//');
    }])

    //Routing
    .config(['$routeProvider', function($routeProvider){
        $routeProvider
            .when("/home", {
                title: 'Accueil',
                templateUrl: "views/home.html",
                controller: "homeCtrl",
                resolve:{
                    delay: myRouterLoader
                }
            })
            .when("/tarifs", {
                title: 'Tarifs',
                templateUrl: "views/tarifs.html",
                controller: "tarifsCtrl",
                resolve:{
                    delay: myRouterLoader
                }
            })
            .when("/faq", {
                title: 'Foire Aux Questions',
                templateUrl: "views/faq.html"
            })
            .when("/contacts", {
                title: 'Contact',
                templateUrl: "views/contacts.html"
            })
            .otherwise({ redirectTo: '/home' });
    }])

    .directive('showDuringResolve', ['$rootScope', function($rootScope) {

        return {
            link: function(scope, element) {

                element.addClass('ng-hide');
                $rootScope.statechange =  true;

                var unregister = $rootScope.$on('$routeChangeStart', function() {
                    element.removeClass('ng-hide');
                    $rootScope.statechange =  false;
                });

                scope.$on('$destroy', unregister);
            }
        };
    }])

    //Changement de route dynamique en fonction de la route
    .run(['$rootScope', function($rootScope) {
        $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
            $rootScope.title = current.$$route.title;
        });
    }])

    //Filtre pour remplacer une partie d'un texte
    .filter('replace', [function () {

        return function (input, from, to) {

            if(input === undefined) {
                return;
            }

            var regex = new RegExp(from, 'g');
            return input.replace(regex, to);

        };

    }])

    .controller("mainCtrl", ['$rootScope', function($rootScope){
        $rootScope.statechange = true;
    }])

    //Controller de la page d'accueil
    .controller('homeCtrl', ['$scope', '$route', '$rootScope', '$location', function($scope, $route, $rootScope, $location){

        $scope.message = "...";
        $rootScope.statechange = true;

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

    //Controller de la page des tarifs
    .controller('tarifsCtrl', ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope){
        $rootScope.statechange = true;
        $scope.getArticlesCategories = function(){
            $scope.ajaxCategorie = false;
            $http.get("/ajax/categorie")
                .then(function(response) {
                    $scope.articlesCataegorie = response.data;
                    $scope.articlesCataegoriePos = 0;
                    $scope.ajaxCategorie = true;
                });
        }

        $scope.tabArticleCategory = function(var1){
            $scope.articlesCataegoriePos = var1;
        }

        $scope.arrondir = function(var1){
            return Math.round(var1);
        }

        $scope.init = function(){
            $scope.getArticlesCategories();
        }

        $scope.init();
    }]);
