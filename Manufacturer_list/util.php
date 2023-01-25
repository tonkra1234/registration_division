<?php 

    class Util  {
        public function testInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            
            return $data;
        }
 
        function compressImage($source, $destination, $quality) { 
            // Get image info 
            $imgInfo = getimagesize($source); 
            $mime = $imgInfo['mime']; 
            
            // Create a new image from file 
            switch($mime){ 
                case 'image/jpeg': 
                    $image = imagecreatefromjpeg($source); 
                    break; 
                case 'image/png': 
                    $image = imagecreatefrompng($source); 
                    break;  
                default: 
                    $image = imagecreatefromjpeg($source); 
            } 
            
            // Save image 
            imagejpeg($image, $destination, $quality); 
            
        }

    }

?>