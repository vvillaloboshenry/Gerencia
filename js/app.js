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
                        templateUrl: "views/nueva_visita.php"
                    })
            .when("/nuevo_funcionario",
                    {
                        templateUrl: "views/nuevo_funcionario.php"
                    })
            .when("/crear_roles",
                    {
                        templateUrl: "views/nuevo_roll.php"
                    })
            .when("/mi_escalafon",
                    {
                        templateUrl: "views/mi_escalafon.php"
                    })
            .when("/administrador",
                    {
                        templateUrl: "views/listar_administrador.php"
                    })
            .when("/ejemplo",
                    {
                        templateUrl: "views/ejemplo.php"
                    })
            .otherwise(
                    {
                        redirectTo: "/ver_visitas"
                    });
});