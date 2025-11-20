<?php

namespace App\Models;

use Awcodes\Curator\Models\Media as CuratorMedia;

class Media extends CuratorMedia
{
    // Curator's Media model already provides:
    // - url attribute (via getUrl() method)
    // - thumbnail_url attribute
    // - file_type attribute
    // - All necessary methods for media management
    
    // Add any custom methods or attributes here if needed
}
