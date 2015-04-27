<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welqcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    $data['area'] = $this->layouts->get_global_areas();

		$this->layouts->set_title('Demo');
		$this->layouts->set_metainformations(array(
			array('name' => 'description', 'content' => 'Hello World')
		));
		$this->layouts->view('default/index', array('content' => 'page_templates/demo/index'));
	}

	public function html()
	{
    $data['area'] = $this->layouts->get_global_areas();

		$module_1_params = array(
			'placeholder' => $this->developement->get_single_placeholder(3)
		);

		$data['area']['content'] = new Area_Helper('content', array(
      $this->module_handler->generate_module_array('html_module', 'html', 'index', $module_1_params)
		));

		$this->layouts->set_title('Demo - HTML Elements');
		$this->layouts->set_metainformations(array(
			array('name' => 'description', 'content' => 'HTML Elements')
		));
		$this->layouts->view('default/index', array('content' => 'page_templates/with_sidebar/sidebar_right'), $data);
	}

	public function flexslider()
	{
    $data['area'] = $this->layouts->get_global_areas();

		$textblock_module_params = array(
			'headline' => 'Flexslider Modules',
			'text' => '<p>Here you can find an example for flexslider modules.</p>'
		);

		$module_1_params = array(
			'images' => $this->developement->get_placeholders(8)
		);
    
    $module_2_params = array(
			'images' => $this->developement->get_placeholders(8)
		);
    
    $module_3_params = array(
			'images' => $this->developement->get_placeholders(8)
		);

    $data['area']['content'] = new Area_Helper('content', array(
      $this->module_handler->generate_module_array('textblock_1', 'textblock', 'index', $textblock_module_params),
      $this->module_handler->generate_module_array('flexslider_basic', 'flexslider', 'index', $module_1_params),
      $this->module_handler->generate_module_array('flexslider_carousel', 'flexslider', 'carousel', $module_2_params),
      $this->module_handler->generate_module_array('flexslider_thumbs', 'flexslider', 'thumbs', $module_3_params)
    ));

		$this->layouts->set_title('Demo - Flexslider');
		$this->layouts->set_metainformations(array(
			array('name' => 'description', 'content' => 'Flexslider Demo')
		));
		$this->layouts->view('default/index', array('content' => 'page_templates/with_sidebar/sidebar_right'), $data);
	}

	public function fancybox() {
    $data['area'] = $this->layouts->get_global_areas();

    $start_textblock = array(
      'headline' => 'Fancybox Gallery',
      'text' => '<p>On this page you can check out the fancybox module.</p>'
    );
    $second_textblock = array(
      'headline' => 'Grouped Images',
      'text' => '<p>This images will be grouped together so you can navigate through them.</p>'
    );
		$fancybox_module = array(
			'images' => $this->developement->get_placeholders(8)
		);

		$fancybox_grouped_module = array(
			'images' => $this->developement->get_placeholders(8)
		);

    $data['area']['content'] = new Area_Helper('content', array(
      $this->module_handler->generate_module_array('textblock_1', 'textblock', 'index', $start_textblock),
      $this->module_handler->generate_module_array('fancybox_normal', 'fancybox', 'index', $fancybox_module),
      $this->module_handler->generate_module_array('textblock_2', 'textblock', 'index', $second_textblock),
      $this->module_handler->generate_module_array('fancybox_group', 'fancybox', 'grouped', $fancybox_grouped_module)
    ));

		$this->layouts->set_title('Demo - Flexslider');
		$this->layouts->set_metainformations(array(
			array('name' => 'description', 'content' => 'Fancybox Demo')
		));
		$this->layouts->view('default/index', array('content' => 'page_templates/with_sidebar/sidebar_left'), $data);
	}

	public function bloglist() {
    $data['area'] = $this->layouts->get_global_areas();

    $title_blogposts = array(
      'headline' => 'Latest posts',
      'text' => ''
    );
    $bloglist = $this->developement->get_blog_array(10);

    $pagination_data = array(
      'from' => 1,
      'to' => 15
    );

    $data['area']['content'] = new Area_Helper('content', array(
      $this->module_handler->generate_module_array('intro_text', 'textblock', 'index', $title_blogposts),
      $this->module_handler->generate_module_array('bloglist', 'bloglist', 'index', $bloglist),
      $this->module_handler->generate_module_array('pagination_bottom', 'pagination', 'index', $pagination_data)
    ));

		$this->layouts->set_title('Demo - Bloglist');
		$this->layouts->set_metainformations(array(
			array('name' => 'description', 'content' => 'Bloglist Demo')
		));
		$this->layouts->view('default/index', array('content' => 'page_templates/with_sidebar/sidebar_right'), $data);
	}

  public function post($id) {
    $data['area'] = $this->layouts->get_global_areas();
    $sidebar_gallery = array(
      'images' => $this->developement->get_placeholders(5)
    );
    $sidebar_gallery_title = array(
      'headline' => 'Sidebar Gallery',
      'text' => ''
    );
    $data['area']['global_sidebar']->add_module($this->module_handler->generate_module_array('global_sidebar_gallery_title', 'textblock', 'index', $sidebar_gallery_title));
    $data['area']['global_sidebar']->add_module($this->module_handler->generate_module_array('global_sidebar_gallery', 'fancybox', 'index', $sidebar_gallery));
    
    $data['previous_post_link'] = $id - 1;
    $data['next_post_link'] = $id + 1;

    $post_data = $this->developement->get_single_post($id);
    $post_gallery = array(
      'images' => $this->developement->get_placeholders($id)
    );

    $data['area']['content'] = new Area_Helper('content', array(
      $this->module_handler->generate_module_array('blog_post', 'post', 'index', $post_data),
      $this->module_handler->generate_module_array('blog_gallery', 'fancybox', 'index', $post_gallery),
    ));

    $this->layouts->set_title('Demo - Post');
    $this->layouts->set_metainformations(array(
      array('name' => 'description', 'content' => 'Post Demo')
    ));
    $this->layouts->view('default/index', array('content' => 'page_templates/with_sidebar/sidebar_right'), $data);
  }
}