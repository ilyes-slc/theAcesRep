<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'complaint' => [[], ['_controller' => 'App\\Controller\\ComplaintController::index'], [], [['text', '/complaint']], [], []],
    'ajouter' => [[], ['_controller' => 'App\\Controller\\ComplaintController::add'], [], [['text', '/ajouter']], [], []],
    'ajouter2' => [[], ['_controller' => 'App\\Controller\\ComplaintController::add2'], [], [['text', '/ajouter2']], [], []],
    'afficher' => [[], ['_controller' => 'App\\Controller\\ComplaintController::show'], [], [['text', '/afficher']], [], []],
    'supprimer' => [['id'], ['_controller' => 'App\\Controller\\ComplaintController::supprimer'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/supprimer']], [], []],
    'supprimer2' => [['id'], ['_controller' => 'App\\Controller\\ComplaintController::supprimer2'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/supprimer2']], [], []],
    'modifier' => [['id'], ['_controller' => 'App\\Controller\\ComplaintController::update'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/modifier']], [], []],
    'modifier2' => [['id'], ['_controller' => 'App\\Controller\\ComplaintController::update2'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/modifier2']], [], []],
    'traiter' => [['idRec'], ['_controller' => 'App\\Controller\\ComplaintController::traiter'], [], [['variable', '/', '[^/]++', 'idRec'], ['text', '/traiter']], [], []],
    'test' => [[], ['_controller' => 'App\\Controller\\TestController::index'], [], [['text', '/test']], [], []],
    'back' => [[], ['_controller' => 'App\\Controller\\TestController::back'], [], [['text', '/back']], [], []],
];
