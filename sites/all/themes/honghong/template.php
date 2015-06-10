<?php 

function honghong_html_head_alter(&$head_elements) {
  unset($head_elements['system_meta_generator']);
}
 ?>