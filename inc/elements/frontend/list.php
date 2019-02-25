<?php

/**
 * List element
 *
 * @param $elements
 *
 * @return array
 */
function pagex_register_list_element( $elements ) {
	$template = '<div class="pagex-list pagex-list-align d-flex flex-wrap">
		<% data.items.forEach( function(item, index) { %>
			<div class="pagex-list-item pagex-list-align">
				<% if (item.link != "") { print("<a "+item.link+"></a>") } %>
				<% if (item.icon && item.icon.length) { %>
				<div class="pagex-list-item-icon">
					<% print(pagex.genIcon("icon", item)) %>
				</div>
				<% } %>
				<div class="pagex-list-item-wrapper">
					<div class="pagex-list-item-title pagex-lang-str"><% if (item.title && item.title.length) { print(item.title) } else { %>' . __( 'List Item', 'pagex' ) . '<% } %></div>
				</div>
			</div>
			<%  if (data.items.length - 1 !== index) { %>
				<div class="pagex-list-divider"></div>
			<% } %>
		<% }); %>
	</div>';

	$elements[] = array(
		'id'          => 'list',
		'category'    => 'content',
		'title'       => __( 'List', 'pagex' ),
		'description' => __( 'List with custom style', 'pagex' ),
		'type'        => 'static',
		'template'    => $template,
		'options'     => array(
			array(
				'params' => array(
					array(
						'id'     => 'items',
						'title'  => __( 'Items', 'pagex' ),
						'type'   => 'repeater',
						'params' => array(
							array(
								'id'    => 'title',
								'title' => __( 'Title', 'pagex' ),
								'class' => 'col pagex-repeater-value',
								'type'  => 'text',
							),
							array(
								'id'       => 'icon',
								'title'    => __( 'Icon', 'pagex' ),
								'selector' => '.pagex-list-item-icon',
								'type'     => 'icon',
							),
							array(
								'id'    => 'link',
								'title' => __( 'Link', 'pagex' ),
								'type'  => 'link',
							),
						),
					),
				),
			),
			array(
				'title'  => __( 'Style', 'pagex' ),
				'params' => array(
					array(
						'id'       => 'qw',
						'title'    => __( 'Layout', 'pagex' ),
						'type'     => 'select',
						'class'    => 'col-6',
						'action'   => 'class',
						'selector' => '.pagex-list',
						'options'  => array(
							''                      => __( 'Vertical', 'pagex' ),
							'pagex-list-horizontal' => __( 'Horizontal', 'pagex' ),
						)
					),
					array(
						'id'         => 'we',
						'title'      => __( 'Alignment', 'pagex' ),
						'type'       => 'select',
						'class'      => 'col-6',
						'responsive' => true,
						'action'     => 'class',
						'selector'   => '.pagex-list-align',
						'options'    => array(
							''                            => __( 'Default', 'pagex' ),
							'justify-content[pref]start'  => __( 'Left', 'pagex' ),
							'justify-content[pref]center' => __( 'Center', 'pagex' ),
							'justify-content[pref]end'    => __( 'Right', 'pagex' ),
						)
					),

					array(
						'type'  => 'heading',
						'title' => __( 'Divider', 'pagex' ),
					),
					array(
						'id'       => 'er',
						'title'    => __( 'Margin', 'pagex' ),
						'type'     => 'dimension',
						'class'    => 'col-6',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-divider {margin: [val]}',
					),
					array(
						'id'       => 'rt',
						'title'    => __( 'Border Style', 'pagex' ),
						'type'     => 'select',
						'class'    => 'col-6',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-divider {border-style: [val]}',
						'options'  => array(
							''       => __( 'Solid', 'pagex' ),
							'double' => __( 'Double', 'pagex' ),
							'dotted' => __( 'Dotted', 'pagex' ),
							'dashed' => __( 'Dashed', 'Dashed' ),
						)
					),
					array(
						'id'          => 'ty',
						'title'       => __( 'Width', 'pagex' ),
						'description' => __( 'Width of divider for vertical layout.', 'pagex' ),
						'type'        => 'text',
						'action'      => 'css',
						'responsive'  => true,
						'class'       => 'col-4',
						'selector'    => '[el] .pagex-list-divider {width: [val]}',
					),
					array(
						'id'         => 'yu',
						'title'      => __( 'Border Width', 'pagex' ),
						'type'       => 'text',
						'action'     => 'css',
						'responsive' => true,
						'class'      => 'col-4',
						'selector'   => '[el] .pagex-list-divider {border-width: [val]}',
					),
					array(
						'id'       => 'ui',
						'title'    => __( 'Color', 'pagex' ),
						'class'    => 'col-4',
						'type'     => 'color',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-divider {border-color: [val]}',
					),

					array(
						'type'  => 'heading',
						'title' => __( 'Title', 'pagex' ),
					),
					array(
						'id'       => 'io',
						'type'     => 'typography',
						'selector' => '.pagex-list-item-title',
					),
					array(
						'id'       => 'op',
						'title'    => __( 'Color', 'pagex' ),
						'class'    => 'col-4',
						'type'     => 'color',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-item-title {color: [val]}',
					),
					array(
						'id'       => 'as',
						'title'    => __( 'Color on Hover', 'pagex' ),
						'class'    => 'col-4',
						'type'     => 'color',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-item:hover .pagex-list-item-title {color: [val]}',
					),

					array(
						'type'  => 'heading',
						'title' => __( 'Icon', 'pagex' ),
					),
					array(
						'id'         => 'sd',
						'title'      => __( 'Size', 'pagex' ),
						'type'       => 'text',
						'action'     => 'css',
						'responsive' => true,
						'class'      => 'col-6',
						'selector'   => '[el] .pagex-list-item-icon .pagex-icon {width: [val]; height: [val]; font-size: [val]}',
					),
					array(
						'id'       => 'df',
						'title'    => __( 'Margin', 'pagex' ),
						'type'     => 'dimension',
						'class'    => 'col-6',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-item-icon {margin: [val]}',
					),
					array(
						'id'       => 'fg',
						'title'    => __( 'Color', 'pagex' ),
						'class'    => 'col-4',
						'type'     => 'color',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-item-icon {color: [val]}',
					),
					array(
						'id'       => 'gh',
						'title'    => __( 'Color on Hover', 'pagex' ),
						'class'    => 'col-4',
						'type'     => 'color',
						'action'   => 'css',
						'selector' => '[el] .pagex-list-item:hover .pagex-list-item-icon {color: [val]}',
					),
				)
			),
		),
	);

	return $elements;
}