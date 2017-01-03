'use strict';

var app = angular.module('MiApp', [
    'ngRoute'
])

app.config(function ($routeProvider)
{
    $routeProvider
            .when("/",
                    {
                        redirectTo: "/ver_visitas"
                    })
            .when("/ver_visitas",
                    {
                        templateUrl: "views/listar.php"
                    })
            .when("/nueva_visita",
                    {
                        templateUrl: "views/nueva.php"
                    })
            .when("/nuevo_funcionario",
                    {
                        templateUrl: "views/nuevo_funcionario.php"
                    })
            .when("/crear_roles",
                    {
                        templateUrl: "views/nuevo_roll.php"
                    })
            .when("/administrador",
                    {
                        templateUrl: "views/listar_administrador.php"
                    })
            .otherwise(
                    {
                        redirectTo: "/ver_visitas"
                    });
});