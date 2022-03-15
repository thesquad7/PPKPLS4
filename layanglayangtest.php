<<?php

use PHPUnit\Framework\TestCase;

require_once "layanglayang.php";


class layanglayangtest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        echo "Eksekusi sebleum pengjujian \n";
    }

    public function testHitungkeliling()
    {
        $layanglayang = new layanglayang();
        $a = 4;
        $b = 2;
        $result = $layanglayang->hitungKeliling($a,$b);
        $expected = 12;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungkelilingKosong()
    {
        $layanglayang = new layanglayang();
        $a = '';
        $b = '';
        $result = $layanglayang->hitungKeliling($a,$b);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuas()
    {
        $layanglayang = new layanglayang();
        $d1 = 5;
        $d2 = 8;
        $result = $layanglayang->hitungLuas($d1,$d2);
        $expected = 20;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuasKosong()
    {
        $layanglayang = new layanglayang();
        $d1 = '';
        $d2 = '';
        $result = $layanglayang->hitungLuas($d1,$d2);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public static function tearDownAfterClass(): void
    {
        echo "\n Eksekusi setelah pengjujian \n";
    }

}