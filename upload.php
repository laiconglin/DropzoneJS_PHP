<?php
define('DIRECTORY_SEPARATOR', '/');
$ds          = DIRECTORY_SEPARATOR;  //1

if(sizeof($_FILES) > 0)
    $fileUploader = new FileUploader($_FILES);

class FileUploader{
    public function __construct($uploads,$uploadDir='uploads/'){

        $paths = explode("###", rtrim($_POST['paths'], "###"));
        $files = $uploads['file'];
        // Loop through files sent
        foreach($files['name'] as $key => $current)
        {
            // Stores full destination path of file on server
            $this->uploadFile = $uploadDir.rtrim($paths[$key], "/.");
            // Stores containing folder path to check if dir later
            $this->folder = substr($this->uploadFile,0,strrpos($this->uploadFile,"/"));
            echo "current:$current";
            // Check whether the current entity is an actual file or a folder (With a . for a name)
            if($current != '.')
                // Upload current file
                if($this->upload($files["tmp_name"][$key], $this->uploadFile))
                    echo "The file ".$paths[$key]." has been uploaded\n";
                else
                    echo "Error";
        }
    }

    private function upload($current_tmp_name,$uploadFile){
        // Checks whether the current file's containing folder exists, if not, it will create it.
        if(!is_dir($this->folder)){
            mkdir($this->folder, 0777, true);
            chmod($this->folder, 0777);
        }
        // Moves current file to upload destination
        if(move_uploaded_file($current_tmp_name,$uploadFile)) {
            chmod($uploadFile, 0777);            
            return true;
        } else {
            return false;
        }
    }
}



?> 
