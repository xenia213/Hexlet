<?

/**
 * Напишите тесты для функции gt($value, $other), которая возвращает true в 
 * тоm случае, если $value > $other, и false в иных случаях.
 */

 namespace App\Tests;

 use PHPUnit\Framework\TestCase;
 
 use function App\Implementations\gt;
 
 class TestSolution extends TestCase
 {
     public function testGt()
     {
        $this->assertFalse(gt(0, 0));
        $this->assertTrue(gt(1, 0));
        $this->assertFalse(gt(-3, 1));
     }
 }
 