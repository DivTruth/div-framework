
			<footer class="footer" role="contentinfo">
				<?php df_footer_nav(); ?>

      			<div id="inner-footer" class="wrap clearfix">

      				<?php 
					/**
					 * df_footer hook
					 *
					 * @hooked df_copyright - 10
					 */
					do_action('df_footer'); ?>

      			</div>
			</footer>

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

    </body>

</html> <!-- end page. what a ride! -->