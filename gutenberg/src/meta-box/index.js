/**
 * Block dependencies
 */
import icon from './icon';
import './style.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InspectorControls, RichText } = wp.editor;
const { TextControl, PanelBody, isSelected } = wp.components;

/**
 * Register example block
 */
export default registerBlockType(
    'simple-cookie-control/meta-box',
    {
        title: __( 'Example - Meta Box', 'simple-cookie-control' ),
        description: __( 'An example of how to build a block with a meta box field.', 'simple-cookie-control'),
        category: 'simple-cookie-control',
        supports: {
            multiple: false,
        },
        icon: {
            background: 'rgba(254, 243, 224, 0.52)',
            src: icon,
        },
        keywords: [
            __( 'Meta', 'simple-cookie-control' ),
            __( 'Custom field', 'simple-cookie-control' ),
            __( 'Box', 'simple-cookie-control' ),
        ],
        attributes: {
            meta: {
                type: 'string',
                source: 'meta',
                meta: 'simple-cookie-control-meta-key-name',
            },
            text: {
                type: 'string',
                source: 'text',
                selector: 'p',
            }
        },
        edit( { attributes, className, setAttributes, isSelected } ) {
            const { text, meta } = attributes;
            return [
                <InspectorControls>
                    <PanelBody>
                        <TextControl
                            label={ __( 'Meta box', 'simple-cookie-control' ) }
                            value={ text }
                            onChange={ text => setAttributes( { text, meta: text } ) }
                        />
                    </PanelBody>
                </InspectorControls>,
                <div className={ className } >
                        <TextControl
                            label={ __( 'Meta box', 'simple-cookie-control' ) }
                            value={ text }
                            onChange={ text => setAttributes( { text, meta: text } ) }
                        />
                 </div>
            ];
        },
        save( { attributes: { text } } ){
            return (
                <p>{ text }</p>
            );
        },
    },
);
