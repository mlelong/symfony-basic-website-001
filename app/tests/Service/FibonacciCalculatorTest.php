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
        $numbers = $fibonacciCalculator->getData();
        $goodNumbers = [0];
        
        $this->assertTrue($response);
        $this->assertIsArray($numbers);
        $this->assertEquals($numbers, $goodNumbers);
        
        $fibonacciCalculator->calculateFibonacciNumbers(1);
        $numbers = $fibonacciCalculator->getData();        
        $goodNumbers = [0, 1];
        $this->assertEquals($numbers, $goodNumbers);
        
        $fibonacciCalculator->calculateFibonacciNumbers(10);
        $numbers = $fibonacciCalculator->getData();        
        $goodNumbers = [0, 1, 1, 2, 3 , 5, 8, 13, 21,34, 55];
        $this->assertEquals($numbers, $goodNumbers);
        
    }
    
    public function testException(): void
    {
        $this->expectException(\exception::class);
        
        $kernel = self::bootKernel();
        $fibonacciCalculator = self::$container->get(FibonacciCalculator::class);
        $response = $fibonacciCalculator->calculateFibonacciNumbers(-1);
    }
}
