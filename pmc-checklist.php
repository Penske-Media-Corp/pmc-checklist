<?php
/*
Plugin Name: PMC Checklist
Plugin URI:
Description: Quickly make a checklist out of an unordered list
Version: 1.0.0
Author: Corey Gilmore, BGR, PMC.
Author URI: http://pmc.com/

@change 2013-08-11 1.0.0 Initial Version

*/

class PMC_Checklist {

	public static function print_styles() {
		?>
		<style>
			input[type="checkbox"].pmc-checklist-box {
				border-width: 1px;
				border-style: solid;
				clear: none;
				cursor: pointer;
				display: inline-block;
				line-height: 0;
				height: 16px;
				margin: -4px 4px 0 0;
				outline: 0;
				padding: 0 !important;
				text-align: center;
				vertical-align: middle;
				width: 16px;
				border-radius: 0;
				-webkit-appearance: none;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
			}
			input[type=checkbox]:checked:before {
				content: '\2713';
				display: inline-block;
				float: left;
				font: normal 25px/1 'Lucida Grande';
				speak: none;
				vertical-align: middle;
				margin: -9px 0 0 -1px;
				-webkit-font-smoothing: antialiased;
			}
			input[type=checkbox],
			input[type=radio] {
				background: #fff;
				border-color: #bbb !important;
				color: #555;

				-webkit-box-shadow: inset 1px 1px 2px rgba(0,0,0,0.1);
				box-shadow: inset 1px 1px 2px rgba(0,0,0,0.1);
			}

			input[type=checkbox]:checked:before {
				color: #1e8cbe;
			}

			ul.pmc-checklist,
			ul.pmc-checklist ul {
				margin: 0 0 0 15px;
			}
			body #content .post ul.pmc-checklist li {
				list-style-type: none;
				margin: 0 0 0 36px;
			}
			#content .post ul.pmc-checklist .pmc-no-checklist-children li:before,
			#content .post ul.pmc-checklist li.pmc-no-checklist:before {
				content: '';
				display: inline-block;
				float: left;
				speak: none;
				vertical-align: middle;
				margin: 3px 4px 0 0px !important;
				height: 14px;
				width: 14px;
				-webkit-font-smoothing: antialiased;

				border: 1px solid #ccc;
				background-color: #d3d3d3;

				background-image: linear-gradient(rgba(255, 255, 255, 0.6) 50%, transparent 50%, transparent)

				background-size: 3px 3px;
				-webkit-background-size: 3px 3px;
			}
		</style>
		<?php
	}

	public static function print_scripts() {
		?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('.entry-content ul.pmc-checklist li:not(.pmc-no-checklist)').not('.pmc-no-checklist-children li').prepend('<input type="checkbox" class="pmc-checklist-box" />');
			});
		</script>
		<?php
	}

}
add_action( 'wp_print_styles', array( 'PMC_Checklist', 'print_styles' ) );
add_action( 'wp_print_footer_scripts', array( 'PMC_Checklist', 'print_scripts' ) );

// EOF
