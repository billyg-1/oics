<?php
/**
 * PALLIKOODAM Theme Customizer Control: Typography
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PALLIKOODAM_Customize_Control_Typography extends WP_Customize_Control {

	public $type       = 'dt-typography';
	public $dependency = array();
	
	/**
	 * Enqueue control related scripts/styles.
	 * 
	 */
	public function enqueue() {

		wp_enqueue_script( 'pallikoodam-typography-control', PALLIKOODAM_THEME_URI . '/inc/customizer/controls/typography/typography.js', array( 'jquery', 'customize-base' ), PALLIKOODAM_THEME_VERSION, true );
		wp_enqueue_style( 'pallikoodam-typography-control',  PALLIKOODAM_THEME_URI . '/inc/customizer/controls/typography/typography.css', null, PALLIKOODAM_THEME_VERSION );

		$typo_localize = array(
			'inherit' => esc_html__( 'Inherit', 'pallikoodam' ),
			'100'     => esc_html__( 'Thin 100', 'pallikoodam' ),
			'200'     => esc_html__( 'Extra-Light 200', 'pallikoodam' ),
			'300'     => esc_html__( 'Light 300', 'pallikoodam' ),
			'400'     => esc_html__( 'Normal 400', 'pallikoodam' ),
			'500'     => esc_html__( 'Medium 500', 'pallikoodam' ),
			'600'     => esc_html__( 'Semi-Bold 600', 'pallikoodam' ),
			'700'     => esc_html__( 'Bold 700', 'pallikoodam' ),
			'800'     => esc_html__( 'Extra-Bold 800', 'pallikoodam' ),
			'900'     => esc_html__( 'Ultra-Bold 900', 'pallikoodam' ),
		);

		wp_localize_script( 'pallikoodam-typography-control', 'dtTypoObject', $typo_localize );
	}

	/**
	 * Get a specific property of an array without needing to check if that property exists.
	 *
	 * Provide a default value if you want to return a specific value if the property is not set.
	 *
	 * @param array  $array   Array from which the property's value should be retrieved.
	 * @param string $prop    Name of the property to be retrieved.
	 * @param string $default Optional. Value that should be returned if the property is not set or empty. Defaults to null.
	 *
	 * @return null|string|mixed The value
	 */
	public function fonts_util( $array, $prop, $default = null ) {

		if ( ! is_array( $array ) && ! ( is_object( $array ) && $array instanceof ArrayAccess ) ) {
			return $default;
		}

		if ( isset( $array[ $prop ] ) ) {
			$value = $array[ $prop ];
		} else {
			$value = '';
		}

		return empty( $value ) && null !== $default ? $default : $value;
	}	

	/**
	 * Get the data to export to the client via JSON.
	 *
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		$val = maybe_unserialize( $this->value() );
		if ( ! is_array( $val ) ) {
			$val = array();
		}

		$choices = maybe_unserialize( $this->choices );

		if ( ! is_array( $choices ) || empty( $choices ) ) {

			$this->choices = array(
				'font_family'     => esc_html__( 'Font Family', 'pallikoodam'),
				'font_weight'     => esc_html__( 'Font Weight', 'pallikoodam'),
				'text_transform'  => esc_html__( 'Text Transform', 'pallikoodam'),
				'text_align'      => esc_html__( 'Text Align', 'pallikoodam'),
				'text_decoration' => esc_html__( 'Text Decoration', 'pallikoodam'),
				'font_style'      => esc_html__( 'Font Style', 'pallikoodam'),
				'font_size'       => esc_html__( 'Font Size', 'pallikoodam'),
				'line_height'     => esc_html__( 'Line Height', 'pallikoodam'),
				'letter_spacing'  => esc_html__( 'Letter Spacing', 'pallikoodam'),
			);
		}

		$this->json['value']   = $val;
		$this->json['id']      = $this->id;
		$this->json['label']   = esc_html( $this->label );
		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();

		$system_fonts = array();
		foreach ( PALLIKOODAM_Font_Families::get_system_fonts() as $name => $value ) {

			$fallback = $value['fallback'];
			$weights  = implode(",", $value['weights'] );

			$system_fonts[ $name ] = array(
				'fallback' => $name .', '. $fallback,
				'weights'  => $weights,
			);
		}
		$this->json['system_fonts'] = $system_fonts;

		$custom_fonts = array();
		if( is_array(PALLIKOODAM_Font_Families::get_custom_fonts()) && !empty(PALLIKOODAM_Font_Families::get_custom_fonts()) ) {

			foreach ( PALLIKOODAM_Font_Families::get_custom_fonts() as $name => $value ) {

				$fallback = $value['fallback'];

				$custom_fonts[ $name ] = array(
					'fallback' => $name .', '. $fallback
				);
			}
			$this->json['custom_fonts'] = $custom_fonts;

		}

		$google_fonts = array();
		if( is_array(PALLIKOODAM_Font_Families::get_google_fonts()) && !empty(PALLIKOODAM_Font_Families::get_google_fonts()) ) {

			foreach ( PALLIKOODAM_Font_Families::get_google_fonts() as $name => $single_font ) { 

				# google-fonts-1.json
				$category = $this->fonts_util( $single_font, '0' );
				$variants = $this->fonts_util( $single_font, '1' );
				$weights  = implode(",", $variants );

				$google_fonts[ $name ] = array(
					'fallback' => "'".$name ."', ". $category,
					'weights'  => $weights,
				);
			}
			$this->json['google_fonts'] = $google_fonts;	
			
		}

	}

	/**
	 * Renders the control wrapper and calls $this->render_content() for the internals.
	 */
	protected function render() {

		$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
		$class = 'customize-control has-responsive-switchers customize-control-' . $this->type;

		$d_controller = $d_condition = $d_value = '';
		$dependency   = $this->dependency;
		if( !empty( $dependency ) ) {
			$d_controller = "data-controller='" . esc_attr( $dependency[0] )."'";
			$d_condition  = "data-condition='" . esc_attr( $dependency[1] )."'";
			$d_value      = "data-value='". esc_attr( $dependency[2] )."'";
		}

		printf( '<li id="%s" class="%s" %s %s %s>', esc_attr( $id ), esc_attr( $class ), $d_controller, $d_condition, $d_value );
		$this->render_content();
		echo '</li>';
	}	

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<span class="customize-control-title">
			<#  if ( data.label ) { #>
				<label> <span>{{{ data.label }}}</span> </label>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>			
		</span>
		<div class="wrapper">

			<# if( !_.isUndefined( data.choices['font_family'] ) ) { #>
			<div class="full-width">
				<span class="customize-control-title">
					<label>{{{  data.choices['font_family'] }}}</label>
				</span>

				<select class="font-family">
					<option value="inherit"><?php esc_html_e( 'Inherit', 'pallikoodam' );?></option>
					<optgroup label="<?php esc_html_e( 'Other System Fonts', 'pallikoodam' );?>">
						<# _.each( data.system_fonts, function( element, index ) { #>
							<option
								value = "{{{ index }}}"
								data-fallback = "{{{ element.fallback }}}"
								data-weight = "{{{ element.weights }}}"
								data-fonttype ="system"
								<# if( data.value['font-family'] === index ) { #>selected<#}#>
							>{{{ index }}}</option>
						<# }); #>
					</optgroup>

					<optgroup label="<?php esc_html_e( 'Custom Fonts', 'pallikoodam' );?>">
						<# _.each( data.custom_fonts, function( element, index ) { #>
							<option
								value = "{{{ index }}}"
								data-fallback = "{{{ element.fallback }}}"
								data-weight = "{{{ element.weights }}}"
								data-fonttype ="custom"
								<# if( data.value['font-family'] === index ) { #>selected<#}#>
							>{{{ index }}}</option>
						<# }); #>
					</optgroup>

					<optgroup label="<?php esc_html_e( 'Google', 'pallikoodam' );?>">
						<# _.each( data.google_fonts, function( element, index ) { #>
							<option
								value = "{{{ index }}}"
								data-fallback = "{{{ element.fallback }}}"
								data-weight = "{{{ element.weights }}}"
								data-fonttype ="google"								
								<# if( data.value['font-family'] === index ) { #>selected<#}#>
							>{{{ index }}}</option>
						<# }); #>
					</optgroup>
				</select>
			</div>
			<# } #>

			<div class="full-width">

				<# if( !_.isUndefined( data.choices['font_weight'] ) ) { #>
					<div class="one-half">
						<span class="customize-control-title">
							<label>{{{  data.choices['font_weight'] }}}</label>
						</span>
						<select class="font-weight">
							<option value="inherit"><?php esc_html_e( 'Inherit', 'pallikoodam' );?></option>
						</select>
					</div>
				<# } #>

				<# if( !_.isUndefined( data.choices['font_style'] ) ) { #>
					<div class="one-half">
						<span class="customize-control-title">
							<label>{{{  data.choices['font_style'] }}}</label>
						</span>
						<select class="font-style">
							<option value=""<# if ( '' === data.value['font-style'] ) { #>selected<# } #>></option>
							<option value="normal"<# if ( 'none' === data.value['font-style'] ) { #>selected<# } #>><?php esc_attr_e( 'Normal', 'pallikoodam' ); ?></option>
							<option value="italic"<# if ( 'italic' === data.value['font-style'] ) { #>selected<# } #>><?php esc_attr_e( 'Italic', 'pallikoodam' ); ?></option>
							<option value="oblique"<# if ( 'oblique' === data.value['font-style'] ) { #>selected<# } #>><?php esc_attr_e( 'Oblique', 'pallikoodam' ); ?></option>
							<option value="inherit"<# if ( 'inherit' === data.value['font-style'] ) { #>selected<# } #>><?php esc_attr_e( 'Inherit', 'pallikoodam' ); ?></option>
						</select>
					</div>
				<# } #>
			</div>

			<# if( !_.isUndefined( data.choices['text_transform'] ) ) { #>
				<div class="full-width">
					<span class="customize-control-title">
						<label>{{{  data.choices['text_transform'] }}}</label>
					</span>
					<select class="text-transform">
						<option value=""<# if ( '' === data.value['text-transform'] ) { #>selected<# } #>></option>
						<option value="none"<# if ( 'none' === data.value['text-transform'] ) { #>selected<# } #>><?php esc_attr_e( 'None', 'pallikoodam' ); ?></option>
						<option value="capitalize"<# if ( 'capitalize' === data.value['text-transform'] ) { #>selected<# } #>><?php esc_attr_e( 'Capitalize', 'pallikoodam' ); ?></option>
						<option value="uppercase"<# if ( 'uppercase' === data.value['text-transform'] ) { #>selected<# } #>><?php esc_attr_e( 'Uppercase', 'pallikoodam' ); ?></option>
						<option value="lowercase"<# if ( 'lowercase' === data.value['text-transform'] ) { #>selected<# } #>><?php esc_attr_e( 'Lowercase', 'pallikoodam' ); ?></option>
						<option value="initial"<# if ( 'initial' === data.value['text-transform'] ) { #>selected<# } #>><?php esc_attr_e( 'Initial', 'pallikoodam' ); ?></option>
						<option value="inherit"<# if ( 'inherit' === data.value['text-transform'] ) { #>selected<# } #>><?php esc_attr_e( 'Inherit', 'pallikoodam' ); ?></option>
					</select>
				</div>
			<# } #>

			<div class="full-width">
				<# if( !_.isUndefined( data.choices['text_align'] ) ) { #>
					<div class="one-half">
						<span class="customize-control-title">
							<label>{{{  data.choices['text_align'] }}}</label>
						</span>
						<select class="text-align">
							<option value=""<# if ( '' === data.value['text-align'] ) { #>selected<# } #>></option>
							<option value="unset"<# if ( 'unset' === data.value['text-align'] ) { #>selected<# } #>><?php esc_attr_e( 'Unset', 'pallikoodam' ); ?></option>
							<option value="left"<# if ( 'left' === data.value['text-align'] ) { #>selected<# } #>><?php esc_attr_e( 'Left', 'pallikoodam' ); ?></option>
							<option value="center"<# if ( 'center' === data.value['text-align'] ) { #>selected<# } #>><?php esc_attr_e( 'Center', 'pallikoodam' ); ?></option>
							<option value="right"<# if ( 'right' === data.value['text-align'] ) { #>selected<# } #>><?php esc_attr_e( 'Right', 'pallikoodam' ); ?></option>
							<option value="justify"<# if ( 'justify' === data.value['text-align'] ) { #>selected<# } #>><?php esc_attr_e( 'Justify', 'pallikoodam' ); ?></option>
							<option value="inherit"<# if ( 'inherit' === data.value['text-align'] ) { #>selected<# } #>><?php esc_attr_e( 'Inherit', 'pallikoodam' ); ?></option>
						</select>
					</div>
				<# } #>

				<# if( !_.isUndefined( data.choices['text_decoration'] ) ) { #>
					<div class="one-half">
						<span class="customize-control-title">
							<label>{{{  data.choices['text_decoration'] }}}</label>
						</span>
						<select class="text-decoration">
							<option value=""<# if ( '' === data.value['text-decoration'] ) { #>selected<# } #>></option>
							<option value="none"<# if ( 'none' === data.value['text-decoration'] ) { #>selected<# } #>><?php esc_attr_e( 'None', 'pallikoodam' ); ?></option>
							<option value="underline"<# if ( 'underline' === data.value['text-decoration'] ) { #>selected<# } #>><?php esc_attr_e( 'Underline', 'pallikoodam' ); ?></option>
							<option value="overline"<# if ( 'overline' === data.value['text-decoration'] ) { #>selected<# } #>><?php esc_attr_e( 'Overline', 'pallikoodam' ); ?></option>
							<option value="line-through"<# if ( 'line-through' === data.value['text-decoration'] ) { #>selected<# } #>><?php esc_attr_e( 'Line Through', 'pallikoodam' ); ?></option>
							<option value="inherit"<# if ( 'inherit' === data.value['text-decoration'] ) { #>selected<# } #>><?php esc_attr_e( 'Inherit', 'pallikoodam' ); ?></option>
						</select>
					</div>				
				<# } #>				
			</div>

			<div class="full-width font-size">
				<# if( !_.isUndefined( data.choices['font_size'] ) ) { #>
					<span class="customize-control-title">
						<label>{{{  data.choices['font_size'] }}}</label>
						<ul class="dt-typography-switcher dt-responsive-switchers">
							<li class="desktop active">
								<button type="button" class="preview-desktop active" data-device="desktop">
									<i class="dashicons dashicons-desktop"></i>
								</button>
							</li>
							<li class="tablet-landscape">
								<button type="button" class="preview-tablet-landscape" data-device="tablet-landscape">
									<i class="dashicons dashicons-tablet"></i>
								</button>
							</li>
							<li class="tablet">
								<button type="button" class="preview-tablet" data-device="tablet">
									<i class="dashicons dashicons-tablet"></i>
								</button>
							</li>	
							<li class="mobile">
								<button type="button" class="preview-mobile" data-device="mobile">
									<i class="dashicons dashicons-smartphone"></i>
								</button>
							</li>
						</ul>
						<span class="item-reset dashicons dashicons-image-rotate"></span>
					</span>

					<div class="desktop control-wrap active">
						<input type="number" data-id='desktop' class="dt-responsive-input" value="{{{ data.value['fs-desktop'] }}}"/>
						<select class="dt-responsive-select" data-id='desktop-unit'>
							<option value="px" <# if ( data.value['fs-desktop-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['fs-desktop-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>

					<div class="tablet control-wrap">
						<input type="number" data-id='tablet' class="dt-responsive-input" value="{{{ data.value['fs-tablet'] }}}"/>
						<select class="dt-responsive-select" data-id='tablet-unit'>
							<option value="px" <# if ( data.value['fs-tablet-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['fs-tablet-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>

					<div class="tablet-landscape control-wrap">
						<input type="number" data-id='tablet-landscape' class="dt-responsive-input" value="{{{ data.value['fs-tablet-landscape'] }}}"/>
						<select class="dt-responsive-select" data-id='tablet-ls-unit'>
							<option value="px" <# if ( data.value['fs-tablet-ls-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['fs-tablet-ls-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>					

					<div class="mobile control-wrap">
						<input type="number" data-id='mobile' class="dt-responsive-input" value="{{{ data.value['fs-mobile'] }}}"/>
						<select class="dt-responsive-select" data-id='mobile-unit'>
							<option value="px" <# if ( data.value['fs-mobile-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['fs-mobile-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>
				<# } #>								
			</div>

			<# if( !_.isUndefined( data.choices['line_height'] ) ) { #>
				<div class="line-height full-width">
					<span class="customize-control-title">
						<label>{{{  data.choices['line_height'] }}}</label>
						<ul class="dt-typography-switcher dt-responsive-switchers">
							<li class="desktop active">
								<button type="button" class="preview-desktop active" data-device="desktop">
									<i class="dashicons dashicons-desktop"></i>
								</button>
							</li>
							<li class="tablet-landscape">
								<button type="button" class="preview-tablet-landscape" data-device="tablet-landscape">
									<i class="dashicons dashicons-tablet"></i>
								</button>
							</li>
							<li class="tablet">
								<button type="button" class="preview-tablet" data-device="tablet">
									<i class="dashicons dashicons-tablet"></i>
								</button>
							</li>							
							<li class="mobile">
								<button type="button" class="preview-mobile" data-device="mobile">
									<i class="dashicons dashicons-smartphone"></i>
								</button>
							</li>
						</ul>
						<span class="item-reset dashicons dashicons-image-rotate"></span>
					</span>

					<div class="desktop control-wrap active">
						<div class="input-field-range">
							<input type="range" class="range-field" data-id='desktop' value="{{{ data.value['lh-desktop'] }}}"/>
						</div>
						<div class="dt-slider-range-value">
							<input type="number" class="number-field" data-id='desktop' value="{{{ data.value['lh-desktop'] }}}"/>
						</div>
					</div>

					<div class="tablet control-wrap">
						<div class="input-field-range">
							<input type="range" class="range-field" data-id='tablet' value="{{{ data.value['lh-tablet'] }}}"/>
						</div>
						<div class="dt-slider-range-value">
							<input type="number" class="number-field" data-id='tablet' value="{{{ data.value['lh-tablet'] }}}"/>
						</div>
					</div>

					<div class="tablet-landscape control-wrap">
						<div class="input-field-range">
							<input type="range" class="range-field" data-id='tablet-landscape' value="{{{ data.value['lh-tablet-landscape'] }}}"/>
						</div>
						<div class="dt-slider-range-value">
							<input type="number" class="number-field" data-id='tablet-landscape' value="{{{ data.value['lh-tablet-landscape'] }}}"/>
						</div>
					</div>					

					<div class="mobile control-wrap">
						<div class="input-field-range">
							<input type="range" class="range-field" data-id='mobile' value="{{{ data.value['lh-mobile'] }}}"/>
						</div>
						<div class="dt-slider-range-value">
							<input type="number" class="number-field" data-id='mobile' value="{{{ data.value['lh-mobile'] }}}"/>
						</div>
					</div>
				</div>
			<# } #>

			<# if( !_.isUndefined( data.choices['letter_spacing'] ) ) { #>
				<div class="letter-spacing full-width">
					<span class="customize-control-title">
						<label>{{{  data.choices['letter_spacing'] }}}</label>
						<ul class="dt-typography-switcher dt-responsive-switchers">
							<li class="desktop active">
								<button type="button" class="preview-desktop active" data-device="desktop">
									<i class="dashicons dashicons-desktop"></i>
								</button>
							</li>
							<li class="tablet-landscape">
								<button type="button" class="preview-tablet-landscape" data-device="tablet-landscape">
									<i class="dashicons dashicons-tablet"></i>
								</button>
							</li>
							<li class="tablet">
								<button type="button" class="preview-tablet" data-device="tablet">
									<i class="dashicons dashicons-tablet"></i>
								</button>
							</li>							
							<li class="mobile">
								<button type="button" class="preview-mobile" data-device="mobile">
									<i class="dashicons dashicons-smartphone"></i>
								</button>
							</li>
						</ul>
						<span class="item-reset dashicons dashicons-image-rotate"></span>						
					</span>

					<div class="desktop control-wrap active">
						<input type="number" data-id='desktop' class="dt-responsive-input" min="0" max="2" step="0.1" value="{{{ data.value['ls-desktop'] }}}"/>
						<select class="dt-responsive-select" data-id='desktop-unit'>
							<option value="px" <# if ( data.value['ls-desktop-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['ls-desktop-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>

					<div class="tablet control-wrap">
						<input type="number" data-id='tablet' class="dt-responsive-input" min="0" max="2" step="0.1" value="{{{ data.value['ls-tablet'] }}}"/>
						<select class="dt-responsive-select" data-id='tablet-unit'>
							<option value="px" <# if ( data.value['ls-tablet-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['ls-tablet-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>

					<div class="tablet-landscape control-wrap">
						<input type="number" data-id='tablet-landscape' class="dt-responsive-input" min="0" max="2" step="0.1" value="{{{ data.value['ls-tablet-landscape'] }}}"/>
						<select class="dt-responsive-select" data-id='tablet-ls-unit'>
							<option value="px" <# if ( data.value['ls-tablet-ls-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['ls-tablet-ls-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>					

					<div class="mobile control-wrap">
						<input type="number" data-id='mobile' class="dt-responsive-input" min="0" max="2" step="0.1" value="{{{ data.value['ls-mobile'] }}}"/>
						<select class="dt-responsive-select" data-id='mobile-unit'>
							<option value="px" <# if ( data.value['ls-mobile-unit'] === 'px' ) { #> selected="selected" <# } #>>px</option>
							<option value="em" <# if ( data.value['ls-mobile-unit'] === 'em' ) { #> selected="selected" <# } #>>em</option>
						</select>
					</div>
				</div>
			<# } #>

			<input class="typography-hidden-value" type="hidden" {{{ data.link }}}>
		</div>
		<?php
	}		
}