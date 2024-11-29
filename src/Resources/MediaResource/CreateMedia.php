<?php

namespace Awcodes\Curator\Resources\MediaResource;

use App\Filament\Resources\BaseClasses\CreateRecord;
use Awcodes\Curator\CuratorPlugin;


class CreateMedia extends CreateRecord
{
    public static function getResource(): string
    {
        return CuratorPlugin::get()->getResource();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (blank($data['title'])) {
            $data['title'] = pathinfo($data['originalFilename'], PATHINFO_FILENAME);
        }

        unset($data['originalFilename']);

        return $data;
    }
}
