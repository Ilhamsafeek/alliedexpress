<?php

class Model_email extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /* get the orders data */
    public function sendEmail($id = null)
    {

        $to = "moratuwait@gmail.com";
        $subject = "Testing from web";

        $from = "admin@chadmin.online";

        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
        // $emailContent .= '<tr><td style="height:20px"></td></tr>';
        // $emailContent = 'This is from ch admin web portal for admins only.';
        // $emailContent = '<tr><td style="height:20px"></td></tr>';
        // $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://mail.chadmin.online';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';

        $config['smtp_user']    = 'admin@chadmin.online';    //Important
        $config['smtp_pass']    = 'Connecting@2020';  //Important

        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 



        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
    }
}
