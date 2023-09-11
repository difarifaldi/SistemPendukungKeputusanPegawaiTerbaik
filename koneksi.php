<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_spk");

if (!$koneksi) {
    echo "Connection Failed";
    die();
}
    /*else{
        echo "Connection Success";
    }*/
