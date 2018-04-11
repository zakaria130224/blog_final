
	
<div class="slidersection templete clear">


        <div id="slider">
		<?php
            $query="SELECT * FROM slider order by id desc";
            $slider=$db->select($query);
            if ($slider) {

                while ($result=$slider->fetch_assoc()) {
                            
			?>
            <a href="<?php echo $result['link'];?>"><img src="admin/<?php echo $result['name'];?>" alt="nature 1" title="<?php echo $result['caption'];?>" /></a>
          <?php }}?> 

        </div>
        

</div>