<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Animal
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    public ?string $name = null;

}
