<?php 
class SecretCls {
    
    function kamote_magic($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'MyLifeMyLoveMySoul093029';
        $secret_iv = 'ZgvyZwynG3r@nc3J3ru';
        
        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if( $action == 'blabla' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
    
    
    
    
/*      function CheckConnection(){



            $host     = $this->kamote_magic('blabla','VURITVN4a08wSm8wMTJCZE5kak1MQT09,');
            $username = $this->kamote_magic('blabla','RDE5ZDg0Szk0WlhDWnYxTHB0WFMxQT09,');
            $password = $this->kamote_magic('blabla','NEhPT3grUVVJU0tpczBnZzdXM0VMZz09,');
            $database = $this->kamote_magic('blabla','bUxPMWNoVFgwRVVVdkJhMEhLdUZ0SnhXOEhpSWZyTXB0VlpRN1VIL085Zz0=,');

            // Create a new connection to the MySQL server
            $conn = new mysqli($host, $username, $password, $database);

            // Check if the connection is active
            if (mysqli_ping($conn)) {
                echo "The connection to the database is active!";
            } else {
                echo "The connection to the database is not active.";
            }

      }    
    
    */
        
      function CheckConnection(){

          
            $host     = "jlsprofile.mypressonline.com";
            $username = "4615508_jls";
            $password = "annsalvador08";
            $database = "portfolio_jls";

            // Create a new connection to the MySQL server
            $conn = new mysqli($host, $username, $password, $database);

            // Check if the connection is active
            if (mysqli_ping($conn)) {
                echo "The connection to the database is active!";
            } else {
                echo "The connection to the database is not active.";
            }

      }  
    
    
    
     
     function pdo_db_connection(){
         
         
             $errormsg = 1; 
             $conn     = null;
         
         try {
             
             
              $connected = 1;
             
             
            $host     = "jlsprofile.mypressonline.com";
            $username = "4615508_jls";
            $password = "annsalvador08";
            $database = "portfolio_jls";

//              $host      = $this->kamote_magic('blabla','VURITVN4a08wSm8wMTJCZE5kak1MQT09,');
//              $dbname    = $this->kamote_magic('blabla','bUxPMWNoVFgwRVVVdkJhMEhLdUZ0SnhXOEhpSWZyTXB0VlpRN1VIL085Zz0=,');
//              $username  = $this->kamote_magic('blabla','RDE5ZDg0Szk0WlhDWnYxTHB0WFMxQT09,');
//              $password  = $this->kamote_magic('blabla','NEhPT3grUVVJU0tpczBnZzdXM0VMZz09,');

              // create the PDO connection string
              $dsn = "mysql:host=$host;dbname=$dbname";

              // establish a connection to the database
              $conn = new PDO($dsn, $username, $password);
             
             
            } catch (PDOException $e) {
             
             /* die('Could not connect to the database: ' . $e->getMessage());*/
             
              $errormsg = "Error: Failed to connect to the database ";
             
            }
         
         
          return array($errormsg,$conn);
          
     }
    
    
    
    
    
        function dynamicFunction($procedureName,$params){

          
        $errormsg = 1;
        $result = "";
        $conn = $this->pdo_db_connection();

        try {
            // if connection status is 1, it is connected to the database
            if ($conn[0] == 1) {

                // build the parameter placeholders for the prepared statement
                $placeholders = array_map(function () {
                    return '?';
                }, $params);
                $placeholders = implode(',', $placeholders);

                // create the prepared statement
                $stmt = $conn[1]->prepare("CALL $procedureName($placeholders)");

                // bind the parameters to the prepared statement
                $stmt->execute($params);

                // process the result
                $result = $stmt->fetchAll();

                // Check if there was an error
                if (!$result) {
                    // There was an error
                    $error = $stmt->errorInfo();
                    if (!empty($error[2])) {
                        $errormsg = "Error: " . $error[2];
                    }
                }

                // Close the connection
                $conn[1] = null; // Or use $conn[1]->close(); if available

            }

            // if the connection is not connected, it will prompt the error message
            if ($conn[0] != 1) {
                $errormsg = $conn[0];
            }

        } catch (Exception $e) {
            // Code to handle the exception
            $errormsg = $e->getMessage();
        }

        // if the errormsg returns 1, it means there's no error with the following SQL statement
        return array($errormsg, $result);
              
 }

  
        function dynamicFunction2($procedureName,$params){

          
        $errormsg = 1;
        $result = "";
        $conn = $this->pdo_db_connection();

        try {
            // if connection status is 1, it is connected to the database
            if ($conn[0] == 1) {

                // build the parameter placeholders for the prepared statement
                $placeholders = array_map(function () {
                    return '?';
                }, $params);
                $placeholders = implode(',', $placeholders);

                // create the prepared statement
                $stmt = $conn[1]->prepare("CALL $procedureName($placeholders)");

                // bind the parameters to the prepared statement
                $stmt->execute($params);

                // process the result
                $result = $stmt->fetchAll();

                // Check if there was an error
                if (!$result) {
                    // There was an error
                    $error = $stmt->errorInfo();
                    if (!empty($error[2])) {
                        $errormsg = "Error: " . $error[2];
                    }
                }

                // Close the connection
                $conn[1] = null; // Or use $conn[1]->close(); if available

            }

            // if the connection is not connected, it will prompt the error message
            if ($conn[0] != 1) {
                $errormsg = $conn[0];
            }

        } catch (Exception $e) {
            // Code to handle the exception
            $errormsg = $e->getMessage();
        }

        // if the errormsg returns 1, it means there's no error with the following SQL statement
        return array($errormsg, $result[0]);
 }  
    
         function dynamic_update($tablename,
                                 $colname,
                                 $colvalue,
                                 $colfilter,
                                 $colfiltervalue){

          

                    // build the parameter placeholders for the prepared statement
                    $colnamearray   = array();
                    $colfilterarray = array();
                    $placeholders   = array();
                    foreach($colname         as $row_colname){ $colnamearray[]     = "$row_colname = ?";};
                    foreach($colfilter       as $row_colfilter){ $colfilterarray[] = "$row_colfilter = ?";}; 
                    foreach($colvalue        as $row_colvalue ){$placeholders[]=$row_colvalue;};
                    foreach($colfiltervalue  as $row_colfiltervalue){$placeholders[]=$row_colfiltervalue;};


                    $update_col_placeholders = implode(',',$colnamearray);
                    $filter_col_placeholders = implode(',',$colfilterarray); 

                      $errormsg = 1;    
                      $result   = ""; 
                      $conn     = $this->pdo_db_connection();



                      //if connection status if 1 it is connected to the database      
                      if($conn[0]==1){  


                      // create the prepared statement
                      $stmt = $conn[1]->prepare("update $tablename set $update_col_placeholders where 1 $filter_col_placeholders");

                      // bind the parameters to the prepared statement
                      $stmt->execute($placeholders);

                      // process the result
                      $result = $stmt->fetchAll();

                      // Check if there was an error
                      if (!$result) {
                        // There was an error
                         $error = $stmt->errorInfo();
                        if(!empty($error[2])){
                          $errormsg = "Error: ".$error[2];
                        }  
                     
                      }

                    }

                      //if the connection is not connected it will prompt the error message
                      if($conn[0]!=1){  

                          $errormsg = $conn[0];
                      }
             
                       // Use the PDO connection here
                          unset($conn[1]);
             
                       // if the errormsg return 1 it means there's no error with the following sql statement
                     return array($errormsg,$result);

             
             
              
           }
    
    
      function dynamic_insert($tablename,
                              $colname,
                              $values){
          
                     //build the parameter placeholders for the prepared statement
                     $placeholders = array_map(function() { return '?'; }, $values);
                     $placeholders = implode(',', $placeholders);
                     $colname_list = implode(",",$colname);         


                      $errormsg = 1;    
                      $result   = ""; 
                      $conn     = $this->pdo_db_connection();



                      //if connection status if 1 it is connected to the database      
                      if($conn[0]==1){  


                      // create the prepared statement
                      $stmt = $conn[1]->prepare("insert into $tablename ($colname_list) values ($placeholders)");

                      // bind the parameters to the prepared statement
                      $stmt->execute($values);

                      // process the result
                      $result = $stmt->fetchAll();

                      // Check if there was an error
                      if (!$result) {
                        // There was an error
                         $error = $stmt->errorInfo();
                        if(!empty($error[2])){
                          $errormsg = "Error: ".$error[2];
                        }  
                     
                      }

                    }

                      //if the connection is not connected it will prompt the error message
                      if($conn[0]!=1){  

                          $errormsg = $conn[0];
                      }
             
                       // Use the PDO connection here
                          unset($conn[1]);
             
                       // if the errormsg return 1 it means there's no error with the following sql statement
                     return array($errormsg,$result);

             
             
          
          
      }
    
    
    
    function return_user_ip_address(){
        
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
        
        
    }
    
    function return_user_device_type(){
        
        
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $device_name = "Unknown";
        $device_type = "Unknown";

        if(preg_match('/\b(iPhone|iPad|iPod)\b/i', $user_agent)) {
            $device_type = "iOS";
            preg_match('/\bOS ([\d_]+)\b/', $user_agent, $matches);
            $device_name = "Unknown";
            if(isset($matches[1])) {
                $os_version = str_replace('_', '.', $matches[1]);
                if(preg_match('/\biPhone\b/', $user_agent)) {
                    $device_name = "iPhone";
                    if(preg_match('/\biPhone SE\b/', $user_agent)) {
                        $device_name = "iPhone SE";
                    }
                    // add more iPhone models as needed
                } elseif(preg_match('/\biPad\b/', $user_agent)) {
                    $device_name = "iPad";
                    // add more iPad models as needed
                } elseif(preg_match('/\biPod\b/', $user_agent)) {
                    $device_name = "iPod";
                    // add more iPod models as needed
                }
            }
        } elseif(preg_match('/\bAndroid\b/i', $user_agent)) {
            $device_type = "Android";
            preg_match('/\bAndroid\s([\d\.]+)/', $user_agent, $matches);
            $device_name = "Unknown";
            if(isset($matches[1])) {
                $android_version = $matches[1];
                if(preg_match('/\bPixel\b/', $user_agent)) {
                    $device_name = "Pixel";
                    // add more Pixel models as needed
                } elseif(preg_match('/\bGalaxy\b/', $user_agent)) {
                    $device_name = "Galaxy";
                    // add more Galaxy models as needed
                }
                // add more Android device models as needed
            }
        } elseif(preg_match('/\bWindows\b/i', $user_agent)) {
            $device_type = "Windows";
            preg_match('/\bWindows\sNT\s([\d\.]+)/', $user_agent, $matches);
            $device_name = "Unknown";
            if(isset($matches[1])) {
                $windows_version = $matches[1];
                // add more Windows device models as needed
            }
        } elseif(preg_match('/\bMacintosh\b/i', $user_agent)) {
            $device_type = "Mac";
            preg_match('/\bMac\sOS\sX\s([\d_]+)/', $user_agent, $matches);
            $device_name = "Unknown";
            if(isset($matches[1])) {
                $mac_version = str_replace('_', '.', $matches[1]);
                // add more Mac device models as needed
            }
        }
        
        return $device_type;
    }
    
    
    
    
     function return_user_device_name(){
        
         
          $user_agent = $_SERVER['HTTP_USER_AGENT'];
          $device_info = 'Unknown';

          // Check if the user agent string contains any mobile device keywords
          if (preg_match('/(android|blackberry|iphone|ipod|opera mini|palm|windows (ce|phone)|mobile|portable)/i', $user_agent)) {
            // User is accessing the website from a mobile device
            if (preg_match('/(android)/i', $user_agent)) {
              // Extract the device brand and model from the user agent string for Android devices
              preg_match('/\bAndroid\s([^;]+)/i', $user_agent, $matches);
              $device_info = $matches[0];
            } elseif (preg_match('/(blackberry)/i', $user_agent)) {
              // Extract the device brand and model from the user agent string for Blackberry devices
              preg_match('/\bBlackBerry\s([^\/]+)/i', $user_agent, $matches);
              $device_info = $matches[0];
            } elseif (preg_match('/(iphone|ipod)/i', $user_agent)) {
              // Extract the device brand and model from the user agent string for iPhone and iPod devices
              preg_match('/\biPhone\s([^;]+)/i', $user_agent, $matches);
              $device_info = $matches[0];
            } elseif (preg_match('/(opera mini)/i', $user_agent)) {
              // Extract the device brand and model from the user agent string for Opera Mini devices
              preg_match('/\bOpera\sMini\s([^;]+)/i', $user_agent, $matches);
              $device_info = $matches[0];
            } elseif (preg_match('/(palm)/i', $user_agent)) {
              // Extract the device brand and model from the user agent string for Palm devices
              preg_match('/\bPalm\s([^;]+)/i', $user_agent, $matches);
              $device_info = $matches[0];
            }
          } else {
            // User is accessing the website from a computer
            preg_match('/\bWindows\sNT\s([^;]+)/i', $user_agent, $matches);
            $device_info = 'Computer (Windows ' . $matches[1] . ')';
          }

          return $device_info;
        
    }
    
    
    
}






