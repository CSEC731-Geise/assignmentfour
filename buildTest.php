<?php

use PHPUnit\Framework\TestCase;

final class buildTest extends TestCase
{
    /**
     * @small
     */
    public function testBashInjection()
    {
        $t= new test("create", "nc -nvlp 8080", "contents");
        $this->assertEquals("File Created", $t->create());
    }
    
    public function testDirectoryTraversal()
    {
        $t= new test("view", "../../../../../../../etc/passwd", "contents");
        $this->assertEquals("Directory Traversal", $t->view());
    }


}

?>


