
<?php
#
        if (empty($name)) $error .= "No has introducido tu nombre";
#
        if (empty($lastname)) $error .= "No has introducido tu apellido";
#
        if (empty($phone)) $error .= "No has introducido tu telefono de contacto";		
#
        if (empty($cel)) $error .= "No has introducido tu celular";
#
        if (empty($empresa)) $error .= "No has introducido tu empresa";
#
        if (empty($cargo)) $error .= "No has introducido tu cargo";		
#
        if (empty($pais)) $error .= "No has introducido tu pais";	
#
        if (empty($city)) $error .= "No has introducido tu ciudad de contacto";
#
        if (empty($email)) $error .= "No has introducido tu dirección de e-mail";
#
        if (empty($sub)) $error .= "No has introducido un titulo para el mensaje";
#
        if (empty($text)) $error .= "No has escrito nada en el cuerpo del mensaje<br/>";
#
        $str = $text;
#
        $text_len = strlen($str);
#
        if($text_len > 1000) {
#
            $error .= "Lo siento, has superado el maximo de 1000 caracteres en el cuerpo del mensaje. El numero total de caracteres es $text_len - por favor, acorta tu mensaje.";
#
        }
#
        if($email) {
#
            if(isset($_POST['email'])) {
#
                if (preg_match('/^[-!#$%&\'*+\\.\/0-9=?A-Z^_`{|}~]+@([-0-9A-Z]+\.)+([0-9A-Z]){2,4}$/i',trim($email))) {
#
                } else {
#
                    $error .= "Tu dirección de e-mail contiene un error.";
#
                }
#
                $ok = TRUE;
#
                $ok = eregi( "^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$", $email,
#
      $check);
#
                $ok = getmxrr(substr(strstr($check[0], '@'), 1), $dummy);
#
                if($ok === false) {
#
                    $host = substr($email, strpos($email, '@') + 1);
#
                    if(gethostbyname($host) != $host) {
#
                        $ok = true;
#
                    }
#
                    if ($ok != true) {
#
                        $error .= "La dirección de e-mail no parece correcta.";
#
                    }
#
                }
#
            }
#
        }
#
        if($error) {
#
            include("index.php");
#
        } else {
#
             include("email.php");
#
        }
#
    ?>
#
 