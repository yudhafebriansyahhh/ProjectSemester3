<?php

if (!function_exists('check_access')) {
  function check_access()
  {
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
      redirect('auth');
    } else {
      $user_email = $ci->session->userdata('email');

      $is_admin = $ci->db->where('email', $user_email)->get('admin')->num_rows() > 0;
      $is_nasabah = $ci->db->where('email', $user_email)->get('nasabah')->num_rows() > 0;

      if ($is_admin) {
        if ($ci->uri->segment(1) != 'admin') {
          redirect('admin');
        }
      } elseif ($is_nasabah) {
        if ($ci->uri->segment(1) != 'nasabah') {
          redirect('nasabah');
        }
      }
    }
  }
}
