<?php

class upload {
	
    private $allowedExts;
    private $maxSize;
    private $destination;
    private $file;
    private $fileUrl;

    function __construct($file, $allowedExts, $maxSize, $destination) {
       // session_start();
        if (is_array($allowedExts) AND is_int($maxSize)) {
            $this->file = $file;
            $this->allowedExts = $allowedExts;
            $this->maxSize = $maxSize;
            $this->destination = $destination;
        } else {
            throw new Exception("the allowed extension must be array and max size interger");
        }
    }


    function uploadPath($f) {
        $allowedExts = $this->allowedExts;
        $maxSize = $this->maxSize;
        $dest = $this->destination;
        $file = $this->file;
        
        @$filename = $_FILES[$f]['name'];

        $array = explode(".", $filename);
        @$fileext = strtolower(end($array));
        @$filesize = $_FILES[$f]['size'];
        @$tempname = $_FILES[$f]['tmp_name'];
        $this->fileUrl = $destination = $dest . $filename;
        if (in_array($fileext, $allowedExts)) {

            move_uploaded_file($tempname, $destination);
            //unlink the old path
        }
		
		return $this->fileUrl;
    }

    function getFileUrl() {
        return $this->fileUrl;
    }

}


