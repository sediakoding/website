<?php
class uploadfile
{

    //
    function cek($var = null)
    {
        echo 1212;
    }

    public function do_upload()
    {
        $config['upload_path']          = './public/gallery/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 0;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $data = array(
                'code' => 0,
                'error' => $this->upload->display_errors()
            );
        } else {
            $data = array(
                'code' => 1,
                'upload_data' => $this->upload->data()
            );
        }

        return $data;
    }
}
