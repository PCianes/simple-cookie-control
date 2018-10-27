/**
 * Block dependencies
 */
import icon from './icon';
import './style.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { InspectorControls } = wp.editor;
const { registerBlockType } = wp.blocks;
const { Spinner, withAPIData, ServerSideRender, PanelBody, RangeControl } = wp.components;

registerBlockType(
    'simple-cookie-control/block-name-dynamic',
    {
        title: __( 'Example - Dynamic Block', 'simple-cookie-control'),
        description: __( 'A look at how to build a basic dynamic block.', 'simple-cookie-control'),
        icon: {
            background: 'rgba(254, 243, 224, 0.52)',
            src: icon,
        },
        category: 'sumapress',
        edit( { attributes, setAttributes } ) {
			const { number } = attributes;
			return (
				<div>
					<ServerSideRender
						block="simple-cookie-control/block-name-dynamic"
						attributes={ attributes }
					/>
					<InspectorControls>
						<PanelBody>
							<RangeControl
								beforeIcon="arrow-left-alt2"
								afterIcon="arrow-right-alt2"
								label={ __( 'Range Control', 'simple-cookie-control' ) }
								value={ number }
								onChange={ number => setAttributes( { number } ) }
								min={ 1 }
								max={ 10 }
							/>
						</PanelBody>
					</InspectorControls>
				</div>
			);
		},
        save() {
            // Rendering in PHP
            return null;
        },
} );
