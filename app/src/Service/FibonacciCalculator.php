<?php

namespace App\Service;

class FibonacciCalculator
{
    
    private $numbers;
    
    public function calculateFibonacciNumbers(int $length): bool
    {
        if ($length < 0) {
            throw new \exception('length should be positive number');    
        }

        $this->numbers = [0, 1];
        
        if ($length == 0) {
            unset($this->numbers[1]);
            return true;
        }
        
        if ($length == 1) {
            return true;
        }        

        for($i=2; $i<=$length; $i++) {
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