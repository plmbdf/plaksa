<?php
    
    class CatalogController{
        
        static function API_Request($code){
            require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
            $connection = \Bitrix\Main\Application::getConnection();
            
            return ProductRepository::Get_Product($code, $connection);
                        
        }
        
    }
    
?>