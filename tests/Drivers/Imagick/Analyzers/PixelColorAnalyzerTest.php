<?php

namespace Intervention\Image\Tests\Drivers\Imagick\Analyzers;

use Intervention\Image\Analyzers\PixelColorsAnalyzer;
use Intervention\Image\Collection;
use Intervention\Image\Interfaces\ColorInterface;
use Intervention\Image\Tests\TestCase;
use Intervention\Image\Tests\Traits\CanCreateImagickTestImage;

class PixelColorsAnalyzerTest extends TestCase
{
    use CanCreateImagickTestImage;

    public function testAnalyze(): void
    {
        $image = $this->readTestImage('tile.png');
        $analyzer = new PixelColorsAnalyzer(0, 0);
        $result = $analyzer->analyze($image);
        $this->assertInstanceOf(Collection::class, $result);
        $this->assertInstanceOf(ColorInterface::class, $result->first());
        $this->assertEquals('b4e000', $result->first()->toHex());
    }
}
