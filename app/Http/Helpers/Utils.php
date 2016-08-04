<?php

namespace App\Http\Helpers;

class Utils{

    public static function getOtp(){
        return mt_rand(100000, 999999);
    }

    public static function generateReferralCode($length=6){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // To remove the unwanted attributes of an obj/obj array
    public static function unsetAttributes($mixed, $attr_mixed){
        if(is_array($mixed)){
            $is_array = is_array($attr_mixed);
            foreach($mixed as $key => $item){
                if($is_array){
                    foreach($attr_mixed as $attr){
                        if(is_array($item)){
                            unset($item[$key]);
                        } else{
                            unset($item->{$attr});
                        }
                    }
                } else{
                    if(is_array($item)){
                        unset($item[$key]);
                    } else{
                        unset($item->{$attr_mixed});
                    }
                }
            }
        } else{
            if(is_array($attr_mixed)){
                foreach($attr_mixed as $attr){
                    if(is_array($mixed)){
                        $mixed[$attr];
                    } else{
                        unset($mixed->{$attr});
                    }
                }
            } else{
                if(is_array($mixed)){
                    $mixed[$attr_mixed];
                } else{
                    unset($mixed->{$attr_mixed});
                }
            }
        }
        return $mixed;
    }
}