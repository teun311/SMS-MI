<?php

function saveImage($image, $directory, $imageNameString = null, $modelFileUrl=null)
{

    if ($image)
    {
        if (isset($modelFileUrl))
        {
            if (file_exists($modelFileUrl))
            {
                unlink($modelFileUrl);
            }
        }
        $imageName = (isset($imageNameString) ? $imageNameString : '').time().rand(10,1000).'.'.$image->getClientOriginalExtension();
        $image->move($directory, $imageName);
        $imgUrl = $directory.$imageName;
    } else {
        $imgUrl = $modelFileUrl;
    }
    return $imgUrl;
}
