<?php

namespace App\Tests\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class AppInfoTest extends KernelTestCase
{
    public function testExecute()
    {
	$kernel = static::createKernel();
	$application = new Application($kernel);
	$command = $application->find('application:information');
	$commandTester = new CommandTester($command);
	$commandTester->execute([
	    'command' => $command->getName()
        ]);
	$output = $commandTester->getDisplay();
	$this->assertContains('Application name: Starship Inventory', $output);
	$this->assertContains('Application version: 1.0', $output);
	$this->assertContains('Symfony version: 4.3.2', $output);
	$this->assertContains('Current environment: test', $output);
    }
}
