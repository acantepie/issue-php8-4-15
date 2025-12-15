<?php

declare(strict_types=1);

namespace App;

use App\Entity\Animal;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:populate:db')]
class PopulateCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach (['a', 'b', 'c'] as $name) {
            $a = new Animal();
            $a->name = $name;
            $this->em->persist($a);
        }
        $this->em->flush();
        return Command::SUCCESS;
    }
}
