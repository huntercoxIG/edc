<?php 
		global $cfs;
		// CFS Select Staff field on Current Page
			$currentSelect = CFS()->get('staff_contact');

		// if Select Staff on Current Pag is set
			if ( isset($currentSelect[0]) ) {
				// if true do this
				foreach ($currentSelect as $post_ID) {
					$the_post = get_post($post_ID);
					echo $the_post->post_title;
				}

				
			} else {
				// get ID of top level parent page
					$parent = array_reverse(get_post_ancestors($post->ID));
					$first_parent = get_page($parent[0]);
					$firstParentID = $first_parent->ID;

				// CFS Select Staff field on Parent Page
					$parentSelect  = $c->get('staff_contact', $firstParentID);


					echo 'The Parent ID' . '<br>';
					echo $firstParentID;

					echo '<br><br>';

					echo 'Parent Staff Contact selection' . '<br>';
					echo $parentSelect;



		  }
  ?>
