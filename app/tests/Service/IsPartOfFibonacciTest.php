<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\FibonacciCalculator;

class IsPartOfFibonacciTest extends KernelTestCase
{
    public function testIsPartOfFibonacci(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        
        $fibonacciCalculator = self::$container->get(FibonacciCalculator::class);
        
        $this->assertTrue($fibonacciCalculator->isPartOfFibonacci(2, 3));
        $this->assertTrue($fibonacciCalculator->isPartOfFibonacci(13, 21));
        $this->assertTrue($fibonacciCalculator->isPartOfFibonacci(55, 89));
        $this->assertTrue($fibonacciCalculator->isPartOfFibonacci(13, 21));
        $this->assertTrue($fibonacciCalculator->isPartOfFibonacci(144, 233));
        $this->assertFalse($fibonacciCalculator->isPartOfFibonacci(2, 4));
        $this->assertFalse($fibonacciCalculator->isPartOfFibonacci(25777, 27888));

    }

    public function testArgumentCountException(): void
    {
        $this->expectException(\ArgumentCountError::class);

        self::bootKernel();
        $fibonacciCalculator = self::$container->get(FibonacciCalculator::class);
        $fibonacciCalculator->isPartOfFibonacci();
    }

    public function testArgumentTypeException(): void
    {
        $this->expectException(\ErrorException::class);

        self::bootKernel();
        $fibonacciCalculator = self::$container->get(FibonacciCalculator::class);
        $fibonacciCalculator->isPartOfFibonacci(-1, -2);
    }
}
