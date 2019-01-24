<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Controllers\\PollController' => $baseDir . '/app/controllers/PollController.php',
    'App\\Core\\App' => $baseDir . '/core/App.php',
    'App\\Core\\Database\\Connection' => $baseDir . '/core/database/Connection.php',
    'App\\Core\\Database\\Database\\Database' => $baseDir . '/core/database/Database.php',
    'App\\Core\\Database\\Handler' => $baseDir . '/core/database/Handler.php',
    'App\\Core\\Request' => $baseDir . '/core/Request.php',
    'App\\Core\\Response' => $baseDir . '/core/Response.php',
    'App\\Core\\Router' => $baseDir . '/core/Router.php',
    'App\\Models\\Poll' => $baseDir . '/app/models/Poll.php',
    'Candidate' => $baseDir . '/server/models/Candidate.php',
    'CandidatesController' => $baseDir . '/server/controllers/CandidatesController.php',
    'ComposerAutoloaderInit8469785e90c1ff18cfd3d30fe3f0a7b6' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInit8469785e90c1ff18cfd3d30fe3f0a7b6' => $vendorDir . '/composer/autoload_static.php',
    'Database' => $baseDir . '/server/Database.php',
    'LayoutsController' => $baseDir . '/server/controllers/LayoutsController.php',
    'Poll' => $baseDir . '/server/models/Poll.php',
    'PollController' => $baseDir . '/server/controllers/PollController.php',
    'Vote' => $baseDir . '/server/models/Vote.php',
    'VotesController' => $baseDir . '/server/controllers/VotesController.php',
);
