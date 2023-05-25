<?php

use App\CommonConst;

    if (!function_exists('getFullImagePath')) {
        function getFullImagePath($id, $image)
        {
            $image_path = CommonConst::IMAGE_PATH . $id . '/' . $image;
            $full_image_path = url($image_path);

            return $full_image_path;
        }
    }

    if (!function_exists('getFullThumbnailPath')) {
        function getFullThumbnailPath($id, $image)
        {
            $image_path = CommonConst::IMAGE_PATH . $id . '/thumb/' . $image;
            $full_image_path = url($image_path);

            return $full_image_path;
        }
    }
