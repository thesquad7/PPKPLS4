<?php

    class persegiPanjang{

        function hitungkeliling($panjang,$lebar){
            if ($panjang == '' && $lebar == '') {
                return "Tidak Boleh kosong!";
            }else{
                return 2*($panjang + $lebar);
            }
        }

        function hitungLuas($panjang,$lebar){
            if($panjang == '' && $lebar == ''){
                return "Tidak Boleh kosong!";
            }else{
                return $panjang * $lebar;
            }
        }

    }

?>