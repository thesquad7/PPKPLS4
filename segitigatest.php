<<?php


use PHPUnit\Framework\TestCase;

require_once "segitiga.php";

class segitigatest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        echo "Eksekusi sebleum pengjujian \n";
    }

    public function testHitungkeliling()
    {
        $segitiga = new segitiga();
        $a = 4;
        $b = 2;
        $c = 6;
        $result = $segitiga->hitungKeliling($a,$b,$c);
        $expected = 12;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungkelilingKosong()
    {
        $segitiga = new segitiga();
        $a = '';
        $b = '';
        $c = '';
        $result = $segitiga->hitungKeliling($a,$b,$c);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuas()
    {
        $segitiga = new segitiga();
        $alas = 5; 
        $tinggi = 8;
        $result = $segitiga->hitungLuas($alas,$tinggi);
        $expected = 20;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuasKosong()
    {
        $segitiga = new segitiga();
        $alas = ''; 
        $tinggi = '';
        $result = $segitiga->hitungLuas($alas,$tinggi);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public static function tearDownAfterClass(): void
    {
        echo "\n Eksekusi setelah pengjujian \n";
    }

}