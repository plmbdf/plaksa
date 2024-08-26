<?php
    
    class BadgeThemeRepository{
        
        static function Get_Themes($res, $connection){
            
            for($i=0; $i<count($res); $i++){
                if($res[$i]['badges']){
                    
                    for($q=0; $q<count($res[$i]['badges']); $q++){
                        
                        $result = $connection->query('SELECT id,uf_name,uf_color FROM `b_hlbd_themes` WHERE `id` = '.$res[$i]['badges'][$q]['theme']);
                        $arr_themes = array();
                        while($ar=$result->fetch()) $arr_themes[] = $ar;
                        
                        $arr_themes = $arr_themes[0];
                        foreach($arr_themes as $k => $v){
                            $arr_themes[str_replace('uf_', '', $k)] = $v;
                            if($k != 'id') unset($arr_themes[$k]);
                        }
                        
                        $res[$i]['badges'][$q]['theme'] = $arr_themes;
                        
                    }
                    
                }
            }
            
            return json_encode($res, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            
        }
        
    }
    
?>