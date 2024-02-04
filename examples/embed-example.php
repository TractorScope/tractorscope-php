<?php
# from CLI first run:
# composer require vlucas/phpdotenv
# composer require tractorscope/tractorscope-php

require __DIR__ . '/vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/')->load();

$tractorDashboardId = $_ENV['TRACTOR_DASHBOARD_ID'];
$tractorEmbed = new Tractorscope\Embed($_ENV['TRACTOR_SECRET_KEY']);


$embedUrl = $tractorEmbed->getUrl([
  'dashboard' => $tractorDashboardId,
  'filters' => [
    'customer_id' => '111',
    'daterange' => 'all_dates'
  ],
]);

echo '<iframe src="'.$embedUrl.'" width="100%" height="100%" frameborder="0"></iframe>';
