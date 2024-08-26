<?php
    
    class ProductRepository{
        
        static function Get_Product($code, $connection){
            
            $result = $connection->query('SELECT id FROM `b_iblock` WHERE `iblock_type_id` = "'.$code.'"');
            while($ar=$result->fetch()) $res[] = $ar;
            
            $iblock_id = $res[0]['id'];
            
            $result = $connection->query('SELECT id,name FROM `b_iblock_element` WHERE `iblock_id` = '.$iblock_id);
            $res = array();
            while($ar=$result->fetch()) $res[] = $ar;
            
            return BadgeRepository::Get_Badges($res, $connection);
            
        }
        
    }
    
?>