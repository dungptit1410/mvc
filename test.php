<?php
	class Model
    {
        public function getProperties(){
            return get_object_vars($this);
           
        }
    }
	
   class Point2D extends Model{
      var $x, $y;
      private $label;
      
    //   function Point2D($x, $y)
    //   {
    //      $this->x = $x;
    //      $this->y = $y;
    //   }
      
      function setLabel($label)
      {
         $this->label = $label;
      }
      
      function getPoint()
      {
         return array("x" => $this->x, "y" => $this->y, "label" => $this->label);
      }
   }
	
   // "$label" được khai báo nhưng không được định nghĩa
   $p1 = new Point2D();
   $p1->setLabel("point #1");

   print_r($p1->getProperties());
   
   print "<br>";
   
//    $p1->setLabel("point #1");
//    print_r(get_object_vars($p1));
