<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\KernelInterface;

class ApplicationInformationCommand extends Command
{
    protected static $defaultName = 'application:information';

    public function __construct(ParameterBagInterface $params)
    {
	    $this->params = $params;
	    parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
	$io = new SymfonyStyle($input, $output);

	$kernel = $this->getApplication()->getKernel();

	$application_name = $this->params->get('application_name');
	$application_version = $this->params->get('application_version');
	$io->writeln('<info>Application name</info>: '.$application_name); 
	$io->writeln('<info>Application version</info>: '.$application_version); 
	$io->writeln('<info>Symfony version</info>: '.Kernel::VERSION); 
	$io->writeln('<info>Current environment</info>: '.$kernel->getEnvironment()); 
    }
}
