<?php

namespace Tests\Unit;

use Modules\Common\Models\Post;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_book_has_title()
    {
        $book = new Post(['title' => 'Laravel for Beginners']);

        $this->assertEquals('Laravel for Beginners', $book->title);
    }
}
