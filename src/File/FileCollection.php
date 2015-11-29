<?php namespace Anomaly\FilesModule\File;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class FileCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FilesModule\File
 */
class FileCollection extends EntryCollection
{

    /**
     * Return files of a desired type.
     *
     * @param $type
     * @return static|FileCollection
     */
    public function type($type)
    {
        $files = [];

        /* @var FileInterface $item */
        foreach ($this->items as $item) {
            if ($item->type() === $type) {
                $files[] = $item;
            }
        }

        return new static($files);
    }

    /**
     * Return files of a desired mime type.
     *
     * @param $type
     * @return static|FileCollection
     */
    public function mimeType($type)
    {
        $files = [];

        /* @var FileInterface $item */
        foreach ($this->items as $item) {
            if (str_is($type, $item->getMimeType())) {
                $files[] = $item;
            }
        }

        return new static($files);
    }
}
