
<?php ini_set('display_errors',0); 




?>



    






    <!-- SLIDER 5.0 -->
	  
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
     
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
    $i=1;foreach($sliderposts->result() as $key=>$val){ if($i==1){$class="active";}else{$class="";}?>
      <div class="item <?php echo $class; ?>">
        <img src="<? echo base_url().$val->thumbnail_path ?>" alt="<?php echo $val->alttext; ?>" title="<?php echo $val->page_name; ?>">
      </div>
      <?php
    $i++; }
      ?>

    <!--  <div class="item">
        <img src="img_flower.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beautiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="img_flower2.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beautiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>-->
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <img class="slider_arrow" alt="left arrow" title="Left Navigation" src="<?php echo base_url();?>/assets/nagpur/images/arrow-left.png" >  
      <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
      <!--<span class="sr-only">Previous</span>-->
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <img class="slider_arrow" alt="right arrow" title="right Navigation" src="<?php echo base_url();?>/assets/nagpur/images/arrow-right.png" >  
      <!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
      <!--<span class="sr-only">Next</span>-->
    </a>
  </div>
  
	  
  <div class="clearfix"></div>

    <!-- SLIDER WRAPPER -->











<?php 
$content="";
$previoud_divcode=0;
$i=1;
$j=1;
$k=1;



foreach($customepagelayouts->result() as $key=>$val){
    
     if($val->is_in_loop_section=='1')
    {
    
    if($i==1)
    {
       if($val->page_layout_id ==1 || $val->page_layout_id==2 || $val->page_layout_id==3 || $val->page_layout_id >= 6 )
        {
           
            $content.="<div class=''>";
            $j++;
        }
         
    }
    
    

     if(($val->page_layout_id ==1 || $val->page_layout_id==2 || $val->page_layout_id==3) || $val->page_layout_id >= 6)
    {
        if($j==1)
        {
            $content.="<div class='container bg3'>";
        }
        
        if($val->page_layout_id==6)
        {
            $content.="<div class='myfooter'>";
        }
        
        if($val->page_layout_id ==1 || $val->page_layout_id==2 || $val->page_layout_id==3)
        {
            if($k==1)
            {
                $content.="<div style='background-color: #fff;'>"; // open div for left, middle, right section
            }
            $k++;
        }
        else if($val->page_layout_id ==10)
        {
           
            $content.="<div class='main_mission'><div class='container bg1'>";
        }
        
        
        
        
        
        $previoud_divcode=1;
        $content.="<div class='".$val->source."'>";
        foreach($layoutwidgets[$val->page_layout_id] as $key2=>$val2){
            $content.=$val2;
        }
        
         if($val->page_layout_id ==10)
            {
                $content.="</div>";
                $content.="</div>";
            }
        $content.="</div>";
        
        
        
         
        
       
        $j++;
    }
    else
    {
        if($val->page_layout_id !=5 && $val->page_layout_id !=6)
            {
                if($previoud_divcode==1)
                {
                $content.="</div>"; // closing div for left, middle, right section
                $content.="</div>"; // div close for container bg3
                
                }
                $content.="<div class='".$val->source."'>";
                foreach($layoutwidgets[$val->page_layout_id] as $key2=>$val2){
                    $content.=$val2;
                }
                $content.="</div>";
            }
    }
    $i++;

 }
}
 echo str_replace("/assets",base_url()."assets",$content);
 //echo $content;
 ?>
 

    
</div><!-- /#page -->
</div><!-- /#wrapper -->
 
 









