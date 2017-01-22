<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Category helper
 */
class CategoryHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html', 'Form'];

    public function display(){

        $sHtml = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">';
        /*
        $data = [ 'news' => 'News', "tips" => 'Tips', "other" => 'Other'];


        //$nestedList= $this->Html->nestedList($data);

        $sHtml .= $this->Form->radio( 'field', $data, ['empty' => '(choose one)', 'class' => 'selectpicker', 'multiple' => true ] );

        $sHtml .= "
        <script>
        $('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
        </script>
";
*/
        return '<div>' .$sHtml .'</div>';


    }

}
