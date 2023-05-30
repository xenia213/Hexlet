<?php

/**
 * Реализуйте тест CourseTest, проверяющий работоспособность mетода getName() 
 * класса Course.
 */


class CourseTest extends TestCase
{
    public function nameCourse(): void
    {
        $nameOne = new Course('Value');
        $this->assertEquals('Value', $nameOne->getName);
    }
}