/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { Component } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody, PanelRow, RadioControl,TextControl, TextareaControl, ToggleControl } = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {

    constructor() {
        super( ...arguments );
    }

    render() {
        const { attributes: { typeCookieControl, bannerCookieControl, message, cookieClass, cookieName }, setAttributes } = this.props;
        return (
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
                    <ToggleControl
                        label={ __( 'Show or not a secundary banner as button.', 'simple-cookie-control' ) }
                        checked={ bannerCookieControl }
                        onChange={ bannerCookieControl => setAttributes( { bannerCookieControl } ) }
                    />
                </PanelBody>
                { bannerCookieControl && (
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
                            <p>{ __( 'Remember to indicate the same cookie name that you have chosen in another block ( SHOW AFTER OK COOKIES ) if you want them to be displayed / hidden under the same cookie control.', 'simple-cookie-control' ) }</p>
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
                </PanelBody>
            </InspectorControls>
        );
    }
}
