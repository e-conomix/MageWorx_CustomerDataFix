<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MageWorx\CustomerDataFix\Plugin;

use Magento\Customer\CustomerData\SectionPool;

/**
 * Class UpdateAllCustomerDataSections
 *
 * Update all sections in case the wildcard symbol was found in the sections-to-update array
 */
class UpdateAllCustomerDataSections
{
    /**
     * @param SectionPool $subject
     * @param array|null $sectionNames
     * @param bool $updateIds
     * @return array
     */
    public function beforeGetSectionsData(
        SectionPool $subject,
        array $sectionNames = null,
        $updateIds = false
    ) {
        // Trying to find a wildcard in the "sections-to-update" array
        if (!empty($sectionNames) && array_search('*', $sectionNames) !== false) {
            // If found drop all section names to allow update of all sections
            $sectionNames = null;
        }

        return [$sectionNames, $updateIds];
    }
}