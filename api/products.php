<?
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php");
    
    $res = CatalogController::API_Request('catalog');

?>

<!-- -->
<pre style="font-size: 18px;"><? print_r($res); ?></pre>