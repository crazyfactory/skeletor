<?php
namespace crazyfactory\generator;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Create extends Command
{
    private $use_defaults;

    public function configure()
    {
        $this->setName('create')
            ->setDescription('Create a new project')
            ->addArgument('name', InputArgument::OPTIONAL, 'Name of project')
            ->addArgument('defaults', InputArgument::OPTIONAL, 'weather or not to use defaults', 'no');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $default = $input->getArgument('defaults') == 'default' ? true : false;
        $this->use_defaults = $default;
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/_output');
        $twig = new \Twig_Environment($loader);
        $README = $twig->loadTemplate('README.md');
        $data = $this->collectProjectInfo($input, $output);
        $data_file['README.md'] = $README->render($data);
        $travis = $twig->loadTemplate('.travis.yml');
        $data_file['.travis.yml'] = $travis->render($data);
        $composer = $twig->loadTemplate('composer.json');
        $data_file['composer.json'] = $composer->render($data);
        $data_file['.gitignore'] = file_get_contents(__DIR__ . '/_output/.gitignore');
        $this->createFiles($data_file, $data['project_name']);
        $output->writeln("Next steps:");
        $output->writeln("cd {$data['project_name']} && composer bootstrap");
    }

    private function createFiles($data, $project_name)
    {
        mkdir($project_name);
        foreach ($data as $filename => $content) {
            file_put_contents($project_name . '/' . $filename, $content);
        }
        mkdir($project_name . '/src');
    }

    private function collectProjectInfo(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $data = array();
        $data['project_name'] = $this->getData('Enter Project Name', $name);
        $data['github_username'] = $this->getData('Enter Github User/Organization', 'crazyfactory');
        if (!$this->use_defaults) {
            $output->writeln("Travis Section:");
        }
        $data['PHP_VERSIONS'] = $this->collectPHPVersions($output);
        $data['ALLOWED_FAILS'] = $this->collectAllowedFailures($output, $data['PHP_VERSIONS']);
        if (!$this->use_defaults) {
            $output->writeln("Composer section");
        }
        $data['vendor'] = $this->getData('Enter vendor Name', $data['github_username']);
        $data['description'] = $this->getData('Enter description for package', '');
        $data['type'] = $this->getData('Enter type', 'library');
        $data['license'] = $this->getData('Enter license', 'GPL');
        $data['author_name'] = $this->getData('Enter author name', '');
        $data['author_email'] = $this->getData('Enter email', 'dev@crazy-factory.com');
        return $data;
    }

    /**
     * @param OutputInterface $output
     * @param $selected_versions string[]
     * @return string[]
     */
    private function collectAllowedFailures(OutputInterface $output, $selected_versions)
    {
        if (!$this->use_defaults) {
            $output->writeln("Allow failing builds?");
        }
        $allow_fails = array();
        foreach ($selected_versions as $version) {
            $allow = $this->inputBoolean($version, false);
            if ($allow) {
                $allow_fails[] = $version;
            }
        }
        return $allow_fails;
    }

    private function collectPHPVersions(OutputInterface $output)
    {
        $versions = array(
            '5.3' => false,
            '5.4' => true,
            '5.5' => true,
            '5.6' => true,
            '7.0' => true,
            'nightly' => true,
            'hhvm' => true
        );
        if (!$this->use_defaults) {
            $output->writeln("Select PHP versions you're targeting for (You can enter allowed failures too)");
        }
        $desired = array();
        foreach ($versions as $version => $value) {
            $in = $this->inputBoolean($version, $value);
            if ($in) {
                $desired[] = $version;
            }
        }
        return $desired;
        // check if user wants or not.
    }

    private function inputBoolean($field, $default)
    {
        if ($this->use_defaults) {
            return $default;
        }
        if ($default) {
            $helper = "Y/n";
        } else {
            $helper = "y/N";
        }
        $value = readline($field . " [$helper] ");
        if ($value == "") {
            return $default;
        }
        if (strtoupper($value) == "Y" || strtoupper($value) == "YES") {
            return true;
        }
        return false;
    }

    /**
     * @param $field string short description to display
     * @param $default string default value
     * @return string
     */
    private function getData($field, $default = '')
    {
        if ($this->use_defaults) {
            return $default;
        }
        $value = readline($field . ":[$default] ");
        if ($value == "") {
            return $default;
        }
        return $value;
    }
}
