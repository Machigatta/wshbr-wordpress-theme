
<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
    <input id="s" type="text" name="s" onblur="if (this.value == '') 
{this.value = 'Was suchst du?..';}" onfocus="if
 (this.value = 'Was suchst du?..')
 {this.value = '';}" value="Was suchst du?..">
    
    <button type="submit" id="searchsubmit" ><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</form>