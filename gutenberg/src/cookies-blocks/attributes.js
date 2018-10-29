const attributes = {
    bannerCookieControl: {
        type: 'boolean',
        default: true,
    },
    typeCookieControl: {
        type: 'string',
        default: 'SCC_ALLOW',
    },
    cookieName: {
        type: 'string',
        default: sccMainCookieData.name
    },
    message: {
        type: 'string',
        default: sccMainCookieData.message
    },
    cookieClass: {
        type: 'string',
        default: 'scc-secundary-cookie-button'
    },
};

export default attributes;
