<?php namespace Invoicer;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Seld\JsonLint\JsonParser;
use Seld\JsonLint\ParsingException;


class ShowSampleCommand extends Command
{
  protected function configure()
  {
    $this
      ->setName('invoice:sample')
      ->setDescription('Show Sample Json File')
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    
    $content = file_get_contents("./templates/invoice-sample.json", FILE_USE_INCLUDE_PATH);

    $output->writeln($content);
  }

}
