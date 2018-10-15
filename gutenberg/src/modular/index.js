/**
 * Block dependencies
 */
import classnames from 'classnames';
import Inspector from './inspector';
import Controls from './controls';
import Edit from './edit';
import icon from './icon';
import attributes from './attributes';
import './style.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

function getSettings( attributes ) {
    let settings = [];
    for( let attribute in attributes ) {
        let value = attributes[ attribute ];
        if( 'boolean' === typeof attributes[ attribute ] ) {
            value = value.toString();
        }
        settings.push( <li>{ attribute }: { value }</li> );
    }
    return settings;
}

/**
 * Register static block example block
 */
export default registerBlockType(
    'simple-cookie-control/inspector-control-fields',
    {
        title: __( 'Example - Inspector Fields', 'simple-cookie-control' ),
        description: __( 'An example of how to use form fields in the Inspector element.', 'simple-cookie-control'),
        category: 'simple-cookie-control',
        icon: {
            background: 'rgba(254, 243, 224, 0.52)',
            src: icon,
        },
        keywords: [
            __( 'Palette', 'simple-cookie-control' ),
            __( 'Settings', 'simple-cookie-control' ),
            __( 'Scheme', 'simple-cookie-control' ),
        ],
        attributes,
        getEditWrapperProps( attributes ) {
            const { blockAlignment } = attributes;
            if ( 'left' === blockAlignment || 'right' === blockAlignment || 'full' === blockAlignment ) {
                return { 'data-align': blockAlignment };
            }
        },
        edit: props => {
            const { attributes, className, setAttributes } = props;
			const { textAlignment, blockAlignment, message } = attributes;

            let settings = getSettings( attributes );

            return [
                <Inspector { ...{ setAttributes, ...props} } />,
				<Controls { ...{ setAttributes, ...props } }/>,
				<Edit { ...{ setAttributes, ...props } } />,
                <div
                    className={ className }
                    style={ { textAlign: textAlignment } }
                >
                    <ul>
                        { settings }
                    </ul>
                </div>
            ];
        },
        save( { attributes } ){
            const { textAlignment, blockAlignment } = attributes;

            let settings = getSettings( attributes );

            return(
                <div
                  className={ `align${blockAlignment}` }
                  style={ { textAlign: textAlignment } }
                >
                    <ul>
                        {settings}
                    </ul>
                </div>
            );
        },
    },
);
