<?php

if (defined('MODALLINKS') === false) {
    exit;
}


/**
 * Add the settings
 *
 * @return nothing
 */
function modalLinksSettings()
{

    // Section.
    add_settings_section(
        'modalLinksSettingsSection',
        __('Modal Window', 'modal_links'),
        'modalLinksSettingsSectionCallback',
        'modal_links'
    );

    // Width.
    add_settings_field(
        'modalLinksModalWidth',
        __('Width', 'modal_links'),
        'modalLinksSettingsModalWidthCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Width Type.
    add_settings_field(
        'modalLinksModalWidthType',
        __('Width Type', 'modal_links'),
        'modalLinksSettingsModalWidthTypeCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Max Height.
    add_settings_field(
        'modalLinksModalMaxHeight',
        __('Max Height', 'modal_links'),
        'modalLinksSettingsModalMaxHeightCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Max Height Type.
    add_settings_field(
        'modalLinksModalMaxHeightType',
        __('Max Height Type', 'modal_links'),
        'modalLinksSettingsModalMaxHeightTypeCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Draggable.
    add_settings_field(
        'modalLinksModalDraggable',
        __('Draggable', 'modal_links'),
        'modalLinksSettingsModalDraggableCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Resizable.
    add_settings_field(
        'modalLinksModalResizable',
        __('Resizable', 'modal_links'),
        'modalLinksSettingsModalResizableCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Title.
    add_settings_field(
        'modalLinksModalTitle',
        __('Title', 'modal_links'),
        'modalLinksSettingsModalTitleCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Show.
    add_settings_field(
        'modalLinksModalShow',
        __('Animate on Show', 'modal_links'),
        'modalLinksSettingsModalShowCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Hide.
    add_settings_field(
        'modalLinksModalHide',
        __('Animate on Hide', 'modal_links'),
        'modalLinksSettingsModalHideCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Modal.
    add_settings_field(
        'modalLinksModalType',
        __('Dialog is Modal', 'modal_links'),
        'modalLinksSettingsModalTypeCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Close Icon.
    add_settings_field(
        'modalLinksModalCloseIcon',
        __('Close Icon', 'modal_links'),
        'modalLinksSettingsModalCloseIconCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Escape.
    add_settings_field(
        'modalLinksModalCloseEsc',
        __('Close on Escape', 'modal_links'),
        'modalLinksSettingsModalCloseEscCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Loading Gif.
    add_settings_field(
        'modalLinksModalLoadingGif',
        __('Loading Image', 'modal_links'),
        'modalLinksSettingsModalLoadingGifCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    // Dialog Class.
    add_settings_field(
        'modalLinksModalClass',
        __('CSS Class', 'modal_links'),
        'modalLinksSettingsModalClassCallback',
        'modal_links',
        'modalLinksSettingsSection'
    );

    register_setting('modal_links', 'modalLinksModalWidth', 'intval');
    register_setting('modal_links', 'modalLinksModalWidthType');
    register_setting('modal_links', 'modalLinksModalMaxHeight', 'intval');
    register_setting('modal_links', 'modalLinksModalMaxHeight Type');
    register_setting('modal_links', 'modalLinksModalDraggable');
    register_setting('modal_links', 'modalLinksModalResizable');
    register_setting('modal_links', 'modalLinksModalTitle');
    register_setting('modal_links', 'modalLinksModalShow');
    register_setting('modal_links', 'modalLinksModalHide');
    register_setting('modal_links', 'modalLinksModalType');
    register_setting('modal_links', 'modalLinksModalCloseIcon');
    register_setting('modal_links', 'modalLinksModalCloseEsc');
    register_setting('modal_links', 'modalLinksModalLoadingGif');
    register_setting('modal_links', 'modalLinksModalClass');

}//end modalLinksSettings()


/**
 * Add the settings modal window section callback.
 *
 * @return nothing
 */
function modalLinksSettingsSectionCallback()
{

}//end modalLinksSettingsSectionCallback()


/**
 * Add the settings width field callback.
 *
 * @return width settings
 */
function modalLinksSettingsModalWidthCallback()
{
    $modalLinksModalWidth = get_option('modalLinksModalWidth');

    echo '<input name="modalLinksModalWidth"
    id="modalLinksModalWidth" type="text" value="'
        .$modalLinksModalWidth
        .'" />'
        .'<br />'
        .__(
            '(leave it empty or \'0\' for \'auto\')',
            'modalLinks'
        );

}//end modalLinksSettingsModalWidthCallback()


/**
 * Add the settings width type field callback.
 *
 * @return width type settings
 */
function modalLinksSettingsModalWidthTypeCallback()
{
    $modalLinksModalWidthType = get_option('modalLinksModalWidthType');

    echo '<select name="modalLinksModalWidthType"
    id="modalLinksModalWidthType">';
    if ($modalLinksModalWidthType === 'px') {
        echo '<option value="px" selected="selected">'
        .__('px', 'modalLinks')
        .'</option>';
    } else {
        echo '<option value="px">'.__('px', 'modalLinks').'</option>';
    }
    if ($modalLinksModalWidthType === '%') {
        echo '<option value="%" selected="selected">'
        .__('%', 'modalLinks')
        .'</option>';
    } else {
        echo '<option value="%">'.__('%', 'modalLinks').'</option>';
    }
    echo '</select>';

}//end modalLinksSettingsModalWidthTypeCallback()


/**
 * Add the settings max height field callback.
 *
 * @return max height settings
 */
function modalLinksSettingsModalMaxHeightCallback()
{
    $modalLinksModalMaxHeight = get_option('modalLinksModalMaxHeight');

    echo '<input name="modalLinksModalMaxHeight"
    id="modalLinksModalMaxHeight" type="text" value="'
        .$modalLinksModalMaxHeight
        .'" />'
        .'<br />'
        .__(
            '(leave it empty or \'0\' for \'auto\')',
            'modalLinks'
        )
        .'<br />'
        .__(
            'NOTICE! The actual max height may be a bit
            different because of jQuery\'s calculations',
            'modal_links'
        );

}//end modalLinksSettingsModalMaxHeightCallback()


/**
 * Add the settings max height type field callback.
 *
 * @return max height type settings
 */
function modalLinksSettingsModalMaxHeightTypeCallback()
{
    $modalLinksModalMaxHeightType = get_option('modalLinksModalMaxHeightType');

    echo '<select name="modalLinksModalMaxHeightType"
    id="modalLinksModalMaxHeightType">';
    if ($modalLinksModalMaxHeightType === 'px') {
        echo '<option value="px" selected="selected">'
        .__('px', 'modalLinks')
        .'</option>';
    } else {
        echo '<option value="px">'.__('px', 'modalLinks').'</option>';
    }
    if ($modalLinksModalMaxHeightType === '%') {
        echo '<option value="%" selected="selected">'
        .__('%', 'modalLinks')
        .'</option>';
    } else {
        echo '<option value="%">'.__('%', 'modalLinks').'</option>';
    }
    echo '</select>';

}//end modalLinksSettingsModalMaxHeightTypeCallback()


/**
 * Add the settings draggable field callback.
 *
 * @return draggable settings
 */
function modalLinksSettingsModalDraggableCallback()
{
    $modalLinksModalDraggable        = get_option('modalLinksModalDraggable');
    $modalLinksModalDraggableOptions = array(
                                        'true',
                                        'false',
                                       );

    echo '<select name="modalLinksModalDraggable" id="modalLinksModalDraggable">';

    foreach ($modalLinksModalDraggableOptions as $value) {
        if ($value == $modalLinksModalDraggable) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalDraggableCallback()


/**
 * Add the settings resizable field callback.
 *
 * @return resizable settings
 */
function modalLinksSettingsModalResizableCallback()
{
    $modalLinksModalResizable        = get_option('modalLinksModalResizable');
    $modalLinksModalResizableOptions = array(
                                        'true',
                                        'false',
                                       );

    echo '<select name="modalLinksModalResizable" id="modalLinksModalResizable">';

    foreach ($modalLinksModalResizableOptions as $value) {
        if ($value == $modalLinksModalResizable) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalResizableCallback()


/**
 * Add the settings title field callback.
 *
 * @return title settings
 */
function modalLinksSettingsModalTitleCallback()
{
    $modalLinksModalTitle        = get_option('modalLinksModalTitle');
    $modalLinksModalTitleOptions = array(
                                    'default',
                                    'true',
                                    'false',
                                   );

    echo '<select name="modalLinksModalTitle" id="modalLinksModalTitle">';

    foreach ($modalLinksModalTitleOptions as $value) {
        if ($value == $modalLinksModalTitle) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select> <br />'
        .__(
            'default: Title is shown for all posts/pages
            except if title="false" is defined in shortcode
            and is hidden for posts in Modals category except
            if title="true" is defined in shortcode.',
            'modal_links'
        )
        .'<br />'
        .__('true: Title is shown in any case.', 'modalLinks')
        .'<br />'
        .__('false: Title is hidden in any case', 'modal_links');

}//end modalLinksSettingsModalTitleCallback()


/**
 * Add the settings animate show field callback.
 *
 * @return show settings
 */
function modalLinksSettingsModalShowCallback()
{
    $modalLinksModalShow        = get_option('modalLinksModalShow');
    $modalLinksModalShowOptions = array(
                                   'true',
                                   'false',
                                  );

    echo '<select name="modalLinksModalShow" id="modalLinksModalShow">';

    foreach ($modalLinksModalShowOptions as $value) {
        if ($value == $modalLinksModalShow) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalShowCallback()


/**
 * Add the settings animate hide field callback.
 *
 * @return animate hide settings
 */
function modalLinksSettingsModalHideCallback()
{
    $modalLinksModalHide        = get_option('modalLinksModalHide');
    $modalLinksModalHideOptions = array(
                                   'true',
                                   'false',
                                  );

    echo '<select name="modalLinksModalHide" id="modalLinksModalHide">';

    foreach ($modalLinksModalHideOptions as $value) {
        if ($value == $modalLinksModalHide) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalHideCallback()


/**
 * Add the settings modal type field callback.
 *
 * @return modal type settings
 */
function modalLinksSettingsModalTypeCallback()
{
    $modalLinksModalType        = get_option('modalLinksModalType');
    $modalLinksModalTypeOptions = array(
                                   'true',
                                   'false',
                                  );

    echo '<select name="modalLinksModalType" id="modalLinksModalType">';

    foreach ($modalLinksModalTypeOptions as $value) {
        if ($value == $modalLinksModalType) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalTypeCallback()


/**
 * Add the settings close icon field callback.
 *
 * @return escape settings
 */
function modalLinksSettingsModalCloseIconCallback()
{
    $modalLinksModalCloseIcon        = get_option('modalLinksModalCloseIcon');
    $modalLinksModalCloseIconOptions = array(
                                        'true',
                                        'false',
                                       );

    echo '<select name="modalLinksModalCloseIcon" id="modalLinksModalCloseIcon">';

    foreach ($modalLinksModalCloseIconOptions as $value) {
        if ($value == $modalLinksModalCloseIcon) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalCloseIconCallback()


/**
 * Add the settings escape field callback.
 *
 * @return escape settings
 */
function modalLinksSettingsModalCloseEscCallback()
{
    $modalLinksModalCloseEsc        = get_option('modalLinksModalCloseEsc');
    $modalLinksModalCloseEscOptions = array(
                                       'true',
                                       'false',
                                      );

    echo '<select name="modalLinksModalCloseEsc" id="modalLinksModalCloseEsc">';

    foreach ($modalLinksModalCloseEscOptions as $value) {
        if ($value == $modalLinksModalCloseEsc) {
            echo '<option value="'
            .$value
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$value
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalCloseEscCallback()


/**
 * Add the settings escape field callback.
 *
 * @return escape settings
 */
function modalLinksSettingsModalLoadingGifCallback()
{
    $modalLinksModalLoadingGif        = get_option('modalLinksModalLoadingGif');
    $modalLinksModalLoadingGifOptions = array(
                                       ''          => 'off',
                                       'gray32'    => 'gray 32X32',
                                       'gray48'    => 'gray 48X48',
                                       'gray64'    => 'gray 64X64',
                                       'gray128'   => 'gray 128X128',
                                       'gray256'   => 'gray 256X256',
                                       'gray350'   => 'gray 350X350',
                                       'gray512'   => 'gray 512X512',
                                       'blue32'    => 'blue 32X32',
                                       'blue48'    => 'blue 48X48',
                                       'blue64'    => 'blue 64X64',
                                       'blue128'   => 'blue 128X128',
                                       'blue256'   => 'blue 256X256',
                                       'blue350'   => 'blue 350X350',
                                       'blue512'   => 'blue 512X512',
                                       'green32'   => 'green 32X32',
                                       'green48'   => 'green 48X48',
                                       'green64'   => 'green 64X64',
                                       'green128'  => 'green 128X128',
                                       'green256'  => 'green 256X256',
                                       'green350'  => 'green 350X350',
                                       'green512'  => 'green 512X512',
                                       'orange32'  => 'orange 32X32',
                                       'orange48'  => 'orange 48X48',
                                       'orange64'  => 'orange 64X64',
                                       'orange128' => 'orange 128X128',
                                       'orange256' => 'orange 256X256',
                                       'orange350' => 'orange 350X350',
                                       'orange512' => 'orange 512X512',
                                       'red32'     => 'red 32X32',
                                       'red48'     => 'red 48X48',
                                       'red64'     => 'red 64X64',
                                       'red128'    => 'red 128X128',
                                       'red256'    => 'red 256X256',
                                       'red350'    => 'red 350X350',
                                       'red512'    => 'red 512X512',
                                      );

    echo '<select name="modalLinksModalLoadingGif" id="modalLinksModalLoadingGif">';

    foreach ($modalLinksModalLoadingGifOptions as $key => $value) {
        if ($key == $modalLinksModalLoadingGif) {
            echo '<option value="'
            .$key
            .'" selected="selected">'
            .$value
            .'</option>';
        } else {
            echo '<option value="'
            .$key
            .'">'
            .$value
            .'</option>';
        }
    }

    echo '</select>';

}//end modalLinksSettingsModalCloseEscCallback()


/**
 * Add the settings class field callback.
 *
 * @return class settings
 */
function modalLinksSettingsModalClassCallback()
{
    $modalLinksModalClass = get_option('modalLinksModalClass');

    echo '<input name="modalLinksModalClass"
    id="modalLinksModalClass" type="text" value="'
        .$modalLinksModalClass
        .'" />'
        .'<br />'
        .__(
            '(this specified class name(s) will be added to the modal, for additional theming)',
            'modalLinks'
        );

}//end modalLinksSettingsModalClassCallback()

if (is_admin() === true) {
    add_action('admin_init', 'modalLinksSettings');
}
