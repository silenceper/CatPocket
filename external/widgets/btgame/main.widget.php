<?php

/**
 * 图片广告挂件
 *
 * @param   string  $image_url  图片地址
 * @param   string  $link_url   链接地址
 * @param   int     $width      图片宽度
 * @param   int     $height     图片高度
 * @return  array   $options    设置
 */
class BtgameWidget extends BaseWidget
{
    var $_name = 'btgame';

    function _get_data()
    {
        return array(
			'ad_image_url1'  => $this->options['ad_image_url1'],
            'ad_link_url1'   => $this->options['ad_link_url1'],
			'ad_image_url2'  => $this->options['ad_image_url2'],
            'ad_link_url2'   => $this->options['ad_link_url2'],
			'ad_image_url3'  => $this->options['ad_image_url3'],
            'ad_link_url3'   => $this->options['ad_link_url3'],
			'ad_image_url4'  => $this->options['ad_image_url4'],
            'ad_link_url4'   => $this->options['ad_link_url4'],
			'ad_image_url5'  => $this->options['ad_image_url5'],
            'ad_link_url5'   => $this->options['ad_link_url5'],
			'ad_image_url6'  => $this->options['ad_image_url6'],
            'ad_link_url6'   => $this->options['ad_link_url6'],
        );
    }

    function parse_config($input)
    {
        $images = $this->_upload_image();
        if ($images)
        {
            foreach ($images as $key => $image)
            {
                $input['ad_image_url'.$key] = $image;
            }
        }

        return $input;
    }

    function _upload_image()
    {
        import('uploader.lib');
        $images = array();
        for ($i = 1; $i <= 6; $i++)
        {
            $file = $_FILES['ad_image_file' . $i];
            if ($file['error'] == UPLOAD_ERR_OK)
            {
                $uploader = new Uploader();
                $uploader->allowed_type(IMAGE_FILE_TYPE);
                $uploader->addFile($file);
                $uploader->root_dir(ROOT_PATH);
                $images[$i] = $uploader->save('data/files/mall/template', $uploader->random_filename());
            }
        }

        return $images;
    }
}

?>