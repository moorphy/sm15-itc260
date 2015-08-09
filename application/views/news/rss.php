<?php
//views/news/rss.php

$this->load->view($this->config->item('theme') . 'header');
?>
<?php
//rss.php
//our simplest example of consuming an RSS feed

  $request = "https://www.google.com/webhp?hl=en#q=game+of+thrones&hl=en&tbm=nws";

  //$request = "https://www.google.com/search?hl=en&gl=us&tbm=nws&authuser=0&q=music&oq=music&gs_l=news-cc.3..43j0l9j43i53.10123.11500.0.12408.5.4.0.1.1.0.105.373.3j1.4.0...0.0...1ac.1.Q4_5IAgtIQY#hl=en&gl=us&authuser=0&tbm=nws&q=wilford+brimley;

  $response = file_get_contents($request);
  $xml = simplexml_load_string($response);
  print '<h1>' . $xml->channel->title . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }
?>
<?php 
    
    $this->load->view($this->config->item('theme') . 'footer');

?>