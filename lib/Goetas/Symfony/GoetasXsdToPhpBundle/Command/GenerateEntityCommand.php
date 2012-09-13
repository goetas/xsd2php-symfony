<?php


namespace Goetas\Symfony\GoetasXsdToPhpBundle\Command;

use Goetas\Xsd\XsdToPhp\Command\Convert;

use Symfony\Component\Console\Input\InputInterface;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Goetas\DoctrineToXsd\Convert\ConvertToXsd;

use Goetas\DoctrineToXsd\Mapper\TypeMapper;

use Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console,
    Doctrine\ORM\Tools\Console\MetadataFilter,
    Doctrine\ORM\Tools\EntityRepositoryGenerator;

class GenerateEntityCommand extends Convert
{
    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
    	parent::configure();
         $this
        ->setName('xsd2php:convert');

    }
}
