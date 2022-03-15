<<?php
use PHPUnit\Framework\TestCase;

require_once "lingkaran.php";

class lingkarantest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        echo "Eksekusi sebleum pengjujian \n";
    }

    public function testHitungkeliling()
    {
        $lingkaran = new lingkaran();
        $r = 4; //
        $result = $lingkaran->hitungKeliling($r);
        $expected = 25.12;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungkelilingKosong()
    {
        $lingkaran = new lingkaran();
        $r = '';
        $result = $lingkaran->hitungKeliling($r);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuas()
    {
        $lingkaran = new lingkaran();
        $r = 2; //
        $result = $lingkaran->hitungLuas($r);
        $expected = 12.56;
        $this->assertEquals($expected, $result); 
    }

    public function testHitungLuasKosong()
    {
        $lingkaran = new lingkaran();
        $r = ''; //
        $result = $lingkaran->hitungLuas($r);
        $expected = "Tidak Boleh kosong!";
        $this->assertEquals($expected, $result); 
    }

    public static function tearDownAfterClass(): void
    {
        echo "\n Eksekusi setelah pengjujian \n";
    }

}