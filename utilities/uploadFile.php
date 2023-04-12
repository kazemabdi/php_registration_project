<?php

function uploadFile($file, $fileName)
{
    if ($file["error"] == 0) {

        $tmp_name = $file["tmp_name"];
        $uploaded_file = "files/pictures/" . $fileName;

        if (move_uploaded_file($tmp_name, $uploaded_file)) {
            // echo "file uploaded." . "<br>";
            // $jArray[] = array('move_uploaded_file' => true);
            return $uploaded_file;
        } else {
            // echo "not a valid upload file!" . "<br>";
            // $jArray[] = array('move_uploaded_file' => false);
            return false;
        }
    } else {

        echo "file error" . "<br>";
        return false;
        // $jArray[] = array('file_error' => true);
    }
}
