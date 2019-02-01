<?php

namespace App\Classes;


class UploadFile
{
    protected $filename;
    protected $max_filesize = 2097152;
    protected $extension;
    protected $path;

    /**
     * Get file name
     * @return mixed
     */
    public function getName()
    {
        return $this->filename;
    }

    /**
     * Sets file name, format file name string, replaces to formated name
     * @param $file
     * @param string $name
     */
    protected function setName($file, $name = "")
    {
        if($name === '') {
            $name = pathinfo($file, PATHINFO_FILENAME);
        }
        $name = strtolower(str_replace(['-', ' '], '-', $name));
        $hash = md5(microtime()); //gives random strings
        $ext = $this->fileExtension($file);
        $this->filename = "{$name}-{$hash}.{$ext}";

    }

    /**
     * Set file extension
     * @param $file
     * @return mixed
     */
    protected function fileExtension($file)
    {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    /**
     * validate file size
     * @param $file
     * @return bool
     */
    public static function fileSize($file)
    {
        $fileobj = new static;
        return $file > $fileobj->max_filesize ? true : false;
    }

    /**
     * validate file upload
     * @param $file
     * @return bool
     */
    public static function isImage($file)
    {
        $fileobj = new static;
        $ext = $fileobj->fileExtension($file);
        $validExt = array('jpg', 'jpeg', 'png', 'bmp', 'gif');

        if (!in_array(strtolower($ext), $validExt)) {
            return false;
        }
       return true;
    }

    /**
     * get the path where file was uploaded
     * @return mixed
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * Moves file to intended location, takes temporary path moves it to absolute(public) location
     * @param $temp_path
     * @param $folder
     * @param $file
     * @param $new_filename
     * @return UploadFile|null
     */
    public static function move($temp_path, $folder, $file, $new_filename = '')
    {
        $fileobj = new static;
        $ds = DIRECTORY_SEPARATOR;

        //sets file name
        $fileobj->setName($file, $new_filename);
        $file_name = $fileobj->getName();

        // create dir if it doesnt exist
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $fileobj->path = "{$folder}{$ds}{$file_name}";
        $absolute_path = BASE_PATH."{$ds}public{$fileobj->path}";
        if (move_uploaded_file($temp_path, $absolute_path)) {
             return $fileobj;
        }
        return null;
    }

}
