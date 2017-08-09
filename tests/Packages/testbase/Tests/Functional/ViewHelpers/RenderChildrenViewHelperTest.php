<?php
namespace IchHabRecht\Testbase\Tests\Functional\ViewHelpers;

/*
 * This file is part of the IchHabRecht testing-framework project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read
 * LICENSE file that was distributed with this source code.
 */

use IchHabRecht\TestingFramework\TestCase\FunctionalTestCase;

class RenderChildrenViewHelperTest extends FunctionalTestCase
{
    /**
     * @var array
     */
    protected $coreExtensionsToLoad = array(
        'fluid',
    );

    /**
     * @var array
     */
    protected $testExtensionsToLoad = array(
        'typo3conf/ext/testbase',
    );

    /**
     * @test
     */
    public function ownTypoScripFileIsUsedInFrontendRequest()
    {
        $this->importDataSet('ntf://Database/pages.xml');

        $this->setUpFrontendRootPage(1, array('EXT:testbase/Tests/Functional/Fixtures/TypoScript/Page.ts'));

        $response = $this->getFrontendResponse(1);

        $this->assertSame('success', $response->getStatus());
        $this->assertSame('foo', trim($response->getContent()));
    }
}
