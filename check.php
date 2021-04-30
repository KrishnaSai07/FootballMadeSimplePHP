<?php
                $username = "";
                $password = "";
                $username = $_POST["username"];
                $password = $_POST["password"];
                $hash = '';
                try
                {
                    $db = new PDO("mysql:host=localhost:3306;dbname=footballcomplete",'root','davidsilva');
                    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
                    $stmt = $db->query("select * from login where userName='".$username."'");

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                       $hash = $row["hash_password"];
                    }

                }
                catch(PDOException $e)
                {
                    printf("Unable to connect to database: %s\n", $e->getMessage());
                }


                $verify = password_verify($password, $hash);

                if($verify)
                {
                    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                    {
                        $url = "https://";  
                    }      
                    else
                    {  
                        $url = "http://";
                    }   
               // Append the host(domain name, ip) to the URL.   
                        $url.= $_SERVER['HTTP_HOST'];   
               
               // Append the requested resource location to the URL   
                        $url.= "/home.php";    
                        header("Location:$url", TRUE, 301);
                        exit();
                }
                else
                {
                    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                    {
                        $url = "https://";  
                    }      
                    else
                    {  
                        $url = "http://";
                    }   
               // Append the host(domain name, ip) to the URL.   
                        $url.= $_SERVER['HTTP_HOST'];   
               
               // Append the requested resource location to the URL   
                        $url.= "/failed.php";    
                        header("Location:$url", TRUE, 301);
                        exit();
                }
                ?>