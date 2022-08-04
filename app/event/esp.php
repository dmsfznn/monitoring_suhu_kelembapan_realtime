<?php

    function mintadata($host, $port, $pesan){
        $socket = socket_create (AF_INET, SOCK_DGRAM, SOL_UDP);

        //buat koneksi ke socket
        $result = socket_connect($socket, $host, $port);

        //uji apakah berhasil konek atau tidak
        if($result == false) return false;
        
        socket_write($socket, $pesan, strlen($pesan));

        $data_diterima = socket_read($socket, $port);

        socket_close($socket);

        return $data_diterima;

    }
    $hasil = mintadata("192.168.43.11", "1223", "minta");
    echo $hasil;

?>