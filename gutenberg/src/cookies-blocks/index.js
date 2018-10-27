/**
 * Block dependencies
 */
import classnames from 'classnames';
import './style.scss';
import './editor.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InnerBlocks, InspectorControls } = wp.editor;
const { RadioControl, TextareaControl, TextControl, PanelBody, PanelRow } = wp.components;

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
            __( 'hide cookies', 'simple-cookie-control' ),
            __( 'block content', 'simple-cookie-control' ),
        ],
        attributes: {
            typeCookieControl: {
                type: 'string',
                default: 'SCC_ALLOW',
            },
            cookieName: {
                type: 'string',
                default: sccMainCookieData.name
            },
            cookieValue: {
                type: 'string',
                default: 'allow'
            },
            message: {
                type: 'string',
                default: sccMainCookieData.message
            },
            cookieClass: {
                type: 'string',
                default: 'scc-secundary-cookie-button'
            },
        },
        edit( { attributes, className, setAttributes } ) {
            const { typeCookieControl, cookieName, cookieValue, message, cookieClass } = attributes;
            let borderClass;
            switch ( typeCookieControl ) {
                case 'SCC_ALLOW':
                    borderClass = 'scc-border-allow';
                    break;             
                case 'SCC_DENY':
                    borderClass = 'scc-border-deny';
                    break;
            }
            return (
                <div>
                    <InspectorControls>
                        <PanelBody>
                            <RadioControl
                                label={ __( 'Choose the type of behavior for this set of blocks.', 'simple-cookie-control' ) }
                                selected={ typeCookieControl }
                                options={ [
                                    { label: 'SHOW AFTER OK COOKIES: show the content only when cookies have been accepted.', value: 'SCC_ALLOW' },
                                    { label: 'SHOW BEFORE OK COOKIES: show the content only when cookies have not been yet accepted (or even are rejected).', value: 'SCC_DENY' },
                                ] }
                                onChange={ typeCookieControl => setAttributes( { typeCookieControl } ) }
                            />
                        </PanelBody>
                        { 'SCC_ALLOW' === typeCookieControl && (
                            <PanelBody>
                                <TextareaControl
                                    label={ __( 'Enter your message to cookie banner here:', 'simple-cookie-control' ) }
                                    help={ __( 'Message to show like a button to allow user to accept cookies of these restring content.', 'simple-cookie-control' ) }
                                    value={ message }
                                    onChange={ ( message ) => setAttributes( { message } ) }
                                />
                                <TextControl
                                    label={ __( 'Add CSS class', 'simple-cookie-control' ) }
                                    help={ __( 'Define an extra CSS class to customize the button.', 'simple-cookie-control' ) }
                                    value={ cookieClass }
                                    onChange={ cookieClass => setAttributes( { cookieClass } ) }
                                />
                            </PanelBody>
                        ) }
                        { 'SCC_DENY' === typeCookieControl && (
                            <PanelBody>
                                <PanelRow>
                                    <p>{ __( 'Remember to indicate the same cookie values that you have chosen in another block ( SHOW AFTER OK COOKIES ) if you want them to be displayed / hidden under the same cookie control.', 'simple-cookie-control' ) }</p>
                                </PanelRow>
                            </PanelBody>
                        ) }
                        <PanelBody>
                            <TextControl
                                label={ __( 'Cookie name', 'simple-cookie-control' ) }
                                help={ __( "Define other cookie if you want allow partial acceptance even though the main banner's cookies have been rejected.", 'simple-cookie-control' ) }
                                value={ cookieName }
                                onChange={ cookieName => setAttributes( { cookieName } ) }
                            />
                            <TextControl
                                label={ __( 'Cookie value (optional)', 'simple-cookie-control' ) }
                                help={ __( 'Define cookie value for your custom cookie.', 'simple-cookie-control' ) }
                                value={ cookieValue }
                                onChange={ cookieValue => setAttributes( { cookieValue } ) }
                            />
                        </PanelBody>
                    </InspectorControls>
                    <div className={ classnames( className, borderClass ) }>
                        <button>{ __( 'Show options inside the inspector', 'simple-cookie-control' ) }</button>
                        <p>{ __( 'Add within this block all inner blocks you want to show/hide depending on the acceptance of cookies.', 'simple-cookie-control' ) }</p>
                        <InnerBlocks />
                    </div>
                </div>
            );
        },
        save( { attributes : { typeCookieControl, cookieName, cookieValue, message, cookieClass } } ) {
            return (
                <div>
                    <span>[{ typeCookieControl } message="{ message }" cookie_name="{ cookieName }" cookie_value="{ cookieValue }" class="{ cookieClass }"]</span>
                        <InnerBlocks.Content />
                    <span>[/{ typeCookieControl }]</span>  
                </div>
            )
        },

    },
);