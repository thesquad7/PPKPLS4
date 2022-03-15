<<?php
use PHPUnit\Framework\TestCase;

require_once "persegipanjang.php";

class persegipanjangtest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        echo "Eksekusi sebleum pengjujian \n";
    }

    public function testHitungkeliling()
    {
        $persegipanjang = new persegiPanjang();
        $panjang = 4;
        $lebar = 2; 
        $result = $persegipanjang->hitungKeliling($panjang,$lebar);
        $expected = 12;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungkelilingKosong()
    {
        $persegipanjang = new persegipanjang();
        $panjang = '';
        $lebar = '';
        $result = $persegipanjang->hitungKeliling($panjang,$lebar);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuas()
    {
        $persegipanjang = new persegipanjang();
        $panjang = 4;
        $lebar = 2;
        $result = $persegipanjang->hitungLuas($panjang,$lebar);
        $expected = 8;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuasKosong()
    {
        $persegipanjang = new persegipanjang();
        $panjang = '';
        $lebar = ''; 
        $result = $persegipanjang->hitungLuas($panjang,$lebar);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public static function tearDownAfterClass(): void
    {
        echo "\n Eksekusi setelah pengjujian \n";
    }

}