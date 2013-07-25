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
class QcslideWidget extends BaseWidget
{
    var $_name = 'qcslide';

    function _get_data()
    {
        return array(
			'ad_image_url1'  => $this->options['ad_image_url1'],
            'ad_link_url1'   => $this->options['ad_link_url1'],
			'ad_text1' => $this->options['ad_text1'],
			'ad_image_url2'  => $this->options['ad_image_url2'],
            'ad_link_url2'   => $this->options['ad_link_url2'],
			'ad_text2' => $this->options['ad_text2'],
			'ad_image_url3'  => $this->options['ad_image_url3'],
            'ad_link_url3'   => $this->options['ad_link_url3'],
			'ad_text3' => $this->options['ad_text3'],
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
        for ($i = 1; $i <= 3; $i++)
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