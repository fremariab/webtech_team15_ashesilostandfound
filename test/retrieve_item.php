<?php

// Include PHPUnit files
// require_once 'PHPUnit/Framework/TestCase.php';
// require_once 'PHPUnit/Framework/TestSuite.php';
// require_once 'PHPUnit/TextUI/TestRunner.php';

class FoundItemsTest extends PHPUnit_Framework_TestCase {
    protected $connectionMock;

    protected function setUp(): void {
        // Create a mock for the connection
        $this->connectionMock = $this->getMockBuilder('mysqli')
                                     ->disableOriginalConstructor()
                                     ->getMock();
    }

    // Test filtering by item type
    public function testFilterByItemType() {
        $resultMock = $this->getMockBuilder('mysqli_result')
                           ->getMock();
        $resultMock->expects($this->once())
                   ->method('fetch_assoc')
                   ->willReturn([]);

        $this->connectionMock->expects($this->once())
                             ->method('query')
                             ->willReturn($resultMock);

        $foundItems = getFoundItems($this->connectionMock, 5, 0, '', 'electronics', '');

        $this->assertIsArray($foundItems);
    }

    // Test filtering by location
    public function testFilterByLocation() {
        $resultMock = $this->getMockBuilder('mysqli_result')
                           ->getMock();
        $resultMock->expects($this->once())
                   ->method('fetch_assoc')
                   ->willReturn([]);

        $this->connectionMock->expects($this->once())
                             ->method('query')
                             ->willReturn($resultMock);

        $foundItems = getFoundItems($this->connectionMock, 5, 0, '', '', 'New York');

        $this->assertIsArray($foundItems);
    }

    // Test sorting by time ascending
    public function testSortByTimeAscending() {
        $resultMock = $this->getMockBuilder('mysqli_result')
                           ->getMock();
        $resultMock->expects($this->once())
                   ->method('fetch_assoc')
                   ->willReturn([]);

        $this->connectionMock->expects($this->once())
                             ->method('query')
                             ->willReturn($resultMock);

        $foundItems = getFoundItems($this->connectionMock, 5, 0, 'time_asc', '', '');

        $this->assertIsArray($foundItems);
    }
}

// Run the tests
$result = PHPUnit_TextUI_TestRunner::run(new PHPUnit_Framework_TestSuite(FoundItemsTest::class));
echo $result->wasSuccessful() ? "Tests passed.\n" : "Tests failed.\n";
?>
