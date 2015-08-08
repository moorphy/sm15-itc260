<?php
class Rss_model extends CI_Model {
    public function get_stories()
    {
      $data = [];
      //returns a string
        
      $rawFile = file_get_contents('https://www.google.com/search?q=google+rss&obatman&tbm=nws');
      //must be used to parse string to xml object
      $xml = simplexml_load_string($rawFile);
        
      //assigns xml object for each item to array item
      foreach ($xml->channel->item as $story) {
          $data["newsItem"][] = $story;
      }
      //returns whole array
      return $data;
    }//end get_stories() method
    
}//end Rss_model