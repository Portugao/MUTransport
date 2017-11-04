'use strict';

function mUTransportCapitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.substring(1);
}

/**
 * Initialise the quick navigation form in list views.
 */
function mUTransportInitQuickNavigation()
{
    var quickNavForm;
    var objectType;

    if (jQuery('.mutransportmodule-quicknav').length < 1) {
        return;
    }

    quickNavForm = jQuery('.mutransportmodule-quicknav').first();
    objectType = quickNavForm.attr('id').replace('mUTransportModule', '').replace('QuickNavForm', '');

    quickNavForm.find('select').change(function (event) {
        quickNavForm.submit();
    });

    var fieldPrefix = 'mutransportmodule_' + objectType.toLowerCase() + 'quicknav_';
    // we can hide the submit button if we have no visible quick search field
    if (jQuery('#' + fieldPrefix + 'q').length < 1 || jQuery('#' + fieldPrefix + 'q').parent().parent().hasClass('hidden')) {
        jQuery('#' + fieldPrefix + 'updateview').addClass('hidden');
    }
}

/**
 * Simulates a simple alert using bootstrap.
 */
function mUTransportSimpleAlert(anchorElement, title, content, alertId, cssClass)
{
    var alertBox;

    alertBox = ' \
        <div id="' + alertId + '" class="alert alert-' + cssClass + ' fade"> \
          <button type="button" class="close" data-dismiss="alert">&times;</button> \
          <h4>' + title + '</h4> \
          <p>' + content + '</p> \
        </div>';

    // insert alert before the given anchor element
    anchorElement.before(alertBox);

    jQuery('#' + alertId).delay(200).addClass('in').fadeOut(4000, function () {
        jQuery(this).remove();
    });
}

/**
 * Initialises the mass toggle functionality for admin view pages.
 */
function mUTransportInitMassToggle()
{
    if (jQuery('.mutransport-mass-toggle').length > 0) {
        jQuery('.mutransport-mass-toggle').unbind('click').click(function (event) {
            if (jQuery('.table.fixed-columns').length > 0) {
                jQuery('.mutransport-toggle-checkbox').prop('checked', false);
                jQuery('.table.fixed-columns .mutransport-toggle-checkbox').prop('checked', jQuery(this).prop('checked'));
            } else {
                jQuery('.mutransport-toggle-checkbox').prop('checked', jQuery(this).prop('checked'));
            }
        });
    }
}

/**
 * Initialises fixed table columns.
 */
function mUTransportInitFixedColumns()
{
    jQuery('.table.fixed-columns').remove();
    jQuery('.table').each(function() {
        var originalTable, fixedColumnsTable, fixedTableWidth;

        originalTable = jQuery(this);
        fixedTableWidth = 0;
        if (originalTable.find('.fixed-column').length > 0) {
            fixedColumnsTable = originalTable.clone().insertBefore(originalTable).addClass('fixed-columns').removeAttr('id');
            originalTable.find('.dropdown').addClass('hidden');
            fixedColumnsTable.find('.dropdown').removeClass('hidden');
            fixedColumnsTable.css('left', originalTable.parent().position().left);

            fixedColumnsTable.find('th, td').not('.fixed-column').remove();
            fixedColumnsTable.find('th').each(function (i, elem) {
                jQuery(this).css('width', originalTable.find('th').eq(i).css('width'));
                fixedTableWidth += originalTable.find('th').eq(i).width();
            });
            fixedColumnsTable.css('width', fixedTableWidth + 'px');

            fixedColumnsTable.find('tr').each(function (i, elem) {
                jQuery(this).height(originalTable.find('tr:eq(' + i + ')').height());
            });
        }
    });
    mUTransportInitMassToggle();
}

/**
 * Creates a dropdown menu for the item actions.
 */
function mUTransportInitItemActions(context)
{
    var containerSelector;
    var containers;
    var listClasses;

    containerSelector = '';
    if (context == 'view') {
        containerSelector = '.mutransportmodule-view';
        listClasses = 'list-unstyled dropdown-menu';
    } else if (context == 'display') {
        containerSelector = 'h2, h3';
        listClasses = 'list-unstyled dropdown-menu';
    }

    if (containerSelector == '') {
        return;
    }

    containers = jQuery(containerSelector);
    if (containers.length < 1) {
        return;
    }

    containers.find('.dropdown > ul').removeClass('list-inline').addClass(listClasses);
    containers.find('.dropdown > ul a').each(function (index) {
        var title;

        title = jQuery(this).find('i').first().attr('title');
        if (title == '') {
            title = jQuery(this).find('i').first().data('original-title');
        }
        jQuery(this).html(jQuery(this).html() + title);
    });
    containers.find('.dropdown > ul a i').addClass('fa-fw');
    containers.find('.dropdown-toggle').removeClass('hidden').dropdown();
}

/**
 * Helper function to create new Bootstrap modal window instances.
 */
function mUTransportInitInlineWindow(containerElem)
{
    var newWindowId;
    var modalTitle;

    // show the container (hidden for users without JavaScript)
    containerElem.removeClass('hidden');

    // define name of window
    newWindowId = containerElem.attr('id') + 'Dialog';

    containerElem.unbind('click').click(function(event) {
        event.preventDefault();

        // check if window exists already
        if (jQuery('#' + newWindowId).length < 1) {
            // create new window instance
            jQuery('<div />', { id: newWindowId })
                .append(
                    jQuery('<iframe width="100%" height="100%" marginWidth="0" marginHeight="0" frameBorder="0" scrolling="auto" />')
                        .attr('src', containerElem.attr('href'))
                )
                .dialog({
                    autoOpen: false,
                    show: {
                        effect: 'blind',
                        duration: 1000
                    },
                    hide: {
                        effect: 'explode',
                        duration: 1000
                    },
                    title: containerElem.data('modal-title'),
                    width: 600,
                    height: 400,
                    modal: false
                });
        }

        // open the window
        jQuery('#' + newWindowId).dialog('open');
    });

    // return the dialog selector id;
    return newWindowId;
}

/**
 * Initialises modals for inline display of related items.
 */
function mUTransportInitQuickViewModals()
{
    jQuery('.mutransport-inline-window').each(function (index) {
        mUTransportInitInlineWindow(jQuery(this));
    });
}

jQuery(document).ready(function() {
    var isViewPage;
    var isDisplayPage;

    isViewPage = jQuery('.mutransportmodule-view').length > 0;
    isDisplayPage = jQuery('.mutransportmodule-display').length > 0;

    if (isViewPage) {
        mUTransportInitQuickNavigation();
        mUTransportInitMassToggle();
        jQuery(window).resize(mUTransportInitFixedColumns);
        mUTransportInitFixedColumns();
        window.setTimeout(mUTransportInitFixedColumns, 1000);
        mUTransportInitItemActions('view');
    } else if (isDisplayPage) {
        mUTransportInitItemActions('display');
    }

    mUTransportInitQuickViewModals();
});
