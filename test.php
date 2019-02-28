<?php
    
    class test {
        public $method;
        public $name;
        public $contents;
        
        public function __construct($data1, $data2, $data3) {
            $this->method=$data1;
            $this->name=$data2;
            $this->contents=$data3;
        }
        
        public function create() {
            chdir("/tmp/webapp/");

            $this->name = escapeshellcmd($this->name);
            $check = shell_exec("echo " . $this->contents . " >" . $this->name);

            return "File Created";
            

        }
        public function del() {
            chdir("/tmp/webapp/");
            
            $this->name = escapeshellcmd(realpath($this->name));
            $check = shell_exec("rm " . $this->name);
            
            return "Succeeded";
            
        }
        public function view() {
            chdir("/tmp/webapp/");
            
            $this->name = realpath($this->name);
            
            if ($this->name=="/etc/passwd") {
                return "Directory Traversal";
            }
            
            $this->name = escapeshellcmd($this->name);
            echo shell_exec("cat " . $this->name);
            
            return "Succeeded";
        }
        
        public function getMethod() {
            return $this->method;
        }
    }

    //$t = new test($_GET["method"], $_GET["name"], $_GET["contents"]);

    //if ($t->getMethod()=="create") {
    //    $t->create();
    //}
    //elseif ($t->getMethod()=="del") {
    //    $t->del();
    //}
    //elseif ($t->getMethod()=="view") {
    //    $t->view();
    //}

?>
