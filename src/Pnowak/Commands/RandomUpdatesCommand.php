<?php
/**
 * Created by PhpStorm.
 * User: pawelnowak
 * Date: 26/08/15
 * Time: 13:32
 */

namespace Pnowak\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RandomUpdatesCommand extends AbstractCommand
{

    protected function configure()
    {
        $this->setName('benchmark:updates');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stopwatch = $this->stopwatch;

        $stopwatch->start("retrieve_entities", "retrieve_entities");
        $repo = $this->manager->getRepository('Pnowak\Model\TestEntity');
        $rows = $repo->findBy([], [], $input->getOption('limit'));
        $stopwatch->stop("retrieve_entities", "retrieve_entities");

        $stopwatch->start("updating_entities", "updating_entities");
        $this->randomData->updateEntities($rows);
        $stopwatch->stop('updating_entities');
        $stopwatch->start("flush_entities", "flush_entities");
        $this->manager->flush();
        $stopwatch->stop("flush_entities");


        $events = $stopwatch->getSectionEvents('__root__');
        foreach ($events as $event) {
            $this->renderProfilerData($output, $event);
        }

    }

}