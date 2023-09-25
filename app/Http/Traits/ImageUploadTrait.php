<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

trait ImageUploadTrait
{
	public static function imageUpload($file, $filePath)
	{
		$path = Storage::disk(config('app.filesystem_disk'))->put($filePath, $file, 'public');
		return $path;
	}

	public static function imageDelete($path)
	{
		Storage::disk(config('app.filesystem_disk'))->delete($path);
		return true;
	}
}
