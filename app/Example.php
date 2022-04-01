<?php
namespace App;

use Illuminate\Filesystem\Filesystem;
class Example{
    protected $file;
    public function __construct(Filesystem $file){
        $this->file=$file;
        echo $this->file->get(public_path('index.php'));        ;
    }

    public function get(){
        dd('hello');
    }
}
