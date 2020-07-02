<?php

function session_check()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
}

function session_check_is_login()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        redirect('home');
    }
}
