const setExtraPropsToBlockType = (props, blockType, attributes) => {
    if (blockType.name === 'core/columns') {
        return Object.assign(props, {
            className: `columns ${props.className.replace('wp-block-columns','')}`,
        });
    }

    if (blockType.name === 'core/column') {
        return Object.assign(props, {
            className: `columns__col ${props.className.replace('wp-block-column','')}`,
        });
    }

    if (blockType.name === 'core/spacer') {
        return Object.assign(props, {
            className: `spacer ${props.className.replace('wp-block-spacer','')}`,
        });
    }

    return props;
};

wp.hooks.addFilter(
    'blocks.getSaveContent.extraProps',
    'mats/block-filters',
    setExtraPropsToBlockType
);