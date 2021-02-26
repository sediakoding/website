<?php

class Upload extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }

    public function cek()
    {
        echo $_SERVER['DOCUMENT_ROOT'];
    }
    public function genName($var = null)
    {
        $this->tm = $this->M_set->Ymd();
        $new_name = $this->tm . '_' . $_FILES["txt_file"]['name'];
        return $new_name;
    }
    public function process()
    {
        $filename = $this->genName();
        $config['upload_path']          = './public/gallery/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']             = 0;
        $config['file_name'] = $filename;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('txt_file')) {
            $data = array(
                'code' => 0,
                'error' => $this->upload->display_errors()
            );
        } else {
            $uploadedImage = $this->upload->data();
            $c = $this->resizeImage($uploadedImage['file_name']);
            $data = array(
                'code' => $c,
                'folder' => $this->tm,
                'upload_data' => $uploadedImage
            );
        }
        return ($data);
        // print_r($data);
        // die();
    }
    public function resizeImage($filename)
    {
        $source_path = './public/gallery/' . $filename;
        $target_path = './public/gallery/thumbnail/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            // 'create_thumb' => TRUE,
            // 'thumb_marker' => '_thumb',
            'width' => 210,
            'height' => 200
        );


        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
            return 0;
        }
        $this->image_lib->clear();
        return 1;
    }
    public function delFile($filename)
    {
        $source_path = './public/gallery/' . $filename;
        $target_path = './public/gallery/thumbnail/' . $filename;

        $files = [
            $source_path,
            $target_path
        ];

        foreach ($files as $file) {
            if (file_exists($file)) {
                unlink($file);
            } else {
                return 0;
            }
        }
        return 1;
    }
}
