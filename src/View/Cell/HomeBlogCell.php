<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * HomeBlog cell
 */
class HomeBlogCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {


        $this->loadModel('Articles');

       $result =  $this->Articles->find('all', [
           'conditions' => ['flag_published' => 1],
           'fields' => ['name','seo_title','homepage_image_url', 'homepage_text', 'categories'],
           'contain' => [],
           'order' => 'publish_date desc'
       ]);

        $this->set('blogs', $result);
    }
}
