(self.webpackChunk=self.webpackChunk||[]).push([[143],{144:(e,t,o)=>{"use strict";var r=o(695),n=o.n(r),l=o(755);o.g.$=o.g.jQuery=l,n().module("myApp",[o(944)]).config(["$interpolateProvider",function(e){e.startSymbol("//").endSymbol("//")}]).config(["$routeProvider",function(e){e.when("/home",{templateUrl:"views/home.html",controller:"homeCtrl"}).when("/tarifs",{templateUrl:"views/tarifs.html",controller:"tarifsCtrl"}).when("/faq",{templateUrl:"views/faq.html"}).when("/contacts",{templateUrl:"views/contacts.html"}).otherwise({redirectTo:"/home"})}]).directive("linkdesacrouting",["$rootScope",function(e){return e.header=!1,{compile:function(t,o){t.on("click",(function(t){e.header=!e.header,e.header&&l(".mm-close")[0].click()}))}}}]).controller("homeCtrl",["$scope","$route",function(e,t){e.panelPosition=0,e.panel=function(t){e.panelPosition=t}}]).controller("tarifsCtrl",["$scope","$route",function(e,t){}])}},e=>{"use strict";e.O(0,[223],(()=>{return t=144,e(e.s=t);var t}));e.O()}]);