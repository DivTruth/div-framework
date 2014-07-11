			<?php 
			/**
			 * div_begin_footer hook
			 *
			 * @hooked div_begin_footer_container - 10
			 */
			do_action('div_begin_footer'); ?>
			    	
    			<?php # Insert footer content ?>
			    
			<?php 
			/**
			 * div_end_footer hook
			 *
			 * @hooked div_copyright() - 10
			 * @hooked div_end_footer_container - 15
			 */
			do_action('div_end_footer'); ?>

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

    </body>

</html> <!-- end page. what a ride! -->