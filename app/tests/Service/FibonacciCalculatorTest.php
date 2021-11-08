<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\FibonacciCalculator;

class FibonacciCalculatorTest extends KernelTestCase
{
    public function testCalculateFibonacciNumbers(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        
        $fibonacciCalculator = self::$container->get(FibonacciCalculator::class);
        
        $response = $fibonacciCalculator->calculateFibonacciNumbers(0);
        
        $this->assertTrue($response);
        $this->assertIsArray($fibonacciCalculator->getData());
        $this->assertEquals($fibonacciCalculator->getData(), [0]);
        
        $fibonacciCalculator->calculateFibonacciNumbers(1);
        $this->assertEquals($fibonacciCalculator->getData(), [0, 1]);
        
        $fibonacciCalculator->calculateFibonacciNumbers(10);
        $this->assertEquals($fibonacciCalculator->getData(), [0, 1, 1, 2, 3 , 5, 8, 13, 21,34, 55]);
        
    }
    
    public function testException(): void
    {
        $this->expectException(\exception::class);
        
        self::bootKernel();
        $fibonacciCalculator = self::$container->get(FibonacciCalculator::class);
        $fibonacciCalculator->calculateFibonacciNumbers(-1);
    }
}
