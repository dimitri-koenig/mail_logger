<?php

/***
 *
 * This file is part of an "+Pluswerk AG" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2018 Markus Hölzle <markus.hoelzle@pluswerk.ag>, +Pluswerk AG
 *
 ***/

declare(strict_types=1);

namespace Pluswerk\MailLogger\Wizard;

use Pluswerk\MailLogger\Utility\ConfigurationUtility;
use TYPO3\CMS\Core\SingletonInterface;

/**
 */
class MailTemplate implements SingletonInterface
{
    /**
     * getTypoScriptKeys
     *
     * @param array $config
     */
    public function getTypoScriptKeys(array &$config): void
    {
        $items = [['', '']];
        $settings = ConfigurationUtility::getCurrentModuleConfiguration('settings');
        if (!empty($settings['mailTemplates'])) {
            foreach ($settings['mailTemplates'] ?: [] as $key => $value) {
                $items[] = [$value['label'] ?: $key, $key];
            }
        }

        $config['items'] = array_merge($config['items'], $items);
    }

    /**
     * getDkimKeys
     *
     * @param array $config
     */
    public function getDkimKeys(array &$config): void
    {
        $items = [['', '']];
        $settings = ConfigurationUtility::getCurrentModuleConfiguration('settings');
        if (!empty($settings['dkim'])) {
            foreach ($settings['dkim'] ?: [] as $key => $value) {
                $items[] = [$value['domain'] ?: $key, $key];
            }
        }
        $config['items'] = array_merge($config['items'], $items);
    }

    public function getTemplatePathKeys(array &$config): void
    {
        $items = [];
        $settings = ConfigurationUtility::getCurrentModuleConfiguration('settings');
        if (!empty($settings['templateOverrides'])) {
            foreach ($settings['templateOverrides'] as $key => $value) {
                $items[] = [$value['title'] ?: $key, $key];
            }
        }
        $config['items'] = array_merge($config['items'], $items);
    }
}
