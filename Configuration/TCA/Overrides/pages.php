<?php

defined('TYPO3') || die();

(static function (): void {
    // Add container for mail templates
    // add mail_logger option group
    $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
        'LLL:EXT:mail_logger/Resources/Private/Language/locallang_db.xlf:container_title',
        '--div--',
    ];

    // add folder container for mail templates
    $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
        'LLL:EXT:mail_logger/Resources/Private/Language/locallang_db.xlf:container_mail_templates',
        'io_mails', // have to be a very short value
        'EXT:mail_logger/Resources/Public/Icons/MailTemplate.svg',
    ];
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes']['contains-io_mails'] = 'apps-pagetree-folder-contains-mail-templates';

    // add placeholder option group
    $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
        '---',
        '--div--',
    ];
})();
