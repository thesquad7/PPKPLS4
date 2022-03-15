<?php

    class segitiga{

        function hitungkeliling($a,$b,$c){
            if ($a == '' && $b == '' && $c == '') {
                return "Tidak Boleh kosong!";
            }else{
                return $a+$b+$c;
            }
        }

        function hitungLuas($alas,$tinggi){
            if($alas == '' && $tinggi == ''){
                return "Tidak Boleh kosong!";
            }else{
                return 0.5*$alas*$tinggi;
            }
        }

    }

?>