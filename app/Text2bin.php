<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text2bin extends Model
{

    public function str2bin($str){
        //dividir em array array
        $str_arr = str_split($str, 4);
        $bin = '';
        
        for($i = 0; $i<count($str_arr); $i++)
            //converter, corrigir e concatenar
            $bin = $bin.str_pad(decbin(hexdec(bin2hex($str_arr[$i]))), strlen($str_arr[$i])*8, "0", STR_PAD_LEFT);
        
        //retornar o resultado
        return $bin;
    }
    
    
}