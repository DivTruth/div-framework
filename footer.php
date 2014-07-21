			<?php 
			/**
			 * df_begin_footer hook
			 *
			 * @hooked df_begin_footer_container - 10
			 */
			do_action('df_begin_footer'); ?>
			    	
    			<?php # Insert footer content ?>

    			<?php $df_copyright ?>
			    
			<?php 
			/**
			 * df_end_footer hook
			 *
			 * @hooked df_copyright() - 10
			 * @hooked df_end_footer_container - 15
			 */
			do_action('df_end_footer'); ?>

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

    </body>

</html> <!-- end page. what a ride! -->