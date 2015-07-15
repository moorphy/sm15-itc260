<?
//rss.php
//our simplest example of consuming an RSS feed

  //$request = "http://rss.news.yahoo.com/rss/software";
  $request = "https://www.google.com/webhp?hl=en#q=game+of+thrones&hl=en&tbm=nws";

  $response = file_get_contents($request);
  $xml = simplexml_load_string($response);
  print '<h1>' . $xml->channel->title . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }
?>