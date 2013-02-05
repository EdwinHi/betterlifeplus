<?php
/**
 * Template: Sidebar.php
 *
 * @package EvoLve
 * @subpackage Template
 */
?>
        <!--BEGIN #secondary .aside-->
        <div id="secondary" class="aside">
        
      
      
  <!-- AD Space 3 -->
  
  
    <?php $options = get_option('evolve');
     if (!empty($options['evl_space_3'])) { 
    
 $ad_space_3 = $options['evl_space_3']; 
  echo '<div class="ad-3">'.esc_attr($ad_space_3).'</div>';
 
 } 
?> 
        
        
        
			<?php	/* Widgetized Area */
					if ( !dynamic_sidebar( 'sidebar-1' )) : ?>


           <!--BEGIN #widget-bootstrap-->            
          
				<?php evlwidget_before_widget(); ?><?php evlwidget_before_title(); ?><?php _e( 'Bootstrap Examples', 'evolve' ); ?><?php evlwidget_after_title(); ?>
				<ul>

        <div class="tabbable"><!-- Only required for left/right tabs --><p></p>
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#tab1">Hero Unit</a></li>
<li><a data-toggle="tab" href="#tab2">Buttons</a></li>
<li><a data-toggle="tab" href="#tab3">Alerts</a></li>
<li><a data-toggle="tab" href="#tab4">Collapse</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab1">
<div class="hero-unit">
<h1>Hello, world!</h1>
<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
<p><a class="btn btn-primary btn-large">Learn more</a></p>
</div>
</div>
<div class="tab-pane" id="tab2">
<br />
<p><input type="button" value="Default" class="btn"> <input type="button" value="Primary" class="btn btn-primary"> <input type="button" value="Info" class="btn btn-info"> <input type="button" value="Success" class="btn btn-success"> <input type="button" value="Warning" class="btn btn-warning"> <input type="button" value="Danger" class="btn btn-danger"> <input type="button" value="Inverse" class="btn btn-inverse"></p>

<div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-primary">Left</button>
                    <button class="btn btn-primary">Middle</button>
                    <button class="btn btn-primary">Right</button>
                  </div>
<br />
<div data-toggle="buttons-radio" class="btn-group">
                    <button class="btn btn-primary">Left</button>
                    <button class="btn btn-primary">Middle</button>
                    <button class="btn btn-primary active">Right</button>
                  </div>

</div>
<div class="tab-pane" id="tab3">

<div class="alert alert-block alert-error fade in">
            <button data-dismiss="alert" class="close" type="button">&times;</button>
            <h4 class="alert-heading">Oh snap! You got an error!</h4>
            <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
            <p>
              <a href="#" class="btn btn-danger">Take this action</a> <a href="#" class="btn">Or do this</a>
            </p>
          </div>

<div class="alert"><button data-dismiss="alert" type="button" class="close">&times;</button><br>
<strong>Warning!</strong> Best check yo self, you're not looking too good.</div>
<div class="alert alert-success"><button data-dismiss="alert" type="button" class="close">&times;</button><br>
<strong>Well done!</strong> You successfully read this important alert message.</div>
<div class="alert alert-info"><button data-dismiss="alert" type="button" class="close">&times;</button><br>
<strong>Heads up!</strong> This alert needs your attention, but it's not super important.</div>
</div>

<div class="tab-pane" id="tab4">
<div id="accordion2" class="accordion">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                  Collapsible Group Item #1
                </a>
              </div>
              <div class="accordion-body in collapse" id="collapseOne" style="height: auto;">
                <div class="accordion-inner">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                  Collapsible Group Item #2
                </a>
              </div>
              <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                <div class="accordion-inner">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                  Collapsible Group Item #3
                </a>
              </div>
              <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                <div class="accordion-inner">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
 </div>
              </div>
 </div>




   </div>

</div>





				</ul>
            <?php evlwidget_after_widget(); ?>   
                <!--END #widget-bootstrap-->
                
                
                


			<?php endif; /* (!function_exists('dynamic_sidebar') */ ?>
		<!--END #secondary .aside-->
    
    
      <!-- AD Space 4 -->
  
  
    <?php $options = get_option('evolve');
     if (!empty($options['evl_space_4'])) { 
    
 $ad_space_4 = $options['evl_space_4']; 
 echo '<div class="ad-4">'.esc_attr($ad_space_4).'</div>';
 
 } 
?> 
    
    
		</div>  