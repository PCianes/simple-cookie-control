/**
 * Block dependencies
 */
import classnames from 'classnames';
import './editor.scss';
import attributes from './attributes';
import Inspector from './inspector';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InnerBlocks } = wp.editor;

/**
 * Register block
 */
export default registerBlockType(
    'simple-cookie-control/inner-blocks',
    {
        title: __( 'Hide/Show blocks by Cookies', 'simple-cookie-control' ),
        description: __( 'With this block you can show/hide conditional content depending on the acceptance of cookies.', 'simple-cookie-control'),
        category: 'sumapress',
        icon: 'lock',
        keywords: [
            __( 'restricted content', 'simple-cookie-control' ),
            __( 'cookies', 'simple-cookie-control' ),
            __( 'block content', 'simple-cookie-control' ),
        ],
        attributes,
        edit: props => {
            const { attributes : { typeCookieControl }, className, setAttributes } = props;
            let borderClass = ( 'SCC_ALLOW' === typeCookieControl ) ? 'scc-border-allow' : 'scc-border-deny';
            return (
                <div>
                    <Inspector { ...{ setAttributes, ...props } } />
                    <div className={ classnames( className, borderClass ) }>
                        <button>{ __( 'Show options inside the inspector', 'simple-cookie-control' ) }</button>
                        <p>{ __( 'Add within this block all inner blocks you want to show/hide depending on the acceptance of cookies.', 'simple-cookie-control' ) }</p>
                        <InnerBlocks />
                    </div>
                </div>
            );
        },
        save( { attributes : { bannerCookieControl, typeCookieControl, cookieName, message, cookieClass } } ) {
            return (
                <div>
                    <span>[{ typeCookieControl } banner="{ bannerCookieControl ? 'true' : 'false' }" message="{ message }" cookie_name="{ cookieName }" class="{ cookieClass }"]</span>
                        <InnerBlocks.Content />
                    <span>[/{ typeCookieControl }]</span>
                </div>
            )
        },

    },
);
