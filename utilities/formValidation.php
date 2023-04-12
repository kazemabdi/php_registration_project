<?php
function formValidation($inputValue, $inputType)
{
    switch ($inputType) {
        case 'email':
            if (!empty($inputValue)) {

                return stripslashes(trim($inputValue));
            } else {

                echo "empty" . $inputType . "\n";
                return false;
            }
            break;

        case 'text':
            if (!empty($inputValue)) {

                return stripslashes(trim($inputValue));
            } else {

                echo "empty" . $inputType . "\n";
                return false;
            }
            break;

        case 'password':
            if (!empty($inputValue)) {

                return sha1($inputValue);
            } else {

                echo "empty" . $inputType . "\n";
                return false;
            }
            break;

        default:
            if (!empty($inputValue)) {

                return stripslashes(trim($inputValue));
            } else {

                echo "empty" . "\n";
                return false;
            }
            break;
    }
}
