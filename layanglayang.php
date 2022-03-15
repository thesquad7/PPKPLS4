<?php

    class layanglayang{

        function hitungkeliling($a,$b){
            if ($a == '' && $b == '' ) {
                return "Tidak Boleh kosong!";
            }else{
                return 2*($a+$b);
            }
        }

        function hitungLuas($d1,$d2){
            if($d1 == '' && $d2 == ''){
                return "Tidak Boleh kosong!";
            }else{
                return 0.5*$d1*$d2;
            }
        }

    }

?>