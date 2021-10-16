<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use App\Service\FibonacciCalculator;

class FibonacciCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:display-fibonacci-numbers';

    protected function configure(): void
    {
        $this
            ->addArgument('length', InputArgument::REQUIRED, 'Length of the  fibonacci numbers')
            ->setHelp('This command displays fibonacci numbers')
            ;
    }
    
    public function __construct(FibonacciCalculator $fibonacciCalculator)
    {
        $this->fibonacciCalculator = $fibonacciCalculator;

        parent::__construct();
    }    

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $length = $input->getArgument('length');
        
        if ($length < 0) {
            return Command::INVALID;
        }
        
        $this->fibonacciCalculator->calculateFibonacciNumbers($length);

        $output->writeln([  '',
                            'FibonacciNumbers ('.$length.') : ',
                            '============',
                        ]);

        foreach($this->fibonacciCalculator->getData() as $key => $number) {
            $output->writeln([
                                $number,
                            ]);
        }
        
        
        $output->writeln([
                            '',
                            'Done !',
                            '',
                        ]);
        
        return Command::SUCCESS;
   }
}

?>