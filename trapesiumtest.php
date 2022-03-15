<<?php


use PHPUnit\Framework\TestCase;

require_once "trapesium.php";

class trapesiumtest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        echo "Eksekusi sebleum pengjujian \n";
    }

    public function testHitungkeliling()
    {
        $trapesium = new trapesium();
        $sisi = 6;
        $result = $trapesium->hitungKeliling($sisi);
        $expected = 24;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungkelilingKosong()
    {

        $trapesium = new trapesium();
        $sisi = '';
        $result = $trapesium->hitungKeliling($sisi);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuas()
    {

        $trapesium = new trapesium();
        $alasa = 5;
        $alasb = 6;
        $tinggi = 8;
        $result = $trapesium->hitungLuas($alasa,$alasb,$tinggi);
        $expected = 88;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuasKosong()
    {

        $trapesium = new trapesium();
        $alasa = '';
        $alasb = '';
        $tinggi = '';
        $result = $trapesium->hitungLuas($alasa,$alasb,$tinggi);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public static function tearDownAfterClass(): void
    {
        echo "\n Eksekusi setelah pengjujian \n";
    }

}