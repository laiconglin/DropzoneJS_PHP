<?php
if(sizeof($_FILES) > 0)
    $fileUploader = new FileUploader($_FILES);

class FileUploader{
    public function __construct($uploads,$uploadDir='uploads/'){

        $path = $_POST['path'];
        print_r($uploads);
        $uploads = array();
        // Loop through files sent
        foreach($uploads as $key => $current)
        {
            // Stores full destination path of file on server
            $this->uploadFile = $uploadDir.rtrim($path, "/.");
            // Stores containing folder path to check if dir later
            $this->folder = substr($this->uploadFile,0,strrpos($this->uploadFile,"/"));

            // Check whether the current entity is an actual file or a folder (With a . for a name)
            if($current['name'] != '.')
                // Upload current file
                if($this->upload($current,$this->uploadFile))
                    echo "The file ".$paths[$key]." has been uploaded\n";
                else
                    echo "Error";
        }
    }

    private function upload($current,$uploadFile){
        // Checks whether the current file's containing folder exists, if not, it will create it.
        if(!is_dir($this->folder)){
            mkdir($this->folder,0777,true);
        }
        // Moves current file to upload destination
        if(move_uploaded_file($current['tmp_name'],$uploadFile))
            return true;
        else
            return false;
    }
}
?>
