/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { Component } = wp.element;
const {
    InspectorControls,
    ColorPalette,
} = wp.editor;
const {
    Button,
    ButtonGroup,
    CheckboxControl,
    PanelBody,
    PanelRow,
    PanelColor,
    RadioControl,
    RangeControl,
    TextControl,
    TextareaControl,
    ToggleControl,
    Toolbar,
    SelectControl
} = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {

    constructor() {
        super( ...arguments );
    }

    render() {
        const { attributes: { checkboxControl, colorPaletteControl, radioControl, rangeControl, textControl, textareaControl, toggleControl, selectControl }, setAttributes } = this.props;

        return (
            <InspectorControls>
                <PanelBody
                    title={ __( 'Panel Body Title', 'simple-cookie-control' ) }
                    initialOpen={ false }
                >
                    <PanelRow>
                        <p>{ __( 'Panel Body Copy', 'simple-cookie-control' ) }</p>
                    </PanelRow>
                </PanelBody>

                <PanelBody>
                    <CheckboxControl
                        heading={ __( 'Checkbox Control', 'simple-cookie-control' ) }
                        label={ __( 'Check here', 'simple-cookie-control' ) }
                        help={ __( 'Checkbox control help text', 'simple-cookie-control' ) }
                        checked={ checkboxControl }
                        onChange={ checkboxControl => setAttributes( { checkboxControl } ) }
                    />
                </PanelBody>

                <PanelColor
                    title={ __( 'Color Panel', 'simple-cookie-control' ) }
                    colorValue={ colorPaletteControl }
                >
                    <ColorPalette
                        value={ colorPaletteControl }
                        onChange={ colorPaletteControl => setAttributes( { colorPaletteControl } ) }
                    />
                </PanelColor>

                <PanelBody>
                    <RadioControl
                        label={ __( 'Radio Control', 'simple-cookie-control' ) }
                        selected={ radioControl }
                        options={ [
                            { label: 'Author', value: 'a' },
                            { label: 'Editor', value: 'e' },
                        ] }
                        onChange={ radioControl => setAttributes( { radioControl } ) }
                    />
                </PanelBody>

                <PanelBody>
                    <RangeControl
                        beforeIcon="arrow-left-alt2"
                        afterIcon="arrow-right-alt2"
                        label={ __( 'Range Control', 'simple-cookie-control' ) }
                        value={ rangeControl }
                        onChange={ rangeControl => setAttributes( { rangeControl } ) }
                        min={ 1 }
                        max={ 10 }
                    />
                </PanelBody>

                <PanelBody>
                    <TextControl
                        label={ __( 'Text Control', 'simple-cookie-control' ) }
                        help={ __( 'Text control help text', 'simple-cookie-control' ) }
                        value={ textControl }
                        onChange={ textControl => setAttributes( { textControl } ) }
                    />
                </PanelBody>

                <PanelBody>
                    <TextareaControl
                        label={ __( 'Text Area Control', 'simple-cookie-control' ) }
                        help={ __( 'Text area control help text', 'simple-cookie-control' ) }
                        value={ textareaControl }
                        onChange={ textareaControl => setAttributes( { textareaControl } ) }
                    />
                </PanelBody>

                <PanelBody>
                    <ToggleControl
                        label={ __( 'Toggle Control', 'simple-cookie-control' ) }
                        checked={ toggleControl }
                        onChange={ toggleControl => setAttributes( { toggleControl } ) }
                    />
                </PanelBody>

                <PanelBody>
                    <SelectControl
                        label={ __( 'Select Control', 'simple-cookie-control' ) }
                        value={ selectControl }
                        options={ [
                            { value: 'a', label: __( 'Option A', 'simple-cookie-control' ) },
                            { value: 'b', label: __( 'Option B', 'simple-cookie-control' ) },
                            { value: 'c', label: __( 'Option C', 'simple-cookie-control' ) },
                        ] }
                        onChange={ selectControl => setAttributes( { selectControl } ) }
                    />
                </PanelBody>

            </InspectorControls>
        );
    }
}
