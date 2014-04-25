<?php

class ImageFile extends CComponent
{
	private $original_image = NULL;
	public $width = 0;
	public $height = 0;
	public $mime = NULL;
	
	function __construct($cuploadedfile)
	{
		$this->loadUploadedFile($cuploadedfile);
	}
	
	private function loadUploadedFile($cuploadedfile)
	{
		$this->mime = CFileHelper::getMimeType($cuploadedfile->tempName);
		
		//	Only png support for now...
		if($this->mime != 'image/png')
			return;
		
		$image = imagecreatefrompng($cuploadedfile->tempName);
		
		if($image)
		{
			$this->width = imagesx($image);
			$this->height = imagesy($image);
			
			$this->original_image = $image;
		}
	}
	
	public function isValid()
	{
		return ($this->original_image != NULL);
	}
	
	public function aspectSize($fit_width, $fit_height, &$width, &$height)
	{
		$width = 0;
		$height = 0;
		
		$width_ratio = $this->width / $fit_width;
		$height_ratio = $this->height / $fit_height;
		
		$ratio = max($width_ratio, $height_ratio);
		
		$width = intval($this->width / $ratio);
		$height = intval($this->height / $ratio);
		
		return TRUE;
	}
	
	public function saveAs($path, $width, $height, &$md5)
	{
		$md5 = NULL;
		
		if(!$this->isValid())
			return FALSE;
		
		$resized_image = NULL;
		
		//	If the size is the same then there's
		//	no reason to recomposite the image
		if($width == $this->width && $height == $this->height)
		{
			$resized_image = $this->original_image;
			imagealphablending($resized_image, FALSE);
			imagesavealpha($resized_image, TRUE);
		}
		else
		{
			$resized_image = imagecreatetruecolor($width, $height);
			imagealphablending($resized_image, FALSE);
			imagesavealpha($resized_image, TRUE);
			imagecopyresampled($resized_image, $this->original_image, 0, 0, 0, 0, $width, $height, $this->width, $this->height);
		}
		
		ob_start();
		$image_sucess = imagepng($resized_image, NULL, 9);
		$image_contents = ob_get_contents();
		ob_end_clean();
		
		if(!$image_sucess || !$image_contents)
			return FALSE;
		
		$file_handle = fopen($path, 'w');
	
		if(!$file_handle)
			return FALSE;
		
		$md5 = md5($image_contents);
		
		fwrite($file_handle, $image_contents);
		fclose($file_handle);
		
		return TRUE;
	}
}
