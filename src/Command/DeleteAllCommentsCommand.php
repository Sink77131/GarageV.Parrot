<?php

namespace App\Command;

use App\Repository\CommentaireRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteAllCommentsCommand extends Command
{
    protected static $defaultName = 'app:delete-all-comments';

    private $commentaireRepository;

    public function __construct(CommentaireRepository $commentaireRepository)
    {
        $this->commentaireRepository = $commentaireRepository;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Deletes all comments.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->commentaireRepository->deleteAll();

        $output->writeln('All comments have been deleted.');

        return Command::SUCCESS;
    }
}
