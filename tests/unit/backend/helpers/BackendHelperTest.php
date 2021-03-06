<?php

use Backend\Helpers\Backend;
use Backend\Helpers\Exception\DecompileException;

class BackendHelperTest extends TestCase
{
    public function testDecompileAssets()
    {
        $backendHelper = new Backend;
        $assets = $backendHelper->decompileAsset('tests/fixtures/backend/assets/compilation.js');

        $this->assertCount(2, $assets);
        $this->assertContains('file1.js', $assets[0]);
        $this->assertContains('file2.js', $assets[1]);
    }

    public function testDecompileMissingFile()
    {
        $this->expectException(DecompileException::class);

        $backendHelper = new Backend;
        $assets = $backendHelper->decompileAsset('tests/fixtures/backend/assets/missing.js');
    }

    public function testDecompileNonCompilationFile()
    {
        $this->expectException(DecompileException::class);

        $backendHelper = new Backend;
        $assets = $backendHelper->decompileAsset('tests/fixtures/backend/assets/not-compilation.js');
    }
}
