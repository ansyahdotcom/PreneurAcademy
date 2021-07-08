<?php
    function adm_logged_in()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('authadm');
        }
    }

    function psrt_logged_in()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('auth');
        }
    }

    function cekadm()
    {
        $var_ci = get_instance();
        if($var_ci->session->userdata('role') != 1) {
            redirect('block');
            die;
        }
    }

    function cekpsrt()
    {
        $var_ci = get_instance();
        if($var_ci->session->userdata('role') != 2) {
            redirect('block');
            die;
        }
    }
?>