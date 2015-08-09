<?php
//Rss.php
class Rss extends CI_Controller {
	
        public function __construct()
    {
        parent::__construct();
        $this->load->model('rss_model'); //LOAD MODEL
        $this->config->set_item('banner', 'RSS Feed'); //LOAD BANNER
        $this->config->set_item('title', 'RSS Feed'); //LOAD TITLE
		$this->load->view('rss/rss');
            
    } //END CONSTRUCTOR    
        public function index()
        {
            $request = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&q=game+of+thrones&output=rss";
            $response = file_get_contents($request);
            $xml = simplexml_load_string($response);
            print '<h1>' . $xml->channel->title . '</h1>';
			
            foreach($xml->channel->item as $story)
            {
                echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
                echo '<p>' . $story->description . '</p><br /><br />';
            }
    		
        }//end index
	

 
}//end Rss