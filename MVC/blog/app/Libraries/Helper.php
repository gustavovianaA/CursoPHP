<?php

class Helper {

    public static function mensagem($nome, $texto = null, $classe = null) {

        if (!empty($nome)):
            if (!empty($texto) && empty($_SESSION[$nome])):
                if (!empty($_SESSION[$nome])):
                    unset($_SESSION[$nome]);
                endif;

                $_SESSION[$nome] = $texto;
                $_SESSION[$nome . 'classe'] = $classe;

            elseif (!empty($_SESSION[$nome]) && empty($texto)):
                $classe = !empty($_SESSION[$nome . 'classe']) ? $_SESSION[$nome . 'classe'] : 'alert alert-success';
                echo '<div class="' . $classe . '">' . $_SESSION[$nome] . '</div>';

                unset($_SESSION[$nome]);
                unset($_SESSION[$nome . 'classe']);
            endif;
        endif;
    }

    public static function estaLogado() {
        if (isset($_SESSION['usuario_id'])) :
            return true;
        else:
            return false;
        endif;
    }
    
    public static function checarNome($nome){
        if(!preg_match('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $nome)):
            return true;
        else:
            return false;
        endif;
    }

    public static function checarEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
            return true;
        else:
            return false;
        endif;
    }

    public static function dataBr($data){
        if(isset($data)):
            return date('d/m/Y H:i',strtotime($data));
        else:
            return false;
        endif;
    }

    // redireciona para uma url com header location

    public static function redirecionar($url) {
        header("Location:" . URL . DIRECTORY_SEPARATOR . $url);
    }

    //Tranforma uma string no formato de URL amigável e retorna a string convertida!
    public static function urlAmigavel($titulo) {
        $mapa = [];
        $mapa['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        $mapa['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';
        $url = strtr(utf8_decode($titulo), utf8_decode($mapa['a']), $mapa['b']);
        $url = strip_tags(trim($url));
        $url = str_replace(' ', '-', $url);
        $url = str_replace(['-----', '----', '---', '--'], '-', $url);

        return strtolower(utf8_decode($url));
    }

}
