

<script>
class Routes{
    con = new Connection();
    <?php
    $url = "https://jsalvado.pythonanywhere.com/site-map";

    $opciones = array('http' =>
        array(
            'method' => 'GET',
            'max_redirects' => '0',
            'ignore_errors' => '1'
        )
    );
    
    $contexto = stream_context_create($opciones);
    $flujo = fopen($url, 'r', false, $contexto);
    // información de cabeceras y meta datos
    // sobre el flujo
    
    // datos reales en $url
    $resultado = stream_get_contents($flujo);
    fclose($flujo);

    $datos = json_decode($resultado);

    for($i = 0; $i < count($datos); $i++){
        $rutita ="https://jsalvado.pythonanywhere.com";
        $nombreFunc = $datos[$i]->endpoint;
        $metodo = $datos[$i]->method;
        $rutita.=$datos[$i]->url;
        /* var_dump($datos[$i]->url);
        var_dump($rutita);
        var_dump(str_contains($rutita,'<int:codigo>')); */
        if($metodo == "POST"){
            echo $nombreFunc ."(datos){";
            echo 'return this.con.'.strtolower($metodo)."('$rutita',datos);";
            echo "}";
            echo "\n";
        }else if($metodo == "PUT"){
            if(str_contains($rutita,'<int:codigo>')){
            $res = explode('<int:codigo>',$rutita);
            /* var_dump($res); */
            /* var_dump($nombreFunc); */
                echo $nombreFunc ."(id,datos){";
                echo 'return this.con.'.strtolower($metodo)."('$res[0]',datos,id);";
                echo "}";
                echo "\n";
            }
        }else if($metodo == "DELETE"){

            if(str_contains($rutita,'<int:codigo>')){
                $res = explode('<int:codigo>',$rutita);
                echo $nombreFunc ."(id){";
                    echo 'return this.con.'.strtolower($metodo)."('$res[0]',id);";
                    echo "}";
                    echo "\n";
            }else{
                    echo $nombreFunc ."(datos){";
                    echo 'return this.con.'.strtolower($metodo)."('$rutita',datos);";
                    echo "}";
                    echo "\n"; 
            }
            

        }else if($metodo == 'GET'){
            if(str_contains($rutita,'<int:codigo>')){
                $res = explode('<int:codigo>',$rutita);
                echo $nombreFunc ."(id){";
                    echo 'return this.con.'.strtolower($metodo)."('$res[0]',id);";
                    echo "}";
                    echo "\n";
            }else{
                echo $nombreFunc ."(){";
                    echo 'return this.con.'.strtolower($metodo)."('$rutita');";
                    echo "}";
                    echo "\n";
            }
        }
        
    }
    ?>

}
</script>