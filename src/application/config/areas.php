<?php
  $CI =& get_instance();
  $config['areas'] = array(
    'global_sidebar' => array(
      array(
        'title' => 'sidebar_text',
        'type' => 'textblock',
        'template' => 'index',
        'params' => array(
          'headline' => 'This is the global sidebar content',
          'text' => '<p>This is the global page sidebar you can edit in the config/areas.php. Try it out!</p>'
        )
      ),
      array(
        'title' => 'sidebar_text_code',
        'type' => 'textblock',
        'template' => 'index',
        'params' => array(
          'headline' => 'Some Code',
          'text' => '<code>var example = "This is just a example";<br>var example2 = "You can put a lot of stuff into the sidebar";<br>var global_sidebar = "This is actually the global sidebar.";</code>'
        )
      ),
    )
  );