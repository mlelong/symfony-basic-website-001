<?php

namespace App\Service;

class FibonacciCalculator
{
    
    private $numbers;
    
    public function calculateFibonacciNumbers(int $length): bool
    {
        if ($length < 0) {
            throw new \ErrorException('length should be positive number');
        }

        $this->numbers = [];

        for($i=0; $i<=$length; $i++) {
            if ($i < 2) {
                $this->numbers[$i] = $i;
                continue;
            }

            $this->numbers[$i] = $this->numbers[$i-1] + $this->numbers[$i-2];
        }
        
        return true;
        
    }
    
    public function getData(): array
    {
        return $this->numbers;
    }
}

?>