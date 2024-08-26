<?php
    
    class BadgeRepository{
        
        static function Get_Badges($res, $connection){
            
            for($i=0; $i<count($res); $i++){
                
                $result = $connection->query('SELECT value FROM `b_iblock_element_property` WHERE `iblock_element_id` = '.$res[$i]['id']);
                $arr = array();
                while($ar=$result->fetch()) $arr[] = $ar;
                
                if($arr){
                    for($q=0; $q<count($arr); $q++){
                        $result = $connection->query('SELECT id,uf_name,uf_theme FROM `b_hlbd_badges` WHERE `uf_xml_id` = "'.$arr[$q]['value'].'"');
                        $arr_badges = array();
                        while($ar=$result->fetch()) $arr_badges[] = $ar;
                        $arr_badges = $arr_badges[0];
                        foreach($arr_badges as $k => $v){
                            $arr_badges[str_replace('uf_', '', $k)] = $v;
                            if($k != 'id') unset($arr_badges[$k]);
                        }
                        $res[$i]['badges'][$q] = $arr_badges;
                    }
                }
                
            }
            
            return BadgeThemeRepository::Get_Themes($res, $connection);
            
        }
        
    }
    
?>