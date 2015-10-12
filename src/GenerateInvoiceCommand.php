<?php namespace Invoicer;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Seld\JsonLint\JsonParser;


class GenerateInvoiceCommand extends Command
{
  protected function configure()
  {
    $this
      ->setName('invoice:create')
      ->setDescription('Create Invoice')
      ->addArgument(
        'input-file',
        InputArgument::REQUIRED,
        'Json file with the invoice details '
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = $input->getArgument('input-file');
    $content = file_get_contents("{$name}", FILE_USE_INCLUDE_PATH);

    // validate json 
    $parser = new JsonParser();
    try {

      // if lint is null , no validation errors
      $lint = $parser->lint($content);

      // returns and exception if not null
      if (! is_null($lint)) throw $lint;

      $this->generateTex(json_decode($content, true));

    }catch(\Exception $e) {
      $output->writeln($e->getMessage());
    }
  }

  protected function generateTex($data)
  {
    $templates = new \League\Plates\Engine('phar://invoicer.phar/src/templates');

    $output = $templates->render('invoice', ['data'=>$data]);

    file_put_contents('./invoice-'.date('Y-m-d').'.html', $output);
  }

}
