<?php
/**
 * office-converter
 *
 * Author:  Chukwuemeka Nwobodo (jcnwobodo@gmail.com)
 * Date:    11/13/2016
 * Time:    12:49 AM
 **/

use NcJoes\OfficeConverter\OfficeConverter;
use PHPUnit\Framework\TestCase;

class OfficeConverterTest extends TestCase
{
    /**
     * @var OfficeConverter $converter
     */
    private $converter;
    private $outDir;

    public function setUp()
    {
        parent::setUp();

        $DS = DIRECTORY_SEPARATOR;
        $file = __DIR__."{$DS}sources{$DS}test1.docx";
        $this->outDir = __DIR__."{$DS}results";

        if (file_exists($this->outDir.'/result1.html')) {
            unlink($this->outDir.'/result1.html');
        }

        if (file_exists($this->outDir.'/result1.pdf')) {
            unlink($this->outDir.'/result1.pdf');
        }

        $this->converter = new OfficeConverter($file, $this->outDir);
    }

    public function testDocxToPdfConversion()
    {
        $output = $this->converter->convertTo('result1.pdf');

        $this->assertFileExists($output);

        unlink($output);
    }

    public function testDocxToHtmlConversion()
    {
        $output = $this->converter->convertTo('result1.html');

        $this->assertFileExists($output);

        unlink($output);
    }
}
