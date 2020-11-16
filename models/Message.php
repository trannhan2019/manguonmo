<?php
/**
 * 
 */
class Message
{
    public function errorDefault($msg = '')
    {
        echo "<script>alert('$msg')</script>";
        echo "<script type='text/javascript'>
                               history.go(-1)
                          </script>";
    }
    
    public function successDefault($msg = '', $action = '')
    {
        echo "<script>alert('$msg')</script>";
        if ($action != NULL) {
            echo "<script type='text/javascript'>
                               window.location = '$action'
                          </script>";
        }
        
    }
    
    public function backOnly()
    {
        echo "<script type='text/javascript'>
                               history.go(-1)
                          </script>";
    }
    
    public function showMessage($msg = '')
    {
        echo "<script>alert('$msg')</script>";
    }
}

?>