<?php


namespace Goetas\Symfony\GoetasXsdToPhpBundle\Command;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;

use Symfony\Component\Console\Output\OutputInterface;

use Goetas\Xsd\XsdToPhp\Command\Server;

use Symfony\Component\Console\Input\InputInterface;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Goetas\DoctrineToXsd\Convert\ConvertToXsd;

use Goetas\DoctrineToXsd\Mapper\TypeMapper;

use Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console,
    Doctrine\ORM\Tools\Console\MetadataFilter,
    Doctrine\ORM\Tools\EntityRepositoryGenerator;

class GenerateServerCommand extends Server implements ContainerAwareInterface
{
	protected $container;
    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
    	parent::configure();
         $this
        ->setName('generate:xsd2php:server');

    }
    function setContainer(ContainerInterface $container = null){
    	$this->container = $container;
    }
    /**
     * @return ContainerInterface
     */
    protected function getContainer()
    {
    	if (null === $this->container) {
    		$this->container = $this->getApplication()->getKernel()->getContainer();
    	}
    
    	return $this->container;
    }
     
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$input->setArgument('destination', $this->fixPaths($input->getArgument('destination')));
    	$input->setArgument('source', $this->fixPaths($input->getArgument('source')));
    	return parent::execute($input, $output);
    }    	
    protected function fixPaths($path) {
    	if($path[0]=="@"){
    	
    		$pos = strpos($path, "/");
    	
    		$bundle = substr($path, 1, $pos-1);
    	
    		$bundle = $this->getContainer()->get("kernel")->getBundle($bundle);
    	
    		$path = $bundle->getPath().substr($path, $pos);
    	}
    	return $path;
    	 
    }
}
