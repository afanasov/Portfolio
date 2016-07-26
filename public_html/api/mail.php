<?php

        $error = array();
        if (!$_POST["name"]) $error[] = "Укажите своё имя";
        $name = trim($_POST["name"]);        
        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["email"])))
        {
            $error[] = "Укажите корректный E-mail"; 
        }       
        if (!$_POST["subject"]) $error[] = "Укажите тему письма!";
        $subject_m = trim($_POST["subject"]);
        if (!$_POST["text"]) $error[] = "Укажите текст сообщения!";
        $text = trim($_POST["text"]);
        if (count($error))
        {
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";  
        }else
        {
            $to = 'tema-87@inbox.ru'; //Почта получателя
            $subject = 'Сообщение из сайта портфолио http://afanasov.net16.net/'; //Загаловок сообщения
            $message = '    
                            Имя: '.$name.'
                            Email: '.$_POST["email"].'
                            Тема письма:'.$subject_m.'
                            Сообщение: '.$text.'                       
                        '; 
            mail($to, $subject, $message); //Отправка письма с помощью функции mail
            $_SESSION['message'] = "<p id='form-success'>Ваше сообщение успешно отправлено!</p>";    
        }     


?>
