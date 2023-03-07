<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test;

use function array_values;
use function explode;
use PHPUnit\Event\AbstractEventTestCase;
use PHPUnit\Event\Code;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(BeforeTestMethodCalled::class)]
final class BeforeTestMethodCalledTest extends AbstractEventTestCase
{
    public function testConstructorSetsValues(): void
    {
        $telemetryInfo = $this->telemetryInfo();
        $testClassName = self::class;
        $calledMethod  = new Code\ClassMethod(...array_values(explode(
            '::',
            __METHOD__
        )));

        $event = new BeforeTestMethodCalled(
            $telemetryInfo,
            $testClassName,
            $calledMethod
        );

        $this->assertSame($telemetryInfo, $event->telemetryInfo());
        $this->assertSame($testClassName, $event->testClassName());
        $this->assertSame($calledMethod, $event->calledMethod());
    }
}
