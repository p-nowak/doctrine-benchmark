<?php
/**
 * Created by PhpStorm.
 * User: pawelnowak
 * Date: 26/08/15
 * Time: 09:32
 */

namespace Pnowak\Commands;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddObjectsCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('benchmark:add');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stopwatch = $this->stopwatch;

        $stopwatch->start("generating_entities","generating_entities");
        $this->randomData->generateEntities($this->manager, $input->getOption('limit'));
        $stopwatch->stop('generating_entities');
        $stopwatch->start("flush_entities","flush_entities");
        $this->manager->flush();
        $stopwatch->stop("flush_entities");


        $events = $stopwatch->getSectionEvents('__root__');
        foreach($events as $event) {
            $this->renderProfilerData($output, $event);
        }
    }

}