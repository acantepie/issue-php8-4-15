<?php

declare(strict_types=1);

namespace App;

use App\Entity\Animal;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:bug')]
class BugCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $this->foo();
        } catch (\Throwable $e) {
            $output->writeln('<success>Exception caught</success>');
        }
        return Command::SUCCESS;
    }

    private function foo(): void
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('e');
        $qb->from(Animal::class, 'e');

        $items = $qb->getQuery()->toIterable();
        foreach ($items as $item) {
            throw new \InvalidArgumentException('EXCEPTION');
        }

    }
}
