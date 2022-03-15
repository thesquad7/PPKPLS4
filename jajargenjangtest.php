<<?php
use PHPUnit\Framework\TestCase;

require_once "jajargenjang.php";

class jajargenjangtest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        echo "Eksekusi sebleum pengjujian \n";
    }

    public function testHitungkeliling()
    {
        $jajargenjang = new jajargenjang();
        $a = 4;
        $b = 2;
        $result = $jajargenjang->hitungKeliling($a,$b);
        $expected = 12;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungkelilingKosong()
    {
        $jajargenjang = new jajargenjang();
        $a = '';
        $b = '';
        $result = $jajargenjang->hitungKeliling($a,$b);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuas()
    {
        $jajargenjang = new jajargenjang();
        $alas = 5;
        $tinggi = 8;
        $result = $jajargenjang->hitungLuas($alas,$tinggi);
        $expected = 40;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuasKosong()
    {
        $jajargenjang = new jajargenjang();
        $alas = '';
        $tinggi = '';
        $result = $jajargenjang->hitungLuas($alas,$tinggi);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public static function tearDownAfterClass(): void
    {
        echo "\n Eksekusi setelah pengjujian \n";
    }

}