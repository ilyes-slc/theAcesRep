<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/complaint' => [[['_route' => 'complaint', '_controller' => 'App\\Controller\\ComplaintController::index'], null, null, null, false, false, null]],
        '/ajouter' => [[['_route' => 'ajouter', '_controller' => 'App\\Controller\\ComplaintController::add'], null, null, null, false, false, null]],
        '/ajouter2' => [[['_route' => 'ajouter2', '_controller' => 'App\\Controller\\ComplaintController::add2'], null, null, null, false, false, null]],
        '/afficher' => [[['_route' => 'afficher', '_controller' => 'App\\Controller\\ComplaintController::show'], null, null, null, false, false, null]],
        '/test' => [[['_route' => 'test', '_controller' => 'App\\Controller\\TestController::index'], null, null, null, false, false, null]],
        '/back' => [[['_route' => 'back', '_controller' => 'App\\Controller\\TestController::back'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/supprimer(?'
                    .'|/([^/]++)(*:191)'
                    .'|2/([^/]++)(*:209)'
                .')'
                .'|/modifier(?'
                    .'|/([^/]++)(*:239)'
                    .'|2/([^/]++)(*:257)'
                .')'
                .'|/traiter/([^/]++)(*:283)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        191 => [[['_route' => 'supprimer', '_controller' => 'App\\Controller\\ComplaintController::supprimer'], ['id'], null, null, false, true, null]],
        209 => [[['_route' => 'supprimer2', '_controller' => 'App\\Controller\\ComplaintController::supprimer2'], ['id'], null, null, false, true, null]],
        239 => [[['_route' => 'modifier', '_controller' => 'App\\Controller\\ComplaintController::update'], ['id'], null, null, false, true, null]],
        257 => [[['_route' => 'modifier2', '_controller' => 'App\\Controller\\ComplaintController::update2'], ['id'], null, null, false, true, null]],
        283 => [
            [['_route' => 'traiter', '_controller' => 'App\\Controller\\ComplaintController::traiter'], ['idRec'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
