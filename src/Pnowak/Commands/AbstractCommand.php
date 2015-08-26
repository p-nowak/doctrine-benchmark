<?php
/**
 * Created by PhpStorm.
 * User: pawelnowak
 * Date: 26/08/15
 * Time: 13:40
 */

namespace Pnowak\Commands;


use Doctrine\ORM\EntityManager;
use Pnowak\RandomData\RandomDataRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

abstract class AbstractCommand extends Command
{
    /**
     * AbstractCommand constructor.
     * @param EntityManager $manager
     * @param RandomDataRepository $randomData
     * @param Stopwatch $stopwatch
     */
    public function __construct(EntityManager $manager, RandomDataRepository $randomData, Stopwatch $stopwatch)
    {
        $this->randomData = $randomData;
        $this->manager = $manager;
        $this->stopwatch = $stopwatch;

        parent::__construct(null);
    }

    protected function configure()
    {
        $this->addOption('limit', null, InputArgument::OPTIONAL, "Limit object count", 1000);
    }

    protected function renderProfilerData(OutputInterface $output, $event)
    {
        $output->writeln($event->getCategory().PHP_EOL.' Duration: '.$event->getDuration().'ms MaxMemory:'.($event->getMemory()/1024/1024).'MB');
    }
}