<?php 

require_once "Console/Table.php";

class Cmd {

    public $argument;

    public function __construct() {
        $this->argument = $_SERVER['argv'];
    }

    public function makeController($nama_controller) {
        $createFile = touch(__DIR__ ."/application/controllers/".$nama_controller.".php");
        $fopen = fopen(__DIR__ . "/application/controllers/".$nama_controller.".php", 'w');
        $write = fwrite($fopen, "<?php\ndefined('BASEPATH') OR exit('No direct script access allowed');\n\nclass ".$nama_controller." extends CI_Controller {\n\n\t/**\n\t*\t Generated by Generator\n\t**/\n\n\tpublic function index()\n\t{\n\t\techo 'Hello world!';\n\t}\n\n}\n\n?>");
        fclose($fopen);

        if(!$createFile || !$write) {
            echo "\033[93m[\033[91m!\033[93m] \033[91mFailed to generate controller!\n";
        }else{
            echo "\033[93m[\033[92m!\033[93m] \033[92mSuccess to generate controller with the name: ".$nama_controller."\n";
        }
    }

    public function makeRoute($custom_route, $real_route) {
        $file_routes = file_get_contents(__DIR__.'/application/config/routes.php');
        $new_routes = $file_routes."\n".'$route["'.$custom_route.'"] = "'. $real_route .'";';
        $fopen = fopen(__DIR__."/application/config/routes.php", 'w');
        $write = fwrite($fopen, $new_routes);
        fclose($fopen);

        if(!$write) {
            echo "\033[93m[\033[91m!\033[93m] \033[91mFailed to make a new route!\n";
        }else{
            echo "\033[93m[\033[92m!\033[93m] \033[92mSuccess to make a new route\n";
        }
    }

    public function main() {
        if(sizeof($this->argument) === 1) {
            $tbl = new Console_table();
            $tbl->setHeaders(array('Command', 'Description', 'Example'));
            $tbl->addRow(array('make:controller <name>', 'Generate a new Controller', 'php '.$this->argument[0].' make:controller Admin'));
            $tbl->addRow(array('make:model <name>', 'Generate a new model', 'php '.$this->argument[0].' make:model Admin'));
            $tbl->addRow(array('make:route <custom_route> <controller/method>', 'Make a new route', 'php '.$this->argument[0].' make:route admin/perusahaan/tambah admin/tambah_perusahaan'));
            echo $tbl->getTable()."\n\n";
        }else{
            if(preg_match("/make/", $this->argument[1])) {
                $cmd = explode(":", $this->argument[1]);
                if($cmd[1] == "controller") {
                    if(sizeof($this->argument) > 2) {
                        $this->makeController($this->argument[2]);
                    }else{
                        echo "\033[93m[\033[91m!\033[93m] \033[91mController name cannot be null!\n";
                    }
                }else if($cmd[1] == "route") {
                    if(sizeof($this->argument) > 3) {
                        $this->makeRoute($this->argument[2], $this->argument[3]);
                    }else{
                        echo "\033[93m[\033[91m!\033[93m] \033[91mFailed make new route!\n";
                    }
                }
            }
        }
    }
}


$cmd = new Cmd();
$cmd->main();


?>