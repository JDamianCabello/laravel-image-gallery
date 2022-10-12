<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataBaseTest extends TestCase
{
    /**
     * Check that database exists.
     *
     * @return void
     */
    public function test_sqliteDB_shouldExist(): void
    {
        $filename =  database_path()."/database.sqlite";
        $this->assertFileExists($filename);
    }

}
