<?php
  class Developement 
  {
    public $placeholders = 8;
    private $image_path = '/assets/images/placeholders/';
    private $blog_post_titles = array(
      'This is a blogpost title',
      'Cats in Berlin',
      'Living in Germany',
      'How to be a good developer',
      'How to drink coffee',
      'My new music list',
      '10 Blogposts you should know',
      'Welcome to my blog',
      'Example Blog posts are good',
      'Developer Blogposts of the week',
      'A week in the USA'
    );
    private $blog_post_content = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit suscipit, ea nostrum possimus obcaecati dolorem reiciendis natus quaerat sunt. Voluptas et, accusamus non modi quisquam eligendi dignissimos libero sequi atque!</p>';
    private $blog_post_long = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident sequi perspiciatis error sed ratione, eum. Architecto mollitia blanditiis modi, temporibus natus. Ipsa dolorum deserunt delectus, modi perferendis consequuntur dolores dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cumque dignissimos quae saepe praesentium, ex asperiores, obcaecati accusantium veritatis debitis pariatur inventore numquam sit sapiente possimus illo voluptatibus repudiandae rerum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta necessitatibus, beatae aperiam similique iste esse distinctio fugit, inventore blanditiis iure quas perferendis. Recusandae quisquam dolore, culpa minus optio, iusto sunt.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam iste tenetur placeat repellendus, consectetur ipsa distinctio, ducimus voluptatum mollitia enim ratione eaque, eum, in porro et saepe quae error sit!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident sequi perspiciatis error sed ratione, eum. Architecto mollitia blanditiis modi, temporibus natus. Ipsa dolorum deserunt delectus, modi perferendis consequuntur dolores dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cumque dignissimos quae saepe praesentium, ex asperiores, obcaecati accusantium veritatis debitis pariatur inventore numquam sit sapiente possimus illo voluptatibus repudiandae rerum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta necessitatibus, beatae aperiam similique iste esse distinctio fugit, inventore blanditiis iure quas perferendis. Recusandae quisquam dolore, culpa minus optio, iusto sunt.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam iste tenetur placeat repellendus, consectetur ipsa distinctio, ducimus voluptatum mollitia enim ratione eaque, eum, in porro et saepe quae error sit!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident sequi perspiciatis error sed ratione, eum. Architecto mollitia blanditiis modi, temporibus natus. Ipsa dolorum deserunt delectus, modi perferendis consequuntur dolores dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cumque dignissimos quae saepe praesentium, ex asperiores, obcaecati accusantium veritatis debitis pariatur inventore numquam sit sapiente possimus illo voluptatibus repudiandae rerum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta necessitatibus, beatae aperiam similique iste esse distinctio fugit, inventore blanditiis iure quas perferendis. Recusandae quisquam dolore, culpa minus optio, iusto sunt.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam iste tenetur placeat repellendus, consectetur ipsa distinctio, ducimus voluptatum mollitia enim ratione eaque, eum, in porro et saepe quae error sit!</p>';
    private $blog_post_author = 'John Doe';
    private $blog_post_date = '12.12.1999';

    public function get_placeholders($amount) 
    {
      $the_placeholders = array();
      // If Amount is higher then actual placeholders set amount back to placeholders max
      if($amount > $this->placeholders) 
      {
        $amount = $this->placeholders;
      }

      // Iterate through placeholders and give them back
      for($i = 1; $i <= $amount; $i++) 
      {
        array_push($the_placeholders, array(
          'image' => $this->image_path . $i . '.jpg',
          'thumb' => $this->image_path .  $i . '-thumb.jpg',
          'title' => 'Placeholder ' . $i,
          'group' => 'placeholder-group-' . rand(1, 3)
        ));
      }

      return $the_placeholders;
    }

    public function get_single_placeholder($number = false) {
      // If number is false or not a number it should be generated randomly
      if(!$number || !is_numeric($number)) {
        $number = rand(1, $this->placeholders);
      }

      if($number > $this->placeholders) {
        $number = $this->placeholders;
      }

      return $this->image_path . $number . '.jpg';
    }


    public function get_blog_array($number_of_posts = 10) {
      $posts = array();
      for($i = 0; $i <= $number_of_posts; $i++) {
        $random = rand(0, count($this->blog_post_titles) - 1);
        $posts[] = array(
          'id' => $random,
          'headline' => $this->blog_post_titles[$random],
          'author' => $this->blog_post_author,
          'date' => $this->blog_post_date,
          'content' => $this->blog_post_content
        );
      }

      return $posts;
    }

    public function get_single_post($id) {
      return array(
        'title' => $this->blog_post_titles[$id],
        'author' => $this->blog_post_author,
        'date' => $this->blog_post_date,
        'content' => $this->blog_post_long
      );
    }
  }