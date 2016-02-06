/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var app = angular.module("demo", []);

app.run(function($rootScope) {
    document.addEventListener("keyup", function(e) {
        if (e.keyCode === 27)
            $rootScope.$broadcast("escapePressed", e.target);
    });

    document.addEventListener("click", function(e) {
        $rootScope.$broadcast("documentClicked", e.target);
    });
});

app.controller("sidebar-controller", function($scope, $rootScope) {
    $scope.leftVisible = false;

    $scope.close = function() {
        $scope.leftVisible = false;
    };

    $scope.showLeft = function(e) {
        $scope.leftVisible = true;
        e.stopPropagation();
    };

    $rootScope.$on("documentClicked", _close);
    $rootScope.$on("escapePressed", _close);

    function _close() {
        $scope.$apply(function() {
            $scope.close(); 
        });
    }
});

app.directive("menu", function() {
    return {
        restrict: "E",
        template: "<div ng-class='{ show: visible, left: alignment === \"left\"}' ng-transclude></div>",
        transclude: true,
        scope: {
            visible: "=",
            alignment: "@"
        }
    };
});

app.directive("menuItem", function() {
     return {
         restrict: "E",
         template: "<div ng-click='navigate()' ng-transclude></div>",
         transclude: true,
         scope: {
             hash: "@"
         },
         link: function($scope) {
             $scope.navigate = function() {
                 window.location.hash = $scope.hash;
             };
         }
     };
});