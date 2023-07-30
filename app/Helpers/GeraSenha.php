<?php 

    function geraSenha()
    {
        $tamanho = 9;
        $letras_maiusculas = true;
        $minusculas = true;
        $numeros = true;
        $simbolos = true;
        $letras_maiusculas = "ABCDEFGHIJKLMNPQRSTUVYXWZ"; // Contém as letras maiúsculas
        $mi = "abcdefghijklmnpqrstuvyxwz"; // Contém as letras minúsculas
        $nu = "123456789"; // Contém os números
        $si = "!@#$%&*()_+="; // Contém os símbolos
        $senha= '';
        
        if ($letras_maiusculas){
                // se $letras_maiusculas for "true", a variável $letras_maiusculas é embaralhada e adicionada para a variável $senha
                $senha .= str_shuffle($letras_maiusculas);
        }
        
            if ($minusculas){
                // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
                $senha .= str_shuffle($mi);
            }
        
            if ($numeros){
                // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
                $senha .= str_shuffle($nu);
            }
        
            if ($simbolos){
                // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
                $senha .= str_shuffle($si);
            }
        
            // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
            return substr(str_shuffle($senha),0,$tamanho);
    }