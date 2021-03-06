<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Pagination Configuration
$config['base_url'] = base_url() . 'sap_admin/centre';
$config['total_rows'] = 0;
$config['per_page'] = 20;
$config['uri_segment'] = 3;

$config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
$config['full_tag_close'] ="</ul>";
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
$config['next_tag_open'] = "<li>";
$config['next_tagl_close'] = "</li>";
$config['prev_tag_open'] = "<li>";
$config['prev_tagl_close'] = "</li>";
$config['first_tag_open'] = "<li>";
$config['first_tagl_close'] = "</li>";
$config['last_tag_open'] = "<li>";
$config['last_tagl_close'] = "</li>";
