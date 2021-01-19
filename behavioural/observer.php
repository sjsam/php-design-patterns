<?php

/*
 * The Observer Pattern
 * The Observer Mechanism defines a subscription mechanism to 
 * notify the changes in one object to all its observer
 * dependent objects.
 * Eg. You religiously follow a website for health tips.
 * Along the way you have subscribed to their updates.
 * Whenever they post a new content, you will get a link to that
 * in your email.
 */

// Subscriber interface
interface Subscriber
{
  public function update($postID);
}

// concrete subscriber named John
class John implements Subscriber{
  public function update($postID){
    echo "Hello John, a new post -- ${postID} -- has been added in Healthtips\n";
  }
}

// concrete subscriber named Mark
class Mark implements Subscriber{

  public function update($postID){
    echo "Hello Mark, a new post -- ${postID} -- has been added in Healthtips\n";
  }
}

class HealthTips
{
  private $subscribers = [];
  private $posts = []; // For simplicity the posts will contain only titles.

  public function registerSubscriber(Subscriber $subscriber)
  {
    $this->subscribers[] = $subscriber;
    echo "Subscriber added\n";
  }

  public function notifySubscribers(String $post)
  {
    foreach($this->subscribers as $subscriber){
      if($subscriber instanceof Subscriber){
        $subscriber->update($post);
      }
    }
  }

  public function publishPost($post)
  {
    // Add the post to the list of posts.
    $this->posts[]= $post;
    $this->notifySubscribers($post);
  }
}

// Driver Logic
// Now the health tips website is up and running.
$healthTips = new HealthTips();
// When John visited the site, he found it interesting, so he joined
$healthTips->registerSubscriber(new John()); 
/*
 * Haha new John looks awkward, but doing it for simplicity.
 * Ideally, we should have a Person class that implementes the Subscriber interface.
 */
// Oh! Mark too
$healthTips->registerSubscriber(new Mark());
// Finally Health Tips added a post.
echo "Publishing new post!\n";
$healthTips->publishPost("Improve Biceps!");


