var app = angular.module('Laravel',
    [
        'ngRoute'
    ], function ($interpolateProvider, $locationProvider ,$routeProvider)
    {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');

        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        });

    });

//Used to get the main absolute path.
var main_path = location.pathname;

if (main_path.indexOf("/public") == -1)
{
    var url = '';
}
else
{
    var url = main_path.substr(0, main_path.indexOf("/public") + 8);
}