<?php

namespace App\Constants;

class FileInfo
{

    /*
    |--------------------------------------------------------------------------
    | File Information
    |--------------------------------------------------------------------------
    |
    | This constant basically contain the path of files and size of images.
    | All information are stored as an array. Developer will be able to access
    | this info as method and property using FileManager class.
    |
    */

    public function fileInfo()
    {
        $data['withdrawVerify'] = [
            'path' => 'assets/images/verify/withdraw'
        ];
        $data['depositVerify'] = [
            'path'      => 'assets/images/verify/deposit'
        ];
        $data['verify'] = [
            'path'      => 'assets/verify'
        ];
        $data['default'] = [
            'path'      => 'assets/images/default.png',
        ];
        $data['withdrawMethod'] = [
            'path'      => 'assets/images/withdraw/method',
            'size'      => '800x800',
        ];
        $data['ticket'] = [
            'path'      => 'assets/support',
        ];
        $data['logoIcon'] = [
            'path'      => 'assets/images/logoIcon',
        ];
        $data['favicon'] = [
            'size'      => '128x128',
        ];
        $data['extensions'] = [
            'path'      => 'assets/images/extensions',
            'size'      => '36x36',
        ];
        $data['seo'] = [
            'path'      => 'assets/images/seo',
            'size'      => '1180x600',
        ];
        $data['userProfile'] = [
            'path'      => 'assets/images/user/profile',
            'size'      => '115x115',
        ];
        $data['adminProfile'] = [
            'path'      => 'assets/admin/images/profile',
            'size'      => '400x400',
        ];
        $data['reviewerProfile'] = [
            'path'      => 'assets/reviewer/images/profile',
            'size'      => '400x400',
        ];
        $data['category'] = [
            'path'      => 'assets/images/category',
            'size'      => '150x50'
        ];
        $data['stockImage'] = [
            'path'      => 'assets/images/stock/image',
        ];

        $data['stockFile'] = [
            'path'      => 'assets/images/stock/file',
        ];
        $data['watermark'] = [
            'path'     => 'assets/images',
            'size'     => '400x200'
        ];
        $data['file_extensions'] = [
            'extensions' => ['png', 'jpg', 'jpeg', 'psd', 'ai', 'raw', 'indd', 'eps']
        ];

        $data['video_extensions'] = [
            'extensions' => ['mp4', 'mov', 'mkv', 'wmv','3gp', 'avi', 'flv']
        ];

        $data['defaultImage'] = [
            'path' => 'assets/images/default'
        ];
        $data['ads'] = [
            'path' => 'assets/images/ads'
        ];

        return $data;
    }
}
