<?php

    class trapesium{

        function hitungkeliling($sisi){
            if ($sisi == '' ) {
                return "Tidak Boleh kosong!";
            }else{
                return $sisi+$sisi+$sisi+$sisi;
            }
        }

        function hitungLuas($alasa,$alasb,$tinggi){
            if($alasa == '' && $alasb == '' && $tinggi == ''){
                return "Tidak Boleh kosong!";
            }else{
                return ($alasa+$alasb)*$tinggi;
            }
        }

    }

?>