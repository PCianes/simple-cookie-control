!function(e){function t(l){if(n[l])return n[l].exports;var o=n[l]={i:l,l:!1,exports:{}};return e[l].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,l){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:l})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=1)}([function(e,t,n){var l,o;!function(){"use strict";function n(){for(var e=[],t=0;t<arguments.length;t++){var l=arguments[t];if(l){var o=typeof l;if("string"===o||"number"===o)e.push(l);else if(Array.isArray(l)&&l.length){var a=n.apply(null,l);a&&e.push(a)}else if("object"===o)for(var i in l)r.call(l,i)&&l[i]&&e.push(i)}}return e.join(" ")}var r={}.hasOwnProperty;"undefined"!==typeof e&&e.exports?(n.default=n,e.exports=n):(l=[],void 0!==(o=function(){return n}.apply(t,l))&&(e.exports=o))}()},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var l=n(2);n.n(l),n(3),n(7),n(10),n(13),n(16)},function(e,t){wp.i18n.setLocaleData({"":{}},"simple-cookie-control")},function(e,t,n){"use strict";var l=n(0),o=n.n(l),r=n(4),a=n(5),i=(n.n(a),n(6)),c=(n.n(i),wp.i18n.__),p=wp.blocks.registerBlockType,m=wp.editor,u=m.RichText,s=m.AlignmentToolbar,g=m.BlockControls,w=m.BlockAlignmentToolbar,h=wp.components,f=(h.Dashicon,h.Toolbar),b=h.Button,d=h.Tooltip;p("simple-cookie-control/custom-toolbar",{title:c("Basic example with toolbar","simple-cookie-control"),description:c("An example of how to add a custom buttom to the block toolbar.","simple-cookie-control"),category:"simple-cookie-control",icon:{background:"rgba(254, 243, 224, 0.52)",src:r.a},keywords:[c("Button","simple-cookie-control"),c("Settings","simple-cookie-control"),c("Controls","simple-cookie-control")],attributes:{alignment:{type:"string"},blockAlignment:{type:"string"},highContrast:{type:"boolean",default:!1},message:{type:"array",source:"children",selector:".message-body"}},edit:function(e){var t=e.attributes,n=e.className,l=e.setAttributes,a=t.alignment,i=t.blockAlignment,p=t.message,m=t.highContrast;return wp.element.createElement("div",{className:o()(n,{"high-contrast":m})},wp.element.createElement(g,{key:"custom-controls"},wp.element.createElement(w,{value:i,onChange:function(e){return l({blockAlignment:e})}}),wp.element.createElement(s,{value:a,onChange:function(e){return l({alignment:e})}}),wp.element.createElement(f,null,wp.element.createElement(d,{text:c("High Contrast","simple-cookie-control")},wp.element.createElement(b,{className:o()("components-icon-button","components-toolbar__control",{"is-active":m}),onClick:function(){return l({highContrast:!m})}},r.a)))),wp.element.createElement(u,{tagName:"div",multiline:"p",placeholder:c("Enter your message here..","simple-cookie-control"),value:p,className:o()("message-body",{"high-contrast":m}),style:{textAlign:a},onChange:function(e){return l({message:e})}}))},save:function(e){var t=e.attributes,n=t.highContrast,l=t.alignment,r=t.message;return wp.element.createElement("div",{className:o()("message-body",{"high-contrast":n}),style:{textAlign:l}},r)}})},function(e,t,n){"use strict";var l=wp.element.createElement("svg",{width:"20px",height:"20px",viewBox:"0 0 100 100",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("path",{d:"m5 95h90v-90h-90zm10-70h10v-10h10v10h10v10h-10v10h-10v-10h-10zm70-10v70h-70z"}),wp.element.createElement("path",{d:"m45 65h30v10h-30z"}));t.a=l},function(e,t){},function(e,t){},function(e,t,n){"use strict";var l=n(8),o=n(9),r=(n.n(o),wp.i18n.__),a=wp.blocks.registerBlockType,i=wp.components,c=i.Spinner,p=i.withAPIData;i.ServerSideRender;a("simple-cookie-control/block-name-dynamic",{title:r("Example - Dynamic Block","simple-cookie-control"),description:r("A look at how to build a basic dynamic block.","simple-cookie-control"),icon:{background:"rgba(254, 243, 224, 0.52)",src:l.a},category:"simple-cookie-control",edit:p(function(e){return{posts:"/wp/v2/posts?per_page=3"}})(function(e){var t=e.posts,n=e.className;e.isSelected,e.setAttributes;return t.data?0===t.data.length?wp.element.createElement("p",null,r("No Posts","simple-cookie-control")):wp.element.createElement("ul",{className:n},t.data.map(function(e){return wp.element.createElement("li",null,wp.element.createElement("a",{className:n,href:e.link},e.title.rendered))})):wp.element.createElement("p",{className:n},wp.element.createElement(c,null),r("Loading Posts","simple-cookie-control"))}),save:function(){return null}})},function(e,t,n){"use strict";var l=wp.element.createElement("svg",{width:"20px",height:"20px",viewBox:"0 0 100 100",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("path",{d:"m40.621 52h25.891c0.96484 6.3594 6.4258 11.254 13.02 11.254 7.2695 0 13.188-5.9453 13.188-13.254s-5.918-13.254-13.188-13.254c-6.5938 0-12.055 4.8945-13.02 11.254h-25.961c-0.23047-1.6797-0.70312-3.3164-1.4141-4.8516l24.684-14.328c2.4805 3.1055 6.2695 4.9727 10.297 4.9727 2.3047 0 4.582-0.61328 6.5859-1.7773 6.2891-3.6523 8.4531-11.77 4.8242-18.098-2.3555-4.0977-6.7383-6.6367-11.441-6.6367-2.3047 0-4.582 0.61328-6.5859 1.7773-5.707 3.3125-8.0039 10.297-5.6719 16.285l-24.805 14.398c-1.2578-1.5781-2.8086-2.9609-4.6562-4.0312-2.5391-1.4766-5.4297-2.2578-8.3516-2.2578-5.9648 0-11.523 3.2227-14.5 8.4102-4.6055 8.0234-1.8633 18.32 6.1172 22.953 2.543 1.4766 5.4297 2.2578 8.3516 2.2578 5.2578 0 10.195-2.5078 13.336-6.6523l24.508 14.23c-2.3281 5.9922-0.035156 12.973 5.6719 16.285 2.0039 1.1641 4.2812 1.7773 6.5859 1.7773 4.7031 0 9.0859-2.543 11.438-6.6328 3.6328-6.3242 1.4688-14.441-4.8242-18.098-2.0039-1.1641-4.2812-1.7773-6.5859-1.7773-4.0273 0-7.8164 1.8672-10.297 4.9727l-24.488-14.211c0.69922-1.6133 1.1211-3.2852 1.293-4.9688zm38.91-11.254c5.0664 0 9.1875 4.1523 9.1875 9.2539s-4.1211 9.2539-9.1875 9.2539-9.1875-4.1523-9.1875-9.2539 4.1211-9.2539 9.1875-9.2539zm-10.023-28.227c1.3945-0.80859 2.9805-1.2383 4.5781-1.2383 3.2773 0 6.3281 1.7734 7.9688 4.625 2.5352 4.4219 1.0273 10.094-3.3633 12.645-1.3945 0.80859-2.9805 1.2383-4.5781 1.2383-3.2773 0-6.3281-1.7734-7.9688-4.625-2.5391-4.4219-1.0312-10.094 3.3633-12.645zm-34.488 44.156c-2.2695 3.9492-6.4961 6.4023-11.031 6.4023-2.2148 0-4.4102-0.59375-6.3438-1.7148-6.082-3.5312-8.168-11.383-4.6562-17.504 2.2695-3.9492 6.4961-6.4023 11.031-6.4023 2.2148 0 4.4102 0.59375 6.3438 1.7148 6.0781 3.5312 8.168 11.383 4.6562 17.504zm39.09 13.535c1.6016 0 3.1836 0.42969 4.5781 1.2383 4.3945 2.5508 5.8984 8.2227 3.3633 12.645-1.6367 2.8516-4.6914 4.625-7.9688 4.625-1.6016 0-3.1836-0.42969-4.5781-1.2383-4.3945-2.5508-5.9023-8.2227-3.3633-12.645 1.6406-2.8516 4.6953-4.625 7.9688-4.625z"}));t.a=l},function(e,t){},function(e,t,n){"use strict";var l=n(11),o=n(12),r=(n.n(o),wp.i18n.__),a=wp.blocks.registerBlockType,i=wp.editor,c=(i.Editable,i.MediaUpload),p=wp.components.Button;a("simple-cookie-control/media-upload",{title:r("Example - Media Upload Button","simple-cookie-control"),description:r("An example of how to use the MediaUpload component.","simple-cookie-control"),category:"simple-cookie-control",icon:{background:"rgba(254, 243, 224, 0.52)",src:l.a.upload},keywords:[r("Image","simple-cookie-control"),r("MediaUpload","simple-cookie-control"),r("Message","simple-cookie-control")],attributes:{imgURL:{type:"string",source:"attribute",attribute:"src",selector:"img"},imgID:{type:"number"},imgAlt:{type:"string",source:"attribute",attribute:"alt",selector:"img"}},edit:function(e){var t=e.attributes,n=e.className,o=e.setAttributes,a=e.isSelected,i=t.imgID,m=t.imgURL,u=t.imgAlt,s=function(e){o({imgID:e.id,imgURL:e.url,imgAlt:e.alt})},g=function(){o({imgID:null,imgURL:null,imgAlt:null})};return wp.element.createElement("div",{className:n},i?wp.element.createElement("p",{class:"image-wrapper"},wp.element.createElement("img",{src:m,alt:u}),a?wp.element.createElement(p,{className:"remove-image",onClick:g},l.a.remove):null):wp.element.createElement(c,{onSelect:s,type:"image",value:i,render:function(e){var t=e.open;return wp.element.createElement(p,{className:"button button-large",onClick:t},l.a.upload,r(" Upload Image","simple-cookie-control"))}}))},save:function(e){var t=e.attributes,n=t.imgURL,l=t.imgAlt;return wp.element.createElement("p",null,wp.element.createElement("img",{src:n,alt:l}))}})},function(e,t,n){"use strict";var l={};l.upload=wp.element.createElement("svg",{width:"20px",height:"20px",viewBox:"0 0 100 100",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("path",{d:"m77.945 91.453h-72.371c-3.3711 0-5.5742-2.3633-5.5742-5.2422v-55.719c0-3.457 2.1172-6.0703 5.5742-6.0703h44.453v11.051l-38.98-0.003906v45.008h60.977v-17.133l11.988-0.007812v22.875c0 2.8789-2.7812 5.2422-6.0664 5.2422z"}),wp.element.createElement("path",{d:"m16.543 75.48l23.25-22.324 10.441 9.7773 11.234-14.766 5.5039 10.539 0.039063 16.773z"}),wp.element.createElement("path",{d:"m28.047 52.992c-3.168 0-5.7422-2.5742-5.7422-5.7461 0-3.1758 2.5742-5.75 5.7422-5.75 3.1797 0 5.7539 2.5742 5.7539 5.75 0 3.1719-2.5742 5.7461-5.7539 5.7461z"}),wp.element.createElement("path",{d:"m84.043 30.492v22.02h-12.059l-0.015625-22.02h-15.852l21.941-21.945 21.941 21.945z"})),l.swap=wp.element.createElement("svg",{width:"20px",height:"20px",viewBox:"0 0 100 100",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("path",{d:"m39.66 76.422h36.762v-36.781h-36.762zm4.6211-32.141h27.5v27.5h-27.5z"}),wp.element.createElement("path",{d:"m36.801 55.719h-8.582v-27.5h27.5v9.2031h4.6406v-13.844h-36.781v36.762h13.223z"}),wp.element.createElement("path",{d:"m90.18 42.781c-3-16.801-16.02-29.922-33-32.961-2.3789-0.42187-4.7812-0.64062-7.1797-0.64062v4.6211c2.1211 0 4.2617 0.17969 6.3594 0.55859 14.781 2.6406 26.18 13.898 29.121 28.398l-5.6602 0.003907 8.0781 14 8.0781-14h-5.7969z"}),wp.element.createElement("path",{d:"m14.52 57.219h5.6602l-8.0781-13.98-8.0781 14h5.8008c3 16.801 16.039 29.941 33 32.961 2.375 0.40234 4.7773 0.64062 7.1758 0.64062v-4.6406c-2.1016 0-4.2617-0.19922-6.3594-0.57812-14.781-2.6406-26.18-13.883-29.121-28.402z"})),l.remove=wp.element.createElement("svg",{width:"20px",height:"20px",viewBox:"0 0 100 100",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("path",{d:"m50 2.5c-26.199 0-47.5 21.301-47.5 47.5s21.301 47.5 47.5 47.5 47.5-21.301 47.5-47.5-21.301-47.5-47.5-47.5zm24.898 62.301l-10.199 10.199-14.801-14.801-14.801 14.801-10.199-10.199 14.801-14.801-14.801-14.801 10.199-10.199 14.801 14.801 14.801-14.801 10.199 10.199-14.801 14.801z"})),t.a=l},function(e,t){},function(e,t,n){"use strict";var l=n(14),o=n(15),r=(n.n(o),wp.i18n.__),a=wp.blocks.registerBlockType,i=wp.editor,c=i.InspectorControls,p=(i.RichText,wp.components),m=p.TextControl,u=p.PanelBody;p.isSelected,a("simple-cookie-control/meta-box",{title:r("Example - Meta Box","simple-cookie-control"),description:r("An example of how to build a block with a meta box field.","simple-cookie-control"),category:"simple-cookie-control",supports:{multiple:!1},icon:{background:"rgba(254, 243, 224, 0.52)",src:l.a},keywords:[r("Meta","simple-cookie-control"),r("Custom field","simple-cookie-control"),r("Box","simple-cookie-control")],attributes:{meta:{type:"string",source:"meta",meta:"simple-cookie-control-meta-key-name"},text:{type:"string",source:"text",selector:"p"}},edit:function(e){var t=e.attributes,n=e.className,l=e.setAttributes,o=(e.isSelected,t.text);t.meta;return[wp.element.createElement(c,null,wp.element.createElement(u,null,wp.element.createElement(m,{label:r("Meta box","simple-cookie-control"),value:o,onChange:function(e){return l({text:e,meta:e})}}))),wp.element.createElement("div",{className:n},wp.element.createElement(m,{label:r("Meta box","simple-cookie-control"),value:o,onChange:function(e){return l({text:e,meta:e})}}))]},save:function(e){var t=e.attributes.text;return wp.element.createElement("p",null,t)}})},function(e,t,n){"use strict";var l=wp.element.createElement("svg",{width:"20pt",height:"20pt",viewBox:"0 0 100 100",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("path",{d:"m39.648 99.984c-13.859-0.59766-25.25-4.4102-31.777-10.637-1.625-1.5547-3.5742-4.0703-4.3125-5.5781l-0.49219-1.0078 0.007813-11.902c0.007812-11.805 0.011719-11.895 0.21484-10.988 0.57031 2.5312 2.1953 5.2188 4.4414 7.3398 1.5039 1.4219 4.7852 3.5859 7.5117 4.9453 4.6172 2.3047 10.27 3.9883 16.402 4.8867 3.6055 0.52734 5.0781 0.61719 10.09 0.625 2.6367 0.003906 5.1602-0.03125 5.6094-0.078125l0.81641-0.085938v0.35547c0 0.53125 0.32422 2.4922 0.62109 3.7617 1.3867 5.9297 4.9961 11.496 9.8867 15.254l1.1289 0.86719-1.5078 0.37109c-3.2305 0.79297-7.5469 1.457-11.09 1.707-1.7969 0.125-6.207 0.22266-7.5547 0.16406zm33.793-3.5547c-1.5977-0.13281-3.1992-0.47266-4.9531-1.0547-6.457-2.1484-11.477-7.168-13.621-13.621-1.5195-4.5703-1.5195-9.1133 0-13.684 2.1484-6.457 7.168-11.477 13.621-13.621 3.6367-1.2109 7.4219-1.457 11.07-0.72266 7.582 1.5273 13.801 7.0234 16.234 14.344 1.5195 4.5703 1.5195 9.1133 0 13.684-2.1484 6.457-7.168 11.477-13.621 13.621-1.8398 0.61328-3.3086 0.91406-5.1953 1.0664-1.6055 0.12891-1.8594 0.12891-3.5352-0.007812zm4.5938-13.176v-5.6367h11.273v-5.4141h-11.273v-11.273h-5.4141v11.273h-11.273v5.4141h11.273v11.273h5.4141zm-38.387-12.816c-11.113-0.38281-21.301-3.1836-28.129-7.7383-3.6992-2.4688-6.168-5.2227-7.9375-8.8633l-0.51562-1.0625 0.007813-11.676c0.007812-11.586 0.011719-11.668 0.21484-10.762 0.41797 1.8516 1.4414 3.8672 2.8555 5.625 0.82031 1.0234 2.1523 2.3164 2.8984 2.8203 0.27734 0.1875 0.93359 0.64453 1.4609 1.0234 5.3164 3.7852 12.676 6.4648 21.141 7.707 3.6992 0.54297 5.0508 0.625 10.316 0.625 3.9766 0 5.4023-0.039063 6.8789-0.19531 10.27-1.082 18.262-3.7305 24.633-8.1602 1.5859-1.1055 1.9453-1.3828 2.8438-2.2227 2.0898-1.9531 3.7539-4.7383 4.3164-7.2148 0.20703-0.91016 0.20703-0.89062 0.21484 8.6211l0.007813 9.5352-1.2695-0.22266c-1.8008-0.31641-6.4531-0.33984-8.2578-0.039063-5.2812 0.87891-9.6602 2.8555-13.586 6.1406-4.4375 3.7109-7.7422 9.1016-9.0117 14.699l-0.24609 1.0898-0.52734 0.066406c-0.79688 0.10156-5.3594 0.28906-6.4492 0.26562-0.52734-0.011719-1.3633-0.035156-1.8594-0.050781zm-2.1406-29.535c-2.0352-0.15625-4.5078-0.41797-5.8594-0.61328-6.1406-0.89844-11.789-2.582-16.406-4.8867-6.418-3.2031-10.32-7.1484-11.84-11.98-0.34766-1.1094-0.44141-3.7773-0.17188-5.1094 1.6875-8.4141 12.957-15.426 28.414-17.691 3.6992-0.54297 5.0508-0.625 10.316-0.625 5.2656 0 6.6172 0.082031 10.316 0.625 6.1328 0.89844 11.785 2.582 16.402 4.8867 6.7891 3.3906 11.027 7.9062 12.012 12.805 0.26562 1.332 0.17578 4-0.17188 5.1094-0.76562 2.4297-1.9414 4.3555-3.8828 6.375-5.5078 5.707-15.457 9.6289-27.684 10.906-1.6562 0.17188-9.9258 0.32031-11.441 0.20312z"}));t.a=l},function(e,t){},function(e,t,n){"use strict";function l(e){var t=[];for(var n in e){var l=e[n];"boolean"===typeof e[n]&&(l=l.toString()),t.push(wp.element.createElement("li",null,n,": ",l))}return t}var o=n(0),r=(n.n(o),n(17)),a=n(18),i=n(19),c=n(20),p=n(21),m=n(22),u=(n.n(m),wp.i18n.__),s=wp.blocks.registerBlockType;s("simple-cookie-control/inspector-control-fields",{title:u("Example - Inspector Fields","simple-cookie-control"),description:u("An example of how to use form fields in the Inspector element.","simple-cookie-control"),category:"simple-cookie-control",icon:{background:"rgba(254, 243, 224, 0.52)",src:c.a},keywords:[u("Palette","simple-cookie-control"),u("Settings","simple-cookie-control"),u("Scheme","simple-cookie-control")],attributes:p.a,getEditWrapperProps:function(e){var t=e.blockAlignment;if("left"===t||"right"===t||"full"===t)return{"data-align":t}},edit:function(e){var t=e.attributes,n=e.className,o=e.setAttributes,c=t.textAlignment,p=(t.blockAlignment,t.message,l(t));return[wp.element.createElement(r.a,Object.assign({setAttributes:o},e)),wp.element.createElement(a.a,Object.assign({setAttributes:o},e)),wp.element.createElement(i.a,Object.assign({setAttributes:o},e)),wp.element.createElement("div",{className:n,style:{textAlign:c}},wp.element.createElement("ul",null,p))]},save:function(e){var t=e.attributes,n=t.textAlignment,o=t.blockAlignment,r=l(t);return wp.element.createElement("div",{className:"align"+o,style:{textAlign:n}},wp.element.createElement("ul",null,r))}})},function(e,t,n){"use strict";function l(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function r(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var a=function(){function e(e,t){for(var n=0;n<t.length;n++){var l=t[n];l.enumerable=l.enumerable||!1,l.configurable=!0,"value"in l&&(l.writable=!0),Object.defineProperty(e,l.key,l)}}return function(t,n,l){return n&&e(t.prototype,n),l&&e(t,l),t}}(),i=wp.i18n.__,c=wp.element.Component,p=wp.editor,m=p.InspectorControls,u=p.ColorPalette,s=wp.components,g=(s.Button,s.ButtonGroup,s.CheckboxControl),w=s.PanelBody,h=s.PanelRow,f=s.PanelColor,b=s.RadioControl,d=s.RangeControl,v=s.TextControl,C=s.TextareaControl,y=s.ToggleControl,E=(s.Toolbar,s.SelectControl),x=function(e){function t(){return l(this,t),o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return r(t,e),a(t,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=t.checkboxControl,l=t.colorPaletteControl,o=t.radioControl,r=t.rangeControl,a=t.textControl,c=t.textareaControl,p=t.toggleControl,s=t.selectControl,x=e.setAttributes;return wp.element.createElement(m,null,wp.element.createElement(w,{title:i("Panel Body Title","simple-cookie-control"),initialOpen:!1},wp.element.createElement(h,null,wp.element.createElement("p",null,i("Panel Body Copy","simple-cookie-control")))),wp.element.createElement(w,null,wp.element.createElement(g,{heading:i("Checkbox Control","simple-cookie-control"),label:i("Check here","simple-cookie-control"),help:i("Checkbox control help text","simple-cookie-control"),checked:n,onChange:function(e){return x({checkboxControl:e})}})),wp.element.createElement(f,{title:i("Color Panel","simple-cookie-control"),colorValue:l},wp.element.createElement(u,{value:l,onChange:function(e){return x({colorPaletteControl:e})}})),wp.element.createElement(w,null,wp.element.createElement(b,{label:i("Radio Control","simple-cookie-control"),selected:o,options:[{label:"Author",value:"a"},{label:"Editor",value:"e"}],onChange:function(e){return x({radioControl:e})}})),wp.element.createElement(w,null,wp.element.createElement(d,{beforeIcon:"arrow-left-alt2",afterIcon:"arrow-right-alt2",label:i("Range Control","simple-cookie-control"),value:r,onChange:function(e){return x({rangeControl:e})},min:1,max:10})),wp.element.createElement(w,null,wp.element.createElement(v,{label:i("Text Control","simple-cookie-control"),help:i("Text control help text","simple-cookie-control"),value:a,onChange:function(e){return x({textControl:e})}})),wp.element.createElement(w,null,wp.element.createElement(C,{label:i("Text Area Control","simple-cookie-control"),help:i("Text area control help text","simple-cookie-control"),value:c,onChange:function(e){return x({textareaControl:e})}})),wp.element.createElement(w,null,wp.element.createElement(y,{label:i("Toggle Control","simple-cookie-control"),checked:p,onChange:function(e){return x({toggleControl:e})}})),wp.element.createElement(w,null,wp.element.createElement(E,{label:i("Select Control","simple-cookie-control"),value:s,options:[{value:"a",label:i("Option A","simple-cookie-control")},{value:"b",label:i("Option B","simple-cookie-control")},{value:"c",label:i("Option C","simple-cookie-control")}],onChange:function(e){return x({selectControl:e})}})))}}]),t}(c);t.a=x},function(e,t,n){"use strict";function l(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function r(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var a=function(){function e(e,t){for(var n=0;n<t.length;n++){var l=t[n];l.enumerable=l.enumerable||!1,l.configurable=!0,"value"in l&&(l.writable=!0),Object.defineProperty(e,l.key,l)}}return function(t,n,l){return n&&e(t.prototype,n),l&&e(t,l),t}}(),i=(wp.i18n.__,wp.element.Component),c=wp.editor,p=c.AlignmentToolbar,m=c.BlockControls,u=c.BlockAlignmentToolbar,s=function(e){function t(){return l(this,t),o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return r(t,e),a(t,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=t.blockAlignment,l=t.textAlignment,o=e.setAttributes;return wp.element.createElement(m,null,wp.element.createElement(u,{value:n,onChange:function(e){return o({blockAlignment:e})}}),wp.element.createElement(p,{value:l,onChange:function(e){return o({textAlignment:e})}}))}}]),t}(i);t.a=s},function(e,t,n){"use strict";function l(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function r(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var a=function(){function e(e,t){for(var n=0;n<t.length;n++){var l=t[n];l.enumerable=l.enumerable||!1,l.configurable=!0,"value"in l&&(l.writable=!0),Object.defineProperty(e,l.key,l)}}return function(t,n,l){return n&&e(t.prototype,n),l&&e(t,l),t}}(),i=wp.i18n.__,c=wp.element.Component,p=wp.editor.ColorPalette,m=wp.components,u=m.CheckboxControl,s=m.RadioControl,g=m.RangeControl,w=m.TextControl,h=m.TextareaControl,f=m.ToggleControl,b=m.SelectControl,d=function(e){function t(){return l(this,t),o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return r(t,e),a(t,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=t.checkboxControl,l=t.colorPaletteControl,o=t.radioControl,r=t.rangeControl,a=t.textControl,c=t.textareaControl,m=t.toggleControl,d=t.selectControl,v=e.className,C=e.setAttributes;return wp.element.createElement("div",{className:v},wp.element.createElement(u,{heading:i("Checkbox Control","simple-cookie-control"),label:i("Check here","simple-cookie-control"),help:i("Checkbox control help text","simple-cookie-control"),checked:n,onChange:function(e){return C({checkboxControl:e})}}),wp.element.createElement(p,{value:l,onChange:function(e){return C({colorPaletteControl:e})}}),wp.element.createElement(s,{label:i("Radio Control","simple-cookie-control"),selected:o,options:[{label:"Author",value:"a"},{label:"Editor",value:"e"}],onChange:function(e){return C({radioControl:e})}}),wp.element.createElement(g,{beforeIcon:"arrow-left-alt2",afterIcon:"arrow-right-alt2",label:i("Range Control","simple-cookie-control"),value:r,onChange:function(e){return C({rangeControl:e})},min:1,max:10}),wp.element.createElement(w,{label:i("Text Control","simple-cookie-control"),help:i("Text control help text","simple-cookie-control"),value:a,onChange:function(e){return C({textControl:e})}}),wp.element.createElement(h,{label:i("Text Area Control","simple-cookie-control"),help:i("Text area control help text","simple-cookie-control"),value:c,onChange:function(e){return C({textareaControl:e})}}),wp.element.createElement(f,{label:i("Toggle Control","simple-cookie-control"),checked:m,onChange:function(e){return C({toggleControl:e})}}),wp.element.createElement(b,{label:i("Select Control","simple-cookie-control"),value:d,options:[{value:"a",label:"Option A"},{value:"b",label:"Option B"},{value:"c",label:"Option C"}],onChange:function(e){return C({selectControl:e})}}))}}]),t}(c);t.a=d},function(e,t,n){"use strict";var l=wp.element.createElement("svg",{width:"20px",height:"20px",viewBox:"0 0 100 100",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("g",{transform:"rotate(-180 50 38)",fill:"#000",id:"Page-1",fillRule:"evenodd"},wp.element.createElement("polygon",{id:"Fill-1",transform:"rotate(-180 16.535 63.488)",points:"7.78523038 65.863 25.2852304 65.863 25.2852304 61.113 7.78523038 61.113"}),wp.element.createElement("polygon",{id:"Fill-2",transform:"rotate(-180 24.285 24.863)",points:"23.2852304 25.863 25.2852304 25.863 25.2852304 23.863 23.2852304 23.863"}),wp.element.createElement("polygon",{id:"Fill-3",transform:"rotate(-180 14.035 24.863)",points:"7.78523038 25.863 20.2852304 25.863 20.2852304 23.863 7.78523038 23.863"}),wp.element.createElement("polygon",{id:"Fill-4",transform:"rotate(-180 16.535 54.863)",points:"7.78523038 55.863 25.2852304 55.863 25.2852304 53.863 7.78523038 53.863"}),wp.element.createElement("polygon",{id:"Fill-5",transform:"rotate(-180 16.535 49.863)",points:"7.78523038 50.863 25.2852304 50.863 25.2852304 48.863 7.78523038 48.863"}),wp.element.createElement("polygon",{id:"Fill-6",transform:"rotate(-180 24.285 19.863)",points:"23.2852304 20.863 25.2852304 20.863 25.2852304 18.863 23.2852304 18.863"}),wp.element.createElement("polygon",{id:"Fill-7",transform:"rotate(-180 14.035 19.863)",points:"7.78523038 20.863 20.2852304 20.863 20.2852304 18.863 7.78523038 18.863"}),wp.element.createElement("polygon",{id:"Fill-8",transform:"rotate(-180 24.285 14.863)",points:"23.2852304 15.863 25.2852304 15.863 25.2852304 13.863 23.2852304 13.863"}),wp.element.createElement("polygon",{id:"Fill-9",transform:"rotate(-180 14.035 14.863)",points:"7.78523038 15.863 20.2852304 15.863 20.2852304 13.863 7.78523038 13.863"}),wp.element.createElement("polygon",{id:"Fill-10",transform:"rotate(-180 24.285 9.863)",points:"23.2852304 10.863 25.2852304 10.863 25.2852304 8.863 23.2852304 8.863"}),wp.element.createElement("polygon",{id:"Fill-11",transform:"rotate(-180 14.035 10.113)",points:"7.78523038 11.113 20.2852304 11.113 20.2852304 9.113 7.78523038 9.113"}),wp.element.createElement("path",{d:"M0,0.637 L0,75.637 L100,75.637 L100,0.637 L0,0.637 Z M30,73.637 L2,73.637 L2,2.637 L30,2.637 L30,73.637 Z M98,73.637 L32,73.637 L32,2.637 L98,2.637 L98,73.637 Z",id:"Fill-12"})));t.a=l},function(e,t,n){"use strict";var l={textAlignment:{type:"string"},blockAlignment:{type:"string"},colorPaletteControl:{type:"string",default:"#000000"},checkboxControl:{type:"boolean",default:!0},dateTimeControl:{type:"string"},radioControl:{type:"string",default:"a"},rangeControl:{type:"number",default:"10"},textControl:{type:"string"},textareaControl:{type:"text"},toggleControl:{type:"boolean"},selectControl:{type:"string"}};t.a=l},function(e,t){}]);